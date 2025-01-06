<?php
include "../../config.php";
session_start();
$email = $_POST['email'];
$password = $_POST['pass'];
$password = hash('sha512', $password);
$verifyLogin = mysqli_query($connection, "SELECT * FROM users WHERE email='$email' and password='$password'");
while ($response = mysqli_fetch_assoc($verifyLogin)) {
    $rows[] = $response;
}
if (mysqli_num_rows($verifyLogin) > 0) {
    $id = $rows[0]['idUsers'];
    $_SESSION['userId'] = $id;
    setcookie('userId', $id, time() + (86400 * 30), "/");
    $cookie_name = "username";
    $cookie_value = $rows[0]['name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_nameEmail = "email";
    $cookie_valueEmail = $rows[0]['email'];
    setcookie($cookie_nameEmail, $cookie_valueEmail, time() + (86400 * 30), "/");
    $_SESSION['username'] = $cookie_value;
    $_SESSION['email'] = $cookie_valueEmail;
    echo "true";
} else {
    echo 'false';
}
