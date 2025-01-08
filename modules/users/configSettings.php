<?php
session_start();
include "../users/profileGetInfo.php";
?>
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
    <script type="module" src="./views/js/configSettings.js"></script>
</head>

<body>
    <div id="userSettCont">
        <div id="userInfCont">
            <img src="<?php
                        if ($userInfo[0]['profileImg'] == "") {
                            echo './views/img/sin perfil.png';
                        } else {
                            echo str_replace('../', '', $userInfo[0]['profileImg']);
                        }
                        ?>" loading="lazy" />
            <div id="infoDescCont">
                <h5 id="userName"><?php echo $userInfo[0]['name'] ?></h5>
                <p class="userEmail"><?php echo $userInfo[0]['email'] ?></p>
                <p class="userRol"><?php
                                    if ($userInfo[0]['role'] == "reader") {
                                        echo 'Lector';
                                    } else {
                                        echo 'Escritor';
                                    }
                                    ?></p>
                <p id="userDesc">Descripción</p>
                <p class="userDescription">
                    <?php
                    if ($userInfo[0]['description'] == "") {
                        echo "Todavía no cuentas con una descripción.";
                    } else {
                        echo $userInfo[0]['description'];
                    }
                    ?></p>
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
                            <div id="emailAlert" class="alerts"></div>
                            <div id="alertAllGood" class="alerts"></div>
                            <h4 class="name">Modificar Nombre de Usuario</h4>
                            <input name="inputName" id="newName" class="newInput" placeholder="Ingrese un nuevo nombre">
                            <h4 class="email">Modificar Email</h4>
                            <input name="inputEmail" id="newEmail" class="newInput" placeholder="Ingrese un nuevo email">
                            <h4 class="email">Modificar Descripción</h4>
                            <textarea name="inputDesc" id="newDesc" class="newInput" placeholder="Ingrese una nueva descripción"></textarea>
                            <h4 class="password">Cambiar contraseña</h4>
                            <input name="inputPass" id="newPass" class="newInput" placeholder="Ingrese una nueva contraseña">
                            <h4 class="password">Ingrese su contraseña actual</h4>
                            <input name="oldPass" id="oldPass" class="newInput" placeholder="Ingrese su contraseña actual para confirmar cambios">
                        </form>
                    </div>
                    <div id="changeImg">
                        <h4 class="password">Cambiar foto de perfil</h4>
                        <label for="files" class="btnLabel"> <input id="files" class="newImage" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg, image/webp, video/mp4"> <img id="preview" class="imgChange" src="
                        <?php switch ($userInfo[0]['profileImg']) {
                            case "":
                                echo './views/img/sin perfil.png';
                                break;
                            default:
                                echo str_replace('../', '', $userInfo[0]['profileImg']);
                                break;
                        } ?>" alt="Image Preview" style="display: block;" /> </label>
                        <input type="button" class="saveBtn" value="Guardar" id="sendBtn" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>