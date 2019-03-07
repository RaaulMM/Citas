<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuarios</title>
	<meta charset="utf-8">
</head>
 

<body>
	
<?php 
	session_start();
		if (!isset($_SESSION['usu'])){
		    header("location: ../index.php");
		  }
	?>

	<h1>Usuarios</h1>

	<h3>
		<a href="index.php?mod=Usuario&ope=registro"> Crear Usuario</a>
	</h3>

	<ul>
		<?php 
		
		foreach ($datos as $item) :
		?>
		<li>
			<?= $item->getNombre(); ?> - [
			
			<a href="">editar</a> |
			<a href="index.php?mod=Usuario&ope=delete&idUsu=<?= $item->getId(); ?>">borrar</a> ]

		</li>
		<?php
			endforeach;
		?>
	</ul>
</body>
</html>