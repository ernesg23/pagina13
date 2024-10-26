<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Recuperación de Contraseña</title>
    <link rel="shortcut icon" href="../../views/img/enterprise_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../views/css/reset.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="../../views/js/createNP.js"></script>
</head>

<body>
    <main>
        <div id="content">
            <h1>Página13</h1>
            <h2>Cambio de contraseña</h2>
            <div id="entireForm">
                <div id="alertbad"></div>
                <div id="alertgood"></div>
                <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];
                if (empty($selector) || empty($validator)) {
                    echo "Error, no se pudo validar su consulta";
                } else {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>
                        <form id="resetPwdForm" method="post">
                            <input type="hidden" name="selector" value="<?php echo $selector ?>">
                            <input type="hidden" name="validator" value="<?php echo $validator ?>">
                            <div>
                                <input type="password" name="pwd" placeholder="Ingrese una nueva contraseña" id="pwd" class="recInp">
                                <i class="toggle-password" data-target="#pwd">&#128065;</i> <!-- Unicode para un ícono de ojo -->
                            </div>
                            <div>
                                <input type="password" name="pwdRep" placeholder="Repita la nueva contraseña" id="pwdRep" class="recInp">
                                <i class="toggle-password" data-target="#pwdRep">&#128065;</i>
                            </div>
                            <div class="text-registrer">
                                <FONT COLOR="gray"><strong>La contraseña necesita: </FONT><br>
                                <FONT COLOR="gray">Al menos una mayúscula</FONT><br>
                                <FONT COLOR="gray">Al menos un número </FONT><br>
                                <FONT COLOR="gray">Al menos un caracter especial</FONT><br>
                                <FONT COLOR="gray">Al menos una minúscula</strong></FONT><br>
                            </div>
                            <button type="submit" name="resetPwdSub" class="buttonSbmt">Cambiar contraseña</button>
                        </form>
                        <div id="alertbad"></div>
                        <div id="alertgood"></div>


                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>