<?php
error_reporting(0);
include("cabecera.php");
include("conexion.php");

$usuario=$_SESSION["usuario"];
$idUsuario=0;
$experiencia=0;
$nivel=0;
$calificacion=[];
$calcularPorcentaje=0;

$objConexion=new conexion();
$sqlConsultarUsuario="select ID_usuario,nivel,experiencia from usuario where usuario='$usuario';";
$resultadosUsuario=$objConexion->consultar($sqlConsultarUsuario);
foreach($resultadosUsuario as $usuarios){
  $idUsuario=$usuarios[0];
  $nivel=$usuarios[1];
  $experiencia=$usuarios[2];
}

switch($nivel){
  case 1:
    $calcularPorcentaje=($experiencia*100)/50;
    break;
  case 2:
    $calcularPorcentaje=($experiencia*100)/100;
    break;
}

$sqlConsultarExamen="select calificacion from examen where id_usuario='$idUsuario'";
$resultadosExamen=$objConexion->consultar($sqlConsultarExamen);
foreach($resultadosExamen as $calificaciones){
	array_push($calificacion,$calificaciones);
}
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
      <h1 id="tituloNivel">Nivel <?php echo $nivel; ?></h1>
      <h2>Usuario: <?php echo $usuario; ?></h2>
      <div id="progreso">
        <div id="barraProgreso" style="width: <?php echo $calcularPorcentaje; ?>%">
          <span id="textoBarra"><?php echo $calcularPorcentaje; ?>%</span>
        </div>
      </div>
      <span id="experiencia">
        EXP <?php echo $experiencia; ?>
      </span>
    </div>
	</div>
</body>
</html>
