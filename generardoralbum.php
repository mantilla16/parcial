<?php
//<button type="submit" id="abrirm" name="guardar" style="margin:0px auto; display:block;" class="btn btn-primary">GUARDAR ALBUM</button></br>
?>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css"></style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Crear Album</title>
</head>

<body>


	<center>
		<h3>Creación de albumes</h3>
	</center></br></br></br>

	<form method="post" action="">

		<div class="form-group">
			<label for="Album">Nombre del album</label>
			<input type="text" class="form-control" name="crear_album" id="Album" style="margin:0px auto; display:block;" placeholder="Ingrese nombre del Album">
		</div>

		<input type="submit" style="margin:0px auto; display:block;" class="btn btn-primary" value="CREAR ALBUM">
	</form>


</body>

</html>
<!-------------------------CAMPO DE ALERTAS--------------------->
<div style="display:none;" id="alerta" class="alert alert-success" role="alert">
	<p id="ok">
	<P>
</div>
<div style="display:none;" id="alerta2" class="alert alert-danger" role="alert">

	<p id="error">
	<P>
</div>;
<?php


$ruta = dirname(__FILE__);
$explode_ruta = explode("\\", $ruta);
$_ruta_ = implode("/", $explode_ruta);

if (isset($_POST["crear_album"])) {
	if (isset($_POST["crear_album"])) {
		$album = $_POST["crear_album"];
		$ruta = "album";
		$crear = mkdir($ruta . "/" . $album, 0777, true);
		if ($crear) {
			echo "<script> $('#alerta').show(); $('#ok').html('EL ALBUM $album HA SIDO CREADO CON EXITO'); $('#alerta').fadeOut(3000);</script>";
		} else {
			echo "<script> $('#alerta2').show(); $('#error').html('YA EXISTE ESE ALBUM'); $('#alerta2').fadeOut(3000);</script>";
		}
		if ($dir = opendir($ruta)) {
			while (($archivo = readdir($dir)) !== false) {
				if ($archivo != '.' && $archivo != '..') {
					$nuevaRuta = $ruta . $archivo . '/';
					if (is_dir($nuevaRuta)) {
						echo '<b>' . $nuevaRuta . '</b>';
						//listFiles($nuevaRuta); 
					} else {
?>
						<table class="table">
							<thead class="table table-striped">
								<tr>
									<th>Nombre del album</th>
									<th>Añadir imagen</th>
								</tr>
							</thead>
							<tr>
								<td>
									<?php echo $archivo; ?>
								</td>
								<td>
									<a class="btn btn-primary" href="add_fotos.php?variable1=<?php echo $archivo; ?>">ingresar imagenes</a>
								</td>
							</tr>
						</table>
<?php
					}
				}
			}
			closedir($dir);
		}
	}
} ?>