<?php
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password);

$consulta = "SELECT usuarios.idRol AS idRol, usuarios.idGrado AS idGrado, roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol = roles.id WHERE usuario='$usuario' AND password='$pass' ";	
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 


if($resultado->rowCount() >= 1){ 
    $data = $resultado->fetch(PDO::FETCH_ASSOC); // Obtener la primera fila como un arreglo asociativo
    $_SESSION["s_usuario"] = $usuario;    
    $_SESSION["s_idRol"] = $data["idRol"]; // Acceder directamente a los campos del arreglo asociativo
    $_SESSION["s_idGrado"] = $data["idGrado"];
    $_SESSION["s_rol_descripcion"] = $data["rol"];
} else {
    $_SESSION["s_usuario"] = null;  
    $data=null;
}

echo "Datos devueltos del servidor: ";
var_dump($data); // Esto mostrará la estructura de datos devueltos por el servidor
print json_encode($data);//envio el array final el formato json a AJAX

$conexion=null;
?>
