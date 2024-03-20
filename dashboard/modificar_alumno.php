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
        $nombres = $_POST['nombresModificar'];
        $apellidos = $_POST['apellidosModificar'];
        $cedula_escolar = $_POST['cedula_escolarModificar'];
        $edad = $_POST['edadModificar'];
        $grado = $_POST['gradoModificar'];
        $lugar_nacimiento = $_POST['lugar_nacimientoModificar'];
        $fecha_nacimiento = $_POST['fecha_nacimientoModificar'];
        $sexo = $_POST['sexoModificar'];                                            
        $bautizado = $_POST['bautizadoModificar'];
        $hermanos = $_POST['hermanosModificar'];
        $tratamiento_especial = $_POST['tratamiento_especialModificar'];
        $alergia = $_POST['alergiaModificar'];
        $convulsionado = $_POST['convulsionadoModificar'];


        // Utilizar consultas preparadas para evitar problemas de seguridad
        $consulta = $conn->prepare("UPDATE alumnos SET nombres = ?, apellidos = ?, cedula_escolar = ?, edad = ?, grado = ?, lugar_nacimiento = ?, fecha_nacimiento = ?, sexo = ?, bautizado = ?, hermanos = ?, tratamiento_especial = ?, alergia = ?, convulsionado = ? WHERE id = ?");
        $consulta->bind_param("sssisssssssssi", $nombres, $apellidos, $cedula_escolar, $edad, $grado, $lugar_nacimiento, $fecha_nacimiento, $sexo, $bautizado, $hermanos, $tratamiento_especial, $alergia, $convulsionado, $idAlumno);

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

