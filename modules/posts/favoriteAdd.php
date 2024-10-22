<?php
include "../users/connection.php";

function getCookie($cname)
{
    if (!isset($_COOKIE[$cname])) {
        return "";
    }
    return $_COOKIE[$cname];
}

$userId = getCookie("userId");

if ($userId) {
    $postId = mysqli_real_escape_string($connection, $_POST["postId"]);
    $query = "INSERT INTO fav VALUES ('$userId', '$postId')";
    $r = mysqli_query($connection, $query);
    if ($r) {
        echo "anda";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "User ID cookie is not set.";
}
