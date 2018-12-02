<?php  

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
    private $codDed; 
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
	
	public function setCodDed( $codDed ){

		$this->codDed = $codDed;
	}
	
	public function setCondicion( $condicion ){

		$this->condicion = $condicion;
	}
	
	public function setUsuario( $usuario ){

		$this->usuario = $usuario;
	}

	public function setCarrera( $carrera ){

		$this->carrera = $carrera;
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

	public function getCarrera(  ){

		return $this->carrera;
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
	
	public function getCodDed(  ){

		return $this->codDed;
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
        $pass_encript = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO "TDocentes"
			(
	            "cedDoc", "codCatDoc", "codRol", nombre, apellido, "fecNac", 
	            sexo, telefono, correo, direccion, "fecIng", "fecCon", "codDed", 
	            condicion, usuario, clave, estado, avatar, observaciones,carrera
        	)
		VALUES
			(	:cedDoc, :codCatDoc, :codRol, :nombre, :apellido, :fecNac, 
		        :sexo, :telefono, :correo, :direccion, :fecIng, :fecCon, :codDed, 
		        :condicion, :usuario, :clave, :estado, :avatar, :observaciones, :carrera
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
		$this->stmt->bindParam(':codDed',$this->codDed);
		$this->stmt->bindParam(':condicion',$this->condicion);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':clave',$pass_encript);
		$this->stmt->bindParam(':estado',$this->estado);
		$this->stmt->bindParam(':avatar',$this->avatar);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
		$this->stmt->bindParam(':carrera',$this->carrera);
     	$result = $this->stmt->execute();
     	$this->desconectarBD();

    	return $result;
	}

	public function validarUsuario(){
		
       	$this->conectarBD();
       	$sql = 'SELECT * FROM "TDocentes" WHERE usuario = :usuario';
       	$this->stmt = $this->conn->prepare($sql);
       	$this->stmt->bindParam(':usuario', $this->usuario);
       	$this->stmt->execute(); 
       	$numero_usuarios = $this->stmt->rowCount();

       		if ( $numero_usuarios == 0 ) {
       		    	
       		    $this->desconectarBD();
       		    return [ 

    	    		"operacion" => false,
    	    		"codigo_error" => "1" 
       		   ];   		
       		}




		$respuesta = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($respuesta as $val => $item) {
            $password = $item['password'];
            if (password_verify($datosModel['pass'], $password)) {
                $r = true;
            } else {
                $r = false;
            }
        }
        if ($r) {

            return [
                "operacion" => true,
                "data"      => $respuesta,
            ];
        } else {

            return [
                "operacion"    => false,
                "codigo_error" => "2",
            ];
        }

/*       	$sql = 'SELECT * FROM "TDocentes" WHERE clave = :clave';

       	$this->stmt = $this->conn->prepare($sql);
       	$this->stmt->bindParam(':clave', $this->clave);
       	$this->stmt->execute(); 
       	$numero_usuarios = $this->stmt->rowCount();
       	       	
       	    if ( $numero_usuarios == 0 ) {

       	    	$this->desconectarBD();
       	    	return [ 

       	       		"operacion" => false,
       	       		"codigo_error" => "2" 
       	   		];   
       		}

       	$result = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD();
    	
    	return [
    		"operacion" =>true,
    		"data" => $result
    	];*/
	}

	public function listarDocentes(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDocentes"';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
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

		public function consultarHorarioDocente(){
		
		$this->conectarBD();
		$sql = 'SELECT Doc.carrera,Doc.pregrado,Doc.postgrado,Doc.nombre AS "docNom",Doc.apellido,Doc."cedDoc",Ded.nombre as dedicacion, Doc.condicion, Cat.nombre as categoria FROM "TDocentes" as Doc INNER JOIN "TDedicaciones" as Ded ON Doc."codDed"=Ded."codDed" INNER JOIN "TCatDoc" as Cat ON Doc."codCatDoc"= Cat."codCatDoc" WHERE Doc."cedDoc" = :cedDoc';

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
			       	"fecCon"=:fecCon, "codDed"=:codDed, condicion=:condicion, usuario=:usuario, estado=:estado, 
			       	"avatar"=:avatar, "carrera"=:carrera
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
		$this->stmt->bindParam(':codDed',$this->codDed);
		$this->stmt->bindParam(':condicion',$this->condicion);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':estado',$this->estado);
		$this->stmt->bindParam(':avatar',$this->avatar);
		$this->stmt->bindParam(':carrera',$this->carrera);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
       	return $result;
	}

	public function modificarPerfil(){
				$this->conectarBD();
		$sql = 'UPDATE "TDocentes" 
				SET 
					"cedDoc"=:cedDoc, nombre=:nombre, apellido=:apellido, 
			       	"fecNac"=:fecNac, sexo=:sexo, telefono=:telefono, correo=:correo, direccion=:direccion, usuario=:usuario,"avatar"=:avatar
				WHERE 
					"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':apellido',$this->apellido);
		$this->stmt->bindParam(':fecNac',$this->fecNac);
		$this->stmt->bindParam(':sexo',$this->sexo);
		$this->stmt->bindParam(':telefono',$this->telefono);
		$this->stmt->bindParam(':correo',$this->correo);
		$this->stmt->bindParam(':direccion',$this->direccion);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':avatar',$this->avatar);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
       	return $result;
	}

public function cambiarClavePerfil(){
    
    $this->conectarBD();
    $sql = 'UPDATE "TDocentes" 
        SET 
          "clave" = :clave_nueva
        WHERE 
          "cedDoc" = :cedDoc
        AND
            "clave" = :clave_vieja';

	    $this->stmt = $this->conn->prepare($sql);
	    $this->stmt->bindParam(':cedDoc', $this->cedDoc);

	    $this->stmt->bindParam(':clave_nueva', $this->clave['clave_nueva']);
	    $this->stmt->bindParam(':clave_vieja', $this->clave['clave_vieja']);
       	$this->stmt->execute(); 
       	$clave = $this->stmt->rowCount();

       		if ( $clave == 0 ) {
       		    	
       		    $this->desconectarBD();
       		    return [ 

    	    		"operacion" => false,
    	    		"codigo_error" => "1" 
       		   ];   		
       		}
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
       	$this->desconectarBD();
    	
    	return [
    		"operacion" =>true,
    		"data" => $result
    	];
	}



	public function actualizarClave(){
		
		$this->conectarBD();
		$sql = 'UPDATE "TDocentes" 
				SET 
					"clave" = :clave
				WHERE 
					"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);

		$this->stmt->bindParam(':clave', $this->clave);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();
       	return $result;
	}

	public function buscarDocente( $filtro ){
		$this->conectarBD();

		$sql = "SELECT 
				* 
				FROM 
				\"TDocentes\" 
				WHERE 
				\"cedDoc\" LIKE '" . $filtro . "%' 
				OR
				\"nombre\" LIKE '" . $filtro . "%'
				OR
				\"apellido\" LIKE '" . $filtro . "%'
				OR
				\"usuario\" LIKE '" . $filtro . "%'
				";

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

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

		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $data;
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

		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $data;
	}

	public function secciones(  ){
		$this->conectarBD();
		$sql = 'SELECT 
				  DISTINCT "TSecciones"."codSec" , 
				  "TUnidCurr"."codUniCur", 
				  "TUnidCurr".nombre
				FROM 
				 "TSecciones", 
				 "TUnidCurr", 
				 "THorarios", 
				 "TDocentes"
				WHERE 
				  "TSecciones"."codSec" = "THorarios"."codSec" AND
				  "TUnidCurr"."codUniCur" = "THorarios"."codUniCur" AND
				  "TDocentes"."cedDoc" = "THorarios"."cedDoc" AND
				  "TDocentes"."cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);

		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute();

		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $data;
	}

	public function acti_admi_doc(  ){
		$this->conectarBD();
		$sql = 'SELECT 
				  DISTINCT "TSecciones"."codSec" , 
				  "TUnidCurr"."codUniCur", 
				  "TUnidCurr".nombre,
				  "TUnidCurr".fase,
				  "THorarios"."codAmb",
				  "TEjes".nombre as eje
				FROM 
				 "TSecciones", 
				 "TUnidCurr", 
				 "THorarios", 
				 "TDocentes",
				 "TEjes"
				WHERE 
				  "TSecciones"."codSec" = "THorarios"."codSec" AND
				  "TUnidCurr"."codUniCur" = "THorarios"."codUniCur" AND
				  "TDocentes"."cedDoc" = "THorarios"."cedDoc" AND
				  "TDocentes"."cedDoc" = :cedDoc AND 
				  "TEjes"."codEje"= "TUnidCurr"."codEje"';

		$this->stmt = $this->conn->prepare($sql);

		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute();

		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $data;
	}

	public function oaa_doc(  ){
		$this->conectarBD();
		$sql = 'SELECT 
				 "tipActAdm",observaciones,dependencia
				FROM 
				 "TActiAdmi" INNER JOIN "THorarios" ON "THorarios"."codActAdm"= "TActiAdmi"."codActAdm"
				WHERE 
				  "THorarios"."codActAdm"= "TActiAdmi"."codActAdm"';

		$this->stmt = $this->conn->prepare($sql);

		$this->stmt->execute();

		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $data;
	}
	public function consultarDependenciasDisponibles(){
		
		$this->conectarBD();
		$sql = 'SELECT 
					d.*					 
				FROM 
					"TDependencias" as d 
				WHERE NOT EXISTS (
					SELECT * FROM 
						"TDocDep" as dd 
					WHERE 
						d."codDep"= dd."codDep" 
					AND 
						dd."cedDoc"=:cedDoc
				)';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc',$this->cedDoc);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function consultarComisionesDisponibles(){
		
		$this->conectarBD();
		$sql = 'SELECT 
					c.*					 
				FROM 
					"TComisiones" as c 
				WHERE NOT EXISTS (
					SELECT * FROM 
						"TComDoc" as cd 
					WHERE 
						c."codCom"= cd."codCom" 
					AND 
						cd."cedDoc"=:cedDoc
				)';
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
       	$respuesta = $this->stmt->execute(); 
       	$this->desconectarBD();
    	
    	return $respuesta;
	}

	public function asignarComision(){
		
		$this->conectarBD();
		$sql = 'INSERT INTO "TComDoc"
					(
						"cedDoc","codCom"
					)
				VALUES
					(
						:cedDoc,:codCom
					)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
        $this->stmt->bindParam(':codCom', $this->codCom);
       	$respuesta = $this->stmt->execute(); 
       	$this->desconectarBD();
    	
    	return $respuesta;
	}

	public function validarCorreo(){
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDocentes" d WHERE d."correo" = :correo';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':correo', $this->correo);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$cantidad = $this->stmt->rowCount();
		$this->desconectarBD();

		return [
			"cantidad" => $cantidad,
			"data" => $result 
		];
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

	public function eliminarDependenciaDocente(){
		
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
