<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Inicio de Sesión</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/login.css">
    <script src="./views/js/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <section>
        <div id="container">
            <div id="form">
                <h1>Página13</h1>
                <h2>Ingresá a tu Cuenta</h2>
                <form>
                    <div id="emailAlert"></div>
                    <div id="alertAllGood"></div>
                    <h2>Correo Electrónico</h2>
                    <input name="email" id="email" placeholder="example@example.com" type="email" required>
                    <h2>Contraseña</h2>
                    <input name="password" id="password" placeholder="Introduce tu contraseña" type="password" required>
                </form>
                <a href="./modules/users/forgotten.php" id="forgotten-password">¿Olvidaste tu contraseña?</a>
                <p class="haventCount">No tenés cuenta? Registrate ahora!</p>
                <div>
                    <b>
                        <label><input type="checkbox" id="cbox1" value="first_checkbox" />Recordar contraseña</label><br>
                    </b>
                </div>
                <input type="button" value="Iniciar sesión" id="sendBtn" />
            </div>
        </div>
    </section>
</body>

</html>