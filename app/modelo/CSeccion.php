<?php  

require_once "app/core/Database.php";
class CSeccion extends Database{
	
	private $codSec;
	private $trayecto;
	private $pnf;
	private $matricula;
	private $estado;
	private $tipo;
	private $turno;
	private $observaciones;

	public function setCodSec( $codSec ){

		$this->codSec = $codSec;
	}

	public function setTrayecto( $trayecto ){

		$this->trayecto = $trayecto;
	}

	public function setMatricula( $matricula ){

		$this->matricula = $matricula;
	}

	public function setPnf( $pnf ){

		$this->pnf = $pnf;
	}

	public function setEstado( $estado ){

		$this->estado = $estado;
	}

	public function setTipo( $tipo ){

		$this->tipo = $tipo;
	}

	public function setTurno( $turno ){

		$this->turno = $turno;
	}


	public function setObservaciones( $observaciones ){

		$this->observaciones = $observaciones;
	}

	public function getCodSec(  ){

		return $this->codSec;
	}

	public function getTrayecto(  ){

		return $this->trayecto;
	}

	public function getPnf(  ){

		return $this->pnf;
	}

	public function getMatricula( ){

		return $this->matricula;
	}

	public function getEstado( ){

		return $this->estado;
	}

	public function getTipo(  ){

		return $this->tipo;
	}

	public function getTurno(  ){

		return $this->turno;
	}


	public function getObservaciones(  ){

		return $this->observaciones;
	}

	public function listarSecciones(){

		$this->conectarBD();
		
		$sql = 'SELECT * FROM "TSecciones"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function crearSeccion(){
		$this->conectarBD();
		
		$sql = 'INSERT INTO "TSecciones"
					(
						"codSec",pnf, trayecto, 
						matricula, "estado", 
						tipo, turno, observaciones
					)
				VALUES
					(
						:codSec, :pnf, :trayecto, 
						:matricula, :estado, 
						:tipo,:turno, :observaciones
					)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->bindParam(':pnf',$this->pnf);
		$this->stmt->bindParam(':trayecto',$this->trayecto);
		$this->stmt->bindParam(':matricula',$this->matricula);
		$this->stmt->bindParam(':estado',$this->estado);
		$this->stmt->bindParam(':tipo',$this->tipo);
		$this->stmt->bindParam(':turno',$this->turno);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function consultarSeccion(){

		$this->conectarBD();
		
		$sql = 'SELECT * FROM "TSecciones" WHERE "codSec" = :codSec';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function buscarSeccion( $filtro ){

		$this->conectarBD();

		$sql = "SELECT * FROM \"TSecciones\" WHERE \"codSec\" LIKE '" . $filtro . "%' ";

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function modificarSeccion(){

		$this->conectarBD();
		
		$sql = 'UPDATE "TSecciones"
				SET 
					"trayecto" = :trayecto,
					"pnf" = :pnf,
					"matricula" = :matricula,
					"estado" = :estado, 
					"tipo" = :tipo,
					"turno" = :turno,
					"observaciones" = :observaciones
				WHERE 
					"codSec" = :codSec';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		$this->stmt->bindParam(':pnf',$this->pnf);
		$this->stmt->bindParam(':trayecto',$this->trayecto);
		$this->stmt->bindParam(':matricula',$this->matricula);
		$this->stmt->bindParam(':estado',$this->estado);
		$this->stmt->bindParam(':tipo',$this->tipo);
		$this->stmt->bindParam(':turno',$this->turno);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
    	
	}

	public function eliminarSeccion(){

		$this->conectarBD();
		
		$sql = 'DELETE FROM "TSecciones" WHERE "codSec" = :codSec';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function cambiarEstadoSeccion(){

		$this->conectarBD();
		
		$sql = 'UPDATE "TSecciones"
				SET 
					"estado" = :estado
				WHERE 
					"codSec" = :codSec';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codSec',$this->codSec);
		
		$this->stmt->bindParam(':estado',$this->estado);
		
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}
}
