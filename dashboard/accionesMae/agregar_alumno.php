<?php
// Lógica para agregar un nuevo alumno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $edad = $_POST['edad'];
    $grado = $_POST['grado'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdcme";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para insertar un nuevo alumno
    $sql = "INSERT INTO alumnos (nombre, apellido, cedula, edad, grado, fecha_nacimiento) VALUES ('$nombre', '$apellido', '$cedula', '$edad', '$grado', '$fecha_nacimiento')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error al agregar nuevo alumno: ' . $conn->error));
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo json_encode(array('success' => false, 'message' => 'Método no permitido'));
}
?>
