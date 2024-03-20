<?php
// Lógica para eliminar un Maestra por su ID
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MaestraId = $_POST['id'];

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

    // Consulta para eliminar al Maestra
    $sql = "DELETE FROM maestras WHERE id = $MaestraId";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error al eliminar alumno: ' . $conn->error));
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo json_encode(array('success' => false, 'message' => 'Método no permitido'));
}
?>
