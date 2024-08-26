<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registrer.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <ul class="navBar">
                <li>
                    <a href="../index.php">Pagina13</a>
                </li>
            </ul>
        </nav>


    </header>
    <main>
        <section>
            <div class="form">
                <div class="form-user">
                <p>Formulario de registro de usuario</p>
                </div>
                <div class="user-name">
                <p>Correo Electronico</p>
                <input type="text" placeholder="Ejemplo@gmail.com" class="textArea">
                <p>Nombre y Apellido</p>
                <input type="text" placeholder="ingrese tu nombre y apellido" class="textArea">
                <p>Contraseña</p>
                <input type="text" placeholder="Crea tu contraseña" class="textArea">
                
                <div class="text-registrer">
                <FONT COLOR="gray">La contraseña necesita: </FONT><br>
                <FONT COLOR="gray">Al menos una mayúscula</FONT><br>
                <FONT COLOR="gray">Al menos un número </FONT><br>
                <FONT COLOR="gray">Al menos un caracter especial</FONT><br>
                <FONT COLOR="gray">Al menos una minúscula</FONT><br>
                </div>
                <label><input type="checkbox" id="cbox1" value="first_checkbox" /> Recordar contraseña</label><br>
                <input type="button" class="password" value="Registrarse" />
            </div>
        </section>
    </main>
</body>

</html>