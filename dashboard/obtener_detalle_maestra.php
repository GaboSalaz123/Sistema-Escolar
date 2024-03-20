<?php
// Lógica para obtener los detalles de un Maestra por su ID
if (isset($_GET['id'])) {
    $MaestraId = $_GET['id'];

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

    // Consulta para obtener los detalles del Maestra
    $sql = "SELECT * FROM maestras WHERE id = $MaestraId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los detalles del primer resultado
        $MaestraDetalles = $result->fetch_assoc();

        // Devolver los detalles como JSON
        echo json_encode($MaestraDetalles);
    } else {
        echo json_encode(array('error' => 'No se encontraron detalles del Maestra'));
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo json_encode(array('error' => 'ID de Maestra no proporcionado'));
}
?>
