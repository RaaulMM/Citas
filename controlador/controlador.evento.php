<?php 
	require_once "modelo/Database.php";
    require_once "modelo/Evento.php";

  class controladorEvento{


  	public function __construct(){
 
    }


	public function index(){

	}

	public function registro(){

		if (isset($_GET["txtDescripcion"])):

		$usu = new evento();
		$usu->setTitle($_GET["txtDescripcion"]) ;
		$usu->setColor($_GET["color"]) ;
		$usu->setStartFecha($_GET["txtFechaI"]) ;
		$usu->setEnde($_GET["txtFechaF"]) ;
		$usu->setIdUsu($_GET["idUsu"]) ;
		$usu->setIdProyecto($_GET["idPro"]) ;

		$usu->insert() ;

		header("Location: index.php?mod=index&ope=indexCalendario" );

		else:
		require_once "vista/calendario.php" ;
		endif ;
	}
  }


?>