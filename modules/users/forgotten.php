<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Recuperación de Contraseña</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../views/css/recovery.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="../../views/js/recovery.js"></script>
</head>

<body>
    <main>
        <div id="content">
            <h1>Página13</h1>
            <h2>Recuperá tu Cuenta</h2>
            <div>
                <div id="alertbad"></div>
                <div id="alertgood"></div>
                <p>Ingresá tu Correo Electrónico de Recuperación</p>
                <input type="text" placeholder="ejemplo@dominio.com" id="recoveryEmail">
            </div>
            <input type="button" class="button" id="recoveryButton" value="Recuperar contraseña">
        </div>
    </main>
</body>

</html>