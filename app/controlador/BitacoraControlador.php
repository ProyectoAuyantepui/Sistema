<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/modelo/CBitacora.php";
require_once "app/modelo/CDocente.php";
require_once "app/modelo/CRol.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/bitacora/index.php";
		break;

		case 'listar';

			$OBitacora = new CBitacora();
			$bitacora = $OBitacora->listarBitacora();
			$ODocente = new CDocente();
			$ORol = new CRol();

			$array_bitacora = [];

			foreach ($bitacora["data"] as $key => $transaccion):

				$ODocente->setCedDoc( $transaccion->cedDoc );
				$datos_docente = $ODocente->consultarDocente();

				$ORol->setCodRol( $datos_docente->codRol );
				$datos_rol = $ORol->consultarRol();

			    $array_bitacora[$key]["cedula_usuario"] = $datos_docente->cedDoc; 
			    $array_bitacora[$key]["nombre_usuario"] = $datos_docente->nombre; 
			    $array_bitacora[$key]["rol_usuario"] = $datos_rol->nombre; 
			    $array_bitacora[$key]["accion"] = $transaccion->accion; 
			    $array_bitacora[$key]["fecha"] = $transaccion->fecha; 
			    $array_bitacora[$key]["hora"] = date('h:i A', strtotime($transaccion->hora));   
			    
			endforeach;

			echo json_encode( $array_bitacora );
		break;
	}

?>