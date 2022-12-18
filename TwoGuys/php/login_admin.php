<?php

include("config.php");

$usuario = $_POST['usuario_admin'];
$contraseña = $_POST['contraseña_admin'];
session_start();
$_SESSION['usuario']=$usuario;

$consulta = "SELECT `tipo_de_documento`, `id_admin`, `nombre`, `contraseña` FROM `administrador` WHERE `id_admin`='$usuario' and `contraseña`='$contraseña'";
$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);
if($filas){
    header("location:../php/mostrar_tablaCli.php");
}
else{
    echo"Ups.. ocurrió un error";
}

?>