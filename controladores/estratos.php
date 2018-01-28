<?php
	include "../conexion/conexion.php";
	/**
	* 
	*/

	$nombre = $_POST["nombre"];
	$precio = $_POST["precio"];

	if($_GET["action"] == 'registrar'){
		$sql = "INSERT INTO estrato values(
							null,
							'".$nombre."',
							".$precio."
							)";
		$query = mysqli_query($conexion,$sql);

		if($query > 1){
			$_SESSION["mensaje"] = "Registro ingresado correctamente";
		}else{
			$_SESSION["mensaje"] = "Error al registrar los datos, por favor valide";
		}
		mysqli_close($conexion);
		echo "<script>window.location.href ='../vistas/estratos.php?r=1';</script>";
	}
	
	

	

?>