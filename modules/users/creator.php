<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/creator.css">
    <script type="module" src="./views/js/creator.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/layout.css">
    <title>Creador de articulos</title>
</head>

<body>
    <main>
        <section>
            <div class="allContainer">

                <h2 id="creatorTitle">Creador de articulos</h2>
                <div class="creatorContainer">
                    <div class="optionsContainer">
                        <h3 id="write" class="options"><p>Escribir</p><i class="bx bx-pencil optionsResponsive"></i>
                        <h3 id="imagesVideos" class="options"><p>Imagenes y videos</p><i class="bx bxs-image-add optionsResponsive"></i></h3>
                        <h3 id="source" class="options"><p>Fuentes</p><i class="bx bx-book-content optionsResponsive"></i></h3>
                    </div>
                    <div id="containerPost">
                        <div id="writecontainer" class="active">
                            <textarea type="text" placeholder="Ingrese el titulo del articulo"
                                class="textArea titletextArea"></textarea>
                            <textarea type="text" placeholder="Ingrese el subtitulo del articulo" id="subtitleTextArea"
                                class="textArea subtitletextArea"></textarea>
                            <textarea type="text" placeholder="Ingrese la descripcion del articulo" id="descTextArea"
                                class="textArea descriptiontextArea"></textarea>
                        </div>
                        <div class="mediaContainer">
                            <img src="" alt="" loading="lazy" class="imagePostCreator">
                            <form id="uploadForm" method="post" action="" enctype="multipart/form-data">
                                <div class="input_container">
                                    <label for="files" class="btnLabel"><i class='bx bx-plus'></i></label>
                                    <input id="files" class="newImage" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg, image/webp, video/mp4">
                                </div>
                            </form>
                        </div>
                        <div class="sourcesContainer">
                            <textarea type="text" placeholder="Ingrese las fuentes de su articulo"
                                class="textArea" id="sources"></textarea>
                        </div>
                    </div>
                    <div class="categories">
                        <input class="categoryCreator" placeholder="Categoria">
                        <!-- <i class='bx bx-plus-medical categoryAdd'></i> -->
                    </div>
                    <div class="buttonsContainer">
                        <button id="archiveButton" class="buttonsCreator">Archivar</button>
                        <button id="sendButton" class="buttonsCreator">Enviar</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>