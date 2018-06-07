<!DOCTYPE html>
<html lang="es">
<head>
	 

	<meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 	<title>Login</title>
</head>
<body>
 
	<div class="login">
		<h1>Registro de Usuarios</h1>
		
		<form action="" method="post">
			<div class="form-group">
				<input type="text" class="form-control" name="user" placeholder="Usuario">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pass" placeholder="Password">
			</div>
			<button type="submit" name="Registrar" class="btn btn-primary">Registrar</button>
		</form>

	</div>

	<?php 

		require("conexion.php");

		if (isset($_POST['Registrar']))
		{
			if($_POST['user']=="" or $_POST['pass'] == "")
			{
				echo "Todos los campos son requeridos";
			}else{

				$sql = 'SELECT * FROM user';

				$rec = mysql_query($conexion,$sql);

				$verificar = 0;

				while ($resultado = mysqli_fetch_object($rec)) 
				{
					if ($resultado -> usuario == $_POST['user'] ) 
					{
						$verificar = 1;
					}
				}
				if ($verificar == 0) 
				{
					$us = $_POST['user'];
					$pa = $_POST['pass'];

					$conexion->query("INSERT INTO user ( usuario , password) VALUES ('$us','$pa')");
					mysql_query($conexion,$sql);
					echo "Registro Exitosamente";
				}else{

					echo "El usuario ya se encuentra registrado";
				}
			}
		}

	?>
 

</body>
</html>