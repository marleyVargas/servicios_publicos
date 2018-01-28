<?php
	include "../conexion/conexion.php";
	$idfactura = $_GET["f"];
	$precio_base = $_GET["p"];
	$estrato = $_GET["e"];

	$query_factura = mysqli_query($conexion,"SELECT numero,cargo_base,total_factura,cargo_variable FROM factura WHERE idfactura=".$idfactura);
	$result = mysqli_fetch_row($query_factura); 
	$numero_factura = $result[0];
	$cargo_base = $result[1];
	$cargo_variable = $result[3];
	$total_factura = $result[2];

	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Factura</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Bootstrap 3 template for corporate business" />
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/cubeportfolio.min.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

	<!-- Theme skin -->
	<link id="t-colors" href="skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />

</head>

<body>


	<div id="wrapper">
		<!-- start header -->
		<?php include "header.php" ?>
		<!-- end header -->
		
		<section id="content">
			<div class="container">
				<div class="row">
					<label class="label label-primary" style="font-size: 17px">Factura N. <?php echo $numero_factura ?></label><br><br>
					<table class="table table-bordered table-striped table-responsive">
						<tbody>
							<tr style="text-align: center">
								<td><b>Cargo Básico</b></td>
								<td><b>$ <?php echo $cargo_base ?></b></td>
							</tr>
							<tr style="text-align: center">
								<td>Estrato</td>
								<td><?php echo $estrato ?></td>
							</tr>
							<tr style="text-align: center">
								<td>Valor Base Estrato</td>
								<td>$ <?php echo $precio_base ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>
							
							<?php
								$sql = "SELECT * FROM detalle_factura df join servicio s on df.servicio_id = s.idservicio";
								$query = mysqli_query($conexion,$sql);
								$query2 = mysqli_query($conexion,$sql);

							while ($row = mysqli_fetch_row($query)) {
							?>
								<tr style="text-align: center">
									<td>Número Dias <?php echo $row[6] ?></td>
									<td><?php echo $row[4]?></td>
								</tr>
								<tr style="text-align: center">
									<td>Valor servicio <?php echo $row[6] ?></td>
									<td>$ <?php echo $row[7]?></td>
								</tr>	
							<?php } ?>
							<tr>
								<td></td>
								<td></td>
							</tr>
							<?php
							while ($row = mysqli_fetch_row($query2)) {
							?>
								<tr style="text-align: center">
									<td><b>SubTotal <?php echo $row[6] ?></b></td>
									<td><b>$ <?php echo $row[3]?></b></td>
								</tr>
							<?php } ?>
							<tr>
								<td></td>
								<td></td>
							</tr>
							<!--<tr style="text-align: center">
								<td><b>Cargo Variable</b></td>
								<td><b>$ <?php echo $cargo_variable ?></b></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>-->
							<tr style="text-align: center">
								<td><b>Total Factura</b></td>
								<td><b>$ <?php echo $total_factura ?></b></td>
							</tr>
						</tbody>
					</table>
				</div>
				
			</div>
		</section>

		<footer>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="copyright">
								<p>&copy; Facturación de servicios</p>
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="social-network">
								<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>

	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/uisearch.js"></script>
	<script src="js/jquery.cubeportfolio.min.js"></script>
	<script src="js/google-code-prettify/prettify.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>
