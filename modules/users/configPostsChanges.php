<?php
include 'connection.php';
session_start();
$ActualName = $_SESSION["username"];
$NewName = $_POST['inputName'];

if (empty($NewName)) {
    $NewName = $ActualName;
}
$ActualEmail = $_SESSION["email"];
$NewEmail = $_POST['inputEmail'];
if (empty($NewEmail)) {
    $NewEmail = $ActualEmail;
}
$ActualPassword = mysqli_query($connection, "SELECT password FROM users WHERE idUsers='" . $_SESSION["userId"] . "'");
$Newpassword = mysqli_real_escape_string($connection, $_POST['inputPass']);
$Newpassword = hash('sha512', $Newpassword);
if (empty($Newpassword)) {
    $Newpassword = $ActualPassword;
}
$query = "UPDATE users SET name ='$NewName',email = '$NewEmail',password = '$Newpassword' WHERE idUsers ='" . $_SESSION["userId"] . "'";

$r = mysqli_query($connection, $query);

$_SESSION['username'] = $NewName;
$_SESSION['email'] = $NewEmail;
$cookie_name = "username";
$cookie_value = $NewName;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_nameEmail = "email";
$cookie_valueEmail = $NewEmail;
setcookie($cookie_nameEmail, $cookie_valueEmail, time() + (86400 * 30), "/");
print_r($query);
