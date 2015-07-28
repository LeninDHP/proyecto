<?php

$conn = new Mysqli($host, $usuario,$cont,$bdd);

if($conn->connect_error)
	die ($conn->connect_error);

if($_POST){
	$id = $_POST['id'];
	$usuario = $_POST['usuario'];
	$pass = $_POST['password'];
	$verif = $_POST['verificar'];
	$email = $_POST['email'];
	$nom = $_POST['nombre'];
	$ape = $_POST['apellido'];
	$img = $_POST['imagen'];
	$fing = $_POST['fechaing'];
	$fsal = $_POST['fechasal'];
	$direc = $_POST['direc'];
	$telef = $_POST['telef'];
	$contr = $_POST['activo'];
	$cargo = $_POST['cargo'];
	$bodeg = $_POST['bodega'];

	if($id !=''){
		$q_insert = "INSERT INTO empleado(id_empleado, usuario, contrasena, verificar, correo_empleado,
		nombre_empleado, apellido_empleado, imagen, direccion, telefono, fecha_ingreso, fecha_salida,
		activo_e, id_cargo, id_bodega)
			VALUES ('$id', '$usuario', '$pass', '$verif', '$email', '$nom',
			 '$ape','$img', '$direc', '$telef', '$fing', '$fsal', '$contr', '$cargo', '$bodeg')";
			$resp = $conn->query($q_insert);

			if(!$resp){
				echo '<div>Hay un error al insertar'.$conn->error.'</div>';
			}
			else{
				echo '<div>Dato ingresado correctamente</div>';
				header('Location: adm_emp.php');
				
				
			}
		}
		else{
				echo '<div>Ingrese Datos por Favor</div>';
			}
		}
?>