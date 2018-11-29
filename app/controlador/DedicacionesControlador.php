<?php 

require_once "app/modelo/CDedicacion.php";

	switch($actividad){

		case 'index': 
			$ODedicacion = new CDedicacion();
			$dedicaciones = $ODedicacion->listarDedicaciones();
			require_once "app/vista/dedicaciones/index.php";	
		break;
		case 'cambiar-configuracion': 
			$array_config = $_POST["configuracion"];
			$ODedicacion = new CDedicacion();
			for ($i=0; $i < count( $array_config ); $i++) { 

				$ODedicacion->setCodDed( $array_config[$i]['codDed'] );
				$ODedicacion->setMinHor( $array_config[$i]['minHor'] );
				$ODedicacion->setMaxHor( $array_config[$i]['maxHor'] );
				$resultado = $ODedicacion->cambiarConfiguracion();
			}
		
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode(['operacion' => false]);
			}
			
		break;

		case 'listar': 
		
			$ODedicacion = new CDedicacion();
			$dedicaciones = $ODedicacion->listarDedicaciones();
			echo json_encode( $dedicaciones );
		break;

		
	}

