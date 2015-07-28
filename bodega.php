<?php
session_start();
if(isset($_SESSION['user'])&&($_SESSION['cargo'])) {?>
!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagen/buho.png">
    <title>Bodega</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

    <link href="css/dashboard.css" rel="stylesheet">

    <script src="js/ie-emulation-modes-warning.js"></script>  
    </head>
    <body background ="imagen/azul.jpg" class="imagenf">

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="bodega.php">Bodega</a>
          </div>
           <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="cerrar_session.php">Cerrar Session</a></li>
          </ul>
        </div>
          
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li class="active"><a href="administrativo.php">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="cliente_bodega.php">Clientes</a></li>
              <li><a href="productos_bodega.php">Productos</a></li>
              <li><a href="ventas_bodega.php">Ventas</a></li>
            </ul>
          </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main masthead">
          <h1 class="page-header">Bienvenido al control de Inventario</h1>
          <div class="row placeholders center">
            <div class="col-xs-6 col-sm-3 placeholder imagen">
              <a href="adm_client.php"><img src="imagen/cliente.jpg" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h3>Cliente</h3>
              <br>
              <span class="">Los clientes son el centro de todo lo que hacemos. </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder imagen">
              <a href="adm_emp.php"><img src="imagen/empleados.jpg" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h3>Empleados</h3>
              <br>
              <span class="">Para dar lo mejor de sí todos los días, los empleados deben sentir que forman parte del 
              éxito de la empresa.</span>
            </div>         
            
            <div class="col-xs-6 col-sm-3 placeholder imagen">
              <a href="adm_prod.php"><img src="imagen/producto.jpg" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h3>Productos</h3>
              <br>
              <span>El Ecuador se presenta como un mercado atractivo para empresas internacionales proveedoras 
              de productos y servicios en el sector de la construcción</span>
            </div>
            
            <div class="col-xs-6 col-sm-3 placeholder imagen">
              <a href="reportes.php"><img src="imagen/reportes.jpg" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h3>Reportes</h3>
              <br>
              <span class=""> El compromiso de comunicar a todos nuestros grupos de interés, de manera sistemática, 
              nuestro desempeño</span>
            </div>
            

          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>

          <h2 class="sub-header">Nuestra Empresa</h2>
          <br>
          <br>
          <h3 class="sub-header">Objetivo</h3>
          <br>
          <br>
          <span>PoliFer S.A. es una empresa líder en la comercialización de productos de ferretería, 
            hogar, acabados y materiales de construcción en el mercado ecuatoriano. Ofrece a sus cli
            entes una experiencia de compra diferente, fundamentada en el servicio, variedad, garantía 
            y calidad.
            <br>
            El gran prestigio y posicionamiento logrado en el público desde la creación de la empresa 
            en el año de 1943 se vió fortalecido desde que a finales del 2005 pasó a formar parte de 
            Corporación Favorita, primera cadena detallista del país. El trabajo en conjunto e incesante
            en estos último años se ha enfocado, principalmente en lo referente al servicio, buscando 
            llegar a todos los rincones del país con la mayor oferta de productos para el mejoramiento 
            del hogar.
          <br>
          <h3 class="sub-header">Misión</h3>
          <br>
          <br>
          <span>Somos una empresa que explora líder en la comercialización de productos de ferretería, 
            hogar, acabados y materiales de construcción en el mercado ecuatoriano. Ofrece a sus cli
            entes una experiencia de compra diferente, fundamentada en el servicio, variedad, garantía 
            y calidad. 
          <br>
          Proveer Materiales para Ingeniería, Construcción, Gerenciamiento y Servicios Especializados, requeridos 
          por el sector Energético, Petrolero e Industrial. Cumpliendo con los principios, valores y estándares de Calidad, 
          Seguridad, Salud y Ambiente, contando con personal competente y comprometido a mejorar continuamente sus 
          actividades y procesos, orientados a obtener mayor rentabilidad y satisfacer las expectativas de los Clientes, 
          Accionistas, Trabajadores y demás partes interesadas</span>
          <br>
          <br>
          <h3 class="sub-header">Visión</h3>
          <br>
          <br>
          
          <span>Ser la empresa ecuatoriana líder en el sector, que impulse el crecimiento de la corporación 
          y aporte al desarrollo del país. <br> Nuestra perspectiva es consolidar como una empresa de reconocido prestigio 
          nacional por su excelencia operativa, transparencia, y calidad en la prestación de servicios con responsabilidad 
          y eficiencia, comprometidos con los requerimientos y exigencias de las  compañías  operadoras asentadas en el 
          Ecuador.</span>

         

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>


</body></html>

<?php
}else{
  echo '<script> window.location="login.php"; </script>';
}
?>