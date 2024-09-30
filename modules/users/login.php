<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Inicio de Sesión</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module" src="./views/js/login.js"></script>
    
</head>

<body>
    <section>

        <div class="container">
            <div class="form">
                <h1 class="title">Página13</h1>
                <h3 class="title-login">Formulario de inicio de sesion</h3>
                <form>
                    <h2 class="title-email">Correo electronico</h2>
                    <input name="email" id="email" class="search-email" placeholder="ejemplo@example.com" type="email" required>
                    <h2 class="password">Contraseña</h2>
                    <input name="password" id="password" class="search" placeholder="Introduce tu contraseña" type="password" required>
                </form>
                <h2 class="forgotten-password">¿Olvidaste tu contraseña?</h2>
                <div class="remember-password">
                    <b>
                        <label><input type="checkbox" id="cbox1" value="first_checkbox" /> Recordar contraseña</label><br>
                    </b>
                </div>
                <input type="button" class="loginbtn" value="iniciar sesion" id="sendBtn" />

            </div>

        </div>
    </section>
</body>

</html>