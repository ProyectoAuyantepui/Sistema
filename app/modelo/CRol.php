<?php  
/*
Modelo CRol 
Sirve para gestionar toda la informacion referente a Roles

Instancia en 
*/
require_once "app/core/Database.php";
class CRol extends Database{
	
	private $codRol;
	private $nombre;
	private $observaciones;

	public function setCodRol( $codRol ){

		$this->codRol = $codRol;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}

	public function setObservaciones( $observaciones ){

		$this->observaciones = $observaciones;
	}

	public function getCodRol( ){

		return $this->codRol;
	}

	public function getNombre( ){

		return $this->nombre;
	}

	public function getObservaciones( ){

		return $this->observaciones;
	}

	
	public function consultarRol(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TRoles" WHERE "codRol" = :codRol';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol', $this->codRol);
       	$this->stmt->execute();
       	$result = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD(); 
    	return $result;
	}

	public function listarRoles(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TRoles"';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function crearRol(){

		
		$this->conectarBD();
		$sql = 'INSERT INTO "TRoles" 
					("codRol","nombre","observaciones")
				VALUES
					(:codRol,:nombre,:observaciones)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function modificarRol(){

		
		$this->conectarBD();

		$sql = 'UPDATE "TRoles" 
				SET 
					"nombre" = :nombre,
					"observaciones" = :observaciones
				WHERE 
					"codRol" = :codRol';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarRol(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TRoles" WHERE "codRol" = :codRol';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol',$this->codRol);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	// public function docentes(){

	// 	$ODocente =  new CDocente();

	// 	$docentes = $ODocente->listarDocentes( );
		
	// 	$arregloDocentes = array();
	// 	foreach ($docentes as $docente) {
	// 		if ( $docente->codRol == $this->codRol ) {
	// 			$arregloDocentes[] = $docente;
	// 		}
	// 	}		

	// 	return $arregloDocentes;
	// }
/*
	public function asignarPermisologiaBasica(){

		$this->conectarBD();
		$sql = 'INSERT INTO "TRolPerMod"
					( "codRol" , "codPer" , "codMod" , "acceso") 
				VALUES		
					( :codRol , \'P-07\'  , \'M-001\' , TRUE ), 
					( :codRol , \'P-07\'  , \'M-005\' , TRUE ),  
					( :codRol , \'P-07\'  , \'M-006\' , \'F\' ), 
					( :codRol , \'P-07\'  , \'M-007\' , \'F\' ), 
					( :codRol , \'P-07\'  , \'M-008\' , TRUE ), 
					( :codRol , \'P-05\'  , \'M-003\' , \'F\' ), 
					( :codRol , \'P-07\'  , \'M-004\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-009\' , \'F\' ), 
					( :codRol , \'P-02\'  , \'M-009\' , \'F\' ), 
					( :codRol , \'P-06\'  , \'M-009\' , \'F\' ), 
					( :codRol , \'P-04\'  , \'M-009\' , \'F\' ), 
					( :codRol , \'P-05\'  , \'M-009\' , \'F\' ),  
					( :codRol , \'P-01\'  , \'M-010\' , \'F\' ),    
					( :codRol , \'P-02\'  , \'M-010\' , \'F\' ),    
					( :codRol , \'P-03\'  , \'M-010\' , \'F\' ),    
					( :codRol , \'P-04\'  , \'M-010\' , \'F\' ),   
					( :codRol , \'P-05\'  , \'M-010\' , \'F\' ),    
					( :codRol , \'P-06\'  , \'M-010\' , \'F\' ),  
					( :codRol , \'P-01\'  , \'M-011\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-011\' , \'F\' ),    
					( :codRol , \'P-03\'  , \'M-011\' , \'F\' ),    
					( :codRol , \'P-04\'  , \'M-011\' , \'F\' ),   
					( :codRol , \'P-05\'  , \'M-011\' , \'F\' ),    
					( :codRol , \'P-01\'  , \'M-017\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-017\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-017\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-017\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-017\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-016\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-016\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-016\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-016\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-016\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-019\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-019\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-019\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-019\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-019\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-014\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-014\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-014\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-014\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-014\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-015\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-015\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-015\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-015\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-015\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-013\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-013\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-013\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-013\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-013\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-012\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-012\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-012\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-012\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-012\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-020\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-020\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-020\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-020\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-020\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-021\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-021\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-021\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-021\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-021\' , \'F\' ), 
					( :codRol , \'P-01\'  , \'M-018\' , \'F\' ),  
					( :codRol , \'P-02\'  , \'M-018\' , \'F\' ),  
					( :codRol , \'P-03\'  , \'M-018\' , \'F\' ),  
					( :codRol , \'P-04\'  , \'M-018\' , \'F\' ),  
					( :codRol , \'P-05\'  , \'M-018\' , \'F\' ), 
					( :codRol , \'P-07\'  , \'M-024\' , \'F\' ), 
					( :codRol , \'P-07\'  , \'M-023\' , \'F\' )';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol',$this->codRol);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
 
	}*/

	public function modificarPermisologia(){
		
	}

	public function consultarPermisologia(){
		$this->conectarBD();
		$sql = 'SELECT 
					r."codRol",
					r.nombre as rol_nombre,
					m."codMod",
					m.nombre as modulo_nombre

				FROM 
					"TRolMod" rm 
					INNER JOIN "TRoles" r ON r."codRol" = rm."codRol" 
					INNER JOIN "TModulos" m ON m."codMod" = rm."codMod"
				WHERE 
					r."codRol" = :codRol';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol', $this->codRol);
       	$this->stmt->execute();
       	$result = $this->stmt->fetchAll(PDO::FETCH_OBJ); 
       	$this->desconectarBD();
    	return $result;
	}	

	public function buscarRol(){
	
	}
}


// $o = new CRol();

// $o->setCodRol("R-003");

// var_dump( $o->docentes() );