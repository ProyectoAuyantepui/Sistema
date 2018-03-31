<?php  
/*
Modelo CCatDoc 
Sirve para gestionar toda la informacion referente a Categorias de Docentes

Instancia en 
*/
require_once "app/core/Database.php";

class CCatDoc extends Database{

	private $codCatDoc; 
	private $nombre; 
	private $descripcion;  
	
	public function setCodCatDoc( $codCatDoc ){

		$this->codCatDoc = $codCatDoc;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}

	public function setDescripcion( $descripcion ){

		$this->descripcion = $descripcion;
	}

	public function getCodCatDoc(  ){

		return $this->codCatDoc;
	}

	public function getNombre(  ){

		return $this->nombre;
	}

	public function getDescripcion(  ){

		return $this->descripcion;
	}

	public function listarCatDoc(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TCatDoc"'; 
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();
		return $result;
	}

	public function crearCatDoc(){
		
		$this->conectarBD();
		
		$sql = 'INSERT INTO "TCatDoc" ("codCatDoc","nombre","descripcion")
					VALUES(default,:nombre,:descripcion)';

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
		
   

    	return $result;
	}

	public function consultarCatDoc(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TCatDoc" WHERE "codCatDoc" = :codCatDoc';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function modificarCatDoc(){
		
		$this->conectarBD();
		$sql = 'UPDATE "TCatDoc" 
					SET 
						"nombre" = :nombre,
							"descripcion" = :descripcion
					WHERE 
						"codCatDoc" = :codCatDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':descripcion',$this->descripcion);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarCatDoc(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TCatDoc" WHERE "codCatDoc" = :codCatDoc';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarCatDoc( $filtro ){
		$this->conectarBD();

		$sql = "SELECT * FROM \"TCatDoc\" WHERE \"nombre\" LIKE '" . $filtro . "%' ";

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	// public function docentes(){

	// 	$ODocente =  new CDocente();

	// 	$docentes = $ODocente->listarDocentes( );
		
	// 	$arregloDocentes = array();
	// 	foreach ($docentes as $docente) {
	// 		if ( $docente->codCatDoc == $this->codCatDoc ) {
	// 			$arregloDocentes[] = $docente;
	// 		}
	// 	}		

	// 	return $arregloDocentes;
	// }
}

//  $o = new CCatDoc();
//  $o->setCodCatDoc("C-001");
// // $o->setNombre("fdsfds");
// // $o->setDescripcion("fdsfdsf");

// // var_dump( $o->modificarCatDoc() );

// // var_dump( $o->listarCatDoc() );
//  var_dump( $o->docentes() );

