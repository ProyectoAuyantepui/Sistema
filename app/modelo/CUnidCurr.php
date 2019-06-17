<?php  

require_once "app/core/Database.php";

class CUnidCurr extends Database{

	private $codUniCur; 
	private $codPnf;
	private $codEje;
	private $nombre;
	private $uniCre;
	private $trayecto;
	private $fase;
	private $htas;
	private $htis;
	private $observaciones;

	public function setCodUniCur( $codUniCur ){

		$this->codUniCur = $codUniCur;
	}

	public function setCodPnf( $codPnf ){

		$this->codPnf = $codPnf;
	}

	public function setCodEje( $codEje ){

		$this->codEje = $codEje;
	}

	public function setNombre( $nombre ){

		$this->nombre = $nombre;
	}
	public function setUniCre( $uniCre ){

		$this->uniCre = $uniCre;
	}

	public function setTrayecto( $trayecto ){

		$this->trayecto = $trayecto;
	}

	public function setFase( $fase ){

		$this->fase = $fase;
	}


	public function setHtas( $htas ){

		$this->htas = $htas;
	}

	public function setHtis( $htis ){

		$this->htis = $htis;
	}

	public function setObservaciones( $observaciones ){

		$this->observaciones = $observaciones;
	}



	public function getCodUniCur( ){

		return $this->codUniCur;
	}

	public function getCodPnf( ){

		return $this->codPnf;
	}

	public function getCodEje( ){

		return $this->codEje;
	}

	public function getNombre(  ){

		return $this->nombre;
	}
	public function getUniCre(  ){

		return $this->uniCre;
	}

	public function getTrayecto(  ){

		return $this->trayecto;
	}

	public function getFase(  ){

		return $this->fase;
	}

	public function getHtas(  ){

		return $this->htas;
	}

	public function getHtis(  ){

		return $this->htis;
	}

	public function getObservaciones(  ){

		return $this->observaciones;
	}

	public function listarUnidCurr(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TUnidCurr"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function crearUnidCurr(){
		
		$this->conectarBD();
		$sql = 'INSERT INTO "TUnidCurr" 
					( "codUniCur",nombre, "codPnf","codEje", "uniCre", trayecto, fase, htas, htis, observaciones)
				VALUES
					(:codUniCur, :nombre, :codPnf, :codEje, :uniCre,:trayecto, :fase,:htas, :htis , :observaciones)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codPnf',$this->codPnf);
		$this->stmt->bindParam(':codEje',$this->codEje);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':codUniCur',$this->codUniCur);
		$this->stmt->bindParam(':uniCre',$this->uniCre);
		$this->stmt->bindParam(':trayecto',$this->trayecto);
		$this->stmt->bindParam(':fase',$this->fase);
		$this->stmt->bindParam(':htas',$this->htas);
		$this->stmt->bindParam(':htis',$this->htis);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function validarUnidCurr(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TUnidCurr" WHERE "codUniCur" = :codUniCur';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codUniCur',$this->codUniCur);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function consultarUnidCurr(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "TUnidCurr" WHERE "codUniCur" = :codUniCur';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codUniCur',$this->codUniCur);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function modificarUnidCurr(){
		
		$this->conectarBD();
		$sql = 'UPDATE "TUnidCurr"
	   			SET 
				   "codPnf"=:codPnf,
				   "codEje"=:codEje,
				   "nombre"=:nombre,
				   "uniCre"=:uniCre, 
				   "fase"=:fase,
				   "trayecto"=:trayecto,
				   "htas"=:htas,
				   "htis"=:htis,
				   "observaciones"=:observaciones
	 			WHERE 
 					"codUniCur"=:codUniCur;';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codUniCur',$this->codUniCur);
		$this->stmt->bindParam(':nombre',$this->nombre);
		$this->stmt->bindParam(':uniCre',$this->uniCre);
		$this->stmt->bindParam(':trayecto',$this->trayecto);
		$this->stmt->bindParam(':fase',$this->fase);
		$this->stmt->bindParam(':htas',$this->htas);
		$this->stmt->bindParam(':htis',$this->htis);
		$this->stmt->bindParam(':codPnf',$this->codPnf);
		$this->stmt->bindParam(':codEje',$this->codEje);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function eliminarUnidCurr(){
		
		$this->conectarBD();
		$sql = 'DELETE FROM "TUnidCurr" WHERE "codUniCur" = :codUniCur';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codUniCur',$this->codUniCur);
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarUnidCurr( $filtro ){

		$this->conectarBD();

		$sql = "SELECT * FROM \"TUnidCurr\" WHERE \"nombre\" LIKE '" . $filtro . "%'  OR  \"codUniCur\" LIKE '" . $filtro . "%' ";

		$this->stmt = $this->conn->prepare($sql);
		
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

}
