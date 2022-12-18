<?php 
session_start();
error_reporting(0);
include('config.php');
$sesion= $_SESSION['usuario'];
if ($sesion== null|| $sesion== '') {
  echo 'no tiene acceso';
  die();
}
date_default_timezone_set('America/Bogota');
$consulta="SELECT * FROM `cliente` where `numero_de_documento` ='$sesion' ";
$resultado= mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="" href="../imágenes/favicon.svg">
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@0,400;0,500&family=Raleway:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <title>TWO GUYS</title>
</head>
<body>
    <header>
        <div class="menu">
            <a href="../index.html"><img src="../imágenes/Grupo 13.png" class="logo"></a>   
            <div id="mostrarnombre" class="nombreusuario"></div>
            <nav>
                <ul>
                    <li class="lista"><a href="registrarvehiculos.php">REGISTRAR VEHICULO</a></li>
                    <li class="lista"><a href="registro_citas.php">SOLICITAR CITA</a></li>
                    <li class="lista"><a href="ver_vehiculos.php">VEHICULOS</a></li>    
                    <li class="lista"><a href="dashboard_clientes.php">ESTADO DEL VEHICULO</a></li>
                    <li class="lista " aria-current="page">USUARIO: <?php echo $mostar['nombre']; ?></li>
                     <a class="lista btn btn-sm btn-danger" href="cerrar_s.php" role="button">cerrar sesion</a>
                </ul>
               
          

          <?php } ?>
            </nav>
        </div>
    </header>
    <div class="registra">
        <div class="cont_title">
             <h1>REGISTRE SU CITA</h1>
        </div>
    </div>
    <section class="formularios">
        <div class="tab-content-contacto">
            <div id="agendamiento" data-tab-content class="active" class="active tab">
                <form action="../php/conexion.php" method="post">
                <div class="cont_forms">
               <div class="form-contactenos">
               <select class="form-control" name="Placa_veh_cli" required>
              
               <?php 
             
                    $getpro1 = "SELECT * FROM `vehiculo` WHERE  `numero_documento_cliente_fk`='$sesion' order by placa_vehiculo";
                    $getpro2 = mysqli_query($conexion, $getpro1);
                    while ($row = mysqli_fetch_array($getpro2) ) {
                        $id= $row['placa_vehiculo'];
                      
                    ?>
                    <option class="text-dark" value="<?php echo $id?>" ><?php echo " placa: ". $id ?></option>
                    <?php
                    }

                    ?>
                    </select>
                   
                    <select class="form-control" name="select1" required>
                        <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                        <option  value="Revisión Tecnomecánica">Revisión Tecnomecánica</option>
                        <option  value="Cambio de pieza">Cambio de pieza</option>
                        <option  value="Mantenimiento general">Mantenimiento general</option>
                    </select>
                    <?php $eshoy = date("Y-m-d"); 
                  
                    ?>
                    <input type="date" name="fecha" min="<?php $eshoy ?>"   required>
                    <select class="form-control" name="select2" required>
                        <option class="opciones" value="08:00am - 10:00am">08:00am - 10:00am</option>
                        <option class="opciones" value="10:00am - 12:00pm">10:00am - 12:00pm</option>
                        <option class="opciones" value="14:00pm - 16:00pm">14:00pm - 16:00pm</option>
                        <option class="opciones" value="16:00pm - 18:00pm">16:00pm - 18:00pm</option>
                    </select>
                    <select class="form-control" name="select3" required>
                        <option class="opciones" value="Básico">Básico</option>
                        <option class="opciones" value="Premium">Premium</option>

                    </select>
                    <select class="form-control" name="select4" required>
                        <option class="opciones" value="Averiado">Averiado</option>
                    </select> 
                   <button class="info" type="submit" name="bt_agendar" >Enviar mensaje</button>
               </div>
               </div>
            </form>
            </div>
        </div>
    </section>
    <footer>
        <img src="../imágenes/logo_white.svg" alt="" srcset="">
        <div class="icons_socmedia">
            <img src="../imágenes/phone.svg" alt="" srcset="">
            <img src="../imágenes/mail.svg" alt="" srcset="">
            <img src="../imágenes/location.svg" alt="" srcset="">
        </div>
    </footer>
</body>
</html>