
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Mi Configuración</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/configSettings.css">
    <link rel="stylesheet" href="../../views/css/configPosts.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="./views/js/configSettings.js"></script>
</head>

<body>
    <div class="containerUserSettings">
        <div class="text">
            <img src="./views/img/sin perfil.png" loading="lazy"
                width="200"
                height="200" />
            <h1 class="userName">Nombre de usuario</h1>
            <p class="userEmail">ejemplo@ejemplo.com.ar</p>
            <p class="userRol">Rol de Usuario</p>
            <p>Descripción</p>
            <p class="userDescription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde consectetur reprehenderit, vero placeat sequi doloremque aspernatur necessitatibus enim nihil odit optio amet cupiditate laboriosam? Necessitatibus atque neque sed iste.</p>
        </div>
        <div class="nav-config">
            <button id="users-configSettings">Ajustes</button>
            <button id="users-configPosts">Mis Artículos</button>
        </div>
        <div class="contentPage">
            <h1>Ajustes</h1>
            <form id="data">
                <h2>Modificar Nombre de Usuario</h2>
                <input name="name" id="searchBar_Name" placeholder="Ingrese un nuevo nombre">
                <h2>Modificar Email</h2>
                <input name="email" id="searchBar_Email" placeholder="Ingrese un nuevo email">
                <h2>Cambiar contraseña</h2>
                <input name="pass" id="searchBar_Password" placeholder="Ingrese una nueva contraseña">
            </form>
            <div id="changeImg">
                <img class="img" src="./views/img/descarga1.png">
                <button id="save">Guardar</button>
            </div>
        </div>
    </div>
</body>
