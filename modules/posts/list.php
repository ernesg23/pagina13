<?php
include "../../config.php";
include './listGet.php';
include './listGetPost.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Búsqueda</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/list.css">
    <script type="module" src="./views/js/list.js"></script>
</head>

<body>

    <main>
        <div class="containerSearchAll">
            <div class="articles-containers">
                <h2 id="searchResult"> Artículos encontrados para la búsqueda "<?php echo $_POST['content'] ?>"</h2>
                <ul class="listPosts">
                    <template id="article-template">
                        <li class="article">
                            <img class="imgPost" src="">
                            <h3 class="titlePost"></h3>
                            <p class="categoryPost"></p>
                            <p class="subtitlePost"></p>
                        </li>
                    </template>
                    <?php foreach ($rows as $row): ?>
                        <li class="articleSearch" id="<?php echo $row['idPosts'] ?>">
                            <img class="imgPost" src="<?php echo str_replace('../', '', $row['portraitImg']); ?>">
                            <div class="postDesc">
                                <h3 class="titlePost"><?php echo $row['title']; ?></h3>
                                <p class="categoryPost"><?php echo $row['name']; ?></p>
                                <p class="subtitlePost"><?php echo $row['subtitle']; ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>


            <div class="recent-articles">
                <h2>Artículos Recientes</h2>
                <ul class="recent-post-list">
                    <?php foreach ($rows2 as $post): ?>
                        <li class="recent-article-search" id="<?php echo $post['idPosts']; ?>">
                            <img src="<?php echo str_replace('../../', '', $post['portraitImg']); ?>" class="img" alt="Imagen del artículo">
                            <div class="recent-description">
                                <h3><?php echo $post['title']; ?></h3>
                                <p><?php echo $post['subtitle']; ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <template id="recent-article-template">
                <li class="recent-article">
                    <img class="recent-image" src="">
                    <div class="recent-description">
                        <h3></h3>
                        <p></p>
                    </div>
                </li>
            </template>
        </div>

            
    </main>
</body>

</html>