
<?php
  session_start();
  if(isset($_SESSION['user'])){
  echo '<script> window.location="administrativo.php"; </script>';
  }
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link rel="icon" href="imagen/buho.png">
    <link href="css/estilos.css" rel="stylesheet">
    <body background ="imagen/fondo_login.jpg" class="imagenf">



  </head>

  
    <div class="container">

      <form action= "login_usuario.php" method="post" class="form-signin">
      <label ><h2><strong class="negro">Acceder  a  tu  Cuenta</strong></h2></label> <select class="form-control" name="cargo" id="cargo" onchange="crear(this.value)">
                    <option value="CAR01">Gerencia</option>
                      <option value="CAR02">Bodega</option>
                      <option value="CAR03">Ventas</option>
                    </select>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="user" name= "user" class="form-control" placeholder="usuario" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Clave</label>
        <input type="password" id="passw" name="passw" class="form-control" placeholder="clave" required="">
        
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="login" name ="login" id="login">
      </form>

    </div> 

  

</body></html>


