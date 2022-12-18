<?php

include('config.php');

$ID=$_POST['txtID'];
mysqli_query($conexion,"DELETE FROM cliente where numero_de_documento='$ID'")or die("error al eliminar");
mysqli_close($conexion);
echo "<script>
      alert('La eliminacion se ha realizado correctamente');
      window.location= 'mostrar_tablaCli.php'
</script>";


?>