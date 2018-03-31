<?php  
/*
Modelo CDocente 
Sirve para gestionar toda la informacion referente a Docentes

Instancia en 
*/
require_once "app/core/Database.php";

class CDocente extends Database{

	private $cedDoc;
	private $codCatDoc; 
	private $codRol; 
	private $nombre; 
	private $apellido; 
	private $fecNac; 
    private $sexo; 
    private $telefono; 
    private $correo; 
    private $direccion; 
    private $fecIng; 
    private $fecCon; 
    private $dedicacion; 
    private $condicion; 
    private $usuario; 
    private $clave; 
    private $estado; 
    private $avatar; 
    private $observaciones; 
	private $codDep; 
	private $codCom; 

	public function setCedDoc( $cedDoc ){

		$this->cedDoc = $cedDoc;
	}

	public function setCodCatDoc( $codCatDoc ){

		$this->codCatDoc = $codCatDoc;
	}

	public function setCodRol( $codRol ){

		$this->codRol = $codRol;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}
	
	public function setApellido( $apellido ){

		$this->apellido = $apellido;
	}
	
	public function setFecNac( $fecNac ){

		$this->fecNac = $fecNac;
	}
	
	public function setSexo( $sexo ){

		$this->sexo = $sexo;
	}
	
	public function setTelefono( $telefono ){

		$this->telefono = $telefono;
	}
	
	public function setCorreo( $correo ){

		$this->correo = $correo;
	}
	
	public function setDireccion( $direccion ){

		$this->direccion = $direccion;
	}
	
	public function setFecIng( $fecIng ){

		$this->fecIng = $fecIng;
	}
	
	public function setFecCon( $fecCon ){

		$this->fecCon = $fecCon;
	}
	
	public function setDedicacion( $dedicacion ){

		$this->dedicacion = $dedicacion;
	}
	
	public function setCondicion( $condicion ){

		$this->condicion = $condicion;
	}
	
	public function setUsuario( $usuario ){

		$this->usuario = $usuario;
	}
	
	public function setClave( $clave ){

		$this->clave = $clave;
	}

	public function setEstado( $estado ){

		$this->estado = $estado;
	}

	public function setAvatar( $avatar ){

		$this->avatar = $avatar;
	}
	
	public function setObservaciones( $observaciones ){

		$this->observaciones = $observaciones;
	}


	public function setCodDep( $codDep ){

		$this->codDep = $codDep;
	}

	public function setCodCom( $codCom ){

		$this->codCom = $codCom;
	}


	public function getCedDoc(  ){

		return $this->cedDoc;
	}

	public function getCodCatDoc(  ){

		return $this->codCatDoc;
	}

	public function getCodRol(  ){

		return $this->codRol;
	}

	public function getNombre(  ){

		return $this->nombre;
	}
	
	public function getApellido(  ){

		return $this->apellido;
	}
	
	public function getFecNac(  ){

		return $this->fecNac;
	}
	
	public function getSexo(  ){

		return $this->sexo;
	}
	
	public function getTelefono(  ){

		return $this->telefono;
	}
	
	public function getCorreo(  ){

		return $this->correo;
	}
	
	public function getDireccion(  ){

		return $this->direccion;
	}
	
	public function getFecIng(  ){

		return $this->fecIng;
	}
	
	public function getFecCon(  ){

		return $this->fecCon;
	}
	
	public function getDedicacion(  ){

		return $this->dedicacion;
	}
	
	public function getCondicion(  ){

		return $this->condicion;
	}
	
	public function getUsuario(  ){

		return $this->usuario;
	}
	
	public function getClave(  ){

		return $this->clave;
	}

	public function getEstado(  ){

		return $this->estado;
	}

	public function getAvatar( ){

		return $this->avatar;
	}
	
	public function getObservaciones(  ){

		return $this->observaciones;
	}		

	public function getCodDep(  ){

		return $this->codDep;
	}

	public function getCodCom(  ){

		return $this->codCom;
	}

public function crearDocente(){

		
		$this->conectarBD();
		$sql = 'INSERT INTO "TDocentes"
			(
	            "cedDoc", "codCatDoc", "codRol", nombre, apellido, "fecNac", 
	            sexo, telefono, correo, direccion, "fecIng", "fecCon", dedicacion, 
	            condicion, usuario, clave, estado, avatar, observaciones
        	)
		VALUES
			(	:cedDoc, :codCatDoc, :codRol, :nombre, :apellido, :fecNac, 
		        :sexo, :telefono, :correo, :direccion, :fecIng, :fecCon, :dedicacion, 
		        :condicion, :usuario, :clave, :estado, :avatar, :observaciones
            );
';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':apellido',$this->apellido);
		$this->stmt->bindParam(':fecNac',$this->fecNac);
		$this->stmt->bindParam(':sexo',$this->sexo);
		$this->stmt->bindParam(':telefono',$this->telefono);
		$this->stmt->bindParam(':correo',$this->correo);
		$this->stmt->bindParam(':direccion',$this->direccion);
		$this->stmt->bindParam(':fecIng',$this->fecIng);
		$this->stmt->bindParam(':fecCon',$this->fecCon);
		$this->stmt->bindParam(':dedicacion',$this->dedicacion);
		$this->stmt->bindParam(':condicion',$this->condicion);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':clave',$this->clave);
		$this->stmt->bindParam(':estado',$this->estado);
		$this->stmt->bindParam(':avatar',$this->avatar);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	$result = $this->stmt->execute();
     	$this->desconectarBD();

    	return $result;
	}

	public function validarDocente(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDocentes" WHERE usuario = :usuario and clave = :clave';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':usuario', $this->usuario);
        $this->stmt->bindParam(':clave', $this->clave);
       	$this->stmt->execute(); 
       	$respuesta = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD();
    	
    	return $respuesta;
	}

	public function listarDocentes(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDocentes"';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();
		return $result;
	}

	public function consultarDocente(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDocentes" d WHERE d."cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
       	$this->stmt->execute(); 
       	$result = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD();

    	return $result;
	}

	public function modificarDocente(){
				$this->conectarBD();
		$sql = 'UPDATE "TDocentes" 
				SET 
					"cedDoc"=:cedDoc, "codCatDoc"=:codCatDoc, "codRol"=:codRol, nombre=:nombre, apellido=:apellido, 
			       	"fecNac"=:fecNac, sexo=:sexo, telefono=:telefono, correo=:correo, direccion=:direccion, "fecIng"=:fecIng, 
			       	"fecCon"=:fecCon, dedicacion=:dedicacion, condicion=:condicion, usuario=:usuario, estado=:estado, 
			       	avatar=:avatar, observaciones=:observaciones
				WHERE 
					"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':apellido',$this->apellido);
		$this->stmt->bindParam(':fecNac',$this->fecNac);
		$this->stmt->bindParam(':sexo',$this->sexo);
		$this->stmt->bindParam(':telefono',$this->telefono);
		$this->stmt->bindParam(':correo',$this->correo);
		$this->stmt->bindParam(':direccion',$this->direccion);
		$this->stmt->bindParam(':fecIng',$this->fecIng);
		$this->stmt->bindParam(':fecCon',$this->fecCon);
		$this->stmt->bindParam(':dedicacion',$this->dedicacion);
		$this->stmt->bindParam(':condicion',$this->condicion);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':estado',$this->estado);
		$this->stmt->bindParam(':avatar',$this->avatar);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
       	return $result;
	}

	public function buscarDocente(){
		
	}

	// public function rol( ){
		
	// 	$ORol =  new CRol();
	// 	$ORol->setCodRol( $this->codRol ); 

	// 	return $ORol->consultarRol( );
	// }

	// public function categoria( ){

	// 	$OCatDoc =  new CCatDoc();
	// 	$OCatDoc->setCodCatDoc( $this->codCatDoc ); 

	// 	return $OCatDoc->consultarCatDoc( );
	// }

	

	public function dependencias(  ){
		$this->conectarBD();
		$sql = 'SELECT 
					dep."codDep",dep."nombre",doc."cedDoc" 
				FROM 
					"TDocDep" docdep 
				INNER JOIN "TDocentes" doc ON doc."cedDoc" = docdep."cedDoc" 
				INNER JOIN "TDependencias" dep ON dep."codDep" = docdep."codDep" 
				WHERE 
					doc."cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute();
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function comisiones(  ){
		$this->conectarBD();
		$sql = 'SELECT 
					c.* 
				FROM 
					"TComDoc" cd 
				INNER JOIN "TDocentes" d ON d."cedDoc" = cd."cedDoc" 
				INNER JOIN "TComisiones" c ON c."codCom" = cd."codCom" 
				WHERE 
					d."cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);

		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute();
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

		public function cambiarRol(  ){
		$this->conectarBD();
		$sql = 'UPDATE "TDocentes" 
				SET 
					 "codRol"=:codRol
				WHERE 
					"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);

		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute();
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

		public function eliminarDocente(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TDocentes" WHERE "cedDoc" = :cedDoc';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function asignarDependencia(){
		
		$this->conectarBD();
		$sql = 'INSERT INTO "TDocDep"
					(
						"cedDoc","codDep"
					)
				VALUES
					(
						:cedDoc,:codDep
					)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
        $this->stmt->bindParam(':codDep', $this->codDep);
       	$this->stmt->execute(); 
       	$respuesta = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD();
    	
    	return $respuesta;
	}

	public function validarCorreo(){

	}

	public function cambiarClave(){

	}

	public function cambiarEstadoDocente(){
		$this->conectarBD();
		
		$sql = 'UPDATE "TDocentes"
				SET 
					"estado" = :estado
				WHERE 
					"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		
		$this->stmt->bindParam(':estado',$this->estado);
		
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function desvincularDocDep(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TDocDep" WHERE "cedDoc" = :cedDoc AND "codDep" = :codDep';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->bindParam(':codDep',$this->codDep);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}
}
