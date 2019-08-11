<?php  

require_once "app/core/Database.php";

class CDedicacion extends Database{

	private $codDed; 
	private $nombre; 
	private $minHor; 
	private $maxHor;

	public function setCodDed( $codDed ){

		$this->codDed = $codDed;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}

	public function setMinHor( $minHor ){

		$this->minHor = $minHor;
	}

	public function setMaxHor( $maxHor ){

		$this->maxHor = $maxHor;
	}

	public function getCodDed(  ){

		return $this->codDed;
	}

	public function getNombre(  ){

		return $this->nombre;
	}

	public function getMinHor(  ){

		return $this->minHor;
	}

	public function getMaxHor(  ){

		return $this->maxHor;
	}		

	public function listarDedicaciones(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDedicaciones"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}


	public function cambiarConfiguracion(){
		
		$this->conectarBD();
		$sql = 'UPDATE "TDedicaciones" 
				SET 
					"minHor" = :minHor,
					"maxHor" = :maxHor
				WHERE 
					"codDed" = :codDed';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codDed',$this->codDed);
		$this->stmt->bindParam(':minHor',$this->minHor);
		$this->stmt->bindParam(':maxHor',$this->maxHor);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
       	return $result;
	}
}
