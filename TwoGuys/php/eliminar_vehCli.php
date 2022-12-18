<?php

include('config.php');

$ID=$_POST['txtID'];
mysqli_query($conexion,"DELETE FROM vehiculo where placa_vehiculo='$ID'")or die("error al eliminar");
mysqli_close($conexion);
echo "<script>
      alert('La eliminacion se ha realizado correctamente');
      window.location= 'mostrar_tablaVehiculo.php'
</script>";

?>