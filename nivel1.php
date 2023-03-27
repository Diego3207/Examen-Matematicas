<?php
include("conexion.php");
include("cabecera.php");

$respuesta1="";
$respuesta2="";
$respuesta3="";
$usuario="";
$idUser="";
$porcentaje="";
$experienciaObtenida=0;
$experiencia=0;
$nivel=0;

$usuario=(isset($_SESSION["usuario"])?$_SESSION["usuario"]:"");
$objConexion=new conexion();
$sqlConsultarID="select ID_usuario from usuario where usuario='$usuario';";
$resultadosID=$objConexion->consultar($sqlConsultarID);
foreach($resultadosID as $id){
	$idUser= $id[0];
}

$sqlConsultarExperiencia="select nivel,experiencia from usuario where usuario='$usuario';";
$resultadosExperiencia=$objConexion->consultar($sqlConsultarExperiencia);
foreach($resultadosExperiencia as $experiencias){
	$experiencia= $experiencias[1];
	$nivel= $experiencias[0];
}

if($_POST){
	$respuesta1=(isset($_POST["radio_respuestas1"]))?$_POST["radio_respuestas1"]:"";
	$respuesta2=(isset($_POST["radio_respuestas2"]))?$_POST["radio_respuestas2"]:"";
	$respuesta3=(isset($_POST["radio_respuestas3"]))?$_POST["radio_respuestas3"]:"";
	$respuestaComprobante1=($respuesta1=="B")?1:0;
	$respuestaComprobante2=($respuesta2=="C")?1:0;
	$respuestaComprobante3=($respuesta3=="A")?1:0;
	$res=$respuestaComprobante1+$respuestaComprobante2+$respuestaComprobante3;
	$porcentaje=($res*100)/3;
	//echo $res." de 3 preguntas: ".$porcentaje;

	switch($experiencia){
		case 100:
			$experienciaObtenida=10;
			break;
		case 70:
			$experienciaObtenida=7;
			break;
		case 40:
			$experienciaObtenida=4;
			break;
	}
	$experiencia+=$experienciaObtenida;
	switch($experiencia){
		case 50:
			$nivel=2;
			break;
		case 100:
			$nivel=3;
			break;
	}
	echo $experiencia;
	$objConexion=new conexion();
	$sqlUpdate="update examen.usuario set experiencia='$experiencia',nivel='$nivel' where ID_usuario='$idUser';";
	$objConexion->ejecutar($sqlUpdate);

	$sqlInsertar="insert into examen (calificación,id_usuario)
				values ('$porcentaje','$idUser');";
	$objConexion->ejecutar($sqlInsertar);
	header("location:resultados.php");
}
?>

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
				<?php if($usuario!=""){ ?>
					<input type="submit" value="Enviar Formulario" name="botonEnviar" title="Enviar Formulario">
				<?php }else{ ?>
					<a href="registro.php">Regisrar</a>
					<a href="login.php">Ingresar sesión</a>
				<?php } ?>
			</form>
	</section>
</body>
</html>
