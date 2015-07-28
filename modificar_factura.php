<?php

$conn = new Mysqli($host,$usuario,$cont,$bdd);

if($conn ->connect_error)
	die ($conn ->connect_error);

//Borrar

if($_POST){

	$id = $_POST['id_fac'];

	$fecha = $_POST['fecha_fac'];
	$tot = $_POST['total'];
	$id_cli = $_POST['id_cli'];

	$q_actualizar = "UPDATE facturas SET id_factura='$id', fecha_fac='$fecha',
	valor_fac='$tot', id_cliente='$id_cli'WHERE id_factura='$id'";
	$r= $conn->query($q_actualizar);
	if(!$r){
		echo '<div>error al modificar</div>';
	}else{
		echo '<br>';
		echo '<div><h1>Dato Modificado Modificado</h1></div>';
	}
}

?>
