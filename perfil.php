<?php
include("cabecera.php");
include("conexion.php");

$usuario=$_SESSION["usuario"];
$experiencia=0;
$nivel=0;

$objConexion=new conexion();
//$sqlConsultarUsuario="select nivel,experiencia from usuario where='$usuario';";
//$resultados=$objConexion->consultar($sqlConsultarUsuario);
//foreach($resultados as $usuario){
	//$nivel=$usuario[0];
	//$experiencia=$usuario[1];
//}
//echo $nivel;
//echo $experiencia;

//$sqlConsultarExamen="select calificación from examen";

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<link rel="stylesheet" href="CSS/perfil.css">
</head>
<body>
	<div id="recuadroExterior">
		<div id="recuadroInterior">
			<img src="src/usuario.svg" alt="" title="Usuario">
			<h1 id="tituloNivel">Nivel <?php echo "1"; ?></h1>
			<span id="experiencia">
				EXP <?php echo "39"; ?>
			</span>
			<div id="progreso">
				<div id="barraProgreso" style="width: 10%">
					<span id="textoBarra">80%</span>
				</div>
			</div>
			<h2>Nombre: </h2>
		</div>
		<form action="perfil.php" method="post">
			<input type="submit" value="Enviar informacion" alt="botonEnviar">
		</form>
	</div>
</body>
</html>
