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

// Recepción del término de búsqueda enviado mediante POST desde el JS
$query = isset($_POST['query']) ? $_POST['query'] : '';

$consulta = "SELECT * FROM observaciones";

$resultado = $conexion->query($consulta);

// Inicializar una variable para almacenar el HTML de los registros
$html_registros = '';

// Construir el HTML de los registros encontrados
if ($resultado->num_rows > 0) {
    while ($registro = $resultado->fetch_assoc()) {
        // Construir el HTML para cada registro
        // Puedes personalizar este HTML según tus necesidades
        $html_registros .= '<li>';
        $html_registros .= '<p>Nombre: ' . $registro['nombres'] . ' ' . $registro['apellidos'] . '</p>';
        // Agrega más detalles del registro según sea necesario
        $html_registros .= '</li>';
    }
} else {
    // Si no se encontraron registros, muestra un mensaje adecuado
    $html_registros = '<p>No se encontraron registros para el estudiante buscado.</p>';
}

// Enviar la respuesta de vuelta al cliente (JavaScript)
echo $html_registros;

// Cerrar la conexión
$conexion->close();
?>
