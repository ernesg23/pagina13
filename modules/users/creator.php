<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Creador de articulos</title>
</head>

<body>
    <main>
        <section>
            <h2 id="creatorTitle">Creador de articulos</h2>
            <div class="creatorContainer">
                <h3 id="write">Escribir</h3>
                <h3 id="imagesVideos">Imagenes y videos</h3>
                <h3 id="sources">Fuentes</h3>
                <div id="containerPost">
                    <input type="text" placeholder="Ingrese el titulo del articulo" class="textArea">
                    <input type="text" placeholder="Ingrese el subtitulo del articulo" class="textArea subtitleTextArea">
                    <input type="text" placeholder="Ingrese la descripcion del articulo" class="textArea descTextArea">
                </div>
                <div class="categories">
                    <p class="category">Categoria</p>
                    <i class='bx bx-plus-medical'></i>
                </div>
                <button id="archiveButton">Archivar</button>
                <button id="sendButtton">Enviar</button>
            </div>
            <div class="mediaContainer">
                <img src="" alt="" loading="lazy" class="imagePostCreator">
                <i class='bx bx-plus-medical newImage'></i>
            </div>
            <div class="sourcesContainer">
                <input type="text" placeholder="Ingrese la bibliografia" id="sources">
            </div>
        </section>
    </main>
    
</body>

</html>