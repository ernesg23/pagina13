<?php
include 'connection.php';
session_start();
$ActualName = $_SESSION["username"];
$NewName = $_POST['name'];

if(empty($NewName)) {
    $NewName = $ActualName;
}
$ActualEmail = $_SESSION["email"];
$NewEmail = $_POST['email'];
if(empty($NewEmail)) {
    $NewEmail = $ActualEmail;
}
$ActualPassword = mysqli_query($connection, "SELECT password FROM USERS WHERE idUsers='".$_SESSION["userId"]."'");
$Newpassword = mysqli_real_escape_string($connection, $_POST['pass']);
$Newpassword = hash('sha512', $Newpassword);
if(empty($Newpassword)) {
    $Newpassword = $ActualPassword;
}
$query = "UPDATE users SET name ='$NewName',email = '$NewEmail',password = '$Newpassword' WHERE idUsers ='".$_SESSION["userId"]."'";

$r = mysqli_query($connection, $query);
print_r ($query)
?>