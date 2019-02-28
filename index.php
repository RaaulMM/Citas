
<?php

	$mod = $_GET["mod"]??"index"; //modelo
	$ope = $_GET["ope"]??"index"; //operacion (metodo del controlador)

	//importar el controlador

	require_once "controlador/controlador.$mod.php" ;
	
	//
	$nme= "controlador$mod" ;


	//crear el controlador
	$cont = new $nme();

	//Llamamos al metodo correspondiente
	if(method_exists($cont, $ope)) $cont->$ope() ;
	else
		die("ERROR") ;	
?>
