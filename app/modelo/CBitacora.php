<?php  

require_once "app/core/Database.php";

class CBitacora extends Database{

	private $codBit; 
	private $cedDoc; 
	private $accion;
	private $fecha;
	private $hora;

	
	public function setCodBit( $codBit ){

		$this->codBit = $codBit;
	}

	public function setCedDoc( $cedDoc ){

		$this->cedDoc = $cedDoc;
	}

	public function setAccion( $accion ){

		$this->accion = $accion;
	}

	public function setFecha( $fecha ){

		$this->fecha = $fecha;
	}

	public function setHora( $hora ){

		$this->hora = $hora;
	}


	public function getCodBit(  ){

		return $this->codBit;
	}

	public function getCedDoc(  ){

		return $this->cedDoc;
	}

	public function getAccion(  ){

		return $this->accion;
	}

	public function getFecha(  ){

		return $this->fecha;
	}

	public function getHora(  ){

		return $this->hora;
	}


	public function listarBitacora(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TBitacora"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function guardarTransaccion(){
		
		$hora_actual = date('h:i A');
		$fecha_actual = date('d-m-Y');

		$this->conectarBD();
		
		$sql = 'INSERT INTO "TBitacora" 
					("codBit","cedDoc","accion","fecha","hora")
				VALUES
					(default,:cedDoc,:accion,:fecha,:hora)';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$_SESSION["user"]["cedDoc"]);
		$this->stmt->bindParam(':accion',$this->accion);
		$this->stmt->bindParam(':fecha', $fecha_actual);
		$this->stmt->bindParam(':hora',$hora_actual);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
		
    	return $result;
	}

	public function consultarBitacora(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TBitacora" WHERE "codBit" = :codBit';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codBit',$this->codBit);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();
		return $result;
	}

	public function consultarBitacoraPorCedula(){

		$this->conectarBD();
		$sql = 'SELECT * FROM "TBitacora" WHERE "cedDoc" = :cedDoc';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();
		return $result;
	}	
}
