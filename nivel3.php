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
	$respuestaComprobante1=($respuesta1=="D")?1:0;
	$respuestaComprobante2=($respuesta2=="D")?1:0;
	$respuestaComprobante3=($respuesta3=="A")?1:0;
	$respuestaComprobante4=($respuesta4=="D")?1:0;
	$respuestaComprobante5=($respuesta5=="A")?1:0;
	$respuestaComprobante6=($respuesta6=="D")?1:0;
	$respuestaComprobante7=($respuesta7=="D")?1:0;
	$respuestaComprobante8=($respuesta8=="B")?1:0;
	$respuestaComprobante9=($respuesta9=="B")?1:0;
	$respuestaComprobante10=($respuesta10=="C")?1:0;
	$res=$respuestaComprobante1+$respuestaComprobante2+$respuestaComprobante3+$respuestaComprobante4+$respuestaComprobante5+$respuestaComprobante6+$respuestaComprobante7+$respuestaComprobante8+$respuestaComprobante9+$respuestaComprobante10;
	$porcentaje=($res*100)/10;
	echo $res." de 10 preguntas: ".$porcentaje."<br>";

	$experiencia=calcularExperienciaNivel3($porcentaje,$experiencia);
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
	<title>Nivel 3</title>
	<link rel="stylesheet" href="CSS/nivel3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Descripción de la página">
	<meta name="keywords" content="HTML, CSS, Javascript">
	<meta name="author" content="Diego Brizuela">
</head>
<body>
	<section>
		<h1 id="nivel3">Nivel 3</h1>
			<form action="nivel3.php" method="post">
				<p>
					1. ¿Cuál de las siguientes expresiones es equivalente a 3x(2+5y)?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas1" value="A">
						<span>A) 3x + 5y</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="B">
						<span>B) 6x + 5y</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="C">
						<span>C) 6x + 15y</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas1" value="D">
						<span>D) 6x + 15xy</span>
					</label>
				</fieldset>
				<p>
					2. ¿Si y = 3ab + 2b<sup>3</sup>, a qué equivale y cuando a = 1 y b = 2?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas2" value="A">
						<span>A) 16</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="B">
						<span>B) 18</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="C">
						<span>C) 20</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas2" value="D">
						<span>D) 22</span>
					</label>
				</fieldset>
				<p>
					3. Factoriza: 4y(3x + 2) − 2(3x + 2)
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas3" value="A">
						<span>A) (4x - 2)(3x + 2)</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="B">
						<span>B) (3x - 2)(4y + 2)</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="C">
						<span>C) (4y + 2)(6x)</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas3" value="D">
						<span>D) (3x + 2)(4y + 2)</span>
					</label>
				</fieldset>
				<p>
					4. Durante un asesoramiento de productos rechazados en una fábrica, los inspectores asignaron una puntuación de 1 a 5 para distinguir la severidad de los defectos encontrados en los productos. 
				</p>
				<p>
					El 1 representa defectos menos severos, mientras que un 5 representa los defectos más severos. A continuación, se muestran los resultados del asesoramiento de los productos defectuosos.
				</p>
				<img src="src/cuartoEjercicioNivel3.png" alt="Imagen Cuadro de Frecuencias">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas4" value="A">
						<span>A) 1</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas4" value="B">
						<span>B) 2</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas4" value="C">
						<span>C) 3</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas4" value="D">
						<span>D) 4</span>
					</label>
				</fieldset>
				<p>
					5. ¿Cuál es la probabilidad de seleccionar un hombre de un grupo de 4 hombres y 8 mujeres?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas5" value="A">
						<span>A) 1/3</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas5" value="B">
						<span>B) 1/2</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas5" value="C">
						<span>C) 2/3</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas5" value="D">
						<span>D) 4/5</span>
					</label>
				</fieldset>
				<p>
					6. ¿Cuáles son las soluciones a la siguiente ecuación? x2 + 8x + 15 = 0
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas6" value="A">
						<span>A) (2,3)</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas6" value="B">
						<span>B) (3,5)</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas6" value="C">
						<span>C) (-2,-3)</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas6" value="D">
						<span>D) (-3,-5)</span>
					</label>
				</fieldset>
				<p>
					7. Resulve lo siguiente: (3x + 4y)(2x + 5y)=?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas7" value="A">
						<span>A) 3x<sup>2</sup> + 8xy + 20y<sup>2</sup></span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas7" value="B">
						<span>B) 3x<sup>2</sup> + 15xy + 20y<sup>2</sup></span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas7" value="C">
						<span>C) 6x<sup>2</sup> + 15xy + 20y<sup>2</sup></span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas7" value="D">
						<span>D) 6x<sup>2</sup> + 23xy + 20y<sup>2</sup></span>
					</label>
				</fieldset>
				<p>
					8. Dado f(x) = x2 + 4x − 3, encuentre f(−3)
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas8" value="A">
						<span>A) -3</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas8" value="B">
						<span>B) -6</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas8" value="C">
						<span>C) 0</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas8" value="D">
						<span>D) 18</span>
					</label>
				</fieldset>
				<p>
					9. Sofía está manejando a Texas. Ella viaja a 70 kilómetros por hora por cada 2 horas, y a 63 kilómetros por hora cada 5 horas. En un período de 7 horas ¿Cuál es la velocidad promedio de Sofía?
				</p>
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas9" value="A">
						<span>A) 64 km/h</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas9" value="B">
						<span>B) 65 km/h</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas9" value="C">
						<span>C) 66 km/h</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas9" value="D">
						<span>D) 67 km/h</span>
					</label>
				</fieldset>
				<p>
					10. La gráfica provista muestra el cambio en la velocidad de un cohete del tiempo 0 al tiempo 10.
				</p>
				<img src="src/decimoEjercicioNivel3.png" alt="Imagen Grafica del Cohete">
				<fieldset>
					<legend>Respuestas:</legend>
					<label>
						<input type="radio" name="radio_respuestas10" value="A">
						<span>A) 0 to 2</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas10" value="B">
						<span>B) 0 to 4.6</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas10" value="C">
						<span>C) 2 to 4.6</span>
					</label>
					<label>
						<input type="radio" name="radio_respuestas10" value="D">
						<span>D) 3 to 4.6</span>
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
