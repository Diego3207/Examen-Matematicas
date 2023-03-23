<?php
session_start();
if($_POST){
	if(($_POST["usuario"]=="Levianix") and ($_POST["contrasenia"]=="3207")){
		$_SESSION["usuario"]="Levianix";
		echo "usuario loggeado";

		header("location:index.php");
	}
	else{
		echo "<script> alert('Usuario y/o contraseña incorrecta')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="CSS/login.css">
</head>
<body>
	<h1>HAT MATH</h1>
	
	<div id="credenciales">
		<div id="login">
			<h2>Login</h2>
		</div>
		<form action="login.php" method="post">
			<label>
				Usuario: 
			</label>
				<input type="text" name="usuario">
			<label>
				Contraseña: 
			</label>
				<input type="text" name="contrasenia">
			<input type="submit" value="Entrar" id="botonEnviar">
		</form>
	</div>
</body>
</html>
