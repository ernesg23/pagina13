<?php
$mysqli = mysqli_connect("localhost", "root", "", "pagina13");
$query = "SELECT p.idPosts, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, 
                 pc.Categories_idCategories, c.idCategories, c.name as categoria_nombre
          FROM posts p
          INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
          INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
          WHERE p.isArchived = 0
          ORDER BY p.idPosts DESC
          LIMIT 5;";
$result = mysqli_query($mysqli, $query);
$articulos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $articulos[] = $row;
}
echo json_encode([
    'articulos' => $articulos
]);