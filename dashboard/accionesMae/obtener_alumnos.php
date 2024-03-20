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

// Consulta SQL para obtener datos de alumnos
$sql = "SELECT id, nombre, apellido, cedula, edad, grado, fecha_nacimiento FROM alumnos";
$resultado = $conexion->query($sql);

// Formato de datos para DataTables
$data = array();
while ($row = $resultado->fetch_assoc()) {
    $data[] = array(
        "id" => $row["id"],
        "nombre" => $row["nombre"],
        "apellido" => $row["apellido"],
        "cedula" => $row["cedula"],
        "edad" => $row["edad"],
        "grado" => $row["grado"],
        "fecha_nacimiento" => $row["fecha_nacimiento"]
    );
}

// Devuelve los datos en formato JSON
echo json_encode(array("data" => $data));

// Cierra la conexión
$conexion->close();
?>

