<?php  

require_once "app/core/Database.php";
class CEje extends Database{

	private $codEje; 
	private $nombre; 
	private $descripcion; 


	public function setCodEje( $codEje ){

		$this->codEje = $codEje;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}

	public function setDescripcion( $descripcion ){

		$this->descripcion = $descripcion;
	}

	public function getCodEje( ){

		return $this->codEje;
	}

	public function getNombre( ){

		return $this->nombre;
	}

	public function getDescripcion( ){

		return $this->descripcion;
	}

	public function listarEjes(){

		$this->conectarBD();
		$sql = 'SELECT * FROM "TEjes"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function crearEje(){
		
		$this->conectarBD();

		$sql = 'INSERT INTO "TEjes"
					("codEje", "nombre", "descripcion")
				VALUES
					( default , :nombre , :descripcion )';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function consultarEje(){

		$this->conectarBD();
		$sql = 'SELECT * FROM "TEjes" WHERE "codEje" = :codEje';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codEje',$this->codEje);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function modificarEje(){

		$this->conectarBD();

		$sql = 'UPDATE "TEjes" 
				SET 
					"nombre" = :nombre,
					"descripcion" = :descripcion
				WHERE 
					"codEje" = :codEje';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codEje',$this->codEje);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarEje(){
		$this->conectarBD();
		$sql = 'DELETE FROM "TEjes" WHERE "codEje" = :codEje';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codEje',$this->codEje);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarEje($filtro){

		$this->conectarBD();
		$sql = "SELECT * FROM \"TEjes\" WHERE \"nombre\" LIKE '" . $filtro . "%' ";


		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}
}
