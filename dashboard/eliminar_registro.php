<?php
// Configuración de conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "bdcme";

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verifica la conexión
if ($conexion->connect_error) {
    die(json_encode(array("success" => false, "message" => "Conexión fallida: " . $conexion->connect_error)));
}

// Verifica si se proporcionó un ID válido
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $registroId = $_POST['id'];

    // Consulta SQL para eliminar la observación
    $sql = "DELETE FROM observaciones WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $registroId);
    $stmt->execute();

    // Verifica si la eliminación fue exitosa
    if ($stmt->affected_rows > 0) {
        echo json_encode(array("success" => true, "message" => "Observación eliminada exitosamente"));
    } else {
        echo json_encode(array("success" => false, "message" => "Error al eliminar observación: " . $conexion->error));
    }

    // Cierra la consulta preparada y la conexión
    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(array("success" => false, "message" => "ID de observación no válido"));
}
?>
