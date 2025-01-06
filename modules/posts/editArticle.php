<?php
include "./getEditPost.php"
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Creador de Artículos</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/creator.css">
    <script type="module" src="./views/js/editor.js"></script>
    <link rel="stylesheet" href="./views/css/editor.css">
</head>

<body>
    <main>
        <section>
            <div class="allContainer">

                <h2 id="creatorTitle">Editor de articulos</h2>
                <div class="creatorContainer">
                    <div id="alertError"></div>
                    <div id="alertGood"></div>
                    <div class="optionsContainer">
                        <h3 id="write" class="options">
                            <p>Escribir</p><i class="bx bx-pencil optionsResponsive"></i>
                            <h3 id="imagesVideos" class="options">
                                <p>Imagenes y videos</p><i class="bx bxs-image-add optionsResponsive"></i>
                            </h3>
                    </div>
                    <div id="containerPost">
                        <div id="writecontainer" class="active">
                            <textarea type="text" placeholder="Ingrese el nuevo titulo del articulo"
                                class="textArea titletextArea"><?= $rows['title'] ?></textarea>
                            <textarea type="text" placeholder="Ingrese el nuevo subtitulo del articulo" id="subtitleTextArea"
                                class="textArea subtitletextArea"><?= $rows['subtitle'] ?></textarea>
                            <textarea type="text" placeholder="Ingrese la nueva descripcion del articulo" id="descTextArea"
                                class="textArea descriptiontextArea"><?= $rows['description'] ?></textarea>
                        </div>
                        <div class="mediaContainer">
                            <img src="" alt="" loading="lazy" class="imagePostCreator">
                            <form id="uploadForm" method="post" action="" enctype="multipart/form-data">
                                <div class="input_container">
                                    <label for="files" class="btnLabel">
                                        <input id="files" class="newImage" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg, image/webp, video/mp4">
                                        <img id="preview" src="<?php echo str_replace('../../', '', $rows['portraitImg']); ?>" alt="Image Preview" style="display: block;" />
                                    </label>

                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Elige una categoría
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-item" data-category="Base de Datos">Base de Datos</li>
                            <li class="dropdown-item" data-category="Matematicas">Matemáticas</li>
                            <li class="dropdown-item" data-category="Organizacion Computacional">Organización Computacional</li>
                            <li class="dropdown-item" data-category="Logica Computacional">Lógica Computacional</li>
                            <li class="dropdown-item" data-category="Lengua y Literatura">Lengua y Literatura</li>
                            <li class="dropdown-item" data-category="Ingles Tecnico">Inglés Técnico</li>
                            <li class="dropdown-item" data-category="Laboratorio de Algoritmos">Laboratorio de Algoritmos</li>
                            <li class="dropdown-item" data-category="Proyecto Informatico">Proyecto Informático</li>
                            <li class="dropdown-item" data-category="Analisis de sistemas">Análisis de Sistemas</li>
                            <li class="dropdown-item" data-category="Otros">Otros</li>
                        </ul>
                    </div>
                    <div class="buttonsContainer" id="<?php echo $rows['idPosts'] ?>">
                        <button id="archiveButtonEdit" class="buttonsCreator">Archivar</button>
                        <button id="sendButtonEdit" class="buttonsCreator">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="aiBtn mirror active">
                <i class='bx bxs-message-square-minus'></i>
            </div>
            <div id="aiMessagesContainer"></div>
        </section>
    </main>

</body>

</html>