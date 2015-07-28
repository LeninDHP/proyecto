
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
            <li><a href="adm_client.php">Clientes</a></li>
            <li><a href="adm_emp.php">Empleados</a></li>
            <li  class="active"><a href="adm_prod.php">Productos</a></li>
            <li><a href="reportes.php">Ventas</a></li>
          </ul>

        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="negro">Productos</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="imagen/produc1.jpg" class="img-responsive" alt="">
             
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="imagen/product2.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
              
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="imagen/produc3.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
            
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="imagen/product4" class="img-responsive" alt="Generic placeholder thumbnail">
             
            </div>
          </div>

          <h2 class="negro">Productos Disponibles</h2>

           <?php
            $query = 'SELECT * FROM producto';
            $result = $conn->query($query);
            if(!$result)die($conn->error);

            $num_rows = $result->num_rows;

            echo '<br>';
              echo '<br>';
              echo '<br>';
              echo '<table class="table table-bordered">';
                echo '<tr class="active">';

                  echo '<th><h3><small><strong>Codigo Producto</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Producto</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Catidad</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Precio Unitario</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Disponible en Bodega</strong></small></h3></th>';
                  echo '</tr>'; 

                  for ($i=0; $i <$num_rows ; ++$i) { 
                    $result->data_seek($i);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                  
                echo '<tr class="info">';
                echo '<td><h4><small>'.$row['id_producto'].'</small></h4></td>';
                echo '<td><h4><small>'.$row['nombre_producto'].'</small></h4></td>';
                echo '<td><h4><small>'.$row['cantidad'].'</small></h4></td>';
                echo '<td><h4><small>'.$row['precio_unitario'].'</small></h4></td>';
                echo '<td><h4><small>'.$row['id_bodega'].'</small></h4></td>';
                echo '</tr>';
              }
                
              echo '</table>';
              $result->close();
              $conn->close();
            ?>




          <h2 class="negro">Registrar Nuevo Producto</h2>

           <div class="modal-body">
              <form  action= "insertar_pro.php" method="post" id="form">
              <div class="form-group">
              <br>


              <table class="table table-striped">
              <tr>
                
                <td><label for="exampleInputName2">Codigo de l Producto</label><input type="text" name="id_pro" class="form-control" id="id_pro" placeholder="PRO##"></td>
                <td><label for="exampleInputName2">Nombre Del Producto</label><input type="text" name="nombre_pro" class="form-control" id="nombre_pro" placeholder="Barriles"></td>
              </tr> 
              </table>


              <table class="table table-striped">
              <tr>
                <td><label for="exampleInputName2">Cantidad</label><input type="text" name="cantidad_pro" class="form-control" id="cantidad_pro" placeholder="#####"></td>
                <td><label for="exampleInputName2">Precio Unitario</label><input type="text" name="precio_u" class="form-control" id="precio_u" placeholder="$$$$$"></td>
                <td><label ><h5><strong>Bodega a Almacenar</strong> </h5></label> 
                    <select class="form-control" name="bodega" id="bodega" onchange="crear(this.value)">
                      <option value="BOD01">Sucursal Norte</option>
                      <option value="BOD02">Sucursal Centro</option>
                      <option value="BOD03">Sucursal Sur</option>
                    </select>
                  </td>
              </tr>
              </table>

              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" id="ing" value="Ingresar" name="Registrar Empleado">
            </div>
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