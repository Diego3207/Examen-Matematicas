<?php
include("conexion.php");
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

$sqlConsultarCalificacion="select calificación from examen where id_usuario='$idUser'";
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
			<div id="usuario"><?php echo $usuario; ?></div>
		</label>
		<label>
			<div class="ladoIzq">Calificación</div>
			<div id="calificacion"><?php echo $calificacion; ?></div>
		</label>
		<label>
			<div class="ladoIzq">Nivel</div>
			<div id="nivel"><?php echo $nivel; ?></div>
		</label>
		<label>
			<div class="ladoIzq">Experiencia</div>
			<div id="experiencia"><?php echo $experiencia; ?></div>
		</label>
		<a href="index.php">Regresar al inicio</a>
	</section>
</body>
</html>
