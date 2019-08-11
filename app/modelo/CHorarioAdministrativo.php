<?php  
require_once "app/modelo/CHorario.php";

class CHorarioAdministrativo extends CHorario{

	private $codActAdm;

	public function setCodActAdm( $codActAdm ){
		$this->codActAdm = $codActAdm;
	}
	
	public function getCodActAdm(  ){
		return $this->codActAdm;
	}
}