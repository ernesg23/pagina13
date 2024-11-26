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
                                    <label for="files" class="btnLabel"><?php echo $rows['portraitImg'] = str_replace('../..', '', $rows['portraitImg']); ?></label>
                                    <input id="files" class="newImage" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg, image/webp, video/mp4">
                                </div>
                            </form>
                        </div>
                    </div>
                    <p style="text-align: center;">Categorias</p>
                    <div class="categories">
                        <button class="categoryCreator" data-category="Base de Datos" style="background-color: #1abc9c;">Base de Datos</button>
                        <button class="categoryCreator" data-category="Matemáticas" style="background-color: #3498db;">Matemáticas</button>
                        <button class="categoryCreator" data-category="Organización Computacional" style="background-color: #9b59b6;">Organización Computacional</button>
                        <button class="categoryCreator" data-category="Lógica Computacional" style="background-color: #e67e22;">Lógica Computacional</button>
                        <button class="categoryCreator" data-category="Lengua y Literatura" style="background-color: #e74c3c;">Lengua y Literatura</button>
                        <button class="categoryCreator" data-category="Inglés Técnico" style="background-color: #34495e;">Inglés Técnico</button>
                        <button class="categoryCreator" data-category="Laboratorio de Algoritmos" style="background-color: #f1c40f;">Laboratorio de Algoritmos</button>
                        <button class="categoryCreator" data-category="Proyecto Informático" style="background-color: #2ecc71;">Proyecto Informático</button>
                        <button class="categoryCreator" data-category="Sistemas Operativos" style="background-color: #95a5a6;">Sistemas Operativos</button>
                    </div>
                    <div class="buttonsContainer" id="<?php echo $rows['idPosts']?>">
                        <button id="archiveButtonEdit" class="buttonsCreator">Archivar</button>
                        <button id="sendButtonEdit" class="buttonsCreator">Guardar</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>