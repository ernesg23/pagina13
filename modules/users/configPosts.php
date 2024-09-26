<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../views/css/configPosts.css">
    <link rel="shortcut icon" href="./img/webicon.webp" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 13</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../../views/js/users.js"></script>
</head>

<body>
    <div class="containerUserConfig">
        <div id=head>
            <img class="icon" src="../../views/img/sin perfil.png" loading="lazy"
                width="200px"
                height="200px" />
            <div class="text">
                <h1 class="userName">Nombre de usuario</h1>
                <p class="userEmail">ejemplo@ejemplo.com.ar</p>
                <p class="userRol">Rol de Usuario</p>
                <p>Descripción</p>
                <p class="userDescription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde consectetur reprehenderit, vero placeat sequi doloremque aspernatur necessitatibus enim nihil odit optio amet cupiditate laboriosam? Necessitatibus atque neque sed iste.</p>
            </div>
        </div>
        <div class="buttons">
            <button class="nav-config" id="users-configSettings">Ajustes</button>
            <button class="nav-config" id="users-configPosts">Mis Artículos</button>
        </div>
        <div id="myPosts">
            <h2>Mis Artículos</h2>
            <div class="article">
                <img class="imgPost" src="../../views/img/descarga1.png">
                <h3 class="titlePost">Título Artículo</h>
                    <p class="categoryPost">Categoría</p>
                    <p class="descriptionPost">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam nisi accusantium nemo hic impedit molestias soluta quaerat eveniet a perferendis! Itaque porro laborum, mollitia minima officiis nihil incidunt eum explicabo!</p>
            </div>
        </div>
        <button id="editPost">Editar Artículo</button>
        <button id="erasePost">Eliminar</button>
        <div class="articles-container">
            <div class="article">
                <img src="ruta/a/tu/imagen1.jpg" alt="Imagen del artículo 1">
                <h3 class="titlePost">Título del Artículo 1</h3>
                <p class="categoryPost">Categoría</p>
                <p class="descriptionPost">Descripción breve del artículo 1</p>
            </div>
            <div class="article">
                <img src="ruta/a/tu/imagen2.jpg" alt="Imagen del artículo 2">
                <h3 class="titlePost">Título del Artículo 2</h3>
                <p class="categoryPost">Categoría</p>
                <p class="descriptionPost">Descripción breve del artículo 2</p>
            </div>
            <div class="article">
                <img src="ruta/a/tu/imagen3.jpg" alt="Imagen del artículo 3">
                <h3 class="titlePost">Título del Artículo 3</h3>
                <p class="categoryPost">Categoría</p>
                <p class="descriptionPost">Descripción breve del artículo 3</p>
            </div>
        </div>
    </div>
</body>

</html>