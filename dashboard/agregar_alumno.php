<?php
error_reporting(E_ALL);
// Lógica para agregar un nuevo alumno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Variables para el alumno
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula_escolar = $_POST['cedula_escolar'];
    $edad = $_POST['edad'];
    $grado = $_POST['grado'];
    $lugar_nacimiento = $_POST['lugar_nacimiento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];
    $bautizado = $_POST['bautizado'];
    $hermanos = $_POST['hermanos'];
    $tratamiento_especial = $_POST['tratamiento_especial'];
    $alergia = $_POST['alergia'];
    $convulsionado = $_POST['convulsionado'];

    // Variables para padre
    $nombre_apellido_padre = $_POST['nombre_apellido_padre'];
    $cedula_identidad_padre = $_POST['cedula_identidad_padre'];
    $fecha_nacimiento_padre = $_POST['fecha_nacimiento_padre'];
    $estado_nacimiento_padre = $_POST['estado_nacimiento_padre'];
    $edad_padre = $_POST['edad_padre'];
    $profesion_padre = $_POST['profesion_padre'];
    $grado_instruccion_padre = $_POST['grado_instruccion_padre'];
    $empresa_trabaja_padre = $_POST['empresa_trabaja_padre'];
    $cargo_desempeña_padre = $_POST['cargo_desempeña_padre'];
    $sueldo_padre = $_POST['sueldo_padre'];
    $telefonos_padre = $_POST['telefonos_padre'];
    $estado_civil_padre = $_POST['estado_civil_padre'];
    $correo_padre = $_POST['correo_padre'];

    // Variables para madre
    $nombre_apellido_madre = $_POST['nombre_apellido_madre'];
    $cedula_identidad_madre = $_POST['cedula_identidad_madre'];
    $fecha_nacimiento_madre = $_POST['fecha_nacimiento_madre'];
    $estado_nacimiento_madre = $_POST['estado_nacimiento_madre'];
    $edad_madre = $_POST['edad_madre'];
    $profesion_madre = $_POST['profesion_madre'];
    $grado_instruccion_madre = $_POST['grado_instruccion_madre'];
    $empresa_trabaja_madre = $_POST['empresa_trabaja_madre'];
    $cargo_desempeña_madre = $_POST['cargo_desempeña_madre'];
    $sueldo_madre = $_POST['sueldo_madre'];
    $telefonos_madre = $_POST['telefonos_madre'];
    $estado_civil_madre = $_POST['estado_civil_madre'];
    $correo_madre = $_POST['correo_madre'];

    // Variables para representante
    $nombre_apellido_repre = $_POST['nombre_apellido_repre'];
    $cedula_identidad_repre = $_POST['cedula_identidad_repre'];
    $fecha_nacimiento_repre = $_POST['fecha_nacimiento_repre'];
    $estado_nacimiento_repre = $_POST['estado_nacimiento_repre'];
    $parentesco_Repre = $_POST['parentesco_Repre'];
    $telefonos_repre = $_POST['telefonos_repre'];
    $correo_repre = $_POST['correo_repre'];

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
     $sql = "INSERT INTO alumnos (nombres, apellidos, cedula_escolar, edad, grado, lugar_nacimiento, fecha_nacimiento, sexo, bautizado, hermanos, tratamiento_especial, alergia, convulsionado, nombre_apellido_padre, cedula_identidad_padre, fecha_nacimiento_padre, estado_nacimiento_padre, edad_padre, profesion_padre, grado_instruccion_padre, empresa_trabaja_padre, cargo_desempeña_padre, sueldo_padre, telefonos_padre, estado_civil_padre, correo_padre, nombre_apellido_madre, cedula_identidad_madre, fecha_nacimiento_madre, estado_nacimiento_madre, edad_madre, profesion_madre, grado_instruccion_madre, empresa_trabaja_madre, cargo_desempeña_madre, sueldo_madre, telefonos_madre, estado_civil_madre, correo_madre, nombre_apellido_repre, cedula_identidad_repre, fecha_nacimiento_repre, estado_nacimiento_repre, parentesco_Repre, telefonos_repre, correo_repre ) 
     VALUES ('$nombres', '$apellidos', '$cedula_escolar', '$edad', '$grado', '$lugar_nacimiento', '$fecha_nacimiento', '$sexo', '$bautizado', '$hermanos', '$tratamiento_especial', '$alergia', '$convulsionado', '$nombre_apellido_padre', '$cedula_identidad_padre', '$fecha_nacimiento_padre', '$estado_nacimiento_padre', '$edad_padre', '$profesion_padre', '$grado_instruccion_padre', '$empresa_trabaja_padre', '$cargo_desempeña_padre', '$sueldo_padre', '$telefonos_padre', '$estado_civil_padre', '$correo_padre', '$nombre_apellido_madre', '$cedula_identidad_madre', '$fecha_nacimiento_madre', '$estado_nacimiento_madre', '$edad_madre', '$profesion_madre', '$grado_instruccion_madre', '$empresa_trabaja_madre', '$cargo_desempeña_madre', '$sueldo_madre', '$telefonos_madre', '$estado_civil_madre', '$correo_madre', '$nombre_apellido_repre', '$cedula_identidad_repre', '$fecha_nacimiento_repre', '$estado_nacimiento_repre', '$parentesco_Repre', '$telefonos_repre', '$correo_repre')";

        // Ejecutar consulta de alumno
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
