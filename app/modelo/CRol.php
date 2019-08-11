<?php  

require_once "app/core/Database.php";
class CRol extends Database{
	
	private $codRol;
	private $nombre;
	private $observaciones;

	private $codPer;

	public function setCodRol( $codRol ){

		$this->codRol = $codRol;
	}

	public function setCodPer( $codPer ){

		$this->codPer = $codPer;
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

	public function getCodPer( ){

		return $this->codPer;
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
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
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
		$sql = 'SELECT * FROM "TRolPer" WHERE "codRol" = :codRol';

       	$this->stmt = $this->conn->prepare($sql);
       	$this->stmt->bindParam(':codRol', $this->codRol);
       	$this->stmt->execute(); 
       	$rol = $this->stmt->rowCount();
       	       	
       	    if ( $rol > 0 ) {

       	    	$this->desconectarBD();
       	    	return [ 

       	       		"operacion" => false,
       	       		"codigo_error" => "1" 
       	   		];   
       		}

		$sql = 'DELETE FROM "TRoles" WHERE "codRol" = :codRol';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol',$this->codRol);
     	$result = $this->stmt->execute();
       	$result = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD();
    	
    	return [
    		"operacion" =>true,
    		"data" => $result
    	];
	}


	public function asignarPermisos(){

		$this->conectarBD();
		$sql = 'INSERT INTO "TRolPer"
					( "codRol" , "codPer" ) 
				VALUES		
					( :codRol , :codPer )';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$this->stmt->bindParam(':codPer',$this->codPer);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
 
	}

	public function eliminarPermisos(){

		$this->conectarBD();
		$sql = 'DELETE FROM "TRolPer" trp WHERE trp."codPer" = :codPer AND trp."codRol" = :codRol ';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$this->stmt->bindParam(':codPer',$this->codPer);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
 
	}


	public function consultarPermisos(){

		$this->conectarBD();
		$sql = 'SELECT 
					r."codRol",
					r.nombre as rol_nombre,
					p."codPer",
					p.nombre as permiso_nombre

				FROM 
					"TRolPer" rp 
					INNER JOIN "TRoles" r ON r."codRol" = rp."codRol" 
					INNER JOIN "TPermisos" p ON p."codPer" = rp."codPer"
				WHERE 
					r."codRol" = :codRol';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codRol', $this->codRol);
       	$this->stmt->execute();
       	$num_rows = $this->stmt->rowCount();
       	$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
       	$this->desconectarBD();

       	return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function buscarRol(){ }
}
