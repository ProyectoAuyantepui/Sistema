<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/core/PdfAuyantepui.php";

	switch( $actividad ){

		case 'index': 
			require_once "app/vista/reportes/index.php";
		break;

		case 'prueba':
		
			$OPdf = new PdfAuyantepui();

			$OPdf->titulo = "reporte de prueba";
			$OPdf->nombre_plantilla = "prueba";

			$OPdf->data = [
				["codAmb" => "fdsf"],
				["codAmb" => "fdsf"],
				["codAmb" => "fdsf"],
				["codAmb" => "fdsf"]
			];

			$OPdf->generarPDF();
		break;


	}

