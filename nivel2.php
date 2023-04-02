<?php
include("conexion.php");
include("cabecera.php");
include("controlExperiencia.php");

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
$respuestaComprobante1=0;
$respuestaComprobante2=0;
$respuestaComprobante3=0;
$respuestaComprobante4=0;
$respuestaComprobante5=0;
$respuestaComprobante6=0;
$respuestaComprobante7=0;
$respuestaComprobante8=0;
$respuestaComprobante9=0;
$respuestaComprobante10=0;
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
	$experiencia=$experiencias[1];
	$nivel=$experiencias[0];
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
	$respuestaComprobante1=($respuesta1=="A")?1:0;
	$respuestaComprobante2=($respuesta2=="D")?1:0;
	$respuestaComprobante3=($respuesta3=="D")?1:0;
	$respuestaComprobante4=($respuesta4=="A")?1:0;
	$respuestaComprobante5=($respuesta5=="B")?1:0;
	$respuestaComprobante6=($respuesta6=="B")?1:0;
	$respuestaComprobante7=($respuesta7=="B")?1:0;
	$respuestaComprobante8=($respuesta8=="D")?1:0;
	$respuestaComprobante9=($respuesta9=="B")?1:0;
	$respuestaComprobante10=($respuesta10=="A")?1:0;
	$res=$respuestaComprobante1+$respuestaComprobante2+$respuestaComprobante3+$respuestaComprobante4+$respuestaComprobante5+$respuestaComprobante6+$respuestaComprobante7+$respuestaComprobante8+$respuestaComprobante9+$respuestaComprobante10;
	$porcentaje=($res*100)/10;
	echo $res." de 10 preguntas: ".$porcentaje."<br>";

	$experiencia=calcularExperienciaNivel2($porcentaje,$experiencia);
	list($nivel,$experiencia)=calcularNivel($nivel,$experiencia);

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
	<title>Nivel 2</title>
	<link rel="stylesheet" href="CSS/nivel2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Descripción de la página">
	<meta name="keywords" content="HTML, CSS, Javascript">
	<meta name="author" content="Diego Brizuela">
</head>
<body>
	<section>
		<h1 id="nivel2">Nivel 2</h1>
			<form action="nivel2.php" method="post">
				<p>
					1. Una compañía de teléfono cobra $2 por los primeros cinco minutos de una llamada y 30 centavos por cada minuto después. Si Bill hace una llamada que dura 25 minutos
				</p>
				<p>
					¿cuánto será el costo de esa llamada?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas1" value="A">
						<span>A) $8.00</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="B">
						<span>B) $8.50</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="C">
						<span>C) $9.00</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="D">
						<span>D) $9.50</span>
					</label>
				</fieldset>
				<p>
					2. Si a = -4, y b = 3, ¿Cuál es |a - b|?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas2" value="A">
						<span>A) 1</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="B">
						<span>B) 3</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="C">
						<span>C) 4</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="D">
						<span>D) 7</span>
					</label>
				</fieldset>
				<p>
					3. Si 10 pulgadas en un mapa representan una distancia actual de 100 pies, entonces ¿qué distancia real es representada por 25 pulgadas en el mapa?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas3" value="A">
						<span>A) 25 pies</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="B">
						<span>B) 100 pies</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="C">
						<span>C) 150 pies</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="D">
						<span>D) 250 pies</span>
					</label>
				</fieldset>
				<p>
					4. Alex conduce de la ciudad A la ciudad B a una tasa de 60 kilómetros por hora. Si usa 2 galones de combustible por cada 50 millas, 
				</p>
				<p>
					¿Cuántos galones de combustible necesitará para conducir durante 5 horas y así visitar a su familia en la ciudad B? (1 milla = 1.6 kilómetros)
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas4" value="A">
						<span>A) 7.5</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas4" value="B">
						<span>B) 9.5</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas4" value="C">
						<span>C) 11.5</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas4" value="D">
						<span>D) 13.5</span>
					</label>
				</fieldset>
				<p>
					5. ¿Cuál opción muestra el orden de menor a mayor en los siguientes números?
					0.4, 1/6, 1/3, 0.16, 3/22
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas5" value="A">
						<span>A) 3/22, 0.16, 1/3, 1/6, 0.4</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas5" value="B">
						<span>B) 3/22, 0.16, 1/6, 1/3, 0.4</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas5" value="C">
						<span>C) 0.16, 3/22, 1/6, 0.4, 1/3</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas5" value="D">
						<span>D) 0.16, 3/22, 1/6, 1/3, 0.4</span>
					</label>
				</fieldset>
				<p>
					6. La siguiente tabla muestra el número de estudiantes en las clases de álgebra, biología y cálculo junto con los respectivos puntajes promedio en los exámenes finales. 
				</p>
				<p>
					¿Cuál es el puntaje promedio de las 3 clases si se redondea al número entero más cercano?
				</p>
				<img src="src/sextoEjercicioNivel2.png" alt="Imagen Tabla de Estudiantes">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas6" value="A">
						<span>A) 82</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas6" value="B">
						<span>B) 84</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas6" value="C">
						<span>C) 86</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas6" value="D">
						<span>D) 88</span>
					</label>
				</fieldset>
				<p>
					7. Hace cinco años Amy tenía tres veces más edad que Mike. Si Mike tiene 10 años ahora ¿Qué edad tiene Amy?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas7" value="A">
						<span>A) 15</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas7" value="B">
						<span>B) 20</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas7" value="C">
						<span>C) 25</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas7" value="D">
						<span>D) 30</span>
					</label>
				</fieldset>
				<p>
					8. Joe tiene un presupuesto de $300 para gastar en los días festivos. Joe decide comprar zapatos para sus nietos. Si cada par de zapatos cuesta $40 y Joe tiene n nietos 
				</p>
				<p>
					¿Cuál de las siguientes desigualdades representa la restricción presupuestaria de Joe?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas8" value="A">
						<span>A) 40n > 300</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas8" value="B">
						<span>B) 40 + n > 300</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas8" value="C">
						<span>C) 40 + n <= 300</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas8" value="D">
						<span>D) 40n <= 300</span>
					</label>
				</fieldset>
				<p>
					9. El área del círculo que se ve abajo es de 100π. ¿Cuál es el diámetro (D) del círculo?
				</p>
				<img src="src/novenoEjercicioNivel2.png" alt="Imagen del Diámetro de un Círculo">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas9" value="A">
						<span>A) 10</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas9" value="B">
						<span>B) 20</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas9" value="C">
						<span>C) 30</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas9" value="D">
						<span>D) 40</span>
					</label>
				</fieldset>
				<p>
					10. Un rectángulo está cortado a la mitad para crear dos cuadrados los cuales tienen un área de 25 cada uno.
				</p>
				<p>
					¿Cuál es el perímetro del rectángulo original?.
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas10" value="A">
						<span>A) 30</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas10" value="B">
						<span>B) 15</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas10" value="C">
						<span>C) 25</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas10" value="D">
						<span>D) 35</span>
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
