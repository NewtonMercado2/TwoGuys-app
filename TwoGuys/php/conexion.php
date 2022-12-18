<?php

include("config.php");
session_start();
$sesion= $_SESSION['usuario'];

insercionA($conexion,$sesion);

 function insercionA($conexion,$sesion){
   if(isset($_POST['bt_cli'])){
      insertar($conexion);
  
      echo "<script>
      alert('se ha registrado correctamente');
      window.location= '../html/login.html'
</script>";
      
   }
   if(isset($_POST['bt_tra'])){
      insertar_tra($conexion); 
      echo "<script>
      alert('se ha registrado correctamente');
      window.location= '../html/login.html'
</script>";
      
   }
   if(isset($_POST['bt_admin'])){
      insertar_admin($conexion);
      echo "<script>
      alert('se ha registrado correctamente');
      window.location= '../html/login.html'
</script>";
   }
    if(isset($_POST['bt_reg_veh_cli'])){
      insertar_vehiculo($conexion,$sesion);
      echo "<script>
      alert('Su vehiculo se ha registrado correctamente');
      window.location= 'registro_citas.php'
</script>";
   } 
   if(isset($_POST['bt_servicio'])){
      insertar_servicio($conexion);
      echo "<script>
      alert('El servicio se ha registrado correctamente');
      window.location= 'registrarServicios.php'
</script>";
      
   }
   if(isset($_POST['bt_agendar'])){
      agendamiento($conexion,$sesion);
      echo "<script>
      alert('Su cita se ha registrado correctamente');
      window.location= 'dashboard_clientes.php'
</script>";
   }
 }
 
 function insertar($conexion){
    $nombre_cli = $_POST['nombre_cli'];
    $tipoDoc_cli = $_POST['select1'];
    $nDoc_cli = $_POST['nDoc_cli'];
    $telefono = $_POST['nTell_cli'];
    $correo_cli = $_POST['correo_cli'];
    $contra_cli = $_POST['contra_cli'];

    $consulta_cli = "INSERT INTO cliente(numero_de_documento, tipo_de_documento, nombre, numero_de_telefono, correo, contraseña) VALUES ('$nDoc_cli', '$tipoDoc_cli', '$nombre_cli', '$telefono', '$correo_cli', '$contra_cli')";
    mysqli_query($conexion, $consulta_cli);
    mysqli_close($conexion);

 }

 function insertar_tra($conexion){
   $id_tra = $_POST['id_tra'];
   $nombre_tra = $_POST['nombre_tra'];
   $tipoDoc_tra = $_POST['select3'];
   $nDoc_tra = $_POST['nDoc_tra'];
   $correo_tra = $_POST['correo_tra'];
   $contra_tra = $_POST['contra_tra'];

   $consulta_tra = "INSERT INTO trabajador(Id_trabajador, nombre, tipo_de_documento, numero_de_documento, correo, contraseña) VALUES ('$id_tra', '$nombre_tra', '$tipoDoc_tra', '$nDoc_tra', '$correo_tra', '$contra_tra')";
   mysqli_query($conexion, $consulta_tra);
   mysqli_close($conexion);
   
}
 function insertar_admin($conexion){
   $nombre_admin = $_POST['nombre_admin'];
   $tipoDoc_admin = $_POST['select2'];
   $nDoc_admin = $_POST['nDoc_admin'];
   $contra_admin = $_POST['contra_admin'];

   $consulta_admin = "INSERT INTO `administrador`(`tipo_de_documento`, `id_admin`, `nombre`, `contraseña`) VALUES ('$tipoDoc_admin','$nDoc_admin','$nombre_admin','$contra_admin')";
   mysqli_query($conexion, $consulta_admin);
   mysqli_close($conexion);
   
}
 function insertar_vehiculo($conexion,$sesion){
  
   $Placa_veh_cli= $_POST['Placa_veh_cli'];
   $Marca__veh_cli = $_POST['Marca__veh_cli'];
   $modelo_veh_cli = $_POST['modelo_veh_cli'];
   

  $consulta_vehiculo = "INSERT INTO `vehiculo`(`placa_vehiculo`, `marca_vechiculo`, `modelo`, `numero_documento_cliente_fk`) VALUES ('$Placa_veh_cli','$Marca__veh_cli','$modelo_veh_cli','$sesion')";
   mysqli_query($conexion, $consulta_vehiculo);
   mysqli_close($conexion);
   
}
function insertar_servicio($conexion){
   $cod_serv = $_POST['cod_serv'];
   $plan_serv = $_POST['select3'];
   $tipo_serv = $_POST['select1'];
   $valor_serv = $_POST['valor_serv'];

   $consulta_servicio = "INSERT INTO `servicio`(`codigo_de_servicio`, `plan_servicio`, `tipo_de_servicio`, `valor`) VALUES ('$cod_serv','$plan_serv','$tipo_serv','$valor_serv')";
   mysqli_query($conexion, $consulta_servicio);
   mysqli_close($conexion);
   
}
function agendamiento($conexion,$sesion){
 
   $placa = $_POST['Placa_veh_cli'];
   $serv = $_POST['select1'];
   $fecha = $_POST['fecha'];
   $hora = $_POST['select2'];
   $plan = $_POST['select3'];
   $estado = $_POST['select4'];

   $consulta_agendamiento = "INSERT INTO `agendamiento`(`numero_documento_clienteFK`, `placa_veh_fk`, `servicio`, `fecha`, `hora`,`plan`, `estado`) VALUES ('$sesion','$placa','$serv','$fecha','$hora','$plan','$estado')";
   mysqli_query($conexion, $consulta_agendamiento);
   mysqli_close($conexion);
}
?>
