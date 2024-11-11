<?php
include "../../config.php";

// prepare, to evade SQL injections
$query = $connection->prepare("
    SELECT p.idPosts, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, 
           pc.Categories_idCategories, c.idCategories, c.name
    FROM posts p
    INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
    INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
    WHERE (p.isArchived = 0 AND p.title LIKE ? AND deleted_at IS NULL) 
       OR (p.isArchived = 0 AND c.name LIKE ? AND deleted_at IS NULL)
    ORDER BY p.idPosts DESC;
");

// add searchTerm
$searchTerm = '%' . $_POST['content'] . '%';
$query->bind_param('ss', $searchTerm, $searchTerm);
// query
$query->execute();
$result = $query->get_result();

// get results
$rows = [];
while ($response = $result->fetch_assoc()) {
    $rows[] = $response;
}

// close connection and query
$query->close();
$connection->close();
