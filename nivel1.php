<?php include("cabecera.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nivel 1</title>
	<link rel="stylesheet" href="CSS/nivel1.css">
</head>
<body>
	<div id="preguntas">
		<h1>Nivel 1</h1>
		<section>
			<form action="nivel1.php" method="post">
				<p id="pregunta1">
					1. ¿Qué fracciones representan los puntos señalados en la recta?
				</p>
				<img src="src/primerEjercicio.png" alt="Imagen Fracciones">
				Respuestas:
				<br>
				<label>
					<input type="radio" name="radio-button" value="css" checked />
					A)
				</label>
				<br>
				<input type="radio" name="respuesta1"> 
				A) 1/2, 3/4, 6/7
				<br>
				<input type="radio" name="respuesta1"> B) 1/2, 3/4, 6/7
				
				<p>
					2. Se le llama así a la intersección de las mediatrices de los segmentos que conforman un triángulo.
					
				</p>
			</form>
		</section>
	</div>
</body>
</html>
