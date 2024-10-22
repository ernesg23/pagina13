<?php
$mysqli = mysqli_connect("localhost", "root", "", "pagina13");
$query = "SELECT p.idPos, p.title, p.subtitle, p.desc, p.img, p.isArc, p.created_at, 
                 pc.cat_idCat, c.idCat, c.name as categoria_nombre
          FROM pos p
          INNER JOIN pos_cat pc ON p.idPos = pc.pos_idPos
          INNER JOIN cat c ON pc.cat_idCat = c.idCat
          WHERE p.isArc = 0
          ORDER BY p.idPos DESC
          LIMIT 5;";
$result = mysqli_query($mysqli, $query);
$articulos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $articulos[] = $row;
}
echo json_encode([
    'articulos' => $articulos
]);
