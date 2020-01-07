<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/modelo/CHoras.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/horas/index.php";
		break;

		case 'obtenerHoras':
			
			$CHoras = new CHoras();
			$resultado = $CHoras->obtenerHoras(); 
 			echo json_encode( ['data' => $resultado] );

		break;
	}

