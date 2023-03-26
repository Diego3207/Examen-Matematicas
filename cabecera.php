<?php
session_start();
$usuario=(isset($_SESSION["usuario"])?$_SESSION["usuario"]:"");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/cabecera.css">
	<link rel="stylesheet" href="CSS/index.css">
	<link rel="stylesheet" href="CSS/pie.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<body>
<div id="cabecera">
	<h1 name="hatMath">HAT MATH</h1>
	<div id="barraNavegacion">
		<a href="index.php">Inicio</a>
		<a href="perfil.php">Perfil</a>
		<?php if($usuario==""){ ?>
			<a href="login.php">Iniciar Sesión</a>
		<?php } ?>
		<?php if($usuario==""){ ?>
			<a href="registro.php">Registrar Sesión</a>
		<?php } ?>
		<?php if($usuario!=""){ ?>
			<div id="ex1" class="modal">
				<p>¿Seguro que quieres salir de sesión?</p>
				<a href="cerrar.php">Cerrar</a>
			</div>

			<a href="#ex1" rel="modal:open">Cerrar Sesión</a>
		<?php } ?>
	</div>
</div>
