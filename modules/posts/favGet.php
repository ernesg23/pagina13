<?php
include "../users/connection.php";
function getCookie($cname)
{
    if (!isset($_COOKIE[$cname])) {
        return "";
    }
    return $_COOKIE[$cname];
}
function isFavorite($userId, $postId)
{
    global $connection;
    $query = "SELECT COUNT(*) as count 
    FROM FAVORITES 
    WHERE Users_idUsers = '$userId' 
    AND Posts_idPosts = '$postId' 
    AND deleted_at IS NULL";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($connection);
        return false;
    }

    $row = mysqli_fetch_assoc($result);
    return $row['count'] > 0;
}

$userId = getCookie("userId");
$postId = $rows[0]['idPosts'];
$activeClass = isFavorite($userId, $postId) ? 'active' : '';
