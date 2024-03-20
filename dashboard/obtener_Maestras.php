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
    die(json_encode(array("error" => true, "message" => "Conexión fallida: " . $conexion->connect_error)));
}

// Consulta SQL para verificar duplicados antes de obtener datos de maestras
$sqlDuplicados = "SELECT GROUP_CONCAT(CONCAT(nombre, ' ', apellido, ' ', cedula) SEPARATOR ',') AS duplicados
                 FROM maestras
                 GROUP BY CONCAT(nombre, ' ', apellido, ' ', cedula)
                 HAVING COUNT(*) > 1";

$resultadoDuplicados = $conexion->query($sqlDuplicados);

// Verifica si hay duplicados
if ($resultadoDuplicados === false) {
    die(json_encode(array("error" => true, "message" => "Error al verificar duplicados: " . $conexion->error)));
}

if ($resultadoDuplicados->num_rows > 0) {
    $duplicados = $resultadoDuplicados->fetch_assoc()['duplicados'];
    die(json_encode(array("error" => true, "message" => "Se encontraron duplicados: $duplicados")));
}

// Consulta SQL para obtener datos de maestras
$sql = "SELECT id, nombre, apellido, cedula, aula FROM maestras";
$resultado = $conexion->query($sql);

// Verifica errores en la consulta
if ($resultado === false) {
    die(json_encode(array("error" => true, "message" => "Error al obtener datos de maestras: " . $conexion->error)));
}

// Formato de datos para DataTables
$data = array();
while ($row = $resultado->fetch_assoc()) {
    $data[] = array(
        "id" => $row["id"],
        "nombre" => $row["nombre"],
        "apellido" => $row["apellido"],
        "cedula" => $row["cedula"],
        "aula" => $row["aula"],
    );
}

// Devuelve los datos en formato JSON con encabezados
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
echo json_encode(array("data" => $data));

// Cierra la conexión
$conexion->close();
?>
