<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/layout.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
        integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="./views/js/navigation.js"></script>
</head>

<body>
    <header>
        <nav class="navigation">
                <h1 class="MainTitle">Pagina 13</h1>
                <search>
                    <form>
                        <input class="searchBar" name="searchBar" id="searchBar" placeholder="Buscar">
                    </form>
                </search>
                <input class="login-buttonnav" type="button" value="iniciar sesion" data-page="users-login" />
                <input class="registrer-buttonnav" type="button" value="registrarse" data-page="users-register" />
        </nav>
        <div class="category-parent">

            <input class="category-buttonnav" type="button" value="categoria 1" />
            <input class="category-buttonnav" type="button" value="categoria 2" />
            <input class="category-buttonnav" type="button" value="categoria 3" />
            <input class="category-buttonnav" type="button" value="categoria 4" />
            <input class="category-buttonnav" type="button" value="categoria 5" />
            <input class="category-buttonnav" type="button" value="categoria 6" />
            <input class="category-buttonnav" type="button" value="categoria 7" />
            <input class="category-buttonnav" type="button" value="categoria 8" />
            <input class="category-buttonnav" type="button" value="categoria 9" />
            <input class="category-buttonnav" type="button" value="categoria 10" />
        </div>
    </header>
    <div id="content">
        <?php include_once "views/home.php"; ?>
    </div>
    <footer>
        <div class="inforedes">
            <h3 class="titles">Explorar</h3>
            <img class="img" src="./views/img/enterprise_logo.png">
            <ul>
                <li><a href="https://twitter.com" class="socialMedia" target="_blank"><i class='bx bxl-twitter'></i></a>
                </li>
                <li><a href="https://instagram.com" class="socialMedia" target="_blank"><i
                            class='bx bxl-instagram bx-flip-horizontal'></i></a></li>
                <li><a href="https://facebook.com" class="socialMedia" target="_blank"><i
                            class='bx bxl-facebook'></i></a></li>
                <li><a href="https://github.com/ho-axed" class="socialMedia" target="_blank"><i
                            class='bx bxl-github'></i></a></li>
            </ul>
        </div>
        <div>
            <h4>Articulos publicados hoy</h4>
            <h5>Titulo Articulo</h5>
            <h5>Titulo Articulo</h5>
            <h5>Titulo Articulo</h5>
        </div>
        <div>
            <h4>Temas mas visitados hoy</h4>
            <h5>Tema 1</h5>
            <h5>Tema 2</h5>
            <h5>Tema 3</h5>
        </div>
    </footer>
</body>

</html>