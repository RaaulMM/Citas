<!DOCTYPE html>
<html>
<head>
	<title>UpdateUsuario</title>
	<meta charset="utf-8">

</head>
<body>

	<?php 
		if (!isset($_SESSION['usu'])){
		    header("location: ../index.php");
		  }
	?>
	<form action="index.php" method="GET">
		<input type="hidden" name="mod" value="Usuario">
		<input type="hidden" name="ope" value="update">

		

		<label>Nombre:</label>
		<input type="text" name="nombre"><br>

		<label>apellidos:</label>
		<input type="text" name="apellidos"><br>

		<label>email:</label>
		<input type="text" name="email"><br>

		<label>Usuario:</label>
		<input type="text" name="usu"><br>

		<label>Contraseña:</label>
		<input type="text" name="contraseña"><br>

		<label>dni:</label>
		<input type="text" name="dni"><br>





		<button type="submit">Registrar</button> 
	</form>

</body>
</html>