<?php
$exp=0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<link rel="stylesheet" href="perfil.css">
</head>
<body>
	<div id="recuadroExterior">
		<div id="recuadroInterior">
			<img src="src/usuario.svg" alt="Usuario" title="Usuario">
			<h2>Nivel 1</h2>
			<div id="exp">
				Barra de progreso
				<br>
				
				<?php echo $exp; ?> EXP
			</div>
		</div>
		<form action="perfil.php" method="post">
			<input type="submit" value="Enviar informacion" alt="botonEnviar">
		</form>
	</div>
</body>
</html>
