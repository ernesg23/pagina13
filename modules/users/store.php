<?php
$mysqli = mysqli_connect("localhost", "root", "", "pagina13");
$result = mysqli_query($mysqli, "SELECT * FROM usuario");
while ($r = $result->fetch_assoc()) {
    $row[] = $r;
}
// echo "<pre>";
// print_r($row);
// echo "</pre>";
foreach ($row as $user) {
    echo "<tr>";
    echo "<td><b>Nombre:</b> ". $user['nombre'] ."</td><br>";
    echo "<td><b>Email:</b> ". $user['correoElectronico'] ."</td><br>";
    echo "<td><b>Contraseña:</b> ". $user['password'] ."</td><br>";
    echo "<td><b>Fecha de registro:</b> ". $user['fechaRegistro'] ."</td><br>";
    echo "<td><b>Descripcion de usuario:</b> ". $user['descripcion'] ."</td><br><br>";
    echo "</tr>";
}

//Guardo en la base de datos