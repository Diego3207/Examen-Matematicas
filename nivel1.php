<?php
include("conexion.php");
$respuesta1="";
$respuesta2="";
$respuesta3="";
if($_POST){
	$respuesta1=(isset($_POST["radio_respuestas1"]))?$_POST["radio_respuestas1"]:"";
	$respuesta2=(isset($_POST["radio_respuestas2"]))?$_POST["radio_respuestas2"]:"";
	$respuesta3=(isset($_POST["radio_respuestas3"]))?$_POST["radio_respuestas3"]:"";
	$respuestaComprobante1=($respuesta1=="B")?1:0;
	$respuestaComprobante2=($respuesta2=="C")?1:0;
	$respuestaComprobante3=($respuesta3=="A")?1:0;
	$res=$respuestaComprobante1+$respuestaComprobante2+$respuestaComprobante3;
	$porcentaje=($res*100)/3;
	echo $res." de 3 preguntas: ".$porcentaje;
	
}

$objConexion=new Conexion();
$sql="insert into ";
$resultados=$objConexion->ejecutar($sql);

//SELECT usuario.usuario,usuario.nivel,examen.calificacion 
//FROM usuario
//inner join examen
//on usuario.id_examen=examen.id_examen;
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
				<p>
					3. ¿Cuáles de las siguientes fracciones corresponden a los números decimales: 0.4, 0.85, 0.66, 0.14?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas3" value="A">
						<span>A) 2/5, 6/7, 2/3, 1/7</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="B">
						<span>B) 3/5, 6/7, 3/4, 1/9</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="C">
						<span>C) 1/4, 1/3, 3/4, 4/5</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="D">
						<span>D) 1/6, 4/12, 2/3, 5/6</span>
					</label>
				</fieldset>
				<input type="submit" value="Enviar formulario">
			</form>
	</section>
</body>
</html>
