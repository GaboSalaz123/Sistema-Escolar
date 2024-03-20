<?php
// Verificar si se reciben los datos del formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $fecha = $_POST["fecha"];
    $observaciones = $_POST["observaciones"];

    // Realizar la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "bdcme");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Preparar la consulta para insertar el registro
    $sql = "INSERT INTO observaciones (fecha, observaciones) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("ss", $fecha, $observaciones);
    $stmt->execute();

    // Verificar si la consulta se ejecutó correctamente
    if ($stmt->affected_rows > 0) {
        // Enviar respuesta JSON al cliente
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Error al guardar el registro"));
    }

    // Cerrar la conexión y liberar recursos
    $stmt->close();
    $conexion->close();
} else {
    // Si no se reciben datos por POST, devolver un mensaje de error
    echo json_encode(array("success" => false, "message" => "No se recibieron datos por POST"));
}
?>
