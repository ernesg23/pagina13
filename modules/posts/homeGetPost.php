<?php
include '../users/connection.php';
$query = "SELECT p.idPos, p.title, p.subtitle, p.desc, p.img, p.isArc, p.created_at, pc.cat_idCat, 
c.idCat, c.name
          FROM pos p
          INNER JOIN pos_cat pc ON p.idPos = pc.pos_idPos
          INNER JOIN cat c ON pc.cat_idCat = c.idCat
          WHERE p.isArc = 0
          ORDER BY p.idPos DESC
          LIMIT 5;";

$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}
$rows = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows[] = $response;
}
echo json_encode($rows);
