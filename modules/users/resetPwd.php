<?php

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $pwdRep = $_POST["pwdRep"];
    $currentDate = date("U");

    if ($password !== $pwdRep) {
        echo "password_mismatch";
        exit();
    }

    include "../../config.php";

    $querySel = "SELECT * FROM accountrecovery WHERE resetSelector = ? AND resetExprires >= ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $querySel)) {
        echo "stmt_prepare_fail_1";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);
        $r = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($r)) {
            echo "no_entry_found";
        } else {
            $tokenBin = hex2bin($validator);
            if ($tokenBin === false) {
                echo "invalid_hex"; // Si hex2bin falla
                exit();
            }

            $tokenCheck = password_verify($tokenBin, $row["token"]);
            if ($tokenCheck === false) {
                echo "invalid_token";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['resetEmail'];

                $querySelU = "SELECT * FROM users WHERE email = ?";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $querySelU)) {
                    echo "stmt_prepare_fail_2";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $r = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($r)) {
                        echo "user_not_found";
                    } else {
                        $queryUp = "UPDATE users SET password = ? WHERE email = ?";
                        $stmt = mysqli_stmt_init($connection);
                        if (!mysqli_stmt_prepare($stmt, $queryUp)) {
                            echo "stmt_prepare_fail_3";
                            exit();
                        } else {
                            $newPwdHash = hash("sha512", $password);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $queryDel = "DELETE FROM accountrecovery WHERE resetEmail = ?";
                            $stmt = mysqli_stmt_init($connection);
                            if (!mysqli_stmt_prepare($stmt, $queryDel)) {
                                echo "stmt_prepare_fail_4";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                echo "true";
                            }
                        }
                    }
                }
            }
        }
    }
