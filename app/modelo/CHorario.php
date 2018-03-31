<?php  
/*
Modelo CHorario
Sirve para gestionar toda la informacion referente a Horarios

Instancia en 
*/

require_once "app/core/Database.php";

class CHorario extends Database{

	protected $codHor; 
	protected $cedDoc; 
	protected $codTie;
	protected $tipo;
	protected $estado; 

	public function setCodHor( $codHor ){
		$this->codHor = $codHor;
	}

	public function setCedDoc( $cedDoc ){
		$this->cedDoc = $cedDoc;
	}
	
	public function setCodTie( $codTie ){
		$this->codTie = $codTie;
	}
	
	public function setTipo( $tipo ){
		$this->tipo = $tipo;
	}
	
	public function setEstado( $estado ){
		$this->estado = $estado;
	}

	public function getCodHor(  ){
		return $this->codHor;
	}
	
	public function getCodTie(  ){
		return $this->codTie;
	}
	
	public function getTipo( ){
		return $this->tipo;
	}
	
	public function getEstado( ){
		return $this->estado;
	}



	// public function consultarHorario(){
	// 	// ESTE CONSULTAR ES QUE YO LE PASO EL CODIGO DE UN HORARIO Y EL ME RETORNA EL HORARIO
	// }

	public function consultarHorarioDocente(){
		// LE PASO UNA CEDULA Y ME RETORNA EL HORARIO DE UN DOCENTE
		
	}



	public function modificarHorario(){

	}

	public function eliminarHorario(){

	}

	public function cambiarEstadoHorario(){

	}

	public function obtenerCargaHoraria(){

	}

	// public function docente(){

	// 	$ODocente =  new CDocente();
	// 	$ODocente->setCedDoc( $this->cedDoc ); 

	// 	return $ODocente->consultarDocente( );
	// }


	// public function tiempo(){
	// 	$OTiempo =  new CTiempo();
	// 	$OTiempo->setCodTie( $this->codTie ); 

	// 	return $OTiempo->consultarTiempo( );
	// }
}






// $o = new CHorario();

// $o->setCedDoc('7776665'); 
// $o->setCodSec('GDFf1');
// $o->setCodAmb('g456');
// $o->setCodActAdm('');
// $o->setCodTie('T-40');
// $o->setCodUniCur(1);
// $o->setLapso('2-2017');
// $o->setTipo(2);
// $o->setEstado('F'); 

// var_dump( $o->crearHorario() );



// $o->setCodSec('GDFf1');
// $row = $o->consultarHorarioSeccion();

// var_dump( $row );

/*

Diferencia entre $this y self::

Uno usa $this para hacer referencia al objeto (instancia) actual, y se utiliza self:: para referenciar a la clase actual. Se utiliza $this->nombre para nombres no estáticos y se utiliza self::nombres para nombres estáticos.

*/






/*

horario

codHor
cedDoc
codTie
estado
tipo

setCodHor
setCedDoc
setTie
setEstado
setTipo

getCodHor
getCedDoc
getTie
getEstado
getTipo

asignarHorario

consultarHorario

modificarHorario

retirarHorario

cambiarEstadoHorario

docente


horario academico

codSec
codAmb
codUniCur


setCodSec
setCodAmb
setCodUniCur

getCodSec
getCodAmb
getCodUniCur


seccion
ambiente

unidadCurricular



horario administrativo

codActAdm


getCodActAdm


getCodActAdm

ActividadAdministrativa


*/