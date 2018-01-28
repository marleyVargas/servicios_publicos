<?php 
	$conexion = new mysqli("localhost", "root", "", "servicios_publicos");
	if ($conexion->connect_errno) {
	    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
?>