<?php
$query = "SELECT p.idPosts, p.Users_idUsers, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, 
pc.Categories_idCategories, c.idCategories, c.name, u.name AS authorName, u.profileImg, u.idUsers
FROM posts p
INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
INNER JOIN users u ON p.Users_idUsers = u.idUsers
WHERE p.isArchived = 0 AND p.idPosts = '" . $_POST['articleId'] . "'
ORDER BY p.idPosts DESC";
// $query = "SELECT * from posts where idPosts = '". $_POST['articleId']."';";
$r = mysqli_query($connection, $query);
if (!$r) {
die('Error en la consulta: ' . mysqli_error($connection));
}
$rows = [];
while ($response = mysqli_fetch_assoc($r)) {
$rows[] = $response;
}