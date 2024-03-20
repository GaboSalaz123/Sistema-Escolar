<?php require_once "vistas/parte_superior.php"?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

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
    <h2>Tabla de Periodos</h2>
    <table class="table table-bordered" id="tablaPeriodos">
        <thead>
            <tr>
                <th scope="col">Lapso</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Primer Lapso</td>
                <td> </td>
            </tr>
            <tr>
                <td>Segundo Lapso</td>
                <td class="bg-success">Activo</td>
            </tr>
            <tr>
                <td>Tercer Lapso</td>
                <td> </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Scripts de Bootstrap, jQuery y DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Configuración de DataTable -->
<script>
    $(document).ready( function () {
        $('#tablaPeriodos').DataTable({
            searching: false, // Deshabilita la función de búsqueda
            paging: false,     // Deshabilita la paginación
            info: false,        // Deshabilita la información del número de páginas
            ordering: false     // Deshabilita el ordenamiento
        });
    });
</script>

</body>
</html>


<?php require_once "vistas/parte_inferior.php"?>