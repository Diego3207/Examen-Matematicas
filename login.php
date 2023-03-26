<?php
$nombres=[];
include("conexion.php");
$objConexion=new conexion();
$sql="select usuario from usuario;";
$resultado=$objConexion->consultar($sql);
//print_r($resultado);
foreach($resultado as $nombre){
	array_push($nombres,$nombre[0]);
}
//echo $nombres[8];

session_start();

if($_POST){
	foreach($nombres as $nombre){
		if(($_POST["usuario"]==$nombre)){
			$_SESSION["usuario"]=$nombre;
			echo "usuario loggeado";

			header("location:index.php");
			return;
		}
		else{
			echo "<script> alert('Usuario y/o contraseña incorrecta')</script>";
		}
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
