<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="views/img/enterprise_logo.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
    integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="./views/js/navigation.js"></script>
    <script type="module" src="./views/js/layout.js"></script>
    <link rel="stylesheet" href="./views/css/layout.css">

</head>

<body>
    <header>
        <nav class="navigation">
            <h1 class="MainTitle">Pagina 13</h1>
            <search class="searchBarContainer">
                <form class="searchBarForm">
                    <input class="searchBar" name="searchBar" id="searchBar" placeholder="Buscar"> <i
                        class='bx bx-search searchBtn'></i>
                </form>
                <ul class="searchResults">
                    <template id="search-result-template">
                        <li class="search-post" id="">
                            <img class="img search-post-img" src="">
                            <div class="search-description">
                                <h3></h3>
                                <p></p>
                            </div>
                        </li>
                    </template>
                </ul>
            </search>
            <i class='bx bx-search searchDrop'></i>
            <div class="navMenu">
                <i class='bx bx-menu dropbtn'></i>
                <div class="dropdown-content">
                    <input class="registrer buttonnav" type="button" value="Registrarse" data-page="users-register" />
                    <input class="login buttonnav" type="button" value="Iniciar sesión" data-page="users-login" />
                </div>
            </div>
        </nav>
        <div class="category-parent">
            <p class="categoryOpen">Categorias</p>
            <div class="categoryButtons">
                <input class="category-buttonnav" type="button" value="Base de datos" />
                <input class="category-buttonnav" type="button" value="Matematicas" />
                <input class="category-buttonnav" type="button" value="Organizacion Computacional" />
                <input class="category-buttonnav" type="button" value="Logica Computacional" />
                <input class="category-buttonnav" type="button" value="Lengua y Literatura" />
                <input class="category-buttonnav" type="button" value="Ingles tecnico" />
                <input class="category-buttonnav" type="button" value="Laboratorio de Algoritmos" />
                <input class="category-buttonnav" type="button" value="Proyecto Informatico" />
                <input class="category-buttonnav" type="button" value="Sistemas Operativos" id="buttonnav-10" />
            </div>
        </div>
        <ul class='actionsMenu'>
            <li class="actionsMenuItem">Apariencia: <input type="checkbox" name="light-theme"
                    id="lightmode-toggle"><label for="lightmode-toggle" id="toggle-light"> <i
                        class='bx bx-moon moon'></i> <i class='bx bx-sun sun'></i></label></li>
            <li class="actionsMenuItem buttonnav" data-page="users-profile">Mi perfil <i
                    class='bx bx-user iconActionMenu'></i></li>
            <li class="actionsMenuItem buttonnav" data-page="users-configSettings">Ajustes <i
                    class='bx bx-cog iconActionMenu'></i></li>
            <li class="actionsMenuItem buttonnav" data-page="users-creator">Crear articulo <i
                    class='bx bx-pencil iconActionMenu'></i></li>
            <li class="actionsMenuItem" id="search"><input class="responsiveSearch" name="searchBar" id="searchBar"
                    placeholder="Buscar"> <i class='bx bx-search searchIconR iconActionMenu'></i></li>
            <li class="actionsMenuItem buttonnav" id="logOut" data-page="users-logOut">Cerrar sesion <i
                    class='bx bx-power-off'></i></li>

        </ul>
    </header>
    <main>
        <div id="content">
            <?php include_once "views/home.php"; ?>
        </div>
    </main>
    <footer class="footer">
        <img class="img-foot" src="./views/img/enterprise_logo.png">
        <div class="social">
            <ul>
                <h4 class="text-title">Seguinos en las redes</h4>
                <li><a href="https://twitter.com" class="socialMedia" target="_blank"><i
                            class='bx bxl-twitter'></i>Pagina13</a>
                </li>
                <li><a href="https://instagram.com" class="socialMedia" target="_blank"><i
                            class='bx bxl-instagram bx-flip-horizontal'></i>Pagina13</a></li>
                <li><a href="https://github.com/ho-axed" class="socialMedia" target="_blank"><i
                            class='bx bxl-github'></i>Pagina13</a></li>
            </ul>
        </div>
        <div class="article-today">
            <h4>Articulos publicados hoy</h4>
            <h5>Titulo Articulo</h5>
            <h5>Titulo Articulo</h5>
            <h5>Titulo Articulo</h5>
        </div>
        <div class="public-today">
            <h4>Temas mas visitados hoy</h4>
            <h5>Tema 1</h5>
            <h5>Tema 2</h5>
            <h5>Tema 3</h5>
        </div>
    </footer>
</body>

</html>