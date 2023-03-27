<?php
$nombres=[];
$contrasenias=[];
$i=0;
include("conexion.php");
$objConexion=new conexion();
$sql="select usuario,contraseña from usuario;";
$resultado=$objConexion->consultar($sql);
foreach($resultado as $nombre){
	array_push($nombres,$nombre[0]);
	array_push($contrasenias,$nombre[1]);
}

session_start();

if($_POST){
	while($i<count($nombre)-1){
		if(($_POST["usuario"]==$nombres[$i]) and ($_POST["contrasenia"]==$contrasenias[$i])){
			$_SESSION["usuario"]=$nombres[$i];
			echo "usuario loggeado";

			header("location:index.php");
			return;
		}
		$i+=1;
	}
	echo "<script> alert('Usuario y/o contraseña incorrecta')</script>";
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
				<input type="text" name="usuario" value="<?php echo isset($_POST["usuario"])?$_POST["usuario"]:""; ?>">
			<label>
				Contraseña: 
			</label>
				<input type="password" name="contrasenia">
			<input type="submit" value="Entrar" id="botonEnviar">
		</form>
	</div>
</body>
</html>
