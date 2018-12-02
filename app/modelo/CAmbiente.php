<?php  

require_once "app/core/Database.php";
class CAmbiente extends Database{

	private $codAmb; 
	private $ubicacion; 
	private $tipo; 
	private $observaciones; 
	private $estado; 

	public function setCodAmb( $codAmb ){
		$this->codAmb = $codAmb;
	}

	public function setUbicacion( $ubicacion ){
		$this->ubicacion = $ubicacion;
	}

	public function setTipo( $tipo ){
		$this->tipo = $tipo;
	}

	public function setObservaciones( $observaciones ){
		$this->observaciones = $observaciones;
	}

	public function setEstado( $estado ){
		$this->estado = $estado;
	}


	public function getCodAmb(  ){
		return $this->codAmb;
	}

	public function getUbicacion( ){
		return $this->ubicacion;
	}

	public function getTipo( ){
		return $this->tipo;
	}

	public function getObservaciones(  ){
		return $this->observaciones;
	}

	public function getEstado(  ){
		return $this->estado;
	}

	public function crearAmbiente(){

		
		$this->conectarBD();
		
		$sql = 'INSERT INTO "TAmbientes" 
					("codAmb","ubicacion","tipo","observaciones","estado")
				VALUES
					(:codAmb,:ubicacion,:tipo,:observaciones,:estado)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
		$this->stmt->bindParam(':ubicacion',$this->ubicacion);
		$this->stmt->bindParam(':tipo',$this->tipo);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
		$this->stmt->bindParam(':estado',$this->estado);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
		
   

    	return $result;
	}

	public function modificarAmbiente(){
		
		$this->conectarBD();
		$sql = 'UPDATE "TAmbientes" 
				SET 
					"ubicacion" = :ubicacion,
					"tipo" = :tipo,
					"observaciones" = :observaciones, 
					"estado" = :estado
				WHERE 
					"codAmb" = :codAmb';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
		$this->stmt->bindParam(':ubicacion',$this->ubicacion);
		$this->stmt->bindParam(':tipo',$this->tipo);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
		$this->stmt->bindParam(':estado',$this->estado);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarAmbiente(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TAmbientes" WHERE "codAmb" = :codAmb';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}
	

	public function listarAmbientes(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TAmbientes"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}
	
	
	public function consultarAmbiente(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TAmbientes" WHERE "codAmb" = :codAmb';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function validarAmbiente(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TAmbientes" WHERE "codAmb" = :codAmb';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function buscarAmbiente($filtro){

		$this->conectarBD();

		$sql = "SELECT 
				* 
				FROM 
				\"TAmbientes\" 
				WHERE 
				\"codAmb\" LIKE '" . $filtro . "%'
				OR
				\"ubicacion\" LIKE '" . $filtro . "%' ";
		$this->stmt = $this->conn->prepare($sql);	
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}
	public function cambiarEstadoAmbiente(){

		$this->conectarBD();
		
		$sql = 'UPDATE "TAmbientes"
				SET 
					"estado" = :estado
				WHERE 
					"codAmb" = :codAmb';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
		
		$this->stmt->bindParam(':estado',$this->estado);
		
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}
}

