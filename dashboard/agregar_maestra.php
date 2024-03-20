<?php
// Lógica para agregar un nuevo Maestra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los valores del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo']; 
    $telefono = $_POST['telefono']; 
    $direccion = $_POST['direccion']; 
    $aula = isset($_POST['aula']) ? $_POST['aula'] : null;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdcme";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para insertar un nuevo Maestra
    $sql = "INSERT INTO maestras (nombre, apellido, cedula, correo, telefono, direccion, aula) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$telefono', '$direccion', '$aula')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error al agregar nuevo Maestra: ' . $conn->error));
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo json_encode(array('success' => false, 'message' => 'Método no permitido'));
}
?>
