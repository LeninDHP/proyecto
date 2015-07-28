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
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Administrativo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
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
            <li class="active"><a href="adm_emp.php">Empleados</a></li>
            <li><a href="adm_prod.php">Productos</a></li>
            <li><a href="reportes.php">Ventas</a></li>
          </ul>
        </div>  
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <h2 class="negro">Personal</h2>
         
          <?php
            $query = 'SELECT * FROM empleado ';
            $result = $conn->query($query);
            if(!$result)die($conn->error);

            $num_rows = $result->num_rows;

            echo '<br>';
              echo '<br>';
              echo '<br>';
              echo '<table class="table table-bordered">';
                echo '<tr class="active">';

                  echo '<th><h3><small><strong>Codigo Empleado</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Nombre</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Apellido</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Direcci&oacute;n</strong></small></h3></th>';
                  echo '<th><h3><small><strong>Tel&eacute;fono</strong></small></h3></th>';
                  echo '</tr>';

                  for ($i=0; $i <$num_rows ; ++$i) { 
                    $result->data_seek($i);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                  
                echo '<tr class="info">';

                echo '<td><h6><small>'.$row['id_empleado'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['nombre_empleado'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['apellido_empleado'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['direccion'].'</small></h6></td>';
                echo '<td><h6><small>'.$row['telefono'].'</small></h6></td>';
                echo '<td>

    <form action ="info_emp.php" method="post" >
    <input type="submit" value="Información" name="seleccionar">
    <input type="hidden" value="' . $row['id_empleado'] . '"  name="id3">
    </form></td>'; 

            }   
            echo '</table>';
              $result->close();
              $conn->close();
            ?>
            <br>
            <br>
            <h2 class="negro">Contrato Empleados</h2>
            <h3 class="negro" >Formulario de Contratación de Empleados</h3>
              <form action= "" class="form-inline" id="form_emp" method="post">
                <br>
                  <table class="table table-striped">
                  <tr>              
                    <td><label for="exampleInputName2">Id Empleado</label>
                      <input type="text" name="id" class="form-control" id="id" placeholder="EMP##"></td>
                    <td><label for="exampleInputName2">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="usu111"></td>
                  </tr> 
                  </table>
                  <table class="table table-striped">
                  <tr>
                    <td><label for="exampleInputName2">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="**********"></td>
                    <td><label for="exampleInputName2">Verifique su Contraseña</label>
                    <input type="password" name="verificar" class="form-control" id="verificar" placeholder="**********"></td>
                  </tr>
                  </table>
                  <table class="table table-striped">
                    <tr>
                      <td> <label for="exampleInputName2">email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="david@hotmail.com"></td>
                    </tr>
                  </table>
                  <table class="table table-striped">
                    <tr>
                      <td><label for="exampleInputName2">Nombre</label>
                      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="David"></td>
                      <td><label for="exampleInputName2">Apellido</label>
                      <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Fernandez"></td>
                      <td><label for="exampleInputName2">Nombre imagen</label>
                      <input type="text" name="imagen" class="form-control" id="imagen" placeholder="imagen.jpg"> Ejm: nombre.jpg</td>
                    </tr>
                  </table>
                  <table class="table table-striped">
                    <tr>
                      <td><label >Fecha de Ingreso</label>
                      <input type="text" name="fechaing" class="form-control" id="fechaing" placeholder="aaaa-mm-dd"></td>
                      <td><label >Fecha de Salida</label>
                      <input type="text" name="fechasal" class="form-control" id="fechasal" placeholder="aaaa-mm-dd"></td>
                    </tr>
                   </table>
                   <table class="table table-striped">
                    <tr>
                      <td><label >Dirección</label>
                      <input type="text" name="direc" class="form-control" id="direc" placeholder="Calderon/Barrio Landazuri"></td>

                      <td><label >Teléfon</label>
                    <input type="text" name="telef" class="form-control" id="telef" placeholder="022824163"></td>
                   </tr>
                   </table>
                   <table class="table table-striped">
                    <tr>
                      <td><label ><h5><strong>Contrato</strong> </h5></label> 
                        <select class="form-control" name="activo" id="activo" onchange="crear(this.value)">
                          <option value="Disponible">Activo</option>
                          <option value="No Disponible">Inactivo</option>
                        </select>
                      </td>
                      <td><label ><h5><strong>Cargo Empleado</strong> </h5></label> 
                        <select class="form-control" name="cargo" id="cargo" onchange="crear(this.value)">
                          <option value="CAR01">Gerencia</option>
                          <option value="CAR02">Bodega</option>
                          <option value="CAR03">Ventas</option>
                        </select>
                      </td>
                      <td><label ><h5><strong>Bodega a Trabajar</strong> </h5></label> 
                        <select class="form-control" name="bodega" id="bodega" onchange="crear(this.value)">
                          <option value="BOD01">Sucursal Norte</option>
                          <option value="BOD02">Sucursal Centro</option>
                          <option value="BOD03">Sucursal Sur</option>
                        </select>
                      </td>
                    </tr>
                   </table>   
                <br>
                
                <br>      
                 <input type="submit" class="btn btn-primary" value="Ingresar" id="btn_emp" name="Registrar Empleado">
           
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