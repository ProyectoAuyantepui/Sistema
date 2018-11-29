<?php  

require_once "app/core/Database.php";
class CPermiso extends Database{
 
	private $codPer;
	private $nombre;

	public function setCodPer( $codPer ){
		$this->codPer = $codPer;
	}

	public function setNombre( $nombre ){
		$this->nombre = $nombre;
	}

	public function getCodPer( ){
		return $this->codPer;
	}

	public function getNombre( ){
		return $this->nombre;
	}

	public function listarPermisos(){

	}  

	public function consultarPermiso(){
		
	}

}

