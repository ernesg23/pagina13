<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
    <title>Inicio de Sesion de Página 13</title>
    <link rel="stylesheet" href="./css/messi.css">
</head>
<body>
    <label class="switch">
        <input type="checkbox" id="input">
        <span class="slider"></span>
    </label>

    <script> 
        document.getElementById('input').addEventListener('change',()=>{
            if(document.body.className.indexOf('dark')===-1) {
                document.body.classList.add('dark');
            }
            else {
                document.body.classList.remove('dark');
            }
        });
    </script>
</body>

</html>