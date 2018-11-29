<?php  
require_once "app/modelo/CHorario.php";

class CHorarioAcademico extends CHorario{

	private $codSec;
	private $codAmb;
	private $codUniCur;
	
	public function setCodSec( $codSec ){
		$this->codSec = $codSec;
	}
	
	public function setCodAmb( $codAmb ){
		$this->codAmb = $codAmb;
	}
	
	public function setCodUniCur( $codUniCur ){
		$this->codUniCur = $codUniCur;
	}

	public function getCodSec(  ){
		return $this->codSec;
	}
	
	public function getCodAmb(  ){
		return $this->codAmb;
	}
		
	public function getCodUniCur( ){
		return $this->codUniCur;
	}
	
	public function crearHorario(){

		$this->conectarBD();
		$sql = "INSERT INTO \"THorarios\"

				(\"codHor\", \"cedDoc\", \"codSec\", \"codUniCur\", \"codTie\", \"codAmb\", tipo, estado)

				VALUES 
				
				(default, ?, ?, ?, ?, ?, ?, ?)";

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindValue(1, $this->cedDoc);
		$this->stmt->bindValue(2, $this->codSec);
		$this->stmt->bindValue(3, $this->codUniCur);
		$this->stmt->bindValue(4, $this->codTie);
		$this->stmt->bindValue(5, $this->codAmb);
		$this->stmt->bindValue(6, $this->tipo);
		$this->stmt->bindValue(7, $this->estado);
		$result = $this->stmt->execute();
		$this->desconectarBD();

		return $result;
	}

	public function consultarAmbientesDisponibles(){
	  
	    $this->conectarBD();
	    $sql = "SELECT 
	              a.\"codAmb\"
	            FROM 
	              \"TAmbientes\" as a
	            WHERE 

	            NOT EXISTS(
	
	              SELECT 
	              * 
	              FROM 
	              \"THorarios\" as h
	              WHERE 
	              a.\"codAmb\"=h.\"codAmb\"
	              AND 
	              h.\"codTie\" IN(
	                $this->codTie
	              )
	            )";

	    $this->stmt = $this->conn->prepare($sql);
	    $this->stmt->execute(); 
	    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	    $this->desconectarBD();

	    return $result;
	}

	public function consultarHorarioSeccion(){

		$this->conectarBD();
		$sql = 'SELECT * FROM "THorarios" WHERE "codSec" = :codSec';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function consultarHorarioAmbiente(){

		$this->conectarBD();
		$sql = 'SELECT * FROM "THorarios" WHERE "codAmb" = :codAmb';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function unidCurrHorarioSeccion(){

		$this->conectarBD();
		$sql = "SELECT 
				* 
				FROM 
				\"TUnidCurr\" AS uc
				WHERE 
				EXISTS(

				    SELECT 
				    * 
				    FROM 
				    \"TSecciones\" AS s
				    WHERE 
				    uc.\"codPnf\" =  split_part(s.\"codSec\",'-', 1)
				    AND
				    uc.\"trayecto\" = s.\"trayecto\"
				    AND
				    s.\"codSec\" = :codSec
				)";

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function unidCurrAsignadas(){
		
		$this->conectarBD();
		$sql = 'SELECT 
				uc.* 
				FROM 
				"TUnidCurr" AS uc
				WHERE 
				EXISTS(
				    SELECT 
				    * 
				    FROM 
				    "THorarios" AS h 
				    WHERE 
				    uc."codUniCur" =  h."codUniCur"
				    AND 
				    h."codSec" = :codSec
				)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function docentesDisponibles(){ }
}
