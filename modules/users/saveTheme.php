<?php
// Conectar a la base de datos
include "../../config.php";

// Iniciar la sesión
session_start();

// Verificar si el ID de usuario está almacenado en la sesión
$user_id = mysqli_real_escape_string($connection, $_COOKIE["userId"]);

try {
    // Conectar a la base de datos usando PDO
    $pdo = new PDO("mysql:host=localhost;dbname=pagina13;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Leer datos enviados por POST
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar si el tema está definido en los datos recibidos
    if (!isset($data['theme'])) {
        die("Falta el valor del tema.");
    }

    // Actualizar el tema en la base de datos
    $stmt = $pdo->prepare("UPDATE users SET blackTheme = ? WHERE idUsers = ?");
    $stmt->execute([(int)$data['theme'], $user_id]);

    echo "Tema actualizado correctamente.";
} catch (PDOException $e) {
    // Mostrar un mensaje de error si ocurre un problema
    echo "Error: " . $e->getMessage();
}