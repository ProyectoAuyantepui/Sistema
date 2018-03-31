<?php  
/*
Modelo CTiempo 
Sirve para gestionar toda la informacion referente a Tiempo

Instancia en 
*/
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
