<?php
include "../../config.php";
session_start();
$name = mysqli_real_escape_string($connection, $_POST['name'] . " " . $_POST['lastname']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['pass']);
$password = hash('sha512', $password);
$date = mysqli_real_escape_string($connection, $_POST['date']);
$query = "INSERT INTO `users`(`name`, `email`, `password`, `create_at`) VALUES ('$name', '$email', '$password', '$date')";
$verifyEmail = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($verifyEmail) > 0) {
    echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro");
            </script>
        ';
    mysqli_close($connection);
    exit();
}

$r = mysqli_query($connection, $query);
if ($r === TRUE) {
    $id = mysqli_insert_id($connection);

    $_SESSION['userId'] = $id;
    setcookie('userId', $id, time() + (86400 * 30), "/");

    // echo "Nuevo registro creado con éxito. ID: " . $id;
} else {
    // echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

$cookie_name = "username";
$cookie_value = $name;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$_SESSION['username'] = $name;
$cookie_nameEmail = "email";
$cookie_valueEmail = $email;
setcookie($cookie_nameEmail, $cookie_valueEmail, time() + (86400 * 30), "/");
$_SESSION['email'] = $cookie_valueEmail;
echo true;

mysqli_close($connection);
?>
