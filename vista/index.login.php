<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<style type="text/css">
		.divcentral{
			text-align: center;
			margin-top: 50px;
		}
	</style>
</head>
<body><?php 

		 ?>
	
<div class="divcentral">

<h2>CEEP <br> Acceso Alumnado<br></h2>
<a href="index.php?mod=Usuario&ope=registro"> Crear Nuevo Usuario</a>
<br>
<br>
<form action="index.php" method="get">
	<input type="hidden" name="mod" value="Usuario">
	<input type="hidden" name="ope" value="index">
	<label>usuario</label>
	<input type="text" name="usu"><br>
	<label>contraseña</label>
	<input type="int" name="contraseña"><br>
	<button type="submit">ACCEDER</button> 
</form>
</div>
</body>
</html>
