<?php

include("config.php");

$usuario = $_POST['usuario_tra'];
$contraseña = $_POST['contraseña_tra'];
session_start();
$_SESSION['usuario']=$usuario;

$consulta = "SELECT `Id_trabajador`, `nombre`, `tipo_de_documento`, `numero_de_documento`, `correo`, `contraseña` FROM `trabajador` WHERE `Id_trabajador`='$usuario' and `contraseña`='$contraseña'";
$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);
if($filas){
        header("Location:mostrar_agendamientos.php");
}
else{
    echo"Ups.. ocurrió un error";
}

?>