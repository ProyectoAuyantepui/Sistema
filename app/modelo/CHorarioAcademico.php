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

		/*var_dump($this->cedDoc);
		var_dump($this->codSec);
		var_dump($this->codUniCur);
		var_dump($this->codTie);
		var_dump($this->codAmb);

		exit();*/

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


		/* $this->conectarBD();
		$sql = "


INSERT INTO \"THorarios\"
	(\"codHor\", \"cedDoc\", \"codSec\", \"codUniCur\", \"codTie\", \"codAmb\", tipo, estado)
				VALUES 
					(
						default, 
						:cedDoc, 
						:codSec, 
						:codUniCur, 
						:codTie, 
						:codAmb,  
						:tipo, 
						:estado
					)
				";



		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':cedDoc', $this->cedDoc);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->bindParam(':codUniCur',$this->codUniCur);
		$this->stmt->bindParam(':codAmb',$this->codAmb);
		$this->stmt->bindParam(':codTie',$this->codTie);
		$this->stmt->bindParam(':tipo',1 );
		$this->stmt->bindParam(':estado',TRUE);
		$result = $this->stmt->execute();
		$this->desconectarBD();

		return $result; */
	}

	public function consultarHorarioSeccion(){

		$this->conectarBD();
		$sql = 'SELECT * FROM "THorarios" WHERE "codSec" = :codSec';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);

		$this->desconectarBD();

		/*$array_datos_horario = array();

		$array_horarios_seccion = array();

		foreach ( $result as $datos_horario ) {

			self::setCodSec( $datos_horario->codSec );
			self::setCodAmb( $datos_horario->codAmb );
			self::setCodUniCur( $datos_horario->codUniCur );
			parent::setCedDoc( $datos_horario->cedDoc );

			$array_datos_horario['codHor'] = $datos_horario->codHor;
			$array_datos_horario['codTie'] = $datos_horario->codTie;

			$array_datos_horario['docente'] = parent::docente();

			$array_datos_horario['ambiente'] = self::ambiente();

			$array_datos_horario['seccion'] = self::seccion();

			$array_datos_horario['unidad_curricular'] = self::unidCurr();

			$array_datos_horario['tipo'] = $datos_horario->tipo;

			$array_datos_horario['estado'] = $datos_horario->estado;

			$array_horarios_seccion[] = $array_datos_horario;
		}*/

		return $result;
	}

	public function consultarHorarioAmbiente(){

	}

	public function modificarHorario(){

	}

	public function unidCurrHorarioSeccion(){
		
		// split_part(s."codSec",\'-\', 1)


		$this->conectarBD();
		$sql = "SELECT 

				* 
		
				FROM 

				\"TUnidCurr\" AS uc
				
				WHERE exists
				
				   (
				     SELECT * FROM \"TSecciones\" AS s
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
				
				WHERE exists
				
				   (
				     SELECT * FROM "THorarios" AS h 
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

	public function docentesDisponibles(){

		
	}


	// public function seccion(){

	// 	$OSeccion =  new CSeccion();
	// 	$OSeccion->setCodSec( $this->codSec ); 

	// 	return $OSeccion->consultarSeccion( );
	// }


	// public function ambiente(){
	// 	$OAmbiente =  new CAmbiente();
	// 	$OAmbiente->setCodAmb( $this->codAmb ); 

	// 	return $OAmbiente->consultarAmbiente( );
	// }

	// public function unidCurr(){
	// 	$OUnidCurr =  new CUnidCurr();
	// 	$OUnidCurr->setCodUniCur( $this->codUniCur ); 

	// 	return $OUnidCurr->consultarUnidCurr( );
	// }

}

// $o = new CHorarioAcademico();

// $o->setCodSec( "PNFI-in2221" );

// var_dump( $o->consultarHorarioSeccion() );