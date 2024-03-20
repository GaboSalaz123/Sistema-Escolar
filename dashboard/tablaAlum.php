<?php require_once "vistas/parte_superior2.php"?>
 
        
        
<div class="container">
    <h1>Tabla de Alumnos</h1>
</div>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listado de Alumnos</title>


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
    <h2>Listado de Alumnos</h2>
    <button id="agregarAlumnoBtn" class="btn btn-success">Agregar Nuevo Alumno</button>
    <div class="modal fade" id="modalAgregarAlumno" tabindex="-1" role="dialog" aria-labelledby="modalAgregarAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarAlumnoLabel">Agregar Nuevo Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form id="formularioAgregarAlumno">
        <div id="seccionAlumno">
        <h4>Datos del Alumno</h4>
            <!-- Campos del alumno -->
            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required>
                <label for="nombre">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                <label for="cedula_identidad">Cedula Escolar:</label>
                <input type="number" class="form-control" id="cedula_escolar" name="cedula_escolar" required>
                <label for="nombre">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
                <label for="grado">Grado:</label>
                <input type="text" class="form-control" id="grado" name="grado" required>
                <label for="nombre">Lugar de Nacimiento:</label>
                <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" required>
                <label for="nombre">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                <br>
                <label for="nombre">Sexo:</label>
                <select id="sexo" name="sexo">                       
                        <option value="">Selecciona:</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <br>
                    <br>

                <label for="nombre">Ha sido Bautizado? (Si/No):</label>
                <input type="text" class="form-control" id="bautizado" name="bautizado" required>
                <label for="nombre">Tiene hermanos en el plantel? (Si/No):</label>
                <input type="text" class="form-control" id="hermanos" name="hermanos" required>
                <h4>Enfermedades que ha padecido:</h4>
                <label for="nombre">Tiene algún tratamiento especial? (Si/No):</label>
                <input type="text" class="form-control" id="tratamiento_especial" name="tratamiento_especial" required>
                <label for="nombre">Padece de Alergia? (Si/No):</label>
                <input type="text" class="form-control" id="alergia" name="alergia" required>
                <label for="nombre">Ha convulsionado? (Si/No):</label>
                <input type="text" class="form-control" id="convulsionado" name="convulsionado" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="mostrarSeccion('seccionPadre')">Siguiente</button>
        </div>

        <div id="seccionPadre" style="display: none;">
        <h4>Datos del Padre</h4>
        <label for="nombrePadre">Nombre y Apellido del Padre:</label>
                <input type="text" class="form-control" id="nombre_apellido_padre" name="nombre_apellido_padre" required>
                <label for="cedula_identidad">Cedula de identidad:</label>
                <input type="number" class="form-control" id="cedula_identidad_padre" name="cedula_identidad_padre" required>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento_padre" name="fecha_nacimiento_padre" required>
                <label for="estado_nacimiento">Estado de Nacimiento:</label>
                <input type="text" class="form-control" id="estado_nacimiento_padre" name="estado_nacimiento_padre" required>
                <label for="edad_Padre">Edad del Padre:</label>
                <input type="number" class="form-control" id="edad_Padre" name="edad_padre" required>
                <label for="profesion">Profesion:</label>
                <input type="text" class="form-control" id="profesion_padre" name="profesion_padre" required>
                <label for="grado_instruccion">Grado de Instruccion:</label>
                <input type="text" class="form-control" id="grado_instruccion_padre" name="grado_instruccion_padre" required>
                <label for="empresa_trabaja">Empresa donde trabaja:</label>
                <input type="text" class="form-control" id="empresa_trabaja_padre" name="empresa_trabaja_padre" required>
                <label for="cargo_desempeña">Cargo que desempeña:</label>
                <input type="text" class="form-control" id="cargo_desempeña_padre" name="cargo_desempeña_padre" required>
                <label for="sueldo">Sueldo:</label>
                <input type="number" class="form-control" id="sueldo_padre" name="sueldo_padre" required>
                <label for="telefono">Teléfonos:</label>
                <input type="number" class="form-control" id="telefonos_padre" name="telefonos_padre" required>
                <label for="estado_civil">Estado Civil:</label>
                <input type="text" class="form-control" id="estado_civil_padre" name="estado_civil_padre" required>
                <label for="correo">Correo Electronico:</label>
                <input type="text" class="form-control" id="correo_padre" name="correo_padre" required>
                <br>

                <button type="button" class="btn btn-secondary" onclick="regresar('seccionPadre')">Regresar</button>
            <button type="button" class="btn btn-primary" onclick="mostrarSeccion('seccionMadre')">Siguiente</button>
        </div>

        <div id="seccionMadre" style="display: none;">
        <h4>Datos de la Madre</h4>
        <label for="nombreMadre">Nombre de la Madre:</label>
                <input type="text" class="form-control" id="nombre_apellido_madre" name="nombre_apellido_madre" required>
                <label for="cedula_identidad">Cedula de identidad:</label>
                <input type="number" class="form-control" id="cedula_identidad_madre" name="cedula_identidad_madre" required>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento_madre" name="fecha_nacimiento_madre" required>
                <label for="estado_nacimiento">Estado de Nacimiento:</label>
                <input type="text" class="form-control" id="estado_nacimiento_madre" name="estado_nacimiento_madre" required>
                <label for="edad_Madre">Edad de la Madre:</label>
                <input type="number" class="form-control" id="edad_Madre" name="edad_madre" required>
                <label for="profesion">Profesion:</label>
                <input type="text" class="form-control" id="profesion_madre" name="profesion_madre" required>
                <label for="grado_instruccion">Grado de Instruccion:</label>
                <input type="text" class="form-control" id="grado_instruccion_madre" name="grado_instruccion_madre" required>
                <label for="empresa_trabaja">Empresa donde trabaja:</label>
                <input type="text" class="form-control" id="empresa_trabaja_madre" name="empresa_trabaja_madre" required>
                <label for="cargo_desempeña">Cargo que desempeña:</label>
                <input type="text" class="form-control" id="cargo_desempeña_madre" name="cargo_desempeña_madre" required>
                <label for="sueldo">Sueldo:</label>
                <input type="number" class="form-control" id="sueldo_madre" name="sueldo_madre" required>
                <label for="telefono">Teléfonos:</label>
                <input type="number" class="form-control" id="telefonos_madre" name="telefonos_madre" required>
                <label for="estado_civil">Estado Civil:</label>
                <input type="text" class="form-control" id="estado_civil_madre" name="estado_civil_madre" required>
                <label for="correo">Correo Electronico:</label>
                <input type="text" class="form-control" id="correo_madre" name="correo_madre" required>
                <br>

                <button type="button" class="btn btn-secondary" onclick="regresar('seccionMadre')">Regresar</button>

            <button type="button" class="btn btn-primary" onclick="mostrarSeccion('seccionRepresentante')">Siguiente</button>
        </div>

        <div id="seccionRepresentante" style="display: none;">
        <h4>Datos del Representante Extra</h4>
        <label for="nombreMadre">Nombre del Representante:</label>
                <input type="text" class="form-control" id="nombre_apellido_repre" name="nombre_apellido_repre" required>
                <label for="cedula_identidad">Cedula de identidad:</label>
                <input type="number" class="form-control" id="cedula_identidad_repre" name="cedula_identidad_repre" required>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento_repre" name="fecha_nacimiento_repre" required>
                <label for="estado_nacimiento">Estado de Nacimiento:</label>
                <input type="text" class="form-control" id="estado_nacimiento_repre" name="estado_nacimiento_repre" required>
                <label for="parentesco">Parentesco:</label>
                <input type="text" class="form-control" id="parentesco_repre" name="parentesco_repre" required>
                <label for="telefono">Teléfono:</label>
                <input type="number" class="form-control" id="telefonos_repre" name="telefonos_repre" required>
                <label for="correo">Correo Electronico:</label>
                <input type="text" class="form-control" id="correo_repre" name="correo_repre" required>
                <br>

                <button type="button" class="btn btn-secondary" onclick="regresar('seccionRepresentante')">Regresar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
</div>


        </div>
    </div>
</div>

    <table id="alumnosTable" class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula Escolar</th>
            <th>Edad</th>
            <th>Lugar de Nacimiento</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal fade" id="modalModificarAlumno" tabindex="-1" role="dialog" aria-labelledby="modalModificarAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarAlumnoLabel">Modificar Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formularioModificarAlumno">
                    <div class="form-group">
                        <label for="nombresModificar">Nombre:</label>
                        <input type="text" class="form-control" id="nombresModificar" name="nombresModificar" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidosModificar">Apellido:</label>
                        <input type="text" class="form-control" id="apellidosModificar" name="apellidosModificar" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula_escolarModificar">Cedula Escolar:</label>
                        <input type="text" class="form-control" id="cedula_escolarModificar" name="cedula_escolarModificar" maxlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="edadModificar">Edad:</label>
                        <input type="text" class="form-control" id="edadModificar" name="edadModificar" maxlength="2" required>
                    </div>
                    <div class="form-group">
                        <label for="gradoModificar">Grado:</label>
                        <input type="text" class="form-control" id="gradoModificar" name="gradoModificar" required>
                    </div>
                    <div class="form-group">
                        <label for="lugar_nacimientoModificar">Lugar Nacimiento:</label>
                        <input type="text" class="form-control" id="lugar_nacimientoModificar" name="lugar_nacimientoModificar" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimientoModificar">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimientoModificar" name="fecha_nacimientoModificar" required>
                        <br>
                <label for="sexoModificar">Sexo:</label>
                <select id="sexoModificar" name="sexoModificar">                       
                        <option value="">Selecciona:</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <br>
                    <br>

                <label for="bautizadoModificar">Ha sido Bautizado? (Si/No):</label>
                <input type="text" class="form-control" id="bautizadoModificar" name="bautizadoModificar" required>
                <label for="hermanosModificar">Tiene hermanos en el plantel? (Si/No):</label>
                <input type="text" class="form-control" id="hermanosModificar" name="hermanosModificar" required>
                <h4>Enfermedades que ha padecido:</h4>
                <label for="tratamiento_especialModificar">Tiene algún tratamiento especial? (Si/No):</label>
                <input type="text" class="form-control" id="tratamiento_especialModificar" name="tratamiento_especialModificar" required>
                <label for="alergiaModificar">Padece de Alergia? (Si/No):</label>
                <input type="text" class="form-control" id="alergiaModificar" name="alergiaModificar" required>
                <label for="convulsionadoModificar">Ha convulsionado? (Si/No):</label>
                <input type="text" class="form-control" id="convulsionadoModificar" name="convulsionadoModificar" required>
        </div>
                    <input type="hidden" id="idAlumnoModificar" name="idAlumnoModificar">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script>
function regresar(seccionAnterior) {
    // Ocultar la sección actual
    $('#' + seccionAnterior).hide();
    // Mostrar la sección anterior
    if (seccionAnterior === 'seccionPadre') {
        mostrarSeccion('seccionAlumno');
    } else if (seccionAnterior === 'seccionMadre') {
        mostrarSeccion('seccionPadre');
    } else if (seccionAnterior === 'seccionRepresentante') {
        mostrarSeccion('seccionMadre');
    }
}


function mostrarSeccion(seccionId) {
    // Ocultar todas las secciones
    $('#seccionAlumno, #seccionPadre, #seccionMadre, #seccionRepresentante').hide();
    // Mostrar solo la sección deseada
    $('#' + seccionId).show();
}



$(document).ready(function () {
    mostrarSeccion('seccionAlumno');
});

    </script>
<script>
$(document).ready(function() {
    $('#alumnosTable').DataTable({
        "ajax": {
            "url": "obtener_alumnos.php", // Ruta para obtener datos desde la base de datos
            "type": "GET",
            "dataType": "json"

        },

        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" // Ruta del archivo de idioma español
        },

        "columns": [
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "cedula_escolar" },
            { "data": "edad" },
            { "data": "lugar_nacimiento" },
            { "data": "fecha_nacimiento" },
            {
                
                "data": null,
                "render": function (data, type, row) {
                    return '<button class="btn btn-info" onclick="verAlumno(' + data.id + ')">Ver</button>' +
                    '<button class="btn btn-danger eliminar" data-id="' + data.id + '">Eliminar</button>'  +         
                    '<button class="btn btn-warning modificar" data-id="' + data.id + '">Modificar</button>';
                }
            }
        ]
    });

    window.verAlumno = function (alumnoId) {
        // Obtener los detalles del alumno mediante AJAX
        $.ajax({
            url: 'obtener_detalle_alumno.php',
            type: 'GET',
            data: { id: alumnoId },
            dataType: 'json',
            success: function (alumno) {
                mostrarDetallesAlumno(alumno);
            },
            error: function (error) {
                console.error('Error al obtener detalles del alumno:', error);
            }
        });
    };

    function mostrarDetallesAlumno(alumno) {
    // Generar un id único para cada modal
    var modalId = 'modalDetallesAlumno_' + alumno.id;

    // Eliminar el modal anterior del DOM
    $('#' + modalId).remove();

    var modalContent = '<div class="modal fade" id="' + modalId + '" tabindex="-1" role="dialog" aria-labelledby="modalDetallesAlumnoLabel" aria-hidden="true">';
    modalContent += '<div class="modal-dialog" role="document">';
    modalContent += '<div class="modal-content">';
    modalContent += '<div class="modal-header">';
    modalContent += '<h5 class="modal-title" id="modalDetallesAlumnoLabel">Detalles del Alumno</h5>';
    modalContent += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    modalContent += '<span aria-hidden="true">&times;</span>';
    modalContent += '</button>';
    modalContent += '</div>';
    modalContent += '<div class="modal-body">';

    modalContent += '<h4><u>Datos del Alumno</u></h4>';
    modalContent += '<p><strong>Nombres:</strong> ' + alumno.nombres + '</p>';
    modalContent += '<p><strong>Apellidos:</strong> ' + alumno.apellidos + '</p>';
    modalContent += '<p><strong>Cedula Escolar:</strong> ' + alumno.cedula_escolar + '</p>';
    modalContent += '<p><strong>Edad:</strong> ' + alumno.edad + '</p>';
    modalContent += '<p><strong> Grado:</strong> ' + alumno.grado + '</p>';
    modalContent += '<p><strong>Lugar de Nacimiento:</strong> ' + alumno.lugar_nacimiento + '</p>';
    modalContent += '<p><strong>Fecha de Nacimiento:</strong> ' + alumno.fecha_nacimiento + '</p>';
    modalContent += '<p><strong>Sexo:</strong> ' + alumno.sexo + '</p>';
    modalContent += '<p><strong>Ha sido Bautizado?:</strong> ' + alumno.bautizado + '</p>';
    modalContent += '<p><strong>Tiene Hermanos en el plantel?:</strong> ' + alumno.hermanos + '</p>';
    modalContent += '<p><strong>Tiene algún tratamiento especial?:</strong> ' + alumno.tratamiento_especial + '</p>';
    modalContent += '<p><strong>Padece de alguna alergia?:</strong> ' + alumno.alergia + '</p>';
    modalContent += '<p><strong>Ha convulsionado?:</strong> ' + alumno.convulsionado + '</p>';

    modalContent += '<h4><u>Datos del Padre</u></h4>';
    modalContent += '<p><strong>Nombre y Apellido del Padre:</strong> ' + alumno.nombre_apellido_padre + '</p>';
    modalContent += '<p><strong>Cedula de identidad del Padre:</strong> ' + alumno.cedula_identidad_padre + '</p>';
    modalContent += '<p><strong>Fecha de Nacimiento:</strong> ' + alumno.fecha_nacimiento_padre + '</p>';
    modalContent += '<p><strong>Estado de Nacimiento:</strong> ' + alumno.estado_nacimiento_padre + '</p>';
    modalContent += '<p><strong>Edad del Padre:</strong> ' + alumno.edad_padre + '</p>';
    modalContent += '<p><strong>Profesion:</strong> ' + alumno.profesion_padre + '</p>';
    modalContent += '<p><strong>Grado de Instruccion:</strong> ' + alumno.grado_instruccion_padre + '</p>';
    modalContent += '<p><strong>Empresa donde trabaja:</strong> ' + alumno.empresa_trabaja_padre + '</p>';
    modalContent += '<p><strong>Cargo que desempeña:</strong> ' + alumno.cargo_desempeña_padre + '</p>';
    modalContent += '<p><strong>Sueldo:</strong> ' + alumno.sueldo_padre + '</p>';
    modalContent += '<p><strong>Teléfonos:</strong> ' + alumno.telefonos_padre + '</p>';
    modalContent += '<p><strong>Estado Civil:</strong> ' + alumno.estado_civil_padre + '</p>';
    modalContent += '<p><strong>Correo Electronico:</strong> ' + alumno.correo_padre + '</p>';

    modalContent += '<h4><u>Datos de la Madre</u></h4>';
    modalContent += '<p><strong>Nombre de la Madre:</strong> ' + alumno.nombre_apellido_madre + '</p>';
    modalContent += '<p><strong>Cedula de identidad de la Madre:</strong> ' + alumno.cedula_identidad_madre + '</p>';
    modalContent += '<p><strong>Fecha de Nacimiento:</strong> ' + alumno.fecha_nacimiento_madre + '</p>';
    modalContent += '<p><strong>Estado de Nacimiento:</strong> ' + alumno.estado_nacimiento_madre + '</p>';
    modalContent += '<p><strong>Edad:</strong> ' + alumno.edad_madre + '</p>';
    modalContent += '<p><strong>Profesion:</strong> ' + alumno.profesion_madre + '</p>';
    modalContent += '<p><strong>Grado de Instruccion:</strong> ' + alumno.grado_instruccion_madre + '</p>';
    modalContent += '<p><strong>Empresa donde trabaja:</strong> ' + alumno.empresa_trabaja_madre + '</p>';
    modalContent += '<p><strong>Cargo que desempeña:</strong> ' + alumno.cargo_desempeña_madre + '</p>';
    modalContent += '<p><strong>Sueldo:</strong> ' + alumno.sueldo_madre + '</p>';
    modalContent += '<p><strong>Teléfonos:</strong> ' + alumno.telefonos_madre + '</p>';
    modalContent += '<p><strong>Estado Civil:</strong> ' + alumno.estado_civil_madre + '</p>';
    modalContent += '<p><strong>Correo Electronico:</strong> ' + alumno.correo_madre + '</p>';
    
    modalContent += '<h4><u>Datos del Representante Extra</u></h4>';
    modalContent += '<p><strong>Nombre del Representante:</strong> ' + alumno.nombre_apellido_repre + '</p>';
    modalContent += '<p><strong>Cedula de identidad del Representante:</strong> ' + alumno.cedula_identidad_repre + '</p>';
    modalContent += '<p><strong>Fecha de Nacimiento:</strong> ' + alumno.fecha_nacimiento_repre + '</p>';
    modalContent += '<p><strong>Estado de Nacimiento:</strong> ' + alumno.estado_nacimiento_repre + '</p>';
    modalContent += '<p><strong>Parentesco:</strong> ' + alumno.parentesco_Repre + '</p>';
    modalContent += '<p><strong>Teléfonos:</strong> ' + alumno.telefonos_repre + '</p>';
    modalContent += '<p><strong>Correo Electronico:</strong> ' + alumno.correo_repre + '</p>';

    
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



// Función para eliminar alumno
$('#alumnosTable tbody').on('click', '.eliminar', function () {
    var alumnoId = $(this).data('id');

    // Confirmar si el usuario realmente quiere eliminar al alumno
    if (confirm('¿Estás seguro de que deseas eliminar a este alumno?')) {
        // Realizar solicitud AJAX para eliminar al alumno
        $.ajax({
            url: 'eliminar_alumno.php',
            type: 'POST',
            data: { id: alumnoId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Actualizar la tabla después de la eliminación
                    $('#alumnosTable').DataTable().ajax.reload();
                } else {
                    alert('Error al eliminar alumno: ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error al eliminar alumno:', error);
            }
        });
    }
});
    // Manejar evento Modificar
$('#alumnosTable tbody').on('click', '.modificar', function () {
    var alumnoId = $(this).data('id'); 
    obtenerDetallesAlumnoParaModificar(alumnoId);
    $('#idAlumnoModificar').val(alumnoId);

});

window.obtenerDetallesAlumnoParaModificar = function (alumnoId) {
    // Obtener los detalles del alumno mediante AJAX
    $.ajax({
        url: 'obtener_detalle_alumno.php',
        type: 'GET',
        data: { id: alumnoId },  
        dataType: 'json',
        success: function (alumno) {
            // Llenar el formulario de modificación con los detalles del alumno
            llenarFormularioModificacion(alumno);
        },
        error: function (error) {
            console.error('Error al obtener detalles del alumno para modificar:', error);
        }
    });
};

function llenarFormularioModificacion(alumno) {
    // Llenar los campos del formulario de modificación
    $('#idModificar').val(alumno.id);
    $('#nombresModificar').val(alumno.nombres);
    $('#apellidosModificar').val(alumno.apellidos);
    $('#cedula_escolarModificar').val(alumno.cedula_escolar);
    $('#edadModificar').val(alumno.edad);
    $('#gradoModificar').val(alumno.grado);
    $('#lugar_nacimientoModificar').val(alumno.lugar_nacimiento);
    $('#fecha_nacimientoModificar').val(alumno.fecha_nacimiento);
    $('#sexoModificar').val(alumno.sexo);
    $('#bautizadoModificar').val(alumno.bautizado);
    $('#hermanosModificar').val(alumno.hermanos);
    $('#tratamiento_especialModificar').val(alumno.tratamiento_especial);
    $('#alergiaModificar').val(alumno.alergia);
    $('#convulsionadoModificar').val(alumno.convulsionado);

    // Llenar los datos del padre
    $('#nombrePadre').val(alumno.nombre_apellido_padre);
    $('#cedula_identidad_Padre').val(alumno.cedula_identidad_padre);
    $('#fecha_nacimiento_Padre').val(alumno.fecha_nacimiento_padre);
    $('#estado_nacimiento_Padre').val(alumno.estado_nacimiento_padre);
    $('#edad_Padre').val(alumno.edad_padre);
    $('#profesionPadre').val(alumno.profesion_padre);
    $('#grado_instruccion_Padre').val(alumno.grado_instruccion_padre);
    $('#empresa_trabaja_Padre').val(alumno.empresa_trabaja_padre);
    $('#cargo_desempeña_Padre').val(alumno.cargo_desempeña_padre);
    $('#sueldo_Padre').val(alumno.sueldo_padre);
    $('#telefono_Padre').val(alumno.telefono_padre);
    $('#estado_civil_Padre').val(alumno.estado_civil_padre);
    $('#correo_Padre').val(alumno.correo_padre);
    // Llenar los datos de la madre
    $('#nombreMadre').val(alumno.nombre_apellido_madre);
    $('#cedula_identidad_Madre').val(alumno.cedula_identidad_madre);
    $('#fecha_nacimiento_Madre').val(alumno.fecha_nacimiento_madre);
    $('#estado_nacimiento_Madre').val(alumno.estado_nacimiento_madre);
    $('#edad_Madre').val(alumno.edad_madre);
    $('#profesionMadre').val(alumno.profesion_madre);
    $('#grado_instruccion_Madre').val(alumno.grado_instruccion_madre);
    $('#empresa_trabaja_Madre').val(alumno.empresa_trabaja_madre);
    $('#cargo_desempeña_Madre').val(alumno.cargo_desempeña_madre);
    $('#sueldo_Madre').val(alumno.sueldo_madre);
    $('#telefono_Madre').val(alumno.telefono_madre);
    $('#estado_civil_Madre').val(alumno.estado_civil_madre);
    $('#correo_Madre').val(alumno.correo_madre);
    // Llenar los datos del representante
    $('#nombreRepre').val(alumno.nombre_apellido_repre);
    $('#cedula_identidad_Repre').val(alumno.cedula_identidad_repre);
    $('#fecha_nacimiento_Repre').val(alumno.fecha_nacimiento_repre);
    $('#estado_nacimiento_Repre').val(alumno.estado_nacimiento_repre);
    $('#parentesco_Repre').val(alumno.parentesco_repre);
    $('#telefono_Repre').val(alumno.telefono_repre);
    $('#correo_Repre').val(alumno.correo_repre);

    $('#idAlumnoModificar').val(alumno.id);
    // Mostrar el modal de modificación
    $('#modalModificarAlumno').modal('show');
}

// Enviar datos del formulario de modificación al servidor
$('#formularioModificarAlumno').on('submit', function (e) {
    e.preventDefault();

    // Obtener los datos del formulario
    var formData = $(this).serialize();

    formData += '&id=' + $('#idAlumnoModificar').val();


    // Realizar solicitud AJAX para modificar el alumno
    $.ajax({
        url: 'modificar_alumno.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Actualizar la tabla después de modificar el alumno
                $('#alumnosTable').DataTable().ajax.reload();
                // Cerrar el modal de modificación
                $('#modalModificarAlumno').modal('hide');
            } else {
                alert('Error al modificar alumno: ' + response.message);
            }
        },
        error: function (error) {
            console.error('Error al modificar alumno:', error);
        }
    });
});


    });

    $('#agregarAlumnoBtn').on('click', function () {
    // Limpiar el formulario antes de mostrarlo
    $('#formularioAgregarAlumno')[0].reset();
    // Mostrar el modal
    $('#modalAgregarAlumno').modal('show');
});

// Enviar datos del formulario al servidor
$('#formularioAgregarAlumno').on('submit', function (e) {
    e.preventDefault();

    // Obtener los datos del formulario
    var formData = $(this).serialize();

    // Realizar solicitud AJAX para agregar un nuevo alumno
    $.ajax({
        url: 'agregar_alumno.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Actualizar la tabla después de agregar el nuevo alumno
                $('#alumnosTable').DataTable().ajax.reload();
                // Cerrar el modal
                $('#modalAgregarAlumno').modal('hide');
            } else {
                alert('Error al agregar nuevo alumno: ' + response.message);
            }
        },
        error: function (error) {
            console.error('Error al agregar nuevo alumno:', error);
        }

        
    });
    
});



</script>

<?php require_once "vistas/parte_inferior2.php"?>