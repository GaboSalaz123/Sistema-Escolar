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
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se recibió un ID de indicadores válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $indicadoresId = $_GET['id'];

    // Consulta SQL para obtener los datos del indicadores
    $sql = "SELECT indicadores FROM indicadores WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $indicadoreseId);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        $indicadores = $resultado->fetch_assoc();
        // Devolver los datos del indicadores en formato JSON
        echo json_encode($indicadores);
    } else {
        echo "indicadores no encontrado";
    }
} else {
    echo "ID de indicadores no válido";
}

// Cierra la conexión
$conexion->close();
?>
