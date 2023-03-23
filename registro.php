<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="CSS/registro.css">
</head>
<body>
	<div id="credenciales">
		<div id="registro">
			Registrar sesión
		</div>
		<form action="registro.php" method="post">
			<label>
				Usuario
			</label>
			<input type="text" name="usuario">
			<label>
				Contraseña
			</label>
			<input type="text" name="contrasenia">
			<input type="submit" value="Registrar" name="botonEnviar">
		</form>
	</div>
</body>
</html>
