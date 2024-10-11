<?php
include "../posts/profileGetPosts.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Mi Configuración</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../views/css/configSettings.css">
    <link rel="stylesheet" href="../../views/css/configPosts.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="./views/js/configSettings.js"></script>
</head>

<body>
    <main>
    <div class="container">
        <div id="head">
            <img class="img" src="../../views/img/labestia.png" loading="lazy"
                width="200"
                height="200" />
                <div class="text">
                <h1 class="userName"><?php echo $_SESSION['username']; ?></h1>
                <p class="userEmail"><?php echo $_SESSION['email']; ?></p>
            <p class="userRol">Rol de Usuario: Usuario</p>
            <div class="userDescription">
            <p>Descripción:</p>
            <p>El mejor goleador de fútbol Argentino.</p>
            </div>
            </div>
    </div>
        <div class="color-body">
            <div class="body">
            <div class="hr">
                <div class="buttons">
            <button id="users-configSettings">Ajustes</button>
            <button id="users-configPosts">Mis Artículos</button>
            </div>
            </div>
         </div>
        </main>
        <div id="text-two" class="containerSettings">
            <div id="settings">
                <h1 class="adjust">Ajustes</h1>
                <form id="data">
                    <h2 class="name">Modificar Nombre de Usuario</h2>
                    <input name="searchBar" id="searchBar_Name" placeholder="Ingrese un nuevo nombre">
                    <h2 class="email">Modificar Email</h2>
                    <input name="searchBar" id="searchBar_Email" placeholder="Ingrese un nuevo email">
                    <h2 class="password">Cambiar contraseña</h2>
                    <input name="searchBar" id="searchBar_Password" placeholder="Ingrese una nueva contraseña">
                </form>
            </div>
            <div id="changeImg">
                <img class="img" src="../../views/img/labestia.png"
                width="270"
                height="270" />
                <input type="button" class="Guardarbtn" value="Guardar" id="sendBtn" />
                </div>
            </div>
        </div>
    </div>
</body>
