<?php
session_start();
if(isset($_SESSION['user'])&&($_SESSION['cargo'])) {?>
!DOCTYPE html>

<?php

$conn = new Mysqli($host, $usuario,$cont,$bdd);

if($conn->connect_error)
  die ($conn->connect_error);
?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagen/buho.png">

    <title>Administrativo</title>
     <link href="css/estilos.css" rel="stylesheet">


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/dashboard.css" rel="stylesheet">

    <script src="./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

  </head>




 <body background ="imagen/gris.jpg" class="imagenf">

 

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="administrativo.php">Administrativo</a>
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
            <li><a href="administrativo.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="adm_client.php">Clientes</a></li>
            <li><a href="adm_emp.php">Empleados</a></li>
            <li><a href="adm_prod.php">Productos</a></li>
            <li class="active"><a href="reportes.php">Ventas</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="negro">Control de Facturas</h1>

           <div class="row">
        <div class="col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <div class="item active">      
                   <img src="imagen/ventas1.jpg" alt="" class="imagen2"> 
              </div>
              <div class="item">
                  <img src="imagen/ventas2.jpg" alt="" class="imagen2">
              </div>
              <div class="item">
                   <img src="imagen/ventas3.jpg" alt="" class="imagen2">
               </div>
              <div class="item">
                 <img src="imagen/ventas4.jpg" alt="" class="imagen2">
              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
             <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
       </div>

          <h2 class="negro">Registro Ventas</h2>
          
    

           <?php
            $query = 'SELECT f.id_factura,b.id_bodega,c.id_cliente, e.id_empleado, 
                nom_cliente, ape_cliente, telefono_cliente,
                f.valor_fac, nombre_bodega, nombre_empleado, apellido_empleado, f.fecha_fac, 
                d.tipo_det
                FROM producto p join detalle d
                on p.id_producto = d.id_producto
                join empleado e
                on e.id_empleado = d.id_empleado
                join bodega b
                on e.id_bodega= b.id_bodega
                join facturas f
                on f.id_factura=d.id_factura
                join cliente c
                on c.id_cliente = f.id_cliente
                group by f.id_factura,b.id_bodega,c.id_cliente, e.id_empleado, 
                nom_cliente, ape_cliente, telefono_cliente,
                f.valor_fac, nombre_bodega, nombre_empleado, apellido_empleado, f.fecha_fac, 
                d.tipo_det';
            $result = $conn->query($query);
            if(!$result)die($conn->error);

            $num_rows = $result->num_rows;

            echo '<br>';
              echo '<table class="table table-bordered">';
                echo '<tr class="active">';
                  echo '<th><h3><small><strong>Codigo de Factura</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Fecha de Factura</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Tipo de Factura</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Valor de la Factura</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Bodega</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Apellido Cliente</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Nombre Cliente</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Nombre Empleado</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Apellido Empleado</strong></small></h3></th>';
                  echo '</tr>';

                  for ($i=0; $i <$num_rows ; ++$i) { 
                    $result->data_seek($i);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                  
                echo '<tr class="info">';
                echo '<td><h6><small>'.$row['id_factura'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['fecha_fac'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['tipo_det'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['valor_fac'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['id_bodega'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['nom_cliente'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['ape_cliente'].'</small></h6></td>
                      <td><h6><small>'.$row['nombre_empleado'].'</small></h6></td>               
                      <td><h6><small>'.$row['apellido_empleado'].'</small></h6></td>
                <td>

    <form action ="info_vent.php" method="post" >
    <input type="submit" value="Ver Factura" name="seleccionar">
    <input type="hidden" value="' . $row['id_factura'] . '"  name="id">
    </form></td>';


                echo '</tr>';
              }
                
              echo '</table>';
              $result->close();
              $conn->close();
            ?>
          
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
  

</body></html>
<?php
}else{
  echo '<script> window.location="login.php"; </script>';
}
?>