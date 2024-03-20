<?php
// Lógica para agregar un nuevo Indicador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los valores del formulario
    $indicadores = $_POST['indicadores'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdcme";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para insertar un nuevo indicador
    $sql = "INSERT INTO indicadores (indicadores) VALUES ('$indicadores')";
    
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
