<?php

$conn = new Mysqli($host, $usuario,$cont,$bdd);

if($conn->connect_error)
	die ($conn->connect_error);

if($_POST){
	$id = $_POST['cod_cli'];
	$cedula = $_POST['cedula'];
	$nom = $_POST['nom_cli'];
	$ape = $_POST['apellido_cli'];
	$direc = $_POST['direc_cli'];
	$telef = $_POST['telef_cli'];

	if($id !=''){
		$q_insert = "INSERT INTO cliente(id_cliente, ruc_cliente, nom_cliente, ape_cliente, 
		dir_cliente, telefono_cliente)
			VALUES ('$id', '$cedula', '$nom', '$ape', '$direc', '$telef')";
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