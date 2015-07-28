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
    <title>Vender Producto</title>
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


  $q_select3 = "SELECT * FROM cliente ORDER BY id_cliente  DESC LIMIT 1";
  $result= $conn->query($q_select3);
  $dato3=$result->fetch_array(MYSQLI_ASSOC);


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
              <li class="active"><a href="ventas.php">Vender Producto</a></li>
            </ul>
          </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="negro"><h1>VENTAS FERRETERIA</h1></div>
          <label class="negro">Última Factura: <?php echo $dato['id_factura'];?></label>
          
        <!--________________________________________-->
        <div class="row" style="background-color: #EFEFFB">
            


            <div class="col-md-12">
             
                <div class="col-md-4">  

                <form action="php/insertar_cliente.php" method="post" id="form_cli"> 
                  <label for="exampleInputName2">CODIGO CLIENTE: </label>
                  <input type="text" name="cod_cli" class="form-control" id="cod_cli" placeholder="CLI##">
                  <br>
                  <label for="exampleInputName2">Cl o RUC:: </label>
                  <input type="text" name="cedula" class="form-control" id="cedula" placeholder="1263554673">
                  <br>
                  <br>
                  <input type="submit" name="Registrar" id="id_cli" value="Registrar">
                  <br>
                  <br>
                           
                </div>
              <div class="col-md-4">
                <label for="exampleInputName2">NOMBRE CLIENTE: </label>
                  <input type="text" name="nom_cli" class="form-control" id="nom_cli" placeholder="Rolando">
                  <br>
                
                <label for="exampleInputName2">TELÉFONO: </label>
                  <input type="text" name="telef_cli" class="form-control" id="telef_cli" placeholder="098765453">
                  <br>

              </div>
              <div class="col-md-4">
                <label for="exampleInputName2">APELLIDO: </label>
                  <input type="text" name="apellido_cli" class="form-control" id="apellido_cli" placeholder="Hernandez">
                  <br>
                <label for="exampleInputName2">DIRECCIÓN: </label>
                  <input type="text" name="direc_cli" class="form-control" id="direc_cli" placeholder="Calderón/Rocas N77">
                  <br>
              </div>
              </form> 
            </div>



            <div class="col-md-12">
               <hr class="hrcolor"/>
                <div class="col-md-4">
                  <form action="ingresar_fac.php" method="post" id="form_cli">
                  <label for="exampleInputName2">FACTURA NUMERO: </label>
                  <input type="text" name="id_fac" class="form-control" id="id_fac" placeholder="FAC##">
                  <label for="exampleInputName2">FECHA: </label>
                  <input type="text" name="fecha_fac" class="form-control" id="fecha_fac" placeholder="AAAA/MM/DD">
                  <br>
                  <label for="exampleInputName2">VALOR FACTURA: </label>
                  <input type="text" name="valor_fac" class="form-control" id="valor_fac" placeholder="$$$$">
                  <br>
                  <input type="text" class="" id="id_cliente" name="id_cliente" value="<?php echo $dato3['id_cliente'];?>">
                  <br>
                  <br>
                  <input type="submit" name="Registrar" id="btn_factura" value="Ingresar Productos">
                  <br>
                  <br>
                  </form>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            
            </div>


            <div class="col-md-12">
              <div class="col-md-8">
            </div>
            <div class="col-md-4" >
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