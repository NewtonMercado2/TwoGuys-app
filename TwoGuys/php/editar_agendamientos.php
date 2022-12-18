<?php 
session_start();
error_reporting(0);
include('config.php');
$sesion= $_SESSION['usuario'];
if ($sesion== null|| $sesion== '') {
  echo 'no tiene acceso';
  die();
}
$consulta="SELECT * FROM `trabajador` where `id_trabajador` ='$sesion' ";
$resultado= mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {
 

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="" href="../imágenes/favicon.svg">
    <title>TWO GUYS</title>

    <link href="../css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>
<body id="page-top">
    <header>
        <div class="menu">
            <a href="../index.html"><img src="../imágenes/Grupo 13.png" class="logo"></a>
            <div id="mostrarnombre" class="nombreusuario"></div>
            <nav>
                <ul>
                <li class="lista " aria-current="page">USUARIO: <?php echo $mostar['nombre']; ?>
                <a class="lista btn btn-sm btn-danger mx-2" href="cerrar_s.php" role="button">cerrar sesion</a></li>
                </ul>
                <?php } ?>
            </nav>
        </div>
    </header>
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agendamiento citas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Numero de documento</th>
                            <th>Placa del vehiculo</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Plan de servicio</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$conexion = mysqli_connect('localhost','root','','modelo_relacional_proyecto')or die(mysqli_error($mysqli));
    $ID = $_POST['txtIDe']; 
    $sql="SELECT * FROM agendamiento where `numero_documento_clienteFK`='$ID'";
    $result = mysqli_query($conexion , $sql);
    
    while($mostrar = mysqli_fetch_array($result)){

    
?>                            
                        <tr>
                            <form action="procesarEdicion.php" method="POST">
                            <td> <input type="text" value="<?php echo $mostrar['numero_documento_clienteFK'] ?>" name="doc" readonly>  </td>
                            <td> <?php echo $mostrar['placa_veh_fk'] ?> </td>
                            <td> <?php echo $mostrar['servicio'] ?> </td>
                            <td> <?php echo $mostrar['fecha'] ?> </td>
                            <td> <?php echo $mostrar['hora'] ?> </td>
                            <td> <?php echo $mostrar['plan'] ?> </td>
                            <td> <input type="text" value="<?php echo $mostrar['estado'] ?>" name="est">  </td>
                            <td> <input type="submit" value="actualizar" name="act_estado">  </td> 
                            
                            
                        </tr>
                        <?php
}
                        ?>
                        </form> 
                    </tbody>
    
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>

 
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <script src="js/sb-admin-2.min.js"></script>

 <script src="vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <script src="js/demo/datatables-demo.js"></script>
 <footer>
    <img src="../imágenes/logo_white.svg" alt="" srcset="">
    <div class="icons_socmedia">
        <img src="../imágenes/phone.svg" alt="" srcset="">
        <img src="../imágenes/mail.svg" alt="" srcset="">
        <img src="../imágenes/location.svg" alt="" srcset="">
    </div>
</footer>   