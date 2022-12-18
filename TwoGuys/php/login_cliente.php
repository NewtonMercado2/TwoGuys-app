<?php
include("config.php");

$usuario = $_POST['usuario_cli'];
$contraseña = $_POST['contraseña_cli'];
session_start();
$_SESSION['usuario']=$usuario;

$consulta = "SELECT `numero_de_documento`, `tipo_de_documento`, `nombre`, `numero_de_telefono`, `correo`, `contraseña` FROM `cliente` WHERE  `numero_de_documento`= '$usuario' and `contraseña`= '$contraseña'";
$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);
if($filas){
    header("location:registrarvehiculos.php");
}
else{
    echo"Ups.. ocurrió un error";
}

?>