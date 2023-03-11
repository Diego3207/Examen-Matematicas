<?php
$respuesta1="";
$respuesta2="";
if($_POST){
	$respuesta1=(isset($_POST["radio_respuestas1"]))?$_POST["radio_respuestas1"]:"";
	$respuesta2=(isset($_POST["radio_respuestas2"]))?$_POST["radio_respuestas2"]:"";
	if($respuesta1=="B" and $respuesta2=="C"){
		echo "bien";
	}
}
?>

<?php include("cabecera.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nivel 1</title>
	<link rel="stylesheet" href="CSS/nivel1.css">
</head>
<body>
	<section>
		<h1 name="nivel1">Nivel 1</h1>
			<form action="nivel1.php" method="post">
				<p>
					1. ¿Qué fracciones representan los puntos señalados en la recta?
				</p>
				<img src="src/primerEjercicio.png" alt="Imagen Fracciones">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas1" value="A">
						<span>A) 1/2, 3/4, 6/7</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="B">
						<span>B) 2/4, 5/8, 7/8</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="C">
						<span>C) 1/4, 5/8, 7/8</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="D">
						<span>D) 2/4, 3/8, 6/7</span>
					</label>
				</fieldset>
				<p>
					2. Se le llama así a la intersección de las mediatrices de los segmentos que conforman un triángulo.
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas2" value="A">
						<span>A) Bisectriz</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="B">
						<span>B) Generatriz</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="C">
						<span>C) Circuncentro</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="D">
						<span>D) Circunferencia</span>
					</label>
				</fieldset>
				<input type="submit" value="Enviar formulario">
			</form>
	</section>
</body>
</html>
