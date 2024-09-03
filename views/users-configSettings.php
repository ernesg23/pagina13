<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="./img/webicon.webp" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 13</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/users.js"></script>
</head>

<body>
    <header>
        <!-- Acá va el layout (navbar) -->
    </header>
    <main>
        <section>
            <div>
                <img src="./img/descarga1.png" loading="lazy" />
                <h1 class="userName">Nombre de usuario</h1>
                <p class="userEmail">ejemplo@ejemplo.com.ar</p>
                <p class="userRol">Rol de Usuario</p>
                <p>Descripción</p>
                <p class="userDescription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde consectetur reprehenderit, vero placeat sequi doloremque aspernatur necessitatibus enim nihil odit optio amet cupiditate laboriosam? Necessitatibus atque neque sed iste.</p>
                <div>
        </section>
        <section>
            <div>
                <button class="nav-config" id="users-configSettings">Ajustes</button>
            </div>
            <div>
                <button class="nav-config" id="users-configPosts">Mis Artículos</button>
            </div>
        </section>
        <section class="contentPage">
            <h1>Ajustes</h1>
            <h2>Modificar Nombre de Usuario</h2>
            <form>
                <input name="searchBar" id="searchBar_Name" placeholder="Ingrese un nuevo nombre">
            </form>
            <h2>Modificar Email</h2>
            <form>
                <input name="searchBar" id="searchBar_Email" placeholder="Ingrese un nuevo email">
            </form>
            <h2>Cambiar contraseña</h2>
            <form>
                <input name="searchBar" id="searchBar_Password" placeholder="Ingrese una nueva contraseña">
            </form>
            <div id="changeImg">
                <div>
                    <img class="img" src="./img/descarga1.png">
                </div>
                <div>
                    <button>Guardar</button>
                </div>
            </div>
        </section>
    </main>
</body>

</html>