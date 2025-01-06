<?php 
include '../../config.php';
$userId = mysqli_real_escape_string($connection, $_SESSION["userId"]);
$query = "SELECT name, email, profileImg, description, role FROM USERS WHERE idUsers = $userId";
$response = mysqli_query($connection, $query);
$userInfo = [];
while ($r =mysqli_fetch_assoc($response)){
    $userInfo[] = $r;
}