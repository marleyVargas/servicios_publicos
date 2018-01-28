<?php
	include "../conexion/conexion.php";
	/**
	* 
	*/

	$primer_nombre = $_POST["primer_nombre"];
	$segundo_nombre = $_POST["segundo_nombre"];
	$primer_apellido = $_POST["primer_apellido"];
	$segundo_apellido = $_POST["segundo_apellido"];
	$identificacion = $_POST["identificacion"];
	$direccion = $_POST["direccion"];
	$telefono = $_POST["telefono"];
	$celular = $_POST["celular"];
	$correo = $_POST["correo"];
	$fecha_nacimiento = $_POST["fecha_nacimiento"];
	$estrato = $_POST["estrato"];
	$tipo_identificacion = $_POST["tipo_identificacion"];
	$servicios = $_POST["servicios"];
	
	if($_GET["action"] == 'registrar'){
		
		$sql = "INSERT INTO cliente VALUES(
							null,
							'".$primer_nombre."',
							'".$segundo_nombre."',
							'".$primer_apellido."',
							'".$segundo_apellido."',
							'".$identificacion."',
							'".$direccion."',
							'".$telefono."',
							'".$celular."',
							'".$correo."',
							'".$fecha_nacimiento."',
							".$estrato.",
							".$tipo_identificacion."
							)";
		$query = mysqli_query($conexion,$sql);
		$idcliente = mysqli_insert_id($conexion);
		
		// =========  Factura =============================
		$precio_total = 0;

		foreach ($servicios as $servicio) {
			$query_precio = mysqli_query($conexion,"SELECT precio FROM servicio where idservicio =".$servicio);
			$result = mysqli_fetch_row($query_precio); 
			$precio_total += $result[0];
		}

		$query_num = mysqli_query($conexion,"SELECT numero FROM factura ORDER by numero DESC");
		$result = mysqli_fetch_row($query_num); 
		$numero = $result[0]+1;
		
		$sql_factura = "INSERT INTO factura VALUES(
				null,
				".$numero.",
				'".date('Y-m-d')."',
				0,
				".$idcliente.",
				".$precio_total.",
				'',
				0,
				0
				)";
		$query = mysqli_query($conexion,$sql_factura);
		$idfactura = mysqli_insert_id($conexion);
		
		foreach ($servicios as $servicio) {

			$query_precio = mysqli_query($conexion,"SELECT precio FROM servicio where idservicio =".$servicio);
			$result = mysqli_fetch_row($query_precio); 
			$sub_total = $result[0];
			
			$sql_detalle_factura = "INSERT INTO detalle_factura VALUES(
							null,
							".$idfactura.",
							".$servicio.",
							".$sub_total.",
							0
							)";
			$query = mysqli_query($conexion,$sql_detalle_factura);
		}

		
		if($query > 1){
			$_SESSION["mensaje"] = "Registro ingresado correctamente";
		}else{
			$_SESSION["mensaje"] = "Error al registrar los datos, por favor valide";
		}
		
		mysqli_close($conexion);
		echo "<script>window.location.href ='../vistas/clientes.php?r=1';</script>";
	}
	
	

	

?>