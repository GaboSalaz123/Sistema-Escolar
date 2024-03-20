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
    .botonagg {
        display: block; 
        margin: 0 auto; 
        text-align: center; 
        background-color: #3356C8; 
        color: #fff; 
        border: none; 
        border-radius: 5px; 
        padding: 10px 20px; 
        font-size: 16px; 
        font-weight: bold; 
        transition: background-color 0.3s ease; 
    }

    .botonagg:hover {
        background-color: #39AADA; 
    }

    .h2 {
        text-align: center; 
        margin-top: 30px; 
        margin-bottom: 20px; 
        color: #1C2F5F; 
        font-size: 24px; 
        font-weight: bold; 
    }

    #tablaRegistros_wrapper {
        padding: 20px;
    }

    #tablaRegistros th, #tablaRegistros td {
        padding: 12px;
        text-align: center;
    }

    #tablaRegistros th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    #tablaRegistros tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #tablaRegistros tbody tr:hover {
        background-color: #cce5ff;
    }

    #tablaRegistros_wrapper .dataTables_length,
    #tablaRegistros_wrapper .dataTables_filter,
    #tablaRegistros_wrapper .dataTables_info,
    #tablaRegistros_wrapper .dataTables_paginate {
        color: #007bff;
        font-weight: bold;
    }

    #tablaRegistros_wrapper .dataTables_length select,
    #tablaRegistros_wrapper .dataTables_filter input,
    #tablaRegistros_wrapper .dataTables_paginate .paginate_button {
        border-radius: 5px;
        border: 1px solid #007bff;
        background-color: transparent;
        color: #007bff;
        font-weight: bold;
    }

    #tablaRegistros_wrapper .dataTables_length select:focus,
    #tablaRegistros_wrapper .dataTables_filter input:focus {
        outline: none;
        box-shadow: none;
    }

    #tablaRegistros_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    #tablaRegistros_wrapper .dataTables_paginate .paginate_button.disabled:hover {
        background-color: transparent;
        border-color: #007bff;
        cursor: default;
    }

    #modalAgregarRegistro .modal-content {
        border-radius: 10px;
        border: 2px solid #007bff;
    }

    #modalAgregarRegistro .modal-header {
        background-color: #007bff;
        color: #fff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    #modalAgregarRegistro .modal-body {
        padding: 20px;
    }

    #modalAgregarRegistro .form-group {
        margin-bottom: 20px;
    }

    #modalAgregarRegistro label {
        font-weight: bold;
    }

    #modalAgregarRegistro input[type="text"],
    #modalAgregarRegistro input[type="date"],
    #modalAgregarRegistro textarea {
        width: 100%;
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    #modalAgregarRegistro textarea {
        resize: vertical;
    }

    #modalAgregarRegistro .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-weight: bold;
    }

    #modalAgregarRegistro .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    #modalAgregarRegistro .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: bold;
    }

    #modalAgregarRegistro .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    #tablaRegistros th, #tablaRegistros td {
            max-width: 200px; /* Ajusta el ancho máximo de las celdas */
            overflow: hidden;
        }

        
</style>
</head>
<body>

<!-- Contenido con DataTable -->
<div class="container mt-4">
    <h2 class="h2">Lista de Registro Diario de Observaciones</h2>
    <button id="agregarRegistroBtn" class="botonagg">Agregar Nuevo Registro</button>
    <div class="modal fade" id="modalAgregarRegistro" tabindex="-1" role="dialog" aria-labelledby="modalAgregarRegistroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarRegistroLabel">Agregar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="registroForm">
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                    <div class="form-control">
                        <label for="observaciones">Observación:</label>
                        <textarea id="observaciones" name="observaciones" required></textarea>                    
                    </div>
                
                   
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
    <table class="table table-bordered" id="tablaRegistros">
        <thead>
            <tr>
                <th scope="col">Observaciones</th>
                <th scope="col">Fecha</th>
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
        var tablaRegistros = $('#tablaRegistros').DataTable({
            "ajax": {
                "url": "obtener_registros.php", // Ruta para obtener datos desde la base de datos
                "type": "GET",
                "dataType": "json"
            },
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" // Ruta del archivo de idioma español
            },
            "columns": [
                { "data": "observaciones" },
                { "data": "fecha" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<button class="btn btn-danger eliminar" data-id="' + data.id + '">Eliminar</button>';
                    }
                }
            ],
        });

        // Manejar evento clic en el botón de eliminar
        $('#tablaRegistros tbody').on('click', '.eliminar', function () {
            var registroId = $(this).data('id');

            // Confirmar si el usuario realmente quiere eliminar 
            if (confirm('¿Estás seguro de que deseas eliminar esta Asignatura?')) {
                // Realizar solicitud AJAX para eliminar 
                $.ajax({
                    url: 'eliminar_registro.php',
                    type: 'POST',
                    data: { id: registroId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Actualizar la tabla después de la eliminación
                            tablaRegistros.ajax.reload();
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

    $('#agregarRegistroBtn').on('click', function () {
    // Limpiar el formulario antes de mostrarlo
    $('#registroForm')[0].reset();
    // Mostrar el modal
    $('#modalAgregarRegistro').modal('show');
});

// Enviar datos del formulario al servidor
$('#registroForm').on('submit', function (e) {
    e.preventDefault();

// Obtener los datos del formulario como una cadena
var formData = $(this).serialize();


        $.ajax({
            url: 'registrosBD.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#tablaRegistros').DataTable().ajax.reload();
                    // Cerrar el modal
                    $('#modalAgregarRegistro').modal('hide');
                } else {
                    alert('Error al agregar nueva Observación: ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error al agregar nueva Observación:', error);
            }
        });
    });
</script>

</body>
</html>




<?php require_once "vistas/parte_inferior2.php"?>