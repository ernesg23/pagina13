<?php
include "../../config.php";
$authorId = $_COOKIE["userId"];
$postId = $_POST["id"];
$query = "SELECT p.idPosts, p.Users_idUsers, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, pc.Categories_idCategories, c.idCategories, c.name, u.idUsers AS authorId
          FROM posts p
          INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
          INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
          INNER JOIN users u ON p.Users_idUsers = u.idUsers
          WHERE p.idPosts = '$postId' 
          LIMIT 1;";

$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}

$rows3 = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows3[] = $response;
}
echo json_encode($rows3);