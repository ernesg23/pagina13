<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Home</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="./views/js/home.js"></script>
</head>

<body>
    <section>
        <div id="articlesContainerAll">
            <div class="bigMediumArticlesContainer">
            </div>
            <div id="smallAndRecentContainer">
                <div id="smallArticlesContainer">
                    <div class="article small">
                        <img class="img" src="./views/img/advertisement.webp">
                    </div>
                    <div class="article small">
                        <img class="img" src="./views/img/advertisement.webp">
                    </div>
                    <template id="article-template">
                        <div class="article">
                            <img class="img" src="">
                            <div class="articlesDescriptions">
                                <h2></h2>
                                <p class="category"></p>
                                <p class="articleDescriptionParagraph"></p>
                            </div>
                        </div>
                    </template>
                </div>
                <div id="recentArticlesListContainer">
                    <ul class="recent-post-list">
                        <h4>Articulos recientes</h4>

                    </ul>
                </div>
                <template id="recent-article-template">
                    <li class="recent-article">
                        <img class="img recent" src="">
                        <div class="recent-description">
                            <h3></h3>
                            <p></p>
                        </div>
                    </li>
                </template>

            </div>
            <h3>Categorias mas visitadas</h3>
            <div class="categoriesSearchContainer">
                <input class="categorySearch" type="button" value="Matematicas" />
                <input class="categorySearch" type="button" value="Fisica" />
                <input class="categorySearch" type="button" value="Quimica" />
                <input class="categorySearch" type="button" value="STEM" />
                <input class="categorySearch" type="button" value="Pensamiento computacional" />
            </div>
        </div>
    </section>

</body>

</html>