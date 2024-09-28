<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/registrer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module" src="./views/js/register.js"></script>
    <title>Página 13</title>
</head>

<body>
        <section>
            <div class="container">

                <div class="form">
                    <div class="title">
                        <h1>Página13</h1>
                    </div>
                    <p class="form-user">Formulario de registro de usuario</p>
                    <div class="user-name">
                        <div class="name">
                            <p>Nombre</p>
                            <input type="text" placeholder="Nombre" class="textArea username" id="name" required>
                        </div>
                        <div class="lastname">
                            <p>Apellido</p>
                            <input type="text" placeholder="Apellido" class="textArea username" id="lastname" required>
    
                        </div>
                    
                    </div>
                    <div class="textreg">
                    <p>Correo Electronico</p>
                    </div>
                    <input type="email" placeholder="Ejemplo@gmail.com" class="textArea" id="userEmail" required>
                    <div class="textreg">
                    <p>Contraseña</p>
                    </div>
                    <input type="password" placeholder="Crea tu contraseña" class="textArea" id="userPassword" required>
                    
                    <div class="text-registrer">
                    <FONT COLOR="gray">La contraseña necesita: </FONT><br>
                    <FONT COLOR="gray">Al menos una mayúscula</FONT><br>
                    <FONT COLOR="gray">Al menos un número </FONT><br>
                    <FONT COLOR="gray">Al menos un caracter especial</FONT><br>
                    <FONT COLOR="gray">Al menos una minúscula</FONT><br>
                    </div>
                    <input type="button" class="password" value="Registrarse" id="sendButton"/>
                </div>
            </div>
        </section>
</body>

</html>
