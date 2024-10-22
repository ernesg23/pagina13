<?php
include '../users/connection.php';
$authorId = $_COOKIE["username"];
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
    cat c 
    ON pc.cat_idCat = c.idCat
INNER JOIN 
    users u 
    ON p.users_idUsers = u.idUsers
WHERE 
    u.name = '$authorId'
ORDER BY 
    p.idPos DESC
";

$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}

$rows2 = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows2[] = $response;
}
