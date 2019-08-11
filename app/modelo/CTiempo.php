<?php  

require_once "app/core/Database.php";
class CTiempo extends Database{

	private $codTie; 
	private $codHor; 
	private $codDia;

	public function setCodTie( $codTie ){
		$this->codTie = $codTie;
	}

	public function setCodHor( $codHor ){
		$this->codHor = $codHor;
	}

	public function setCodDia( $codDia ){
		$this->codDia = $codDia;
	}

	public function getCodTie( ){
		return $this->codTie;
	}

	public function getCodHor( ){
		return $this->codHor;
	}

	public function getCodDia( ){
		return $this->codDia;
	}


	public function listarTiempo(){
		$this->conectarBD();
		$sql = 'SELECT * FROM "TTiempo"';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function listarHoras(){
		$this->conectarBD();
		$sql = 'SELECT * FROM "THoras"';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function listarHorasDia(){
		$this->conectarBD();
		$sql = "SELECT * FROM \"THoras\" WHERE \"codHor\" BETWEEN 'H-01' AND 'H-06'";

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function listarHorasTarde(){
		$this->conectarBD();
		$sql = "SELECT * FROM \"THoras\" WHERE \"codHor\" BETWEEN 'H-07' AND 'H-12'";

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function listarHorasNoche(){
		$this->conectarBD();
		$sql = "SELECT * FROM \"THoras\" WHERE \"codHor\" BETWEEN 'H-13' AND 'H-18'";

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function listarDias(){
		$this->conectarBD();
		$sql = 'SELECT * FROM "TDias"';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function consultarTiempo(){
		$conexion = new CConexion();
		$sql = 'SELECT 
				  *
				FROM 
				  "TTiempo"
				WHERE 
				  "TTiempo"."codTie" = :codTie';

		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(':codTie',$this->codTie);
		$stmt->execute(); 
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		$conexion->cerrarConexion($stmt);

		return $result;
	}
}
