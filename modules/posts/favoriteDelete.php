<?php 
include "../users/connection.php";

function getCookie($cname) {
    if (!isset($_COOKIE[$cname])) {
        return "";
    }
    return $_COOKIE[$cname];
}

$userId = getCookie("userId");
$date = date("Y/m/d");
if ($userId) {
    $postId = mysqli_real_escape_string($connection, $_POST["postId"]);
    $query = "UPDATE FAVORITES SET deleted_at = '$date' where Posts_idPosts = '$postId' and Users_idUsers = '$userId'";
    $r = mysqli_query($connection, $query);
    if ($r) {
        echo "true";
    } else {
        echo "false1";
    }
} else {
    echo "false2";
}

