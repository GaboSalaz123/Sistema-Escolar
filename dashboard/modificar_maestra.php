<?php
// Lógica para modificar un Maestra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el id del Maestra desde la solicitud POST
    $idMaestra = isset($_POST['id']) ? $_POST['id'] : null;

    // Verificar si el id está definido
    if ($idMaestra !== null) {
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
        $correo = $_POST['correoModificar'];
        $telefono = $_POST['telefonoModificar'];
        $direccion = $_POST['direccionModificar'];
        $aula = $_POST['aulaModificar'];
        // Utilizar consultas preparadas para evitar problemas de seguridad
        $consulta = $conn->prepare("UPDATE maestras SET nombre = ?, apellido = ?, cedula = ?, correo = ?, telefono = ?, direccion = ?, aula = ? WHERE id = ?");
        $consulta->bind_param("ssssissi", $nombre, $apellido, $cedula, $correo, $telefono, $direccion, $aula, $idMaestra);

        // Ejecutar la consulta preparada
        if ($consulta->execute()) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Error al modificar Maestra: ' . $conn->error));
        }

        // Cerrar la consulta y la conexión
        $consulta->close();
        $conn->close();
    } else {
        echo json_encode(array('success' => false, 'message' => 'Id de Maestra no proporcionado'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Método no permitido'));
}
?>

