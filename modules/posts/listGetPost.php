<?php
include "../../config.php";
$query = "SELECT p.idPosts, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, pc.Categories_idCategories, c.idCategories, c.name
          FROM posts p
          INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
          INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
          WHERE p.isArchived = 0 AND deleted_at IS NULL
          ORDER BY p.idPosts DESC;";

$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}

$rows2 = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows2[] = $response;
}