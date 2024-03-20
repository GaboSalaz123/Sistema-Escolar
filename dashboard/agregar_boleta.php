<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer la conexión con la base de datos
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_datos = "bdcme";

    $conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Recuperar los datos del formulario
    $periodo = $_POST['periodo'];
    $lapso = $_POST['lapso'];
    $indicadores = $_POST['indicadores'];
    $estudiante = $_POST['estudiante'];
    $observaciones = $_POST['observaciones'];
    $mensaje = $_POST['mensaje'];
    $dias_h = $_POST['dias_h'];
    $asistencias = $_POST['asistencias'];
    $inasistencias = $_POST['inasistencias'];
    

    // Preparar la consulta SQL para insertar los datos en la tabla de boletas
    $sql = "INSERT INTO boletas (periodo, lapso, indicadores, estudiante, observaciones, mensaje, dias_h, asistencias, inasistencias) 
            VALUES ('$periodo','$lapso','$indicadores', '$estudiante', '$observaciones','$mensaje', '$dias_h', '$asistencias', '$inasistencias')";

    if ($conexion->query($sql) === TRUE) {
        // Si la inserción fue exitosa, devolver una respuesta JSON con éxito
        echo json_encode(array("success" => true));
    } else {
        // Si ocurrió un error durante la inserción, devolver una respuesta JSON con el mensaje de error
        echo json_encode(array("success" => false, "message" => "Error al agregar la boleta: " . $conexion->error));
    }

    // Cerrar la conexión con la base de datos
    $conexion->close();
} else {
    // Si no se recibieron datos por POST, devolver una respuesta JSON indicando un error
    echo json_encode(array("success" => false, "message" => "No se recibieron datos del formulario"));
}
?>
