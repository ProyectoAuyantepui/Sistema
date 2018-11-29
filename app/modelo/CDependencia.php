<?php  

require_once "app/core/Database.php";

class CDependencia extends Database{

	private $codDep; 
	private $nombre; 
	private $descripcion; 
	private $cedDoc;

	public function setCodDep( $codDep ){

		$this->codDep = $codDep;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}

	public function setDescripcion( $descripcion ){

		$this->descripcion = $descripcion;
	}
	
	public function setCedDoc( $cedDoc ){

		$this->cedDoc = $cedDoc;
	}

	public function getCodDep(  ){

		return $this->codDep;
	}

	public function getNombre(  ){

		return $this->nombre;
	}

	public function getDescripcion(  ){

		return $this->descripcion;
	}		

	public function getCedDoc(){

		return $this->cedDoc;
	}

	public function listarDependencias(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDependencias"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function crearDependencia(){
		
		$this->conectarBD();
		
		$sql = 'INSERT INTO "TDependencias" 
					("codDep","nombre","descripcion")
				VALUES
					(default,:nombre,:descripcion)';

		$this->stmt = $this->conn->prepare($sql);

		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
		
   

    	return $result;
	}

	public function consultarDependencia(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDependencias" WHERE "codDep" = :codDep';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codDep',$this->codDep);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function modificarDependencia(){
		
		$this->conectarBD();
		$sql = 'UPDATE "TDependencias" 
				SET 
					"nombre" = :nombre,
					"descripcion" = :descripcion
				WHERE 
					"codDep" = :codDep';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codDep',$this->codDep);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
       	return $result;
	}

	public function eliminarDependencia(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TDependencias" WHERE "codDep" = :codDep';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codDep',$this->codDep);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarDependencia( $filtro ){

		$this->conectarBD();

		$sql = "SELECT * FROM \"TDependencias\" WHERE \"nombre\" LIKE '" . $filtro . "%' ";

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}


	
	public function docentes(){

		$this->conectarBD();
		$sql = 'SELECT 
					d."nombre",doc."cedDoc" from "TDependencias" d
					INNER JOIN "TDocDep" dd on d."codDep"=dd."codDep"
					INNER JOIN "TDocentes" doc on dd."cedDoc"=doc."cedDoc"
					WHERE doc."cedDoc"=:cedDoc';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute();
     	$num_rows = $this->stmt->rowCount();
     	$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
     	$this->desconectarBD();

     	return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function desvincularDocDep( $cedDoc ){
		
		$this->conectarBD();

     	$sql = 'DELETE FROM 
     				"TDocDep" 
     			WHERE 
     				"codDep" = :codDep 
     			AND 
     				"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codDep',$this->codDep);
		$this->stmt->bindParam(':cedDoc',$cedDoc);
	    $result = $this->stmt->execute();
	    $this->desconectarBD();

    	return $result;

	}
}
