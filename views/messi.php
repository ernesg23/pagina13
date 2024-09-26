<!-- <!DOCTYPE html>
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

</html> -->
<html><head>
<title>Menú lateral escamoteable</title>
<style>
body {
    font-family: "Segoe UI", sans-serif;
    font-size:100%;
}

.sidebar {
    position: fixed;
    height: 100%;
    width: 0;
    top: 0;
    left: 0;
    z-index: 1;
    background-color: #00324b;
    overflow-x: hidden;
    transition: 0.4s;
    padding: 1rem 0;
    box-sizing:border-box;
}

.sidebar .boton-cerrar {
    position: absolute;
    top: 0.5rem;
    right: 1rem;
    font-size: 2rem;
    display: block;
    padding: 0;
    line-height: 1.5rem;
    margin: 0;
    height: 32px;
    width: 32px;
    text-align: center;
    vertical-align: top;
}

.sidebar ul, .sidebar li{
    margin:0;
    padding:0;
    list-style:none inside;
}

.sidebar ul {
    margin: 4rem auto;
    display: block;
    width: 80%;
    min-width:200px;
}

.sidebar a {
    display: block;
    font-size: 120%;
    color: #eee;
    text-decoration: none;
    
}

.sidebar a:hover{
    color:#fff;
    background-color: #f90;

}

h1 {
    color:#f90;
    font-size:180%;
    font-weight:normal;
}
#contenido {
    transition: margin-left .4s;
    padding: 1rem;
}

.abrir-cerrar {
    color: #2E88C7;
    font-size:1rem;   
}

#abrir {
    
}
#cerrar {
    display:none;
}
</style>
</head>
<body>
<div id="sidebar" class="sidebar" style="width: 300px;">
<a href="#" class="boton-cerrar" onclick="ocultar()">×</a>
<ul class="menu">
<li><a href="#">Opción 1</a></li>
<li><a href="#">Opción 2</a></li>
<li><a href="#">Opción 3</a></li>
<li><a href="#">Opción 4</a></li>
<li><a href="#">Opción 5</a></li>
</ul>
</div>
<div id="contenido" style="margin-left: 300px;">
<p><a href="https://www.campusmvp.es" target="_blank"><img src="logo-campusmvp-150.png" alt="campusMVP" style="border-width: 0px"></a></p>
<h1>Un menú lateral</h1>
<a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()" style="display: none;">Abrir menu</a><a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()" style="display: inline;">Cerrar menu</a>
</div>
<script>
function mostrar() {
    document.getElementById("sidebar").style.width = "300px";
    document.getElementById("contenido").style.marginLeft = "300px";
    document.getElementById("abrir").style.display = "none";
    document.getElementById("cerrar").style.display = "inline";
}

function ocultar() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("contenido").style.marginLeft = "0";
    document.getElementById("abrir").style.display = "inline";
    document.getElementById("cerrar").style.display = "none";
}
</script>


</body></html>