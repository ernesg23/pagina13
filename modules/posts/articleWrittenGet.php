<?php
include "../users/connection.php";
session_start();
$authorName = $_SESSION["username"];
$query = "SELECT p.idPos, p.users_idusers, p.title, p.subtitle, p.desc, p.img, p.isArc, p.created_at, 
pc.cat_idCat, c.idCat, c.name, u.name AS authorName
FROM pos p
INNER JOIN pos_cat pc ON p.idPos = pc.pos_idPos
INNER JOIN cat c ON pc.cat_idCat = c.idCat
INNER JOIN users u ON p.users_idusers = u.idusers
WHERE u.name = '$authorName'
ORDER BY p.idPos DESC
LIMIT 2";
// $query = "SELECT * from pos where idPos = '". $_POST['articleId']."';";
$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}
$rows = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows[] = $response;
}
echo json_encode($rows);
