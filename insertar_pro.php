<?php

$conn = new Mysqli($host, $usuario,$cont,$bdd);

if($conn->connect_error)
	die ($conn->connect_error);

if($_POST){
	$id = $_POST['id_pro'];
	$nombre = $_POST['nombre_pro'];
	$cant = $_POST['cantidad_pro'];
	$precio = $_POST['precio_u'];
	$bodega = $_POST['bodega'];

	if($id !=''){
		$q_insert = "INSERT INTO producto(id_producto, nombre_producto, cantidad, precio_unitario, id_bodega)
			VALUES ('$id', '$nombre', '$cant', '$precio', '$bodega')";
			$resp = $conn->query($q_insert);

			if(!$resp){
				echo '<div>Hay un error al insertar'.$conn->error.'</div>';
			}
			else{
				echo '<div>Dato ingresado correctamente</div>';
		
			}
		}
		else{
				echo '<div>Ingrese Datos por Favor</div>';
			}
		}
?>