<?php 



/**
* Esta clase nos servira como helper para reportes pdf
*/

require_once "libs/dompdf/vendor/autoload.php";

use Dompdf\Dompdf;

class PdfAuyantepui extends Dompdf {

	public $titulo;
	public $nombre_plantilla;
	public $data;
	public $fecha_actual;
	public $plantilla;

	public function cargarPlantilla(  ){
		
		ob_start();
			require_once "public/pdf/" . $this->nombre_plantilla . ".php"; 
		$this->plantilla = ob_get_clean();
		$this->loadHtml( $this->plantilla );
		
	}

	public function cargarConfiguracion( $tipo = 'letter', $orientacion = 'portrait' ){
		$this->setPaper( $tipo, $orientacion );
	}
	
	public function generarPDF(  ){

		$this->cargarPlantilla();							
		$this->render();
		$this->stream( $this->titulo , ['Attachment' => 0] );
	}
}