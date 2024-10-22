<?php
include '../users/connection.php';

// Get datetime
$date = date('Y-m-d H:i:s');

// Evade sql injections
$id = mysqli_real_escape_string($connection, $_POST['id']);

$query = "UPDATE pos SET deleted_at = '$date' WHERE idPos = '$id'";
$r = mysqli_query($connection, $query);

if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}
// echo json_encode(['status' => 'success']);