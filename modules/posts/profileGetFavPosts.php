<?php
include "../../config.php";

$userId = mysqli_real_escape_string($connection, $_COOKIE["userId"]);

$query = "SELECT
    p.idPosts,
    p.Users_idUsers,
    p.title,
    p.subtitle,
    p.description,
    p.portraitImg,
    p.isArchived,
    p.created_at,
    pc.Categories_idCategories,
    c.idCategories,
    c.name,
    u.name AS authorName,
    f.Posts_idPosts
FROM
    posts p
INNER JOIN
    posts_has_categories pc
      ON p.idPosts = pc.Posts_idPosts
INNER JOIN
    categories c
      ON pc.Categories_idCategories = c.idCategories
INNER JOIN
    users u
      ON p.Users_idUsers = u.idUsers
INNER JOIN
    favorites f
      ON p.idPosts = f.Posts_idPosts
WHERE
    f.Users_idUsers = $userId
    AND p.deleted_at IS NULL
ORDER BY
    f.Posts_idPosts
LIMIT 4;
";


$r = mysqli_query($connection, $query);

if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}

$rows2 = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows2[] = $response;
}
