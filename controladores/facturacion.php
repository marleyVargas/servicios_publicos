<?php
	include "../conexion/conexion.php";
	/**
	* 
	*/

	$fecha = $_POST["fecha"];
	$cliente = $_POST["cliente"];
	$cant_horas = $_POST["cant_horas"];
	$cargo_base = $_POST["cargo_base"];

	$clientes = "SELECT estrato_id FROM cliente WHERE idcliente = ".$cliente;
	$query_clientes =  mysqli_query($conexion,$clientes);
	$result = mysqli_fetch_row($query_clientes); 
	$estrato_id = $result[0];

	$sql_estrato = "SELECT precio, estrato FROM estrato where idestratos = ".$estrato_id;
	$query =  mysqli_query($conexion,$sql_estrato);
	$result = mysqli_fetch_row($query); 
	$precio = $result[0];
	$estrato = $result[1];

	$query_factura = mysqli_query($conexion,"SELECT idfactura,total_factura FROM factura WHERE cliente_id = ".$cliente);
	$result = mysqli_fetch_row($query_factura); 
	$idfactura = $result[0];
	$total_factura = $result[1];

	$sql_servicio1 = "SELECT s.precio FROM servicio s
						join detalle_factura dt on s.idservicio = dt.servicio_id
						WHERE idservicio = 1 and 
						dt.factura_id = ".$idfactura;
	$query =  mysqli_query($conexion,$sql_servicio1);
	$result = mysqli_fetch_row($query_factura); 
	$precio_telefonia = $result[0];

	$sql_servicio2 = "SELECT s.precio FROM servicio s
						join detalle_factura dt on s.idservicio = dt.servicio_id
						WHERE idservicio = 2 and 
						dt.factura_id = ".$idfactura;
	$query =  mysqli_query($conexion,$sql_servicio2);
	$result = mysqli_fetch_row($query_factura); 
	$precio_television= $result[0];

	$sql_servicio3 = "SELECT s.precio FROM servicio s
						join detalle_factura dt on s.idservicio = dt.servicio_id
						WHERE idservicio = 2 and 
						dt.factura_id = ".$idfactura;
	$query =  mysqli_query($conexion,$sql_servicio3);
	$result = mysqli_fetch_row($query_factura); 
	$precio_internet = $result[0];
	
	$precio_internet = $precio_internet*$cant_horas;
	$precio_television = $precio_television*$cant_horas;
	$precio_telefonia = $precio_telefonia * $cant_horas;

	$cargo_variable = 2*log(3*$precio)+(2*($precio_television+$precio_telefonia-$precio_internet))/(3*$precio_internet+1000);
	$total_factura = $total_factura+$cargo_base+$cargo_variable;

	$factura = "UPDATE factura SET fecha_generacion_factura = '".$fecha."', cargo_base =".$cargo_base.", cargo_variable=".$cargo_variable." , total_factura = ".$total_factura." WHERE cliente_id =".$cliente;
	$query = mysqli_query($conexion,$factura);
	
	
	$detalle = "UPDATE detalle_factura set numero_horas =".$cant_horas." WHERE factura_id = ".$idfactura;
	$query =  mysqli_query($conexion,$detalle);

	

	mysqli_close($conexion);
	echo "<script>window.location.href ='../vistas/factura.php?f=".$idfactura."&p=".$precio."&e=".$estrato."';</script>";
	

?>