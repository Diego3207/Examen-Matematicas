<?php
error_reporting(0);
include("cabecera.php");
include("conexion.php");

$usuario=$_SESSION["usuario"];
$idUsuario=0;
$experiencia=0;
$nivel=0;
$calificacion=[];
$idCalificacion=[];
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

$sqlConsultarExamen="select ID_examen,calificacion from examen where id_usuario='$idUsuario';";
$resultadosExamen=$objConexion->consultar($sqlConsultarExamen);
foreach($resultadosExamen as $calificaciones){
  array_push($calificacion,$calificaciones["calificacion"]);
  array_push($idCalificacion,$calificaciones["ID_examen"]);
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
  <section>
      <table>
        <tr>
          <th>Intento</th>
          <th>Examen</th>
        </tr>
<?php $i=0; while($i<count($idCalificacion)){ ?>
        <tr>
          <td><?php echo $idCalificacion[$i]; ?></td>
          <td><?php echo $calificacion[$i]; ?></td>
        </tr>
<?php $i++; } ?>
      </table>
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
  </section>
</body>
</html>
