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

	public $plantilla;

	public function cargarPlantilla(  ){
		ob_start();
		require_once "public/pdf/" . $this->nombre_plantilla . ".php";
		$this->plantilla = ob_get_clean();
		parent::loadHtml( $this->plantilla );
	}

	public function generarPDF(  ){

		self::cargarPlantilla();
		// (Optional) Setup the paper size and orientation
		parent::setPaper('letter', 'portrait');
		// Render the HTML as PDF
		parent::render();
		// Output the generated PDF to Browser
		parent::stream( $this->titulo , ['Attachment' => 1] );
	}
}