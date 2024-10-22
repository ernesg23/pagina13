<?php
include "../users/connection.php";
session_start();
$authorName = mysqli_real_escape_string($connection, $_COOKIE["username"]);
$query = "
SELECT 
    p.idPos, 
    p.users_idUsers, 
    p.title, 
    p.subtitle, 
    p.desc, 
    p.img, 
    p.isArc, 
    p.created_at, 
    pc.cat_idCat, 
    c.idCat, 
    c.name, 
    u.name AS authorName
FROM 
    pos p
INNER JOIN 
    pos_cat pc 
    ON p.idPos = pc.pos_idPos
INNER JOIN 
    categories c 
    ON pc.cat_idCat = c.idCat
INNER JOIN 
    users u 
    ON p.users_idUsers = u.idUsers
WHERE 
    u.name = '$authorName'
ORDER BY 
    p.idPos DESC
LIMIT 4
";
$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}
$rows = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows[] = $response;
}
