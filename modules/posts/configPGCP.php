<?php
include '../users/connection.php';
$authorId = $_COOKIE["userId"];
$postId = $_POST["id"];
$query = "SELECT p.idpos, p.users_idUsers, p.title, p.subtitle, p.desc, p.img, p.isArc, p.created_at, pc.cat_idcat, c.idCat, c.name, u.idUsers AS authorId
          FROM pos p
          INNER JOIN pos_cat pc ON p.idpos = pc.pos_idpos
          INNER JOIN cat c ON pc.cat_idcat = c.idcat
          INNER JOIN users u ON p.users_idUsers = u.idUsers
          WHERE p.idpos = '$postId'
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
