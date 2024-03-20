<?php
// Lógica para modificar un alumno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el id del alumno desde la solicitud POST
    $idAlumno = isset($_POST['id']) ? $_POST['id'] : null;

    // Verificar si el id está definido
    if ($idAlumno !== null) {
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

        // Obtener los valores de la solicitud POST
        $nombre = $_POST['nombreModificar'];
        $apellido = $_POST['apellidoModificar'];
        $cedula = $_POST['cedulaModificar'];
        $edad = $_POST['edadModificar'];
        $grado = $_POST['gradoModificar'];
        $fecha_nacimiento = $_POST['fecha_nacimientoModificar'];

        // Utilizar consultas preparadas para evitar problemas de seguridad
        $consulta = $conn->prepare("UPDATE alumnos SET nombre = ?, apellido = ?, cedula = ?, edad = ?, grado = ?, fecha_nacimiento = ? WHERE id = ?");
        $consulta->bind_param("ssssssi", $nombre, $apellido, $cedula, $edad, $grado, $fecha_nacimiento, $idAlumno);

        // Ejecutar la consulta preparada
        if ($consulta->execute()) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Error al modificar alumno: ' . $conn->error));
        }

        // Cerrar la consulta y la conexión
        $consulta->close();
        $conn->close();
    } else {
        echo json_encode(array('success' => false, 'message' => 'Id de alumno no proporcionado'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Método no permitido'));
}
?>

