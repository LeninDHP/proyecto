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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/ie-emulation-modes-warning.js"></script>
    
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
            <li class="active"><a href="adm_client.php">Clientes</a></li>
            <li><a href="adm_emp.php">Empleados</a></li>
            <li><a href="adm_prod.php">Productos</a></li>
            <li><a href="reportes.php">Ventas</a></li>
          </ul>

        </div>
        <br>
        <br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
            $conn = new Mysqli($host,$usuario,$cont,$bdd);
            if($conn ->connect_error)
            die ($conn ->connect_error);
            //Consulta
            if($_POST){
                $id = $_POST['id2'];
                $q_select = "SELECT f.id_factura, c.ruc_cliente, c.nom_cliente, c.ape_cliente, 
                c.dir_cliente, c.telefono_cliente, p.nombre_producto, p.precio_unitario,d.cantidad,
                f.valor_fac, b.nombre_bodega, e.nombre_empleado, e.apellido_empleado, f.fecha_fac, 
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
                WHERE c.id_cliente = '$id'";

                $result2= $conn->query($q_select);
                $dato=$result2->fetch_array(MYSQLI_ASSOC);
            }
            ?>       
                <h2 class="negro">Registro de Cliente</h2>     
                <br>
                <h2 class="negro">Datos Personales</h2>  
                <br>
                <div style="background-color: #EFEFFB">
                    <label for="nombre" >CLIENTE: <?php echo $dato['nom_cliente'].'   '.$dato['ape_cliente'];?></label>  
                    <br>
                    <label for="direccion" >DIRECCIÓN: <?php echo $dato['dir_cliente'];?></label> 
                    <br>
                    <label for="ruc" >RUC: <?php echo $dato['ruc_cliente'];?></label> 
                    <br>
                    <label for="direccion"  >TELÉFONO: <?php echo $dato['telefono_cliente'];?></label> 
                    <br>
                    <label for="direccion"  >SUCURSAL BODEGA: <?php echo $dato['nombre_bodega'];?></label> 
                    <br>
                    <label for="direccion"  >FACTURA N: <?php echo $dato['id_factura'];?></label> 
                    <br>
                </div>

                    <h2 class="negro">Compras Realizadas</h2>    
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
                        echo '<th><h3><small><strong>Valor Factura</strong></small></h3></th>';
                        for ($f=0; $f <$num_rows2 ; ++$f) { 
                            
                            $result2->data_seek($f);
                            $row2 = $result2->fetch_array(MYSQLI_ASSOC);  
                            $por=$row2['cantidad']*$row2['precio_unitario'];  
                            $por2=$por2+$por;  
                            $iva=$por2*0.12;   
                            $total=$iva+$por2;         
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
                        echo '<td>SUBTOTAL : </td>';
                        echo '<td></td>';
                        echo '<td>$ '.$por2.'</td>';

                        echo '<tr class="negro">';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td>IVA 12% : </td>';
                        echo '<td></td>';
                        echo '<td>$ '.$iva.'</td>';

                        echo '</tr>';
                        echo '<tr class="negro">';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td>TOTAL : </td>';
                        echo '<td></td>';
                        echo '<td>$ '.$total.'</td>';

                        echo '</tr>';

                        echo '</table>';                          
                        
                    ?>
                    <input type="hidden" value="<?php echo $dato['id_factura'];?>"  name="id2">
                    <form action= "adm_client.php" class="form-inline" method="post">
                    <input type="submit" class="btn btn-primary" value="Regresar" name="Registrar ">
                  </form>
                  
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