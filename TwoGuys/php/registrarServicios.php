<?php 
session_start();
error_reporting(0);
include('config.php');
$sesion= $_SESSION['usuario'];
if ($sesion== null|| $sesion== '') {
  echo 'no tiene acceso';
  die();
}
$consulta="SELECT * FROM `administrador` where `id_admin` ='$sesion' ";
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
            <img src="../imágenes/Grupo 13.png" class="logo">
            <nav>
                <ul>
                    <li class="lista"><a href="../php/mostrar_tablaCli.php">Clientes</a></li>
                    <li class="lista"><a href="../php/mostrar_tablaVehiculo.php">Vehiculos</a></li>
                    <li class="lista"><a href="../php/mostrar_tablaTra.php">Trabajadores</a></li>
                    <li class="lista"><a href="../php/mostrar_tablaAdmin.php">Administradores</a></li>
                    <li class="lista"><a href="../php/mostrar_servicios.php">Servicios</a></li>
                    <li class="lista"><a href="registrarServicios.php">Registrar servicio</a></li>
                    <li class="lista " aria-current="page">USUARIO: <?php echo $mostar['nombre']; ?></li>
                    <a class="lista btn btn-sm btn-danger" href="cerrar_s.php" role="button">cerrar sesion</a>
                </ul>
                
                <?php } ?>
            </nav>
        </div>
    </header>


    <div class="registra">
        <div class="cont_title">
             <h1>REGISTRAR SERVICIOS</h1>
        </div>
    </div>

    <section class="formularios">

        <ul class="tabs">
            <li data-tab-target="#servicios" class="active tab">Registro de servicios</li>
          </ul>

          <div class="tab-content">
     <div id="servicios" data-tab-content class="active" class="active tab">
            <form action="../php/conexion.php" method="post">
            <div class="cont_forms">
            <div class="form">
                <h4>Registro Servicios</h4>
                <input type="text" id="cod_serv" name="cod_serv" placeholder="Codigo de servicio" required>
                <select class="form-select text-dark" name="select3" required>
                    <option class="opciones" value="Básico">Básico</option>
                    <option class="opciones" value="Premium">Premium</option>
                </select>
                <select class="form-select text-dark" name="select1" required>
                    <option class="opciones" value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                    <option class="opciones" value="Revisión Tecnomecánica">Revisión Tecnomecánica</option>
                    <option class="opciones" value="Cambio de pieza">Cambio de pieza</option>
                    <option class="opciones" value="Mantenimiento general">Mantenimiento general</option>
                </select>
                <input type="number" id="valor_serv" name="valor_serv" placeholder="Valor de servicio" required>
                <button class="info" type="submit" name="bt_servicio">Enviar Registro</button>
            </div>
        </div>
    </form> 
    </div>
    </div>
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

<script src="../javascript/index.js" type="text/javascript"></script>
</body> 
</html> 