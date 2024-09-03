<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/home.css">
    <link rel="stylesheet" href="./views/css/creator.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Creador de articulos</title>
</head>

<body>
    <main>
        <section>
            <div class="allContainer">

                <h2 id="creatorTitle">Creador de articulos</h2>
                <div class="creatorContainer">
                    <div class="optionsContainer">
                        <h3 id="write" class="options">Escribir</h3>
                        <h3 id="imagesVideos" class="options">Imagenes y videos</h3>
                        <h3 id="sources" class="options">Fuentes</h3>
                    </div>
                    <div id="containerPost">
                        <textarea type="text" placeholder="Ingrese el titulo del articulo" class="textArea"></textarea>
                        <textarea type="text" placeholder="Ingrese el subtitulo del articulo" id="subtitleTextArea" class="textArea"></textarea>
                        <textarea type="text" placeholder="Ingrese la descripcion del articulo" id="descTextArea" class="textArea"></textarea>
                    </div>
                    <div class="categories">
                        <div class="categoryCreator">Categoria</div>
                        <i class='bx bx-plus-medical'></i>
                        
                    </div>
                    <div class="buttonsContainer">
                        <button id="archiveButton" class="buttonsCreator">Archivar</button>
                        <button id="sendButton" class="buttonsCreator">Enviar</button>
                    </div>
                </div>
                <div class="mediaContainer">
                    <img src="" alt="" loading="lazy" class="imagePostCreator">
                    <i class='bx bx-plus-medical newImage'></i>
                </div>
                <div class="sourcesContainer">
                    <input type="text" placeholder="Ingrese la bibliografia" id="sources">
                </div>
            </div>
        </section>
    </main>
    
</body>

</html>