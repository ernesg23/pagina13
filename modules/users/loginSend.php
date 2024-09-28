<?php
include 'connection.php';
session_start();
$email = $_POST['email'];
$password = $_POST['pass'];
$password = hash('sha512', $password);
$verifyLogin = mysqli_query($connection, "SELECT * FROM users WHERE email='$email' and password='$password'");
while ($response = mysqli_fetch_assoc($verifyLogin)) {
    $rows[] = $response;
}
if (mysqli_num_rows($verifyLogin) > 0) {
    $cookie_name = "username";
    $cookie_value = $rows[0]['name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $_SESSION['username'] = $cookie_value;
    echo "true";
} else {
    echo '
         <script>
             alert("Usuario no existente, verifique los datos introducidos");
         </script>
     ';
}
