<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Mi Configuración</title>
    <link rel="shortcut icon" href="./views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/configSettings.css">
    <link rel="stylesheet" href="./views/css/configPosts.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="./views/js/configSettings.js"></script>
</head>

<body>
    <div id="userSettCont">
        <div id="userInfCont">
            <img src="./views/img/sin perfil.png" loading="lazy" />
            <div id="infoDescCont">
                <h5 id="userName"><?php echo $_COOKIE["username"]; ?></h5>
                <p class="userEmail"><?php echo $_COOKIE["email"] ?></p>
                <p class="userRol">Rol de Usuario</p>
                <p id="userDesc">Descripción</p>
                <p class="userDescription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde consectetur reprehenderit, vero placeat sequi doloremque aspernatur necessitatibus enim nihil odit optio amet cupiditate laboriosam? Necessitatibus atque neque sed iste.</p>
            </div>
        </div>
        <div class="contSett">
            <div class="buttonsCont">
                    <button id="users-configSettings" class="buttons">Ajustes</button>
                    <button id="users-configPosts" class="buttons">Mis Artículos</button>
            </div>
            <div id="principalCont">
                <h4 class="settings">Ajustes</h4>
                <div id="entireSettCont">
                    <div id="settings">
                        <form id="data">
                            <h4 class="name">Modificar Nombre de Usuario</h4>
                            <input name="inputName" id="newName" class="newInput" placeholder="Ingrese un nuevo nombre">
                            <h4 class="email">Modificar Email</h4>
                            <input name="inputEmail" id="newEmail" class="newInput" placeholder="Ingrese un nuevo email">
                            <h4 class="password">Cambiar contraseña</h4>
                            <input name="inputPass" id="newPass" class="newInput" placeholder="Ingrese una nueva contraseña">
                        </form>
                    </div>
                    <div id="changeImg">
                        <img class="imgChange" src="./views/img/sin perfil.png" />
                        <input type="button" class="saveBtn" value="Guardar" id="sendBtn" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>