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
    <title>Bodega</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
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
            <li><a href="bodega.php">Home<span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="cliente_bodega.php">Clientes</a></li>
            <li><a href="productos_bodega.php">Productos</a></li>
            <li><a href="ventas_bodega.php">Ventas</a></li>
          </ul>

        </div>
        <br>
        <br>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="negro">Registro de Clientes</h2>          
          <?php
            $query = 'SELECT * FROM cliente';
            $result = $conn->query($query);
            if(!$result)die($conn->error);
            $num_rows = $result->num_rows;
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<table class="table table-bordered">';
            echo '<tr class="active">';
            echo '<th><h3><small><strong>Codigo Cliente</strong></small></h3></th>';
            echo '<th><h3><small><strong>Ruc. Cliente</strong></small></h3></th>';
            echo '<th><h3><small><strong>Nombre Cliente</strong></small></h3></th>';
            echo '<th><h3><small><strong>Apellido Cliente</strong></small></h3></th>';
            echo '<th><h3><small><strong>Direccion Cliente</strong></small></h3></th>';
            echo '<th><h3><small><strong>Telefono Cliente</strong></small></h3></th>';
              for ($i=0; $i <$num_rows ; ++$i) { 
                $result->data_seek($i);
                $row = $result->fetch_array(MYSQLI_ASSOC);  
                
                             
                echo '<tr class="info">';
                echo '<td><h6><small>'.$row['id_cliente'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['ruc_cliente'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['nom_cliente'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['ape_cliente'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['dir_cliente'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['telefono_cliente'].'</small></h6>';
                echo '<td><td>

    <form action ="info_cliente_b.php" method="post" >
    <input type="submit" value="Información" name="seleccionar">
    <input type="hidden" value="' . $row['id_cliente'] . '"  name="id2">
    </form></td>'; 

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
    <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body></html>
<?php
}else{
  echo '<script> window.location="login.php"; </script>';
}
?>