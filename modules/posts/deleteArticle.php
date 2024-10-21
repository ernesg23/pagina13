<?php
include 'connection.php';
$publishedDate = date("Y-m-d H:i:s");
$query = "UPDATE deleted_at = " ; 

$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}

$rows = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows[] = $response;
}

echo json_encode($rows);