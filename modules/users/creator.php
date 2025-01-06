<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Creador de Artículos</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/creator.css">
    <script type="module" src="./views/js/creator.js"></script>
</head>

<body>
    <main>
        <section>
            <div class="allContainer">

                <h2 id="creatorTitle">Creador de Artículos</h2>
                <div class="creatorContainer">
                    <div id="alertError"></div>
                    <div id="alertGood"></div>
                    <div class="optionsContainer">
                        <h3 id="write" class="options">
                            <p>Escribir</p><i class="bx bx-pencil optionsResponsive"></i>
                            <h3 id="imagesVideos" class="options">
                                <p>Imágenes y videos</p><i class="bx bxs-image-add optionsResponsive"></i>
                            </h3>
                            <!-- <h3 id="source" class="options">
                                <p>Fuentes</p><i class="bx bx-book-content optionsResponsive"></i>
                            </h3> -->
                    </div>
                    <div id="containerPost">
                        <div id="writecontainer" class="active">
                            <textarea type="text" placeholder="Ingrese el título del artículo"
                                class="textArea titletextArea"></textarea>
                            <textarea type="text" placeholder="Ingrese el subtitulo del artículo" id="subtitleTextArea"
                                class="textArea subtitletextArea"></textarea>
                            <textarea type="text" placeholder="Ingrese la descripción del artículo" id="descTextArea"
                                class="textArea descriptiontextArea"></textarea>
                        </div>
                        <div class="mediaContainer">
                            <img src="" alt="" loading="lazy" class="imagePostCreator">
                            <form id="uploadForm" method="post" action="" enctype="multipart/form-data">
                                <div class="input_container">
                                    <label for="files" class="btnLabel">
                                        <i class='bx bx-plus' id="iconPlus"></i>
                                        <input id="files" class="newImage" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg, image/webp, video/mp4">
                                        <img id="preview" src="" alt="Image Preview" style="display: none;" />
                                    </label>

                                </div>
                            </form>
                        </div>
                        <!-- <div class="sourcesContainer">
                            <textarea type="text" placeholder="Ingrese las fuentes de su articulo"
                                class="textArea" id="sources"></textarea>
                        </div> -->
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

                    <div class="buttonsContainer">
                        <button id="archiveButton" class="buttonsCreator">Archivar</button>
                        <button id="sendButton" class="buttonsCreator">Enviar</button>
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