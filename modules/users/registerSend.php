<?php
include 'connection.php';
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
    mysqli_close($conexion);
    exit();
}
$r = mysqli_query($connection, $query);
$cookie_name = "username";
$cookie_value = $name;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$_SESSION['username'] = $name;
$cookie_nameEmail = "email";
$cookie_valueEmail = $rows[0]['email'];
setcookie($cookie_nameEmail, $cookie_valueEmail, time() + (86400 * 30), "/");
$_SESSION['email'] = $cookie_valueEmail;
echo "true";
