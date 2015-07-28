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
    <title>Ventas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>  
    </head>


    <body background ="imagen/rojo.jpg" class="imagenf">
<?php
$conn = new Mysqli($host,$usuario,$cont,$bdd);

if($conn ->connect_error)
  die ($conn ->connect_error);

//Consulta
  $q_select = "SELECT * FROM facturas ORDER BY id_factura  DESC LIMIT 1";
  $result2= $conn->query($q_select);
  $dato=$result2->fetch_array(MYSQLI_ASSOC);

  $user=$_SESSION['user'];

   $q_select4 = "SELECT * FROM empleado WHERE usuario='$user'";
  $result= $conn->query($q_select4);
  $dato4=$result->fetch_array(MYSQLI_ASSOC);


?>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="vendedor.php">Ventas</a>
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
              <li><a href="vendedor.php">Home<span class="sr-only">(current)</span></a></li>
              <li class="active"><a href="ventas.php">Ventas</a></li>
            </ul>
          </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="negro"><h1>VENTAS FERRETERIA</h1></div>
        <!--________________________________________-->
        <form action="insertar_detalle.php" method="post" id="form_factu">
        <div class="row" style="background-color: #EFEFFB">
            <div class="col-md-12">
                <div class="col-md-4"> 

                </div>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <br>
                    FACTURA NUMERO :  <input type="text" class="" id="id_factu" name="id_factu" value="<?php echo $dato['id_factura'];?>">
                      <br>
                      <br>

                    CODIGO EMPLEADO: <input type="text" class="" value="<?php echo $dato4['id_empleado']?>" id="id_emp" name="id_emp">
                    <br>
                    <br>
                    
                    BODEGA : <select class="form-control" name="id_bodeg" id="id_bodeg" onchange="crear(this.value)">
                        <option value="BOD01">Sucursal Norte</option>
                        <option value="BOD02">Sucursal Centro</option>
                        <option value="BOD03">Sucursal Sur</option>
                    </select>
                    <br>
                    TIPO DE TRANSACCIÓN<select class="form-control" name="tipo_tr" id="tipo_tr" onchange="crear(this.value)">
                          <option value="Entrada">Entrada de Mercaderia</option>
                          <option value="Salida">Salida de Mercaderia</option>
                    </select>
                               
                  </div>
                  <div class="col-md-6">
                    <br>
                  

                  </div>
                   
                </div>
                <div class="col-md-12">

                  <div class="col-md-12">
                    
                      
                      <hr class="hrcolor"/>
                      <table class="table">
                        <tr>
                          <th>Producto</th>
                          <th>Cantidad</th>
                        </tr>
                        <tr>
                          <td>
                            <select class="form-control" name="producto" id="producto" onchange="crear(this.value)">

                       
                        <?php
                                $query = 'SELECT * FROM producto';
                                $result = $conn->query($query);
                                if(!$result)die($conn->error);

                                $num_rows = $result->num_rows; 
                                for ($i=0; $i <$num_rows ; ++$i) { 
                                $result->data_seek($i);
                               $row = $result->fetch_array(MYSQLI_ASSOC);
                               

                                  echo "<option value=".$row['id_producto']."> ".$row['nombre_producto']."</option>";
                                  

                                }

                                ?>
                                
                            </select>
                          </td>
                          <td>
                            <input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="######">
                            <br>
                          </td>
                          
                        </tr>
                      </table>
                      <input type="submit" name="Registrar" id="btn_facturas" value="Registrar">
                      <br color = "white">.<br>
                    </form>
                    <form action="info_fac.php" method  = "post">

                      <input type="submit" name="Registrar" id="" value="Ver Factura">
                      <br color = "white">.<br>
                      <input type="hidden" class="" id="id_fact" name="id_fact" value="<?php echo $dato['id_factura'];?>">
                     

                    </form>
                  </div>

                </div>
              </div>
      <!--__________________________________________-->
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
    <script type="text/javascript" src="js/main.js"></script>
     <script type="text/javascript" src="js/jquery.validate.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>


</body></html>
<?php
}else{
  echo '<script> window.location="login.php"; </script>';
}
?>