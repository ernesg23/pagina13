<?php
include 'connection.php';
session_start();

$name = mysqli_real_escape_string($connection, $_POST['name'] . " " . $_POST['lastname']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['pass']);
$password = hash('sha512', $password);
$date = date("Y-m-d H:i:s"); // Obtener la fecha actual en el formato correcto

$verifyEmail = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($verifyEmail) > 0) {
    echo json_encode(['error' => 'Este correo ya está registrado, intenta con otro.']);
    mysqli_close($connection);
    exit();
}

$query = "INSERT INTO users(name, email, pass, create_at) VALUES ('$name', '$email', '$password', '$date')";
$r = mysqli_query($connection, $query);

if ($r === TRUE) {
    $id = mysqli_insert_id($connection);
    $_SESSION['userId'] = $id;
    setcookie('userId', $id, time() + (86400 * 30), "/");

    $cookie_name = "username";
    $cookie_value = $name;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $_SESSION['username'] = $name;

    $cookie_nameEmail = "email";
    $cookie_valueEmail = $email;
    setcookie($cookie_nameEmail, $cookie_valueEmail, time() + (86400 * 30), "/");
    $_SESSION['email'] = $cookie_valueEmail;

    echo json_encode(['success' => 'Registro realizado con éxito.']);
} else {
    echo json_encode(['error' => 'Error al registrar.']);
}

mysqli_close($connection);
