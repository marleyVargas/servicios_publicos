<?php
	include "../conexion/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Registro Clientes</title>
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
				<div class="col-lg-12">
				<?php 
					if(isset($_GET["r"])){
						if($_GET["r"] == 1){
							echo '<div class="alert alert-success">
									<strong>Exito!</strong> Registro ingresado correctamente.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									   <span aria-hidden="true">&times;</span>
									</button>
								</div>';
						}else{
							echo '<div class="alert alert-danger">
									<strong>Error!</strong> Error al registrar los datos, por favor valide.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									   <span aria-hidden="true">&times;</span>
									</button>
								</div>';
						}
					}
					?>
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
							<form action="../controladores/clientes.php?action=registrar" method="POST">
								<h2>Registro Clientes <br>
								<small>Por favor ingrese la información solicitada</small></h2>
								<hr class="colorgraph">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="primer_nombre" id="primer_nombre" class="form-control input-lg" placeholder="Primer Nombre" tabindex="1">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control input-lg" placeholder="Segundo Nombre" tabindex="2">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="primer_apellido" class="form-control input-lg" placeholder="Primer Apellido" tabindex="1">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="segundo_apellido" class="form-control input-lg" placeholder="Segundo Apellido" tabindex="2">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-4">
										<div class="form-group">
											<label>Tipo identificación</label>
										</div>
									</div>
									<div class="col-xs-12 col-sm-8 col-md-8">
										<div class="form-group">
											<select name="tipo_identificacion" class="form-control input-lg" placeholder="Seleccione" tabindex="2">
												<?php
													$sql = "SELECT * from tipo_identificacion";
													$query = mysqli_query($conexion,$sql);

													while ($row = mysqli_fetch_row($query)) {
												
														echo "<option value=".$row[0].">".$row[1]."</option>";
													
													} 
												
												 ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="identificacion" class="form-control input-lg" placeholder="Identificacion" tabindex="1">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="direccion" class="form-control input-lg" placeholder="Direccion" tabindex="2">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="telefono" class="form-control input-lg" placeholder="Telefono" tabindex="1">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="celular" class="form-control input-lg" placeholder="celular" tabindex="2">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-4">
										<div class="form-group">
											<label>Fecha Nacimiento</label>
										</div>
									</div>
									<div class="col-xs-12 col-sm-8 col-md-8">
										<div class="form-group">
											<input type="date" name="fecha_nacimiento" class="form-control input-lg"  tabindex="2">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-4">
										<div class="form-group">
											<label>Correo</label>
										</div>
									</div>
									<div class="col-xs-12 col-sm-8 col-md-8">
										<div class="form-group">
											<input type="text" name="correo" class="form-control input-lg" placeholder="alguien@correo.com" tabindex="2">
										</div>
									</div>
								</div>
								<div class="row">

									<div class="col-xs-12 col-sm-4 col-md-4">
										<div class="form-group">
											<label>Estrato</label>
										</div>
									</div>
									<div class="col-xs-12 col-sm-8 col-md-8">
										<div class="form-group">
											<select name="estrato" class="form-control input-lg" placeholder="Seleccione" tabindex="2">
												<?php
													$sql = "SELECT * from estrato";
													$query = mysqli_query($conexion,$sql);

													while ($row = mysqli_fetch_row($query)) {
												
														echo "<option value=".$row[0].">".$row[1]."</option>";
													
													} 
												
												 ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-4">
										<div class="form-group">
											<label>Servicios Contratados</label>
										</div>
									</div>
									<div class="col-xs-12 col-sm-8 col-md-8">
										<div class="form-group">
											<select name="servicios[]" class="form-control input-lg" placeholder="Seleccione" tabindex="2" multiple="">
												<?php
													$sql = "SELECT * from servicio";
													$query = mysqli_query($conexion,$sql);

													while ($row = mysqli_fetch_row($query)) {
												
														echo "<option value=".$row[0].">".$row[1]."</option>";
													
													} 
												 ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
								</div>
							</form>
						</div>
					</div>
					
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
