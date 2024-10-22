<?php
$query = "SELECT p.idPos, p.users_idUsers, p.title, p.subtitle, p.desc, p.img, p.isArc, p.created_at, 
pc.cat_idCat, c.idCat, c.name, u.name AS authorName
FROM pos p
INNER JOIN pos_cat pc ON p.idPos = pc.pos_idPos
INNER JOIN cat c ON pc.cat_idCat = c.idCat
INNER JOIN users u ON p.users_idUsers = u.idUsers
WHERE p.isArc = 0 AND p.idPos = '" . $_POST['articleId'] . "'
ORDER BY p.idPos DESC";
// $query = "SELECT * from pos where idPos = '". $_POST['articleId']."';";
$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}
$rows = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows[] = $response;
}
