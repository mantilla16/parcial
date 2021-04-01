
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
</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
				<input type="file"  name="archivo" size="50" /><br />
				<input type="submit" class="btn btn-primary" name="Upload_File" value="Upload File" />
		</form>
	</body>
</html>



<?PHP
	session_start();
	if(isset($_POST["Upload_File"])){
		if($_FILES){
			if ($_FILES["archivo"]["error"] > 0){
				echo "Error: " . $_FILES["archivo"]["error"]. "<br />";
			}else{
				copy( $_FILES['archivo']['tmp_name'], "C:xampp/htdocs/clase04/album/".$_FILES['archivo']['name'] ) or
				die( "Could not copy file!");
			}

			$_SESSION["album"][]=$_FILES["archivo"];
			foreach($_SESSION["album"] as $ind=>$album){
				echo "------>".$album["name"]."<br>";
?>
				<form action="" method="POST">
					<img src=<?php echo "album/".$album['name']; ?> width=200 height = 200 ><br>
					<input type="hidden" name="indice" value=<?php echo $ind; ?> >
					<button name="eliminar"  class="btn btn-primary">Eliminar</button>
				</form>
<?php
			}
		}
	}else{

		if(isset($_SESSION["album"])){
			unlink ( "album/".$_SESSION["album"][$_POST["indice"]]["name"] );
			unset($_SESSION["album"][$_POST["indice"]]);

			foreach($_SESSION["album"] as $ind=>$album){
				echo "------>".$album["name"]."<br>";
?>
				<form action="" method="POST">
					<img src=<?php echo "album/".$album['name']; ?> width=200 height = 200 ><br>
					<input type="hidden" name="indice" value=<?php echo $ind; ?> >
					<button name="eliminar"  class="btn btn-primary">Eliminar</button>
				</form>
<?php
			}
		}
	}
?>