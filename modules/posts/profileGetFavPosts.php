<?php
include "../users/connection.php";
$userId = mysqli_real_escape_string($connection, $_COOKIE["userId"]);
$query = "SELECT
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
    u.name AS authorName,
    f.pos_idPos
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
INNER JOIN
    favorites f
      ON p.idPos = f.pos_idPos
WHERE
    f.users_idUsers = $userId
ORDER BY
    f.pos_idPos
LIMIT 4;
";
$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}
$rows2 = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows2[] = $response;
}
