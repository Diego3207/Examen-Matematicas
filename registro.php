<?php
session_start();
include("conexion.php");
//solo es registrar nuevos usuarios e insertar en base de datos
//después validaré si hay un usuario nuevo
$usuario="";
$contrasenia="";
if($_POST){
	$usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
	$contrasenia=(isset($_POST["contrasenia"])?$_POST["contrasenia"]:"");

	$_SESSION["usuario"]=$usuario;

	$objConexion=new conexion();
	//$sql="INSERT INTO usuario
				//VALUES ('usuario','contrasenia',1,0);";
	$sql="INSERT INTO usuario (usuario,contraseña,nivel,experiencia)
				VALUES ('$usuario','$contrasenia',1,0);";
	$objConexion->ejecutar($sql);
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="CSS/registro.css">
</head>
<body>
	<h1>HAT MATH</h1>
	<div id="credenciales">
		<div id="registro">
			<h2>Registrar sesión</h2>
		</div>
		<form action="registro.php" method="post">
			<label>
				Usuario:
			</label>
			<input required type="text" name="usuario">
			<label>
				Contraseña:
			</label>
			<input required type="password" name="contrasenia">
			<input type="submit" value="Registrar" id="botonEnviar">
		</form>
	</div>
</body>
</html>
