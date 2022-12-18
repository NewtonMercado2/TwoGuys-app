<?php
include('config.php');

editarEN($conexion);

function editarEN($conexion){
    if(isset($_POST['act_cli'])){
        editarCli($conexion);
        echo "<script>
      alert('La actualización se ha realizado correctamente');
      window.location= 'mostrar_tablaCli.php'
</script>";
        
    }
    if(isset($_POST['act_veh'])){
        editarVeh($conexion);
        echo "<script>
      alert('La actualización se ha realizado correctamente');
      window.location= 'mostrar_tablaVehiculo.php'
</script>";
        
    }
    if(isset($_POST['act_tra'])){
        editarTra($conexion);
        echo "<script>
        alert('La actualización se ha realizado correctamente');
        window.location= 'mostrar_tablaTra.php'
  </script>";
    }
    if(isset($_POST['act_admin'])){
       $contra=$_POST['contra'];
       $id_AD  =$_POST['id_admin'];
        editarAdmin($conexion,$contra,$id_AD);
          echo "<script>
        alert('La actualización se ha realizado correctamente');
        window.location= 'mostrar_tablaAdmin.php'
  </script>";
 
    } 
    if(isset($_POST['act_serv'])){
        $codigo = $_POST['cod_ser'];
        $plan = $_POST['plan'];
        $tipo = $_POST['tipo'];
        $valor = $_POST['valor'];
 
       editarServ($conexion,$codigo,$tipo,$plan,$valor);
       echo "<script>
       alert('La actualización se ha realizado correctamente');
       window.location= 'mostrar_servicios.php'
 </script>";
    }
    if(isset($_POST['act_estado'])){
        editar_agen($conexion);
        echo "<script>
       alert('La actualización se ha realizado correctamente');
       window.location= 'mostrar_agendamientos.php'
 </script>";
    }     
}

function editarCli($conexion){
    $numero_de_documento = $_POST['num_Doce'];
    $NUMERO_DE_TELEFONO=$_POST['num_tele'];
    $correo=$_POST['correoe'];
    $contraseña=$_POST['contraseñae'];

    mysqli_query($conexion, "UPDATE `cliente` SET `numero_de_telefono`='$NUMERO_DE_TELEFONO',`correo`='$correo',`contraseña`='$contraseña' WHERE `numero_de_documento`='$numero_de_documento'")or die ("Error al actualizar");

    mysqli_close($conexion);
}

function editarVeh($conexion){
    $placa = $_POST['pla_veh'];
    $marca = $_POST['marca_veh'];
    $modelo =$_POST['modelo'];

    mysqli_query($conexion, "UPDATE `vehiculo` SET `marca_vechiculo`='$marca',`modelo`='$modelo' WHERE `placa_vehiculo` = '$placa'")or die ("Error al actualizar");
    mysqli_close($conexion);
}

function editarTra($conexion){
    $id_tra = $_POST['id_tra'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contra'];

    mysqli_query($conexion, "UPDATE `trabajador` SET `correo`='$correo',`contraseña`='$contraseña' WHERE `Id_trabajador`='$id_tra'")or die("Error al actualizar");
    mysqli_close($conexion);
}
    
function editarAdmin($conexion,$contra,$id_AD){
    
    

   mysqli_query($conexion, "UPDATE `administrador` SET `contraseña`='$contra' WHERE `id_admin`=$id_AD")or die("Error al actualizar");
    mysqli_close($conexion);
}

 function editarServ($conexion,$codigo,$tipo,$plan,$valor){
  

    mysqli_query($conexion, "UPDATE `servicio` SET `plan_servicio`='$plan',`tipo_de_servicio`='$tipo',`valor`='$valor' WHERE `codigo_de_servicio`='$codigo' ");
    mysqli_close($conexion);
}
function editar_agen($conexion){
    $id = $_POST['doc'];
    $estado = $_POST['est'];    

    mysqli_query($conexion, "UPDATE `agendamiento` SET `estado`='$estado' WHERE `numero_documento_clienteFK`='$id'")or die ("Error al actualizar");
    mysqli_close($conexion);
    
    
}
?>
