<?php
include '../users/connection.php';
include './readerGet.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Artículo</title>
    <link rel="shortcut icon" href="./views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/reader.css">
    <script type="module" src="./views/js/profile.js"></script>
</head>

<body>
    <main>
        <section>
            <div id="main-post">
                <div id="categoriesReader">
                    <p id="category1" class="category" style="background-color: rgb(244, 164, 49);"><?php echo $rows[0]['name'] ?></p>
                    <p id="category2" class="category" style="background-color: rgb(14, 46, 89);"><?php echo $rows[0]['name'] ?></p>
                </div>
                <h2 id="readerTitle"><?php echo $rows[0]['title'] ?></h2>
                <div id="reader">
                    <p id="readerSubtitle"><?php echo $rows[0]['subtitle'] ?></p>
                    <img id="readerPortrait" src="<?php echo $rows[0]['portraitImg'] = str_replace('../', '', $rows[0]['portraitImg']); ?>">
                    <div id="author">
                        <img src="./views/img/sin perfil.png">
                        <p><?php echo $rows[0]['authorName'] ?></p>
                    </div>
                    <hr>
                    <p id="descriptionReader"><?php echo $rows[0]['description'] ?></p>
                </div>
            </div>
            <div id="recentPosts">
                <h2>Artículos Recientes</h2>
                <ul class="recentList"></ul>
                <template id="recent-article-template">
                    <li class="recent" id="">
                        <img src="" class="img">
                        <div class="recent-description">
                            <h3></h3>
                            <p></p>
                        </div>
                    </li>
                </template>
            </div>
        </section>
    </main>
</body>

</html>