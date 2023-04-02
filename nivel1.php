<?php
include("conexion.php");
include("cabecera.php");

$respuesta1="";
$respuesta2="";
$respuesta3="";
$respuesta4="";
$respuesta5="";
$respuesta6="";
$respuesta7="";
$respuesta8="";
$respuesta9="";
$respuesta10="";
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
	$respuesta4=(isset($_POST["radio_respuestas4"]))?$_POST["radio_respuestas4"]:"";
	$respuesta5=(isset($_POST["radio_respuestas5"]))?$_POST["radio_respuestas5"]:"";
	$respuesta6=(isset($_POST["radio_respuestas6"]))?$_POST["radio_respuestas6"]:"";
	$respuesta7=(isset($_POST["radio_respuestas7"]))?$_POST["radio_respuestas7"]:"";
	$respuesta8=(isset($_POST["radio_respuestas8"]))?$_POST["radio_respuestas8"]:"";
	$respuesta9=(isset($_POST["radio_respuestas9"]))?$_POST["radio_respuestas9"]:"";
	$respuesta10=(isset($_POST["radio_respuestas10"]))?$_POST["radio_respuestas10"]:"";
	$respuestaComprobante1=($respuesta1=="B")?1:0;
	$respuestaComprobante2=($respuesta2=="C")?1:0;
	$respuestaComprobante3=($respuesta3=="A")?1:0;
	$res=$respuestaComprobante1+$respuestaComprobante2+$respuestaComprobante3;
	$porcentaje=($res*100)/3;
	//echo $res." de 3 preguntas: ".$porcentaje;

	switch($porcentaje){
		case 100:
			$experienciaObtenida=10;
			break;
		case 70:
			$experienciaObtenida=7;
			break;
		case 33:
			$experienciaObtenida=4;
			break;
	}
	$experiencia=$experienciaObtenida+$experiencia;
	switch($experiencia){
		case 50:
			$nivel=2;
			break;
		case 100:
			$nivel=3;
			break;
	}
	$objConexion=new conexion();
	$sqlUpdate="update examen.usuario set experiencia='$experiencia',nivel='$nivel' where ID_usuario='$idUser';";
	$objConexion->ejecutar($sqlUpdate);

	$sqlInsertar="insert into examen (calificacion,id_usuario)
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
		<h1 id="nivel1">Nivel 1</h1>
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
				<p>
					4. ¿Qué fracciones representan las partes sombreadas de las siguientes figuras?
				</p>
				<img src="src/cuartoEjercicio.png" alt="Imagen Gráficos de pastel">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuetas4" value="A">
						<span>A) 4/7, 6/10, 7/6</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas4" value="B">
						<span>B) 3/6, 6/12, 6/7</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas4" value="C">
						<span>C) 3/7, 6/10, 6/7</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas4" value="D">
						<span>D) 3/7, 3/6, 7/6</span>
					</label>
				</fieldset>
				<p>
					5. Olivia reparte $270 entre sus 3 nietos. Jaime tiene 15 años, Aidé 10 y Sofía 5. Si el reparto lo hace de manera proporcional a la edad, ¿qué cantidad le corresponde a cada nieto?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuetas5" value="A">
						<span>A) A Jaime le dio $135, a Aidé $90 y a Sofía $45</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas5" value="B">
						<span>B) A Jaime le dio $170, a Aidé $85 y a Sofía $15</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas5" value="C">
						<span>C) A Jaime le dio $145, a Aidé $80 y a Sofía $45</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas5" value="D">
						<span>D) A Jaime le dio $135, a Aidé $85 y a Sofía $50</span>
					</label>
				</fieldset>
				<p>
					6. ¿Qué fracciones representan los puntos señalados en la recta?
				</p>
				<img src="src/sextoEjercicio.png" alt="Imagen Fracciones">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuetas6" value="A">
						<span>A) 1/12, 2/6, 2/4, 5/6</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas6" value="B">
						<span>B) 2/3, 2/12, 2/6, 6/7</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas6" value="C">
						<span>C) 1/4, 1/3, 3/4, 4/5</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas6" value="D">
						<span>D) 1/6, 4/12, 2/3, 5/6</span>
					</label>
				</fieldset>
				<p>
					7. ¿Cuál es el perímetro y el área de un cuadrado de 15cm de lado?
				</p>
				<img src="src/sextoEjercicio.png" alt="Imagen Fracciones">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuetas7" value="A">
						<span>A) P = 30 cm A = 125 cm<sup>2</sup>   </span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas7" value="B">
						<span>B) P = 60 cm A = 120 cm <sup>2</sup></span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas7" value="C">
						<span>C) P = 30 cm A = 225 cm <sup>2</sup></span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas7" value="D">
						<span>C) P = 60 cm A = 225 cm <sup>2</sup></span>
					</label>
				</fieldset>
				<p>
					8. ¿Cuál opción representa el orden de mayor a menor de las siguientes fracciones: 2/3, 5/6, 3/4, 2/9, 7/8?
				</p>
				<img src="src/sextoEjercicio.png" alt="Imagen Fracciones">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuetas8" value="A">
						<span>A) 7/8, 5/6, 2/3, 3/4, 2/9</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas8" value="B">
						<span>B) 7/8, 5/6, 3/4, 2/3, 2/9</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas8" value="C">
						<span>C) 2/9, 7/8, 5/6, 3/4, 2/3</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas8" value="D">
						<span>D) 5/6, 7/8, 3/4, 2/3, 2/9</span>
					</label>
				</fieldset>
				<p>
					9. ¿Cuál es la suma de los ángulos interiores de un rectángulo?
				</p>
				<img src="src/sextoEjercicio.png" alt="Imagen Fracciones">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuetas9" value="A">
						<span>A) 180°</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas9" value="B">
						<span>B) 240°</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas9" value="C">
						<span>C) 360°</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas9" value="D">
						<span>D) 320°</span>
					</label>
				</fieldset>
				<p>
					10. ¿Cuál es la suma de los ángulos internos de un triángulo equilátero?
				</p>
				<img src="src/sextoEjercicio.png" alt="Imagen Fracciones">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuetas10" value="A">
						<span>A) 240°</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas10" value="B">
						<span>B) 180°</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas10" value="C">
						<span>C) 120°</span>
					</label>
					<label>
						<input type="radio" name="radio_respuetas10" value="D">
						<span>D) 360°</span>
					</label>
				</fieldset>
				<?php if($usuario!=""){ ?>
					<input type="submit" value="Enviar Formulario" name="botonEnviar" title="Enviar Formulario">
				<?php }else{ ?>
					<div id="botones">
						<a href="registro.php">Regisrar</a>
						<a href="login.php">Ingresar sesión</a>
					</div>
				<?php } ?>
			</form>
	</section>
</body>
</html>
