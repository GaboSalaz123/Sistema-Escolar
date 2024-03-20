<?php require_once "vistas/parte_superior.php"?>

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
        #tablaPeriodos th, #tablaPeriodos td {
            max-width: 200px; /* Ajusta el ancho máximo de las celdas */
            overflow: hidden;
            text-overflow: ellipsis; /* Agrega puntos suspensivos si el texto es muy largo */
            white-space: nowrap; /* Evita que el texto se divida en varias líneas */
        }
    </style>
</head>
<body>

<!-- Contenido con DataTable -->
<div class="container mt-4">
    <h2>Lista de Asignaturas</h2>
    <table class="table table-bordered" id="tablaPeriodos">
        <thead>
            <tr>
                <th scope="col">Asignaturas</th>
                <th scope="col">Acciones</th>
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
        var tablaPeriodos = $('#tablaPeriodos').DataTable({
            "ajax": {
                "url": "obtener_asignaturas.php", // Ruta para obtener datos desde la base de datos
                "type": "GET",
                "dataType": "json"
            },
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" // Ruta del archivo de idioma español
            },
            "columns": [
                { "data": "asignaturas" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<button class="btn btn-danger eliminar" data-id="' + data.id + '">Eliminar</button>';
                    }
                }
            ],
            "paging": false, // Deshabilitar paginación
            "searching": false, // Deshabilitar búsqueda
            "info": false, // Deshabilitar información del pie de página
            "ordering": true // Habilitar ordenar alfabéticamente
        });

        // Manejar evento clic en el botón de eliminar
        $('#tablaPeriodos tbody').on('click', '.eliminar', function () {
            var asignaturaId = $(this).data('id');

            // Confirmar si el usuario realmente quiere eliminar 
            if (confirm('¿Estás seguro de que deseas eliminar esta Asignatura?')) {
                // Realizar solicitud AJAX para eliminar 
                $.ajax({
                    url: 'eliminar_asignatura.php',
                    type: 'POST',
                    data: { id: asignaturaId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Actualizar la tabla después de la eliminación
                            tablaPeriodos.ajax.reload();
                        } else {
                            alert('Error al eliminar Asignatura: ' + response.message);
                        }
                    },
                    error: function (error) {
                        console.error('Error al eliminar Asignatura:', error);
                    }
                });
            }
        });
    });
</script>

</body>
</html>




<?php require_once "vistas/parte_inferior.php"?>