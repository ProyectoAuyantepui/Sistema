<?php  

require_once "app/core/Database.php";
require_once "CEsteganografia.php";

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
	private $imgPerfil; 
	private $observaciones; 
	private $codDep; 
	private $codCom; 
	private $imgSte; 

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
	
	public function setClave( $clave ){

		$this->clave = $clave;
	}

	public function setEstado( $estado ){

		$this->estado = $estado;
	}

	public function setImgPerfil( $imgPerfil ){

		$this->imgPerfil = $imgPerfil;
	}

	public function setIntentos( $intentos ){

		$this->intentos = $intentos;
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

	public function setImgSte( $imgSte ){

		$this->imgSte = $imgSte;
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

	public function getImgPerfil( ){

		return $this->imgPerfil;
	}

	public function getIntentos( ){

		return $this->intentos;
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

	public function getImgSte(  ){

		return $this->imgSte;
	}

	public function crearDocente(){

		
		$this->conectarBD();
		$pass_encript = password_hash($this->clave, PASSWORD_DEFAULT);

		$sql = 'INSERT INTO "TDocentes"
		(
		"cedDoc", "codCatDoc",nombre, apellido, "fecNac", 
		sexo, telefono, correo, direccion, "fecIng", "fecCon", "codDed", 
		condicion, estado, avatar, observaciones
		)
		VALUES
		(	:cedDoc, :codCatDoc, :nombre, :apellido, :fecNac, 
		:sexo, :telefono, :correo, :direccion, :fecIng, :fecCon, :codDed, 
		:condicion, :estado, :avatar, :observaciones
		);
		';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
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
		$this->stmt->bindParam(':estado',$this->estado);
		$this->stmt->bindParam(':avatar',$this->imgPerfil);
		$this->stmt->bindParam(':observaciones',$this->observaciones);

		$result = $this->stmt->execute();

		$sql = 'INSERT INTO "TUsuarios"
		(
		"cedDoc", "usuario", clave , "codRol"
		)
		VALUES
		(	:cedDoc, :usuario, :clave, :codRol
		);
		';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':clave',$pass_encript);
		$result = $this->stmt->execute();

		$this->desconectarBD();

		return $result;
	}

	public function validarUsuario(){	
		$this->conectarBD();
		$sql = 'SELECT * FROM "TUsuarios" WHERE usuario = :usuario';
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
		$sql = 'SELECT * FROM "TDocentes" AS D INNER JOIN "TUsuarios" AS U ON D."cedDoc"=U."cedDoc" WHERE U."usuario" = :usuario';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':usuario', $this->usuario);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		$password = $result['clave'];
		$intentos= 	$result['intentos'];
		if (password_verify($_POST["clave"], $password)) {
			$comprobacion = true;
		} else {
				return [ 
					"operacion" => false,
					"codigo_error" => "2" 
				]; 
			exit();
		}
		$cedula=$result["cedDoc"];   
		if ($comprobacion) {
		$sql = 'SELECT status FROM "TUsuarios" U WHERE U."usuario" = :usuario';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':usuario', $this->usuario);
		$this->stmt->execute(); 
		$resultStatus = $this->stmt->fetch(PDO::FETCH_ASSOC);
			if ($resultStatus["status"]==false) {   	
				$this->desconectarBD();
				return [ 
					"operacion" => false,
					"codigo_error" => "4" 
				];   
				exit();
			}else{
				return [
					"operacion" => true,
					"data"      => $result
				];
			}
		}
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
		$sql = 'SELECT * FROM "TDocentes" d INNER JOIN "TUsuarios" u ON d."cedDoc"=u."cedDoc"  WHERE d."cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function consultarHorarioDocente(){
		
		$this->conectarBD();
		$sql = 'SELECT Doc.nombre AS "docNom",Doc.apellido,Doc."cedDoc",Ded.nombre as dedicacion, Doc.condicion, Cat.nombre as categoria FROM "TDocentes" as Doc INNER JOIN "TDedicaciones" as Ded ON Doc."codDed"=Ded."codDed" INNER JOIN "TCatDoc" as Cat ON Doc."codCatDoc"= Cat."codCatDoc" WHERE Doc."cedDoc" = :cedDoc';

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
		"cedDoc"=:cedDoc, "codCatDoc"=:codCatDoc, nombre=:nombre, apellido=:apellido, 
		"fecNac"=:fecNac, sexo=:sexo, telefono=:telefono, correo=:correo, direccion=:direccion, "fecIng"=:fecIng, 
		"fecCon"=:fecCon, "codDed"=:codDed, condicion=:condicion, estado=:estado
		WHERE 
		"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':codCatDoc',$this->codCatDoc);
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
		$this->stmt->bindParam(':estado',$this->estado);
		$result = $this->stmt->execute();
		$sqlUser = 'UPDATE "TUsuarios" 
		SET 
		"usuario"=:usuario, "codRol"=:codRol
		WHERE 
		"cedDoc" = :cedDoc';
		$this->stmt = $this->conn->prepare($sqlUser);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$result2 = $this->stmt->execute();
		$this->desconectarBD();
		return $result;
	}



	public function bloquearUsuario(){
		$this->conectarBD();
		$sql = 'UPDATE "TUsuarios" 
		SET 
		status=false
		WHERE 
		usuario = :usuario';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':usuario', $this->usuario);
		$result = $this->stmt->execute();
		$this->desconectarBD();
		return $result;
	}

	public function desbloquearUsuario(){
		$this->conectarBD();
		$sql = 'UPDATE "TUsuarios" 
		SET 
		status=true
		WHERE 
		usuario = :usuario';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':usuario', $this->usuario);
		$result = $this->stmt->execute();
		$this->desconectarBD();
		return $result;
	}

	public function modificarPerfil(){
		$this->conectarBD();
		$sql = 'UPDATE "TDocentes" 
		SET 
		"cedDoc"=:cedDoc, nombre=:nombre, apellido=:apellido, 
		"fecNac"=:fecNac, sexo=:sexo, telefono=:telefono, correo=:correo, direccion=:direccion, "avatar"=:avatar
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
		$this->stmt->bindParam(':avatar',$this->imgPerfil);
		$result = $this->stmt->execute();
		$sqlUser = 'UPDATE "TUsuarios" 
		SET 
		"usuario"=:usuario, "codRol"=:codRol
		WHERE 
		"cedDoc" = :cedDoc';
		$this->stmt = $this->conn->prepare($sqlUser);
		$this->stmt->bindParam(':usuario',$this->usuario);
		$this->stmt->bindParam(':codRol',$this->codRol);
		$result2 = $this->stmt->execute();
		$this->desconectarBD();
		return $result;
	}

	public function actualizarImgPerfil(){
		$uploads_dir = 'public/img/perfil/';
		$tmp_name = $this->imgPerfil["tmp_name"];
        $name = $this->imgPerfil["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
		$this->conectarBD();
		$sql = 'UPDATE "TUsuarios" 
		SET 
		usuario=:usuario,"imgPerfil"=:imgPerfil
		WHERE 
		usuario = :usuario';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':usuario', $this->usuario);
		$this->stmt->bindParam(':imgPerfil',$this->imgPerfil['name']);
		$result = $this->stmt->execute();
		$this->desconectarBD();
		return $result;
	}

	public function viewImgPerfil(){
		$this->conectarBD();
		$sql = 'SELECT "imgPerfil" FROM "TUsuarios" u WHERE u."cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function cambiarClavePerfil(){
		$this->conectarBD();
		$sql = 'SELECT clave FROM "TUsuarios" AS U WHERE U."cedDoc" = :cedDoc';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		$password = $result['clave'];
		if (password_verify($this->clave['clave_vieja'], $password)) {
			$comprobacion = true;
		}
		if(isset($comprobacion)){
				$pass_encript = password_hash($this->clave['clave_nueva'], PASSWORD_DEFAULT);
				$this->conectarBD();
				$sql = 'UPDATE "TUsuarios" 
				SET 
				"clave" = :clave_nueva
				WHERE 
				"cedDoc" = :cedDoc'
				;

				$this->stmt = $this->conn->prepare($sql);
				$this->stmt->bindParam(':cedDoc', $this->cedDoc);

				$this->stmt->bindParam(':clave_nueva', $pass_encript);
				$this->stmt->execute(); 
				$clave = $this->stmt->rowCount();

				return [
					"operacion" =>true,
					"data" => $result
				];

			$this->desconectarBD();
		}else{
			return [ 

				"operacion" => false,
				"codigo_error" => "1" 
			];   		
		}
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

	}



	public function actualizarClave(){

		$pass_encript = password_hash($this->clave, PASSWORD_DEFAULT);
		$this->conectarBD();
		$sql = 'UPDATE "TUsuarios" 
		SET 
		"clave" = :clave,
		"status" = TRUE
		WHERE 
		"cedDoc" = :cedDoc';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':clave', $pass_encript);
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

public function linkDataImgSte (){
	$this->conectarBD();
	$OSte = new Esteganografia();
	$sql = 'SELECT clave FROM "TUsuarios" d WHERE d."cedDoc" = :cedDoc';
	$this->stmt = $this->conn->prepare($sql);
	$this->stmt->bindParam(':cedDoc', $this->cedDoc);
	$this->stmt->execute(); 
	$textoEncript=$this->stmt->fetch(PDO::FETCH_ASSOC);
	$textoEncriptPosition=$textoEncript['clave'];
	$img=$this->imgSte;
	$linkDataImgSte = $OSte->obtenerDatos($textoEncriptPosition,$img);
}

function unlinkDataImgSte($img){
	$data='';
	$OSte = new Esteganografia();
	$nx=imagesx($img);	$ny=imagesy($img);
	for($x=0; $x<$nx; $x++ )
		{ for($y=0; $y<$ny; $y++)
			{ 	
				$pix = $OSte->obtenerColor($img,$x,$y);
				$data.=($pix['R']&1).($pix['G']&1).($pix['B']&1);
			}
		}
		$respuesta=$OSte->extraerDataBinario($data);
		return $respuesta;
	}

	public function obbPassUserSte (){
		$this->conectarBD();
		$sql = 'SELECT clave FROM "TUsuarios" d WHERE d."cedDoc" = :cedDoc';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->execute(); 
		return $textoEncript=$this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function comparedPass($claveUser){
		if (password_verify($this->clave, $claveUser['clave'])) {
			$comprobacion = true;
		} else {
			$comprobacion = false;
		}
		return $comprobacion;
	}
}
