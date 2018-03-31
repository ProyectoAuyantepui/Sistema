<?php  
/*
Modelo CPnf 
Sirve para gestionar toda la informacion referente a PNF

Instancia en 
*/
require_once "app/core/Database.php";
class CPnf extends Database{

	private $alias;  
	private $descripcion; 

	public function setAlias( $alias ){

		$this->alias = $alias;
	}

	public function setDescripcion( $descripcion ){

		$this->descripcion = $descripcion;
	}

	public function getAlias( ){

		return $this->alias;
	}

	public function getDescripcion( ){

		return $this->descripcion;
	}

	public function listarPnf(){
		
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TPnf"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function crearPnf(){

		
		$this->conectarBD();

		$sql = 'INSERT INTO "TPnf"
					("alias", "descripcion")
				VALUES
					(:alias,:descripcion)';

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->bindParam(':alias',$this->alias);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function consultarPnf(){
		
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TPnf" WHERE "alias" = :alias';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':alias',$this->alias);
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
					"alias" = :alias';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':alias',$this->alias);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarPnf(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TPnf" WHERE "alias" = :alias';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':alias',$this->alias);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarPnf($filtro){
		$this->conectarBD();
		$sql = "SELECT * FROM \"TPnf\" WHERE \"alias\" LIKE '" . $filtro . "%' ";


		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	// public function UnidadesCurriculares(){

	// 	$OUnidCurr =  new CUnidCurr();

	// 	$UCs = $OUnidCurr->listarUnidCurr( );

	// 	$arregloUC = [];
			
	// 	foreach ($UCs as $UnidCurr) {
	// 		if ( $UnidCurr->alias == $this->alias ) {
	// 			$arregloUC[] = $UnidCurr;
	// 		}
	// 	}

	// 	return $arregloUC;
	// }
}


$o = new CPnf();
var_dump( $o->listarPnf() );
// $o->setAlias(2);

//var_dump( $o->UnidadesCurriculares() );
