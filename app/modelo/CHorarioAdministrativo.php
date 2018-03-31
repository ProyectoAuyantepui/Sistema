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

	public function crearHorario(){

	}

	public function modificarHorario(){

	}


	// public function actiAdmi(){
	// 	$OActiAdmi =  new CActiAdmi();
	// 	$OActiAdmi->setCodActAdm( $this->codActAdm ); 

	// 	return $OActiAdmi->consultarActiAdmi( );
	// }
}