<?php 

	require_once "Database.php" ;
	/**
	 * 
	 */
	class evento
	{
		private $id;
		private $title;
		private $color;
		private $startFecha;
		private $ende;
		private $idUsu;
		private $idProyecto;

		

		//SETTER
		public function setId($id){$this->id = $id ;}
		public function setTitle($title){$this->title = $title ;}
		public function setColor($color){$this->color = $color ;}
		public function setStartFecha($startFecha){$this->startFecha = $startFecha ;}
		public function setEnde($ende){$this->ende = $ende ;}
		public function setIdUsu($idUsu){$this->idUsu = $idUsu ;}
		public function setIdProyecto($idProyecto){$this->idProyecto = $idProyecto ;}
		//GETTER
		public function getId () {return $this->id ;}
		public function getTexto () {return $this->texto ;}
		public function getColor () {return $this->color ;}
		public function getStartFecha () {return $this->startFecha ;}
		public function getEnde () {return $this->endFecha ;}
		public function getIdUsu () {return $this->idUsu ;}
		public function getIdProyecto () {return $this->idProyecto ;}
		
		public function __contruct(){

		}

		public static function getAllEvent(){
  			$db = Database::getInstance() ;
  			$db->doQuery( "SELECT * FROM eventos"




  				/*"SELECT s.*, p.nombre ,m.denominacion
				from solicitud s 
				INNER join alumno a on a.dni = :dni and s.idAlu = a.idAlu
  				INNER JOIN profesor p ON s.idPro = p.idPro 
				INNER JOIN modulo m ON s.idMod =  m.idMod;",
				[":dni"=>$dni,]*/
			);
  			
  			$datos = [] ;
  
  			while ($item = $db->getRow("Calendario")):
  				array_push($datos, $item) ;
  			endwhile ;
  
  			//
  			return $datos ;
  		}

  		public function insert(){
			$db = Database::getInstance() ;
			$db->doQuery("INSERT INTO eventos(title,color, start, end, idUsu, idPro) VALUES (:title, :color, :start, :ende, :idUsu, :idPro) ;",
						 [":title"=>$this->title,
						  ":color"=>$this->color,
						  ":start"=>$this->startFecha,
						  ":ende"=>$this->ende,
						  ":idUsu"=>$this->idUsu,
						  ":idPro"=>$this->idProyecto,]) ;

			//header("Location: index.php?mod=index&ope=indexCalendario" );
				

		}

	public function delete(){
		$db = Database::getInstance() ;
			$db->doQuery("DELETE FROM eventos WHERE id=:idt ;",
						 [":idt"=>$id]) ;
	}





 }

?>