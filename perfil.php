<?php
include("cabecera.php");
$exp=0;
$nivel=1;

$exp=(isset($_POST["numero"])?$_POST["numero"]:"");

function subirNiveles($nivel, $exp){
	if($exp>=50){
		$nivel++;
		echo $nivel;
	}
	return $nivel;
}
$nuevoNivel=subirNiveles($nivel, $exp);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/perfil.css">
</head>
<body>
	<div id="recuadroExterior">
		<div id="recuadroInterior">
			<img src="src/usuario.svg" alt="" title="Usuario">
			<h2>Nivel <?php echo $nuevoNivel; ?></h2>
			<div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
				<div class="progress-bar" style="width: 25%">25%</div>
			</div>
			<div id="exp">
				
				<?php echo $exp; ?> EXP
			</div>
		</div>
		<form action="perfil.php" method="post">
			<input type="text" name="numero">
			<input type="submit" value="Enviar informacion" alt="botonEnviar">
		</form>
	</div>
</body>
</html>
