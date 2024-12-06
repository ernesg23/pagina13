<?php 
include "../../config.php";
if (isset($_POST['postId'])) {
    $postId = $_POST["postId"];
}
else if (isset($_POST['articleId'])) {
    $postId = $_POST["articleId"];
}
$query = "SELECT p.idPosts, p.Users_idUsers, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, 
pc.Categories_idCategories, c.idCategories, c.name, u.name AS authorName
FROM posts p
INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
INNER JOIN users u ON p.Users_idUsers = u.idUsers
WHERE p.idPosts = '" . $postId . "'";
$r = mysqli_query($connection, $query);
$rows = mysqli_fetch_assoc($r);

$query = "SELECT p.idPosts, p.Users_idUsers, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, 
pc.Categories_idCategories, c.idCategories, c.name, u.name AS authorName
FROM posts p
INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
INNER JOIN users u ON p.Users_idUsers = u.idUsers
WHERE p.idPosts = '" . $postId . "'";
$r = mysqli_query($connection, $query);

$selectedCategories = [];
while ($row = mysqli_fetch_assoc($r)) {
    $selectedCategories[] = $row['name'];  // Almacenamos los nombres de las categorías
}

$selectedCategoriesJson = json_encode($selectedCategories);  // Convertimos el array en JSON para usarlo en JS

// Pasamos el JSON como una variable JavaScript para ser usado por el frontend
echo "<script>window.selectedCategories = $selectedCategoriesJson;</script>";