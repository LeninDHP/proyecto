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
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
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
            <li><a href="bodega.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="cliente_bodega.php">Clientes</a></li>
            <li><a href="producto_bodega.php">Productos</a></li>
            <li class="active"><a href="ventas_bodega.php">Ventas</a></li>
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

          
         

<?php

$conn = new Mysqli($host,$usuario,$cont,$bdd);

if($conn ->connect_error)
  die ($conn ->connect_error);

//Consulta

if($_POST){

  $id = $_POST['id'];
  $q_select = "      SELECT f.id_factura, c.ruc_cliente,b.direccion_bodega,b.telefono_bodega, 
  c.nom_cliente, c.ape_cliente, c.dir_cliente, c.telefono_cliente, p.nombre_producto, 
  p.precio_unitario,d.cantidad,f.valor_fac, b.nombre_bodega, e.nombre_empleado, 
  e.apellido_empleado, f.fecha_fac, d.tipo_det, e.telefono
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
WHERE f.id_factura = '$id'";
  $result2= $conn->query($q_select);
  $dato=$result2->fetch_array(MYSQLI_ASSOC);
}

?>


      

                  <form method="post" action="" style="background-color: #EFEFFB">
                    <h3 class="negro">FACTURA FERRETERIA ESFOT</h3>
                    <br>
                    <label class="negro">FACTURA N : <?php echo $dato['id_factura'];?></label>
                    <br>
                    <label for="nombre" >CLIENTE: <?php echo $dato['nom_cliente'].'   '.$dato['ape_cliente'];?></label>  
                    <br>
                    <label for="direccion" >DIRECCIÓN: <?php echo $dato['dir_cliente'];?></label> 
                    <br>
                    <label for="ruc" >RUC: <?php echo $dato['ruc_cliente'];?></label> 
                    <br>
                    <label for="direccion"  >TELÉFONO: <?php echo $dato['telefono_cliente'];?></label> 
                    <hr class="hrcolor"/>
                    <label for="direccion"  >NOMBRE EMPLEADO: <?php echo $dato['nombre_empleado'].' '.$dato['apellido_empleado'];?></label> 
                    <br>
                    <label for="direccion"  >TELÉFONO EMPLEADO: <?php echo $dato['telefono'];?></label> 
                    

                    <hr class="hrcolor"/>
                    <label for="lugar" >SUCURSAL: <?php echo $dato['nombre_bodega'];?></label> 
                    <br>
                    <label for="nombre" >DIRECCIÓN: <?php echo $dato['direccion_bodega'];?></label>  
                    <br>
                    <label for="nombre" >TELÉFONO: <?php echo $dato['telefono_bodega'];?></label> 
                    <?php
                        if(!$result2)die($conn->error);
                        $num_rows2 = $result2->num_rows;
                        $por2 = 0;
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<table class="table table-bordered">';
                        echo '<tr class="active">';
                        echo '<th><h3><small><strong>Producto</strong></small></h3></th>';
                        echo '<th><h3><small><strong>Precio Unitario</strong></small></h3></th>';
                        echo '<th><h3><small><strong>Cantidad de Producto</strong></small></h3></th>';
                        echo '<th><h3><small><strong>Fecha Factura</strong></small></h3></th>';
                        echo '<th><h3><small><strong>Tipo</strong></small></h3></th>';
                        echo '<th><h3><small><strong>Valor Vactura</strong></small></h3></th>';
                        for ($f=0; $f <$num_rows2 ; ++$f) { 
                            
                            $result2->data_seek($f);
                            $row2 = $result2->fetch_array(MYSQLI_ASSOC);  
                            $por=$row2['cantidad']*$row2['precio_unitario'];  
                            $por2=$por2+$por;              
                            echo '<tr class="info">';
                            echo '<td><h5><small>'.$row2['nombre_producto'].'</small></h5></td>';
                            echo '<td><h5><small>$ '.$row2['precio_unitario'].'</small></h5></td>';
                            echo '<td><h5><small>'.$row2['cantidad'].'</small></h5></td>';
                            echo '<td><h5><small>'.$row2['fecha_fac'].'</small></h5></td>';
                            echo '<td><h5><small>'.$row2['tipo_det'].'</small></h5></td>';
                            echo '<td><h5><small>$ '.$por.'</small></h6></td>';
                            echo '</tr>';
                        } 
                        echo '<tr class="negro">';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td>TOTAL : </td>';
                        echo '<td></td>';
                        echo '<td>$ '.$por2.'</td>';

                        echo '</tr>';

                        echo '</table>';                          
                        
                    ?>
                    <input type="hidden" value="<?php echo $dato['id_factura'];?>"  name="id">
                    <br>

                  </form>
                  <form action= "ventas_bodega.php" class="form-inline" method="post">
              <input type="submit" class="btn btn-primary" value="Regresar" name="Registrar Empleado">

            </form>
          
                </div>
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