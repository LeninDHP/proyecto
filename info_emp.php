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
            <li class="active"><a href="adm_emp.php">Empleados</a></li>
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
                $id = $_POST['id3'];
                $q_select = "SELECT b.direccion_bodega,b.telefono_bodega, e.direccion, b.nombre_bodega, e.nombre_empleado, 
                e.apellido_empleado, e.telefono, e.usuario, e.contrasena,
                e.correo_empleado, e.fecha_ingreso, e.fecha_salida,e.activo_e, ca.cargo, ca.sueldo, e.imagen
                FROM empleado e join bodega b
                on e.id_bodega= b.id_bodega
                join cargo ca
                on ca.id_cargo = e.id_cargo
                where e.id_empleado = '$id'";
                $result2= $conn->query($q_select);
                $dato=$result2->fetch_array(MYSQLI_ASSOC);
            }
            ?>       
                <h2 class="negro">Registro de Empleado</h2>     
                <br>
                <h2 class="negro">Datos Personales</h2>  
                <br>
                
        
        <div class="row" style="background-color: #EFEFFB">
            <div class="col-md-12">
                <div class="col-md-7">
            

                <div >
                    <label for="nombre" >NOMBRES: <?php echo $dato['nombre_empleado'].'   '.$dato['apellido_empleado'];?></label>  
                    <br>
                    <label for="direccion"  >CARGO: <?php echo $dato['cargo'];?></label> 
                    <br>
                    <label for="direccion"  >SUELDO: $<?php echo $dato['sueldo'];?></label> 
                    <br>
                    <label for="direccion"  >BODEGA: <?php echo $dato['nombre_bodega'];?></label> 
                    <br>
                    <label for="direccion" >USUARIO: <?php echo $dato['usuario'];?></label> 
                    <br>
                    <label for="ruc" >CONTRASEÑA: <?php echo $dato['contrasena'];?></label> 
                    <br>
                    <label for="direccion"  >CORREO: <?php echo $dato['correo_empleado'];?></label> 
                    <br>
                    <label for="direccion"  >DIRECCIÓN: <?php echo $dato['direccion'];?></label> 
                    <br>
                    <label for="direccion"  >TELéFONO: <?php echo $dato['telefono'];?></label> 
                    <br>
                    <label for="direccion"  >FECHA INGRESO: <?php echo $dato['fecha_ingreso'];?></label> 
                    <br>
                    <label for="direccion"  >FECHA SALIDA: <?php echo $dato['fecha_salida'];?></label> 
                    <br>
                    <label for="direccion"  >DISPONIBILIDAD: <?php echo $dato['activo_e'];?></label> 
                    <br>
                </div>
                </div>
                <div class="col-md-5">
                    <br>
                    <br>
                    <img class="fotos" src="fotos_emp\<?php echo $dato['imagen'];?>">
                </div>
            </div>
        

                    <input type="hidden" value="<?php echo $dato['id_empleado'];?>"  name="id3">
                    <form action= "adm_emp.php" class="form-inline" method="post">
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