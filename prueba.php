<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Prueba</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<body>
  
<div id="ex1" class="modal">
  <p>Prueba realizada</p>
  <a href="#" rel="modal:close">Cerrar Modal</a>
</div>

<!-- Link to open the modal -->
<p><a href="#ex1" rel="modal:open">Boton</a></p>
</body>
</html>

<?php #para sugerir que si quieres salir sesión?>
					<div id="ex1" class="modal">
						¿Seguro que quieres salir de sesión?
						<a href="cerrar.php" rel=>Cerrar</a>
					</div>

					<a href="#ex1" rel="modal:open">Boton</a>
