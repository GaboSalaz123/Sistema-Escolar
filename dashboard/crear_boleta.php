<?php require_once "vistas/parte_superior2.php"?>

<style>

.modal-content {
    background-color: #f5f5f5;
}

.modal-header {
    background-color: #007bff;
    color: #ffffff;
    border-bottom: 1px solid #dee2e6;
}

.modal-title {
    font-weight: bold;
}

.modal-body {
    padding: 30px;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 4px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    text-align: center;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    text-align: center;

}

h3, h4 {
    color: #007bff;
    font-weight: bold;
}

p {
    color: #333333;
}

</style>

<br>
<br>
<br>

<h1 style="text-align:center">Formulación para la elaboración del informe descriptivo</h1>
<br>

<div class="mt-4">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modalCrearBoleta">
                Crear Boleta Lapsos
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modalCrearBoletaFinal">
                Crear Boleta Final
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modalCrearBoleta3">
                Crear Boleta Promovido
            </button>
        </div>
    </div>
</div>


<!-- Modal para crear la boleta -->
<div class="modal fade" id="modalCrearBoleta" tabindex="-1" role="dialog" aria-labelledby="modalCrearBoletaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalCrearBoletaLabel">Boleta de Estudiante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <form id="formularioCrearBoleta">
                    <h3>Informe Descriptivo de Desempeño Académico</h3>
                    <div class="row-2"><h5>Periodo Escolar: <input type="text" class="form-control-fluid" id="periodo" name="periodo" required style= "width: 120px"> </h5></div>

                        <h5>Grado: Primer Grado A</h5>
                        <div class="row-2"><h5>Momento Académico: <select id="lapso" name="lapso"> </h5> </div>                        
                        <option value="">Selecciona:</option>
                        <option value="Primer Lapso">Primer Lapso</option>
                        <option value="Segundo Lapso">Segundo Lapso</option>
                        <option value="Tercer Lapso">Tercer Lapso</option>
                    </select>


                    </div>
                </div>
                <?php
// Paso 1: Establecer la conexión con la base de datos
                $host = "localhost";
                $usuario = "root";
                $contrasena = "";
                $base_datos = "bdcme";

                $conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                $sqlIndicadores = "SELECT id, indicadores FROM indicadores";
                $indicadores_result = $conexion->query($sqlIndicadores);

                // Almacenar los resultados en un array
$indicadores = array();
while ($row = $indicadores_result->fetch_assoc()) {
    $indicadores[] = $row;
}

                // Consulta SQL para obtener datos de alumnos
$sqlAlumnos = "SELECT id, nombres, apellidos, cedula_escolar, edad, grado, fecha_nacimiento FROM alumnos";
$alumnos_result = $conexion->query($sqlAlumnos);

// Almacenar los resultados en un array
$alumnos = array();
while ($row = $alumnos_result->fetch_assoc()) {
    $alumnos[] = $row;
}
?>

                

                    
                        <label for="indicadores">Indicador:</label>
                        <select class="form-control" id="indicadores" name="indicadores">
                        <option value="">Selecciona un Indicador</option>
                <?php foreach ($indicadores as $indicadores) { ?>
                <option value="<?php echo $indicadores['id']; ?>"><?php echo $indicadores['indicadores']; ?></option>
            <?php } ?>
                        </select>

            <label for="estudiante">Estudiante:</label>
            <select class="form-control" id="estudiante" name="estudiante">
                <option value="">Selecciona un estudiante</option>
                <?php foreach ($alumnos as $alumno) { ?>
                <option value="<?php echo $alumno['id']; ?>"><?php echo $alumno['nombres']; ?></option>
            <?php } ?>
            </select>

        <!-- Mostrar datos del estudiante seleccionado -->
        <div id="datosEstudiante" style="display: none;">
            <div class="form-group">
                <h5> Datos del Alumno: </h5>
                <label for="nombresEstudiante">Nombres:</label>
                <input type="text" class="form-control" id="nombresEstudiante" name="nombresEstudiante" readonly style= "background-color: #ffffff">
            </div>
            <div class="form-group">
                <label for="apellidosEstudiante">Apellidos:</label>
                <input type="text" class="form-control" id="apellidosEstudiante" name="apellidosEstudiante" readonly style= "background-color: #ffffff">
            </div>

            <div class="form-group">
                            <label for="cedula_escolarEstudiante">Cédula Escolar:</label>
                            <input type="text" class="form-control" id="cedula_escolarEstudiante" name="cedula_escolarEstudiante" readonly style= "background-color: #ffffff">
                        </div>
                        <div class="form-group">
                            <label for="edadEstudiante">Edad:</label>
                            <input type="text" class="form-control" id="edadEstudiante" name="edadEstudiante" readonly style= "background-color: #ffffff">
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimientoEstudiante">Fecha de Nacimiento:</label>
                            <input type="text" class="form-control" id="fecha_nacimientoEstudiante" name="fecha_nacimientoEstudiante" readonly style= "background-color: #ffffff">
                        </div>
            <!-- Agrega más campos según los datos del estudiante -->
        </div>

    <script>
 document.getElementById('indicadores').addEventListener('change', function() {
            var indicadoresId = this.value;
            if (indicadoresId !== '') {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var indicadores = JSON.parse(this.responseText);
                        document.getElementById('indicadoresIndicadores').value = Indicadores.indicadores;
                        

                    }
                };
                xmlhttp.open('GET', 'obtener_indicadores.php?id=' + indicadoresId, true);
                xmlhttp.send();
            }
            });

        document.getElementById('estudiante').addEventListener('change', function() {
            var estudianteId = this.value;
            if (estudianteId !== '') {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var estudiante = JSON.parse(this.responseText);
                        document.getElementById('nombresEstudiante').value = estudiante.nombres;
                        document.getElementById('apellidosEstudiante').value = estudiante.apellidos;
                        document.getElementById('cedula_escolarEstudiante').value = estudiante.cedula_escolar;
                        document.getElementById('edadEstudiante').value = estudiante.edad;
                        document.getElementById('fecha_nacimientoEstudiante').value = estudiante.fecha_nacimiento;

                        // Aquí puedes agregar más asignaciones de valores para otros campos
                        document.getElementById('datosEstudiante').style.display = 'block';
                    }
                };
                xmlhttp.open('GET', 'obtener_alumnos_boleta.php?id=' + estudianteId, true);
                xmlhttp.send();
            } else {
                document.getElementById('datosEstudiante').style.display = 'none';
            }
        });
    </script>
    
    <h4>Observaciones:</h4>
    <textarea class="form-control" id="observaciones" name="observaciones" rows="4" required></textarea>
                <!-- Firmas digitales, sellos digitales y mensaje automático -->
                <div class="mt-4">
                    <h4>Firmas y Sellos</h4>
                    <br>
                    <div class="row">

                    <h5 style= "color:black">Firma Digital: </h5>
                    <img src="img/firma.png" class="img-fluid" alt="Firma Digital" width="180" height="180">
                    
                    <h5 style= "color:black">Sello Digital: </h5>
                    <img src="img/Sello.png" class="img-fluid-+++++" alt="Sello Digital" width="130" height="130">
    
                </div>

                    <br>

                    <h5 style= "color:black">Firma Representante: </h5>
                    <br>
                    <p>________________________________<p>

            

                <h4> Mensaje: </h4>
                <input class="form-control" id="mensaje" name="mensaje"></input>

                <div class="mt-4">
    <div class="row">
        <div class="col">
            <h5>Días Hábiles:</h5>
            <input type="number" class="form-control-fluid" id="dias_h" name="dias_h" required style="width: 100px;">
        </div>
        <div class="col">
            <h5>Asistencias:</h5>
            <input type="number" class="form-control-fluid-+++++" id="asistencias" name="asistencias" required style="width: 100px;">
        </div>
        <div class="col">
            <h5>Inasistencias:</h5>
            <input type="number" class="form-control-fluid-+++++" id="inasistencias" name="inasistencias" required style="width: 100px;">
        </div>
    </div>
</div>
<br>
<br>


                    <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCrearBoletaFinal" tabindex="-1" role="dialog" aria-labelledby="modalCrearBoletaFinalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalCrearBoletaFinalLabel">Boleta de Estudiante Final</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                        <form id="formularioCrearBoletaFinal">
                            <h3>Informe Descriptivo de Desempeño Académico</h3>
                            <div class="row-2"><h5>Periodo Escolar: <input type="text" class="form-control-fluid" id="periodo" name="periodo" required style= "width: 120px"> </h5></div>
                            <h5>Grado: Primer Grado A</h5>
                            <div class="row-2"><h5>Momento Académico: <select id="lapso" name="lapso"> </h5> </div>
                            <option value="">Selecciona:</option>
                            <option value="Primer Lapso">Primer Lapso</option>
                            <option value="Segundo Lapso">Segundo Lapso</option>
                            <option value="Tercer Lapso">Tercer Lapso</option>
                        </select>
                    </div>
                </div>

                <!-- Resto del formulario -->
                <!-- Puedes agregar aquí el resto del formulario específico para la boleta final -->

                <!-- Script jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    // Script jQuery para enviar los datos del formulario al servidor
                    $(document).ready(function() {
                        $('#formularioCrearBoletaFinal').on('submit', function (e) {
                            e.preventDefault(); // Evitar que la página se recargue

                            var formData = $(this).serialize();

                            $.ajax({
                                url: 'agregar_boleta_final.php', // Ruta al script PHP para procesar los datos
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                success: function (response) {
                                    if (response.success) {
                                        alert('Boleta final creada exitosamente');
                                        // Puedes agregar aquí la lógica para generar el PDF
                                        window.location.reload();
                                    } else {
                                        alert('Error al crear la boleta final: ' + response.message);
                                    }
                                },
                                error: function (error) {
                                    console.error('Error al crear la boleta final:', error);
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>


<?php require_once "vistas/parte_inferior2.php"?>