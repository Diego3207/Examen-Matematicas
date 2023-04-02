<?php
include("conexion.php");
include("controlExperiencia.php");
session_start();
$usuario=(isset($_SESSION["usuario"])?$_SESSION["usuario"]:"");
$idUser="";
$calificacion=0;
$nivel=0;
$experiencia=0;

$objConexion=new conexion();
$sqlConsultarID="select ID_usuario,nivel,experiencia from usuario where usuario='$usuario'";
$resultadosID=$objConexion->consultar($sqlConsultarID);
foreach($resultadosID as $id){
	$idUser=$id[0];
	$nivel=$id[1];
	$experiencia=$id[2];
}

if($experiencia>=500){
	echo "<script>alert('Has llegado al nivel máximo')</script>";
}

$sqlConsultarCalificacion="select calificacion from examen where id_usuario='$idUser'";
$resultadosCalificacion=$objConexion->consultar($sqlConsultarCalificacion);
foreach($resultadosCalificacion as $puntuacion){
	$calificacion=$puntuacion[0];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Resultados</title>
	<link rel="stylesheet" href="CSS/resultados.css">
</head>
<body>
	<section>
		<label>
			<div class="ladoIzq">Usuario</div>
			<div class="ladoIzq">Calificación</div>
			<div class="ladoIzq">Nivel</div>
			<div class="ladoIzq">Experiencia</div>
		</label>
		<label>
			<div class="ladoDer"><?php echo $usuario; ?></div>
			<div class="ladoDer"><?php echo $calificacion; ?></div>
			<div class="ladoDer"><?php echo $nivel; ?></div>
			<div class="ladoDer"><?php echo $experiencia; ?></div>
		</label>
	</section>
</body>
	<a href="index.php">Regresar al inicio</a>
</html>
