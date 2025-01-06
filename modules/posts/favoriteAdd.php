<?php
include "../../config.php";

function getCookie($cname) {
    if (!isset($_COOKIE[$cname])) {
        return "";
    }
    return $_COOKIE[$cname];
}

$userId = getCookie("userId");

if ($userId) {
    $postId = mysqli_real_escape_string($connection, $_POST["postId"]);
    
    // Verify if there is data about this
    $checkQuery = "SELECT COUNT(*) as count FROM FAVORITES WHERE Users_idUsers = '$userId' AND Posts_idPosts = '$postId'";
    $checkResult = mysqli_query($connection, $checkQuery);
    $row = mysqli_fetch_assoc($checkResult);

    if ($row['count'] > 0) {
        // if it does, update
        $updateQuery = "UPDATE FAVORITES SET deleted_at = NULL WHERE Users_idUsers = '$userId' AND Posts_idPosts = '$postId'";
        $r = mysqli_query($connection, $updateQuery);

        if ($r) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        // if not, insert
        $insertQuery = "INSERT INTO FAVORITES (Posts_idPosts, Users_idUsers, deleted_at) VALUES ('$postId', '$userId', NULL)";
        $r = mysqli_query($connection, $insertQuery);

        if ($r) {
            echo "true";
        } else {
            echo "false";
        }
    }
} else {
    echo "false";
}

