<?php  
/*
Modelo CComisione 
Sirve para gestionar toda la informacion referente a Comisiones de Docentes
*/
require_once "app/core/Database.php";
class CComision extends Database{

	private $codCom;
	private $cedDoc;	
	private $nombre;
	private $dependencia;
	private $descripcion; 

	public function setCodCom( $codCom ){

		$this->codCom = $codCom;
	}

		public function setCedDoc( $cedDoc ){

		$this->cedDoc = $cedDoc;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}

	public function setDependencia( $dependencia  ){

		$this->dependencia = $dependencia ;
	}

	public function setDescripcion( $descripcion ){

		$this->descripcion = $descripcion;
	}

	public function getCodCom(  ){

		return $this->codCom;
	}

	public function getNombre(  ){

		return $this->nombre;
	}

	public function getDependencia(   ){

		return $this->dependencia;
	}

	public function getDescripcion(  ){

		return $this->descripcion;
	}

		public function getCedDoc(){

		return $this->codCom;
	}

	public function listarComisionesXDocente(){
		
		$this->conectarBD();
		$sql = 'SELECT 
		c.*,cd.*
		FROM 
		"TComDoc" cd 
		INNER JOIN "TDocentes" d ON d."cedDoc" = cd."cedDoc" 
		INNER JOIN "TComisiones" c ON c."codCom" = cd."codCom" 
		WHERE 
		d."cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);

		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute();

		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $data;
	}

	public function listarComisiones(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TComisiones"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function docentesDisponiblesComision(){

		$this->conectarBD();
		$sql = 'SELECT 
					nombre, "cedDoc" 
				FROM 
					"TDocentes" as d 
				WHERE NOT EXISTS (
					SELECT * FROM 
						"TComDoc" as cd 
					WHERE 
						d."cedDoc"= cd."cedDoc" 
					AND 
						cd."codCom"=:codCom
				)';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();
		return $result;
	}	
	
	public function crearComision(){
		
		$this->conectarBD();
		
		$sql = 'INSERT INTO 
					"TComisiones" ("codCom","nombre","dependencia","descripcion")
				VALUES
					(default,:nombre,:dependencia,:descripcion)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':dependencia',$this->dependencia);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	$result = $this->stmt->execute();
     	$last_id = $this->conn->lastInsertId();
       	$this->desconectarBD();
		
    	return [ "result" => $result , "last_id" => $last_id ];
	}

	public function consultarComision(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TComisiones" WHERE "codCom" = :codCom';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function modificarComision(){
		
		$this->conectarBD();
		$sql = 'UPDATE "TComisiones" 
				SET 
					"nombre" = :nombre,
					"dependencia" = :dependencia,
					"descripcion" = :descripcion
				WHERE 
					"codCom" = :codCom';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':dependencia',$this->dependencia);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarComision(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TComisiones" WHERE "codCom" = :codCom';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarComision( $filtro ){

		$this->conectarBD();

		$sql = "SELECT * FROM \"TComisiones\" WHERE \"nombre\" LIKE '" . $filtro . "%' OR  \"dependencia\" LIKE '" . $filtro . "%' ";

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function agregarDocente( ){
		
		$this->conectarBD();
		
		$sql = 'INSERT INTO "TComDoc" 
					("codCom","cedDoc","coordinador")
				VALUES
					(:codCom,:cedDoc,FALSE)';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
	
    	return $result;
	}

	public function docentes(){

		$this->conectarBD();
		$sql = 'SELECT 
					d.* , cd.*
				FROM 
					"TComDoc" cd 
					INNER JOIN "TDocentes" d ON d."cedDoc" = cd."cedDoc" 
					INNER JOIN "TComisiones" c ON c."codCom" = cd."codCom" 
				WHERE 
					cd."codCom" = :codCom';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->execute();
     	$num_rows = $this->stmt->rowCount();
     	$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
     	$this->desconectarBD();

     	return $data;
	}

	public function coordinador(){
		
		$this->conectarBD();
		$sql = 'SELECT 
					d.* 
				FROM 
					"TComDoc" cd 
					INNER JOIN "TDocentes" d ON d."cedDoc" = cd."cedDoc" 
					INNER JOIN "TComisiones" c ON c."codCom" = cd."codCom" 
				WHERE 
					cd."codCom" = :codCom AND cd."coordinador" = TRUE
				GROUP BY (d."cedDoc")';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->execute();
     	$result = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD();

    	return $result;
		
	}

	public function cambiarCoordinador(  ){
		
		$this->conectarBD();
		$sql = 'UPDATE "TComDoc" SET "coordinador" = FALSE WHERE "codCom" = :codCom';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
     	$result = $this->stmt->execute();

     	if ( $result ) {
     		$sql = 'UPDATE "TComDoc" 
     				SET 
     					"coordinador" = TRUE 
     				WHERE 
     					"codCom" = :codCom AND 
     					"cedDoc" = :cedDoc';
			$this->stmt = $this->conn->prepare($sql);
			$this->stmt->bindParam(':codCom',$this->codCom);
			$this->stmt->bindParam(':cedDoc',$this->cedDoc);
	     	$result2 = $this->stmt->execute();
	     	$this->desconectarBD();

    		return $result2;
     	}
  
       	$this->desconectarBD();
    	
    	return $result;
	}

	public function asignarCoordinador( ){
		
		$this->conectarBD();
		$sql = 'INSERT INTO 
					"TComDoc"
				("codCom", "cedDoc", coordinador)
					VALUES 
				(:codCom, :cedDoc, TRUE)';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
     	$result = $this->stmt->execute();
  
       	$this->desconectarBD();
    	
    	return $result;
	}

	public function desvincularDocente(  ){
		
		$this->conectarBD();

     	$sql = 'DELETE FROM 
     				"TComDoc" 
     			WHERE 
     				"codCom" = :codCom 
     			AND 
     				"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCom',$this->codCom);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
	    $result = $this->stmt->execute();
	    $this->desconectarBD();

    	return $result;

	}
}
