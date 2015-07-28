<?php

$conn = new Mysqli($host, $usuario,$cont,$bdd);

if($conn->connect_error)
	die ($conn->connect_error);

if($_POST){
	$cant = $_POST['cantidad'];
	$tipo = $_POST['tipo_tr'];
	$id_pro = $_POST['producto'];
	$id_bode = $_POST['id_bodeg'];
	$id_emp = $_POST['id_emp'];
	$id_fac = $_POST['id_factu'];

	if($cant !=''){
		$q_insert = "INSERT INTO detalle(cantidad, tipo_det, id_producto, id_bodega, id_empleado, id_factura)
			VALUES ('$cant', '$tipo', '$id_pro', '$id_bode', '$id_emp','$id_fac')";
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