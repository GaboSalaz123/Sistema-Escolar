<?php require_once "vistas/parte_superior2.php"?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!--datatables CSS básico-->
    <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css"/>
    <!--datatables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet" type="text/css" href="vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        #tablaIndicadores th, #tablaIndicadores td {
            max-width: 300px; /* Ajusta el ancho máximo de las celdas */
            overflow: hidden;
            text-overflow: ellipsis; /* Agrega puntos suspensivos si el texto es muy largo */
            white-space: nowrap; /* Evita que el texto se divida en varias líneas */
        }
    </style>
</head>
<body>

<!-- Contenido con DataTable -->
<div class="container mt-4">
    <h2 class="h2">Lista de Indicadores</h2>
    <button id="agregarIndicadorBtn" class="btn btn-success">Agregar Nuevo Indicador</button>
    <div class="modal fade" id="modalAgregarIndicador" tabindex="-1" role="dialog" aria-labelledby="modalAgregarRegistroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarRegistroLabel">Agregar Indicador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="IndicadorForm">
                <div class="form-group">
                        <label for="indicadores">Indicador:</label>
                        <input type="text" class="form-control" id="indicadores" name="indicadores" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <table class="table table-bordered" id="tablaIndicadores">
        <thead>
            <tr>
                <th scope="col">Indicadores</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Scripts de Bootstrap, jQuery y DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Configuración de DataTable -->
<script>
    $(document).ready( function () {
        var tablaIndicadores = $('#tablaIndicadores').DataTable({
            "ajax": {
                "url": "indicadoresBD.php", // Ruta para obtener datos desde la base de datos
                "type": "GET",
                "dataType": "json"
            },
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" // Ruta del archivo de idioma español
            },
            "columns": [
                { "data": "indicadores" }
            ],
            "ordering": true // Habilitar ordenar alfabéticamente
        });
    });

    $('#agregarIndicadorBtn').on('click', function () {
    // Limpiar el formulario antes de mostrarlo
    $('#IndicadorForm')[0].reset();
    // Mostrar el modal
    $('#modalAgregarIndicador').modal('show');
});

// Enviar datos del formulario al servidor
$('#IndicadorForm').on('submit', function (e) {
    e.preventDefault();

// Obtener los datos del formulario como una cadena
var formData = $(this).serialize();


        $.ajax({
            url: 'agregar_indicador.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Actualizar la tabla después de agregar el nuevo Indicador
                    $('#tablaIndicadores').DataTable().ajax.reload();
                    // Cerrar el modal
                    $('#modalAgregarIndicador').modal('hide');
                } else {
                    alert('Error al agregar nuevo Indicador: ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error al agregar nuevo Indicador:', error);
            }
        });
    });
</script>

</body>
</html>
<?php require_once "vistas/parte_inferior2.php"?>
