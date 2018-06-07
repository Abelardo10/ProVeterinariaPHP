

<?php
session_start();
$_SESSION["rol"]="admin";


 
if(isset($_GET["error"]) && $_GET["error"] != "login") {
		header("Location: index.php");
	}
 
 ?>
 
<!DOCTYPE html>
<html lang="es">
<head>
	 

	<meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 	<title>Login</title>

<script language="javascript">
	function NoBack(){
		history.go(1);
		alert("carga");
	}
</script>

</head>
<body OnLoad="NoBack();">
 
	<div class="login">
		<h1>Login</h1>
		<?php
 
			if(isset($_GET["error"])) {
				echo "<p class='error'>Usuario y / o Contrasea erroneos. Intentelo de nuevo.</p>";
			}
 
		 ?>
		<form action="Rlogin.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control" name="usuario" placeholder="Usuario">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<button type="submit" name="enviar" class="botonlg">Entrar</button>
		</form>
	</div>
 

</body>
</html>