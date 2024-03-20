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
    
</head>
<body>

<!-- Contenido con DataTable -->
<div class="container mt-4">
    <h2>Lista de Grados</h2>
    <table class="table table-bordered" id="tablaGrados">
        <thead>
            <tr>
                <th scope="col">Código De Grado</th>
                <th scope="col">Descripcion</th>

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
    var tablaGrados = $('#tablaGrados').DataTable({
        "ajax": {
            "url": "obtener_grados.php", // Ruta para obtener datos desde la base de datos
            "type": "GET",
            "dataType": "json"
        },
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" // Ruta del archivo de idioma español
        },
        "columns": [
            { "data": "cod_grado" },
            { "data": "descripcion" }
        ],
        "paging": false, // Deshabilitar paginación
        "searching": false, // Deshabilitar búsqueda
        "info": false, // Deshabilitar información del pie de página
        "ordering": true // Habilitar ordenar alfabéticamente
    });
});

</script>

</body>
</html>




<?php require_once "vistas/parte_inferior.php"?>