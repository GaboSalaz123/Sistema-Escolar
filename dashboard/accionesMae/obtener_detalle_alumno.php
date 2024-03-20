<?php
// Lógica para obtener los detalles de un alumno por su ID
if (isset($_GET['id'])) {
    $alumnoId = $_GET['id'];

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

    // Consulta para obtener los detalles del alumno
    $sql = "SELECT * FROM alumnos WHERE id = $alumnoId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los detalles del primer resultado
        $alumnoDetalles = $result->fetch_assoc();

        // Devolver los detalles como JSON
        echo json_encode($alumnoDetalles);
    } else {
        echo json_encode(array('error' => 'No se encontraron detalles del alumno'));
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo json_encode(array('error' => 'ID de alumno no proporcionado'));
}
?>
