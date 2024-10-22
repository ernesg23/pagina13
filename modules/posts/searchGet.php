<?php
include '../users/connection.php';
// prepare, to evade SQL injections
$query = $connection->prepare("
    SELECT p.idPos, p.title, p.subtitle, p.desc, p.img, p.isArc, p.created_at, 
           pc.cat_idCat, c.idCat, c.name
    FROM pos p
    INNER JOIN pos_cat pc ON p.idPos = pc.pos_idPos
    INNER JOIN cat c ON pc.cat_idCat = c.idCat
    WHERE (p.isArc = 0 AND p.title LIKE ?) 
       OR (p.isArc = 0 AND c.name LIKE ?)
    ORDER BY p.idPos DESC
    LIMIT 6");
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
// return data in JSON
echo json_encode($rows);
// close connection and query
$query->close();
$connection->close();
