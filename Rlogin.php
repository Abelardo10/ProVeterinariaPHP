<?php

 require("conexion.php");
session_start();
$userok;
$passok;

	if(isset($_POST["enviar"])) {

 
			$loginNombre = $_POST["usuario"];
			$loginPassword = $_POST["password"];
 
			$var_consulta = "SELECT usuario,password,tipousuario FROM user WHERE usuario='$loginNombre' AND password='$loginPassword'";
 //echo $var_consulta;
			 $con = new MySQL();
		        $c = $con->abrirConexion();	       
		       
		        $query = mysqli_query($c, $var_consulta);

			
				while($row = $query->fetch_array()) {
 
					$userok = $row["usuario"];
					$passok = $row["password"];
					$_SESSION["tipou"]=$row["tipousuario"];
				}
 
 
 
			if(isset($loginNombre) && isset($loginPassword)) {
 
				if($loginNombre == $userok && $loginPassword == $passok) {
 
					session_start();
					$_SESSION["logueado"] = TRUE;
					header("Location: index.php");
 
				}
				else {
					Header("Location: login.php?error=login");
				}
 
			}
 
		} else {
			header("Location: index.php");
		}
 
 ?>
