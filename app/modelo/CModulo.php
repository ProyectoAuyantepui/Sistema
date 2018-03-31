<?php  
/*
Modelo CModulo 
Sirve para gestionar toda la informacion referente a Modulos

Instancia en 
*/
require_once "app/core/Database.php";
class CModulo extends Database{
 
	private $codMod;
	private $nombre;

	public function setCodMod( $codMod ){
		$this->codMod = $codMod;
	}

	public function setNombre( $nombre ){
		$this->nombre = $nombre;
	}

	public function getCodMod( ){
		return $this->codMod;
	}

	public function getNombre( ){
		return $this->nombre;
	}

	public function listarModulos(){

	}  

	public function consultarModulo(){
		
	}

}
