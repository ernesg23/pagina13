<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Mi Perfil</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="../../views/js/profile.js"></script>
</head>

<body id="content">
    
    <section>
        <div>
            <img src="./img/descarga1.png" loading="lazy" />
            <h1 class="userName">Nombre de usuario</h1>
            <p class="userEmail">ejemplo@ejemplo.com.ar</p>
            <p class="userRol">Rol de Usuario</p>
            <p>Descripción</p>
            <p class="userDescription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde consectetur reprehenderit, vero placeat sequi doloremque aspernatur necessitatibus enim nihil odit optio amet cupiditate laboriosam? Necessitatibus atque neque sed iste.</p>
        </div>
    </section>
    <section>
        <div class="writtenPostContainer">
            <h2>Artículos Escritos</h2>
            <div class="writtenPosts">
                <img class="imgPost" src="./views/img/descarga1.png">
                <h3 class="titlePost">Título Artículo</h>
                    <i class='bx bx-edit editArticle'></i>
                    <div class="postDescription">
                        <p class="categoryPost">Categoría</p>
                        <p class="subtitlePost">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam nisi accusantium nemo hic impedit molestias soluta quaerat eveniet a perferendis! Itaque porro laborum, mollitia minima officiis nihil incidunt eum explicabo!</p>
                    </div>
            </div>
            <div class="writtenPosts">
                <img class="imgPost" src="./views/img/descarga1.png">
                <h3 class="titlePost">Título Artículo</h>
                    <i class='bx bx-edit editArticle'></i>
                    <div class="postDescription">
                        <p class="categoryPost">Categoría</p>
                        <p class="subtitlePost">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam nisi accusantium nemo hic impedit molestias soluta quaerat eveniet a perferendis! Itaque porro laborum, mollitia minima officiis nihil incidunt eum explicabo!</p>
                    </div>
            </div>
        </div>  
        <div class="favoritePostContainer">
            <h2>Artículos Favoritos</h2>
            <div class="favoritePosts">
                <img class="imgPost" src="./img/descarga1.png">
                <h3 class="titlePost">Título Artículo</h>
                    <div class="postDescription">
                        <p class="categoryPost">Categoría</p>
                        <p class="subtitlePost">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam nisi accusantium nemo hic impedit molestias soluta quaerat eveniet a perferendis! Itaque porro laborum, mollitia minima officiis nihil incidunt eum explicabo!</p>
                    </div>
            </div>
            <div class="favoritePosts">
                <img class="imgPost" src="./img/descarga1.png">
                <h3 class="titlePost">Título Artículo</h>
                    <div class="postDescription">
                        <p class="categoryPost">Categoría</p>
                        <p class="subtitlePost">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam nisi accusantium nemo hic impedit molestias soluta quaerat eveniet a perferendis! Itaque porro laborum, mollitia minima officiis nihil incidunt eum explicabo!</p>
                    </div>
            </div>
        </div>
    </section>
</body>

</html>