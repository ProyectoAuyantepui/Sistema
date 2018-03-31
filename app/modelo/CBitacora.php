<?php  
/*
Modelo CCatDoc 
Sirve para gestionar toda la informacion referente a Categorias de Docentes

Instancia en 
*/
require_once "app/core/Database.php";

class CBitacora extends Database{

	private $codBit; 
	private $cedDoc; 
	private $modulo;
	private $accion;
	private $fecha;
	private $hora;

	
	public function setCodBit( $codBit ){

		$this->codBit = $codBit;
	}

	public function setCedDoc( $cedDoc ){

		$this->cedDoc = $cedDoc;
	}

	public function setModulo( $modulo ){

		$this->modulo = $modulo;
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

	public function getModulo(  ){

		return $this->modulo;
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
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();
		return $result;
	}

	public function crearBitacora(){
		
		$this->conectarBD();
		
		$sql = 'INSERT INTO "TBitacora" 
					("codBit","cedDoc","modulo","accion","fecha","hora")
				VALUES
					(:codBit,:cedDoc,:modulo,:accion,:fecha,:hora)';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->bindParam(':modulo',$this->modulo);
		$this->stmt->bindParam(':accion',$this->accion);
		$this->stmt->bindParam(':fecha',$this->fecha);
		$this->stmt->bindParam(':hora',$this->hora);
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

	// public function docente( ){

	// 	$ODocente =  new CDocente();
	// 	$ODocente->setCedDoc( $this->cedDoc ); 

	// 	return $ODocente->consultarDocente( );
	// }


	
}
