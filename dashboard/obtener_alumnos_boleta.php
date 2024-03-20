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

// Verificar si se recibió un ID de estudiante válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $estudianteId = $_GET['id'];

    // Consulta SQL para obtener los datos del estudiante
    $sql = "SELECT nombres, apellidos, cedula_escolar, edad, grado, fecha_nacimiento FROM alumnos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $estudianteId);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        $estudiante = $resultado->fetch_assoc();
        // Devolver los datos del estudiante en formato JSON
        echo json_encode($estudiante);
    } else {
        echo "Estudiante no encontrado";
    }
} else {
    echo "ID de estudiante no válido";
}

// Cierra la conexión
$conexion->close();
?>
