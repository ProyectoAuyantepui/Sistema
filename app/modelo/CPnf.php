<?php  

require_once "app/core/Database.php";
class CPnf extends Database{

	private $codPnf;  
	private $descripcion; 

	public function setCodPnf( $codPnf ){

		$this->codPnf = $codPnf;
	}

	public function setDescripcion( $descripcion ){

		$this->descripcion = $descripcion;
	}

	public function getCodPnf( ){

		return $this->codPnf;
	}

	public function getDescripcion( ){

		return $this->descripcion;
	}

	public function listarPnf(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TPnf"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function crearPnf(){

		$this->conectarBD();

		$sql = 'INSERT INTO "TPnf"
					("codPnf", "descripcion")
				VALUES
					(:codPnf,:descripcion)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codPnf',$this->codPnf);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function validarPnf(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TPnf" WHERE "codPnf" = :codPnf';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codPnf',$this->codPnf);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function consultarPnf(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TPnf" WHERE "codPnf" = :codPnf';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codPnf',$this->codPnf);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}
	
	public function modificarPnf(){
		
		$this->conectarBD();

		$sql = 'UPDATE "TPnf" 
				SET 
					"descripcion" = :descripcion
				WHERE 
					"codPnf" = :codPnf';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codPnf',$this->codPnf);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarPnf(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TPnf" WHERE "codPnf" = :codPnf';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codPnf',$this->codPnf);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarPnf($filtro){

		$this->conectarBD();
		$sql = "SELECT * FROM \"TPnf\" WHERE \"codPnf\" LIKE '" . $filtro . "%' ";
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}
}
