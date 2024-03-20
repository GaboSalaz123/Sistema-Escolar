<?php require_once "vistas/parte_superior2.php"?>
<?php require_once "obtener_boletas.php"?>


<!--INICIO del cont principal-->
<div class="container">
    <h1>Boletas Creadas</h1>
</div>
<div class="modal-body">
    <!-- Encabezado de la boleta -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <img class="logo" src="img/logo.png" width="150" height="100" style="float: left;">
            <br>
            <h2>Unidad Educativa Colegio Madre Emilia</h2>
            <h5>Maiquetía - La Guaira</h5>

            <br>
            <br>
            <h3>Informe Descriptivode Desempeño Académico</h3>
            <div class="row-2"><h5>Periodo Escolar: <?php echo $boleta['periodo']; ?> </h5></div>

            <h5>Grado: ?></h5>
            <div class="row-2"><h5>Momento Académico: <?php echo $boleta['lapso']; ?> </h5></div>                        

            <!-- Mostrar el resto de los datos de la boleta -->
        </div>
    </div>
</div>
<?php require_once "vistas/parte_inferior2.php"?>