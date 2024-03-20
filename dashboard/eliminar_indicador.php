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
    $IndicadorId = $_POST['id'];

    // Consulta SQL para eliminar la asignatura
    $sql = "DELETE FROM indicadores WHERE id = $IndicadorId";
    $resultado = $conexion->query($sql);

    // Verifica si la eliminación fue exitosa
    if ($resultado) {
        echo json_encode(array("success" => true, "message" => "Indicador eliminada exitosamente"));
    } else {
        echo json_encode(array("success" => false, "message" => "Error al eliminar Indicador: " . $conexion->error));
    }
} else {
    echo json_encode(array("success" => false, "message" => "ID de Indicador no válido"));
}

// Cierra la conexión
$conexion->close();
?>
