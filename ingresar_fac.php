<?php

$conn = new Mysqli($host, $usuario,$cont,$bdd);

if($conn->connect_error)
	die ($conn->connect_error);

if($_POST){
	$id = $_POST['id_fac'];
	$fech = $_POST['fecha_fac'];
	$val = $_POST['valor_fac'];
	$id_c = $_POST['id_cliente'];

	if($id !=''){
		$q_insert = "INSERT INTO facturas(id_factura, fecha_fac, valor_fac, id_cliente)
			VALUES ('$id', '$fech', '$val', '$id_c')";
			$resp = $conn->query($q_insert);

			if(!$resp){
				echo '<div>Hay un error al insertar '.$conn->error.'</div>';
			}
			else{
				header('Location: detalle.php');	
			}
		}
		else{
				echo '<div>Ingrese Datos por Favor</div>';
			}
		}
?>