<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Tabla de Maestras</h1>
</div>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listado de Maestras</title>


     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"></script>

   
</head>
<body>

<div class="container mt-4">
    <h2>Listado de Maestras</h2>
    <button id="agregarMaestraBtn" class="btn btn-success">Agregar Maestra/Administrador</button>
    <div class="modal fade" id="modalAgregarMaestra" tabindex="-1" role="dialog" aria-labelledby="modalAgregarMaestraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarMaestraLabel">Agregar Maestra/Administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formularioAgregarMaestra">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cedula:</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" maxlength="8" required>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="text" class="form-control" id="correo" name="correo" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="aula">Aula:</label>
                        <input type="text" class="form-control" id="aula" name="Aula" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <table id="MaestrasTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula </th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal fade" id="modalModificarMaestra" tabindex="-1" role="dialog" aria-labelledby="modalModificarMaestraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarMaestraLabel">Modificar Maestra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formularioModificarMaestra">
                    <div class="form-group">
                        <label for="nombreModificar">Nombre:</label>
                        <input type="text" class="form-control" id="nombreModificar" name="nombreModificar" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidoModificar">Apellido:</label>
                        <input type="text" class="form-control" id="apellidoModificar" name="apellidoModificar" required>
                    </div>
                    <div class="form-group">
                        <label for="cedulaModificar">Cedula:</label>
                        <input type="text" class="form-control" id="cedulaModificar" name="cedulaModificar" maxlength="8" required>
                    </div>

                    <div class="form-group">
                        <label for="correoModificar">Correo:</label>
                        <input type="text" class="form-control" id="correoModificar" name="correoModificar" required>
                    </div>

                    <div class="form-group">
                        <label for="telefonoModificar">Teléfono:</label>
                        <input type="text" class="form-control" id="telefonoModificar" name="telefonoModificar" required>
                    </div>

                    <div class="form-group">
                        <label for="direccionModificar">Dirección:</label>
                        <input type="text" class="form-control" id="direccionModificar" name="direccionModificar" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="aulaModificar">Aula:</label>
                        <input type="text" class="form-control" id="aulaModificar" name="aulaModificar" required>
                    </div>

                    <input type="hidden" id="idMaestraModificar" name="idMaestraModificar">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script>
$(document).ready(function() {
 // Función para verificar duplicados
 function verificarDuplicados(nombre, apellido, cedula) {
        var duplicado = false;

        // Obtener los valores del nuevo Maestra
        var nuevoNombre = nombre.trim().toLowerCase();
        var nuevoApellido = apellido.trim().toLowerCase();
        var nuevaCedula = cedula.trim();

        $('#MaestrasTable tbody tr').each(function () {
            var nombreExistente = $(this).find('td:eq(0)').text().trim().toLowerCase();
            var apellidoExistente = $(this).find('td:eq(1)').text().trim().toLowerCase();
            var cedulaExistente = $(this).find('td:eq(2)').text().trim();

            // Verificar duplicados comparando con los valores del formulario
            if (nombreExistente === nuevoNombre && apellidoExistente === nuevoApellido && cedulaExistente === nuevaCedula) {
                duplicado = true;
                return false; // Detener el bucle si se encuentra un duplicado
            }
        });

        return duplicado;
    }


    $('#MaestrasTable').DataTable({
        "ajax": {
            "url": "obtener_Maestras.php", // Ruta para obtener datos desde la base de datos
            "type": "GET",
            "dataType": "json"
        },

        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" // Ruta del archivo de idioma español
        },

        "columns": [
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "cedula" },
            { "data": "aula" },
            {
                
                "data": null,
                "render": function (data, type, row) {
                    return '<button class="btn btn-info" onclick="verMaestra(' + data.id + ')">Ver</button>' +
                    '<button class="btn btn-danger eliminar" data-id="' + data.id + '">Eliminar</button>'  +         
                    '<button class="btn btn-warning modificar" data-id="' + data.id + '">Modificar</button>';

                }
            }
        ]
    });

    window.verMaestra = function (MaestraId) {
        // Obtener los detalles del Maestra mediante AJAX
        $.ajax({
            url: 'obtener_detalle_Maestra.php',
            type: 'GET',
            data: { id: MaestraId },
            dataType: 'json',
            success: function (Maestra) {
                mostrarDetallesMaestra(Maestra);
            },
            error: function (error) {
                console.error('Error al obtener detalles del Maestra:', error);
            }
        });
    };

    function mostrarDetallesMaestra(Maestra) {
    // Generar un id único para cada modal
    var modalId = 'modalDetallesMaestra_' + Maestra.id;

    // Eliminar el modal anterior del DOM
    $('#' + modalId).remove();

    var modalContent = '<div class="modal fade" id="' + modalId + '" tabindex="-1" role="dialog" aria-labelledby="modalDetallesMaestraLabel" aria-hidden="true">';
    modalContent += '<div class="modal-dialog" role="document">';
    modalContent += '<div class="modal-content">';
    modalContent += '<div class="modal-header">';
    modalContent += '<h5 class="modal-title" id="modalDetallesMaestraLabel">Detalles del Maestra</h5>';
    modalContent += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    modalContent += '<span aria-hidden="true">&times;</span>';
    modalContent += '</button>';
    modalContent += '</div>';
    modalContent += '<div class="modal-body">';

    // Añade cada detalle del Maestra al modal
    for (var propiedad in Maestra) {
        modalContent += '<p><strong>' + propiedad.charAt(0).toUpperCase() + propiedad.slice(1) + ':</strong> ' + Maestra[propiedad] + '</p>';
    }

    modalContent += '</div>';
    modalContent += '<div class="modal-footer">';
    modalContent += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
    modalContent += '</div>';
    modalContent += '</div>';
    modalContent += '</div>';
    modalContent += '</div>';

    // Añade el modal al cuerpo del documento y lo muestra
    $('body').append(modalContent);
    $('#' + modalId).modal('show');

    // Eliminar el modal del DOM al cerrarlo
    $('#' + modalId).on('hidden.bs.modal', function () {
        $(this).remove();
    });
}


// Función para eliminar Maestra
$('#MaestrasTable tbody').on('click', '.eliminar', function () {
    var MaestraId = $(this).data('id');

    // Confirmar si el usuario realmente quiere eliminar al Maestra
    if (confirm('¿Estás seguro de que deseas eliminar a este Maestra?')) {
        // Realizar solicitud AJAX para eliminar al Maestra
        $.ajax({
            url: 'eliminar_Maestra.php',
            type: 'POST',
            data: { id: MaestraId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Actualizar la tabla después de la eliminación
                    $('#MaestrasTable').DataTable().ajax.reload();
                } else {
                    alert('Error al eliminar Maestra: ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error al eliminar Maestra:', error);
            }
        });
    }
});
    // Manejar evento Modificar
$('#MaestrasTable tbody').on('click', '.modificar', function () {
    var MaestraId = $(this).data('id'); 
    obtenerDetallesMaestraParaModificar(MaestraId);
    $('#idMaestraModificar').val(MaestraId);

});

window.obtenerDetallesMaestraParaModificar = function (MaestraId) {
    // Obtener los detalles del Maestra mediante AJAX
    $.ajax({
        url: 'obtener_detalle_Maestra.php',
        type: 'GET',
        data: { id: MaestraId },  
        dataType: 'json',
        success: function (Maestra) {
            // Llenar el formulario de modificación con los detalles del Maestra
            llenarFormularioModificacion(Maestra);
        },
        error: function (error) {
            console.error('Error al obtener detalles del Maestra para modificar:', error);
        }
    });
};

function llenarFormularioModificacion(Maestra) {
    // Llenar los campos del formulario de modificación
    $('#idModificar').val(Maestra.id);
    $('#nombreModificar').val(Maestra.nombre);
    $('#apellidoModificar').val(Maestra.apellido);
    $('#cedulaModificar').val(Maestra.cedula);
    $('#correoModificar').val(Maestra.correo);
    $('#telefonoModificar').val(Maestra.telefono);
    $('#direccionModificar').val(Maestra.direccion);
    $('#aulaModificar').val(Maestra.aula);

    $('#idMaestraModificar').val(Maestra.id);
    // Mostrar el modal de modificación
    $('#modalModificarMaestra').modal('show');
}


// Enviar datos del formulario de modificación al servidor
$('#formularioModificarMaestra').on('submit', function (e) {
    e.preventDefault();

    // Obtener los datos del formulario
    var formData = $(this).serialize();

    formData += '&id=' + $('#idMaestraModificar').val();


    // Realizar solicitud AJAX para modificar el Maestra
    $.ajax({
        url: 'modificar_Maestra.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Actualizar la tabla después de modificar el Maestra
                $('#MaestrasTable').DataTable().ajax.reload();
                // Cerrar el modal de modificación
                $('#modalModificarMaestra').modal('hide');
            } else {
                alert('Error al modificar Maestra: ' + response.message);
            }
        },
        error: function (error) {
            console.error('Error al modificar Maestra:', error);
        }
    });
});


    });

    $('#agregarMaestraBtn').on('click', function () {
    // Limpiar el formulario antes de mostrarlo
    $('#formularioAgregarMaestra')[0].reset();
    // Mostrar el modal
    $('#modalAgregarMaestra').modal('show');
});

// Enviar datos del formulario al servidor
$('#formularioAgregarMaestra').on('submit', function (e) {
    e.preventDefault();

// Obtener los datos del formulario como una cadena
var formData = $(this).serialize();

// Agregar manualmente el campo "aula" a la cadena de datos
formData += '&aula=' + $('#aula').val();

        // Si no hay duplicados, continuar con el proceso de agregar Maestra
        $.ajax({
            url: 'agregar_Maestra.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Actualizar la tabla después de agregar el nuevo Maestra
                    $('#MaestrasTable').DataTable().ajax.reload();
                    // Cerrar el modal
                    $('#modalAgregarMaestra').modal('hide');
                } else {
                    alert('Error al agregar nuevo Maestra: ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error al agregar nuevo Maestra:', error);
            }
        });
    });





</script>

<?php require_once "vistas/parte_inferior.php"?>