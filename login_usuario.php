
<?php
  session_start(); 
?>

<?php
$conn = new Mysqli($host,$usuario,$cont,$bdd);

if($conn ->connect_error)
  die ($conn ->connect_error);

//Consulta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$cargo=$_POST['cargo'];
$user=$_POST['user'];
$password=$_POST['passw'];

if($user !=''){

  $mysql = "SELECT* FROM empleado WHERE id_cargo='$cargo' and usuario = '$user' and contrasena = '$password'";
  $result= $conn->query($mysql);
  $dato=$result->fetch_array(MYSQLI_ASSOC);

      if($dato==0){
        echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
          echo '<script> window.location="login.php"; </script>';      }
      else{
        if($cargo=='CAR01')
        {
          $_SESSION['user'] = $_POST['user'];
          $_SESSION['cargo'] = $_POST['cargo'];
          header('Location: administrativo.php');

        }
        if($cargo=='CAR02')
        {
          $_SESSION['user'] = $_POST['user'];
          $_SESSION['cargo'] = $_POST['cargo'];
          header('Location: bodega.php');

        }
        if($cargo=='CAR03')
        {
          $_SESSION['user'] = $_POST['user'];
          $_SESSION['cargo'] = $_POST['cargo'];
          header('Location: vendedor.php');
        }
      }
  } 
}
?>


