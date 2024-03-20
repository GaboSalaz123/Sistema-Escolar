<?php require_once "vistas/parte_superior.php"?>

<!-- INICIO del cont principal -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style>


    .imagen {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }


    .fecha-hora {
        position: absolute;
        top: 100px;
        right: 10px;
        color: black;
        font-size: 18px;

    }
</style>

<div class="container">
    <p> Colegio Madre Emilia
        <br>
        <img class="logo" src="img/logo.png" width="150" height="100">
        <br>
        <br>
        <h1 style="text-align:center">¿Qué vamos a configurar hoy Administrador?</h1>
        <img class="imagen" src="img/fondo.jpg" width="700" height="400">
        <div class="fecha-hora" id="fechaHora"></div>
    </div>

<script>
    function mostrarFechaHora() {
        const fechaHoraElemento = document.getElementById("fechaHora");
        const fechaHora = new Date().toLocaleString();
        fechaHoraElemento.textContent = fechaHora;
    }

    // Actualizar la fecha y hora cada segundo
    setInterval(mostrarFechaHora, 1000);

    // Mostrar la fecha y hora al cargar la página
    mostrarFechaHora();
</script>

<?php require_once "vistas/parte_inferior.php" ?>






