<?php
session_start();
include "../../config.php";
include "../users/profileGetInfo.php";

$target_dir = "../../views/img/uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$fileUploaded = !empty($_FILES["file"]["tmp_name"]);
$uploadOk = 1;
$target_file = "";

if ($fileUploaded) {
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si es realmente una imagen
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar el tamaño del archivo
    if ($_FILES["file"]["size"] > 17000000) {
        echo "Archivo muy pesado";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "No se pudo subir el archivo";
        exit();
    } else {
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "Error al subir tu archivo.";
            exit();
        }
    }
} else {
    $target_file = $userInfo[0]['profileImg']; // Mantener la imagen actual si no se sube una nueva
}

$actualDesc = $userInfo[0]['description'];
$newDesc = $_POST['inputDesc'];
$ActualName = $_SESSION["username"];
$NewName = $_POST['inputName'];
if(empty($newDesc)) {
    $newDesc = $actualDesc;
}
if (empty($NewName)) {
    $NewName = $ActualName;
}
$ActualEmail = $_SESSION["email"];
$NewEmail = $_POST['inputEmail'];
if (empty($NewEmail)) {
    $NewEmail = $ActualEmail;
}
$ActualPasswordQuery = mysqli_query($connection, "SELECT password FROM USERS WHERE idUsers='" . $_SESSION["userId"] . "'");
$ActualPasswordRow = mysqli_fetch_assoc($ActualPasswordQuery);
$ActualPassword = $ActualPasswordRow['password'];
$actualPassVerify = mysqli_real_escape_string($connection, $_POST['oldPass']);
$actualPassVerify = hash('sha512', $actualPassVerify);
if ($actualPassVerify != $ActualPassword) {
    echo 'Contraseña incorrecta';
    die;
}
$Newpassword = mysqli_real_escape_string($connection, $_POST['inputPass']);
if (!empty($Newpassword)) {
    $Newpassword = hash('sha512', $Newpassword);
} else {
    $Newpassword = $ActualPassword;
}

$query = "UPDATE users SET name ='$NewName', email = '$NewEmail', password = '$Newpassword', description = '$newDesc', profileImg = '$target_file' WHERE idUsers ='" . $_SESSION["userId"] . "'";

$r = mysqli_query($connection, $query);

$_SESSION['username'] = $NewName;
$_SESSION['email'] = $NewEmail;
$cookie_name = "username";
$cookie_value = $NewName;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_nameEmail = "email";
$cookie_valueEmail = $NewEmail;
setcookie($cookie_nameEmail, $cookie_valueEmail, time() + (86400 * 30), "/");

echo "True";
?>
