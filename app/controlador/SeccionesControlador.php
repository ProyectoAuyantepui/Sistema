<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CSeccion.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/secciones/index.php";
		break;

		case 'crear': 


			$OSeccion = new CSeccion();
			$codigo = strtoupper( $_POST['codSec'] );
			$OSeccion->setCodSec( $codigo );
			$validar = $OSeccion->validarSeccion();
			
			if ( $validar["cantidad"] > 0 ) {
	 				echo json_encode( [ "operacion" => false , "error" => "1" ] );
	 				exit();
	 			}
			$codigo = strtoupper( $_POST['codSec'] );
			$OSeccion->setCodSec( $codigo );
			$OSeccion->setPnf( $_POST['pnf'] );
			$OSeccion->setTrayecto( $_POST['trayecto'] );
			$OSeccion->setMatricula( $_POST['matricula'] );

			if ( isset( $_POST['estado'] ) ) {

				$OSeccion->setEstado( true );
			}else{

				$OSeccion->setEstado( 'F' );
			}
			
			$OSeccion->setTipo( $_POST['tipo'] );
			$OSeccion->setTurno( $_POST['turno'] );
			$OSeccion->setObservaciones( $_POST['observaciones'] );
			$resultado = $OSeccion->crearSeccion(); 

				echo json_encode( ['operacion' => true] );
		
		break;

		case 'modificar': 
		
			$OSeccion = new CSeccion();

			$OSeccion->setCodSec( $_POST['codSec'] );
			$OSeccion->setPnf( $_POST['pnf'] );
			$OSeccion->setTrayecto( $_POST['trayecto'] );
			$OSeccion->setMatricula( $_POST['matricula'] );
			if ( isset( $_POST['estado'] ) ) {

				$OSeccion->setEstado( true );
			}else{

				$OSeccion->setEstado( 'F' );
			}
			$OSeccion->setTipo( $_POST['tipo'] );
			$OSeccion->setTurno( $_POST['turno'] );
			$OSeccion->setObservaciones( $_POST['observaciones'] );
			$resultado = $OSeccion->modificarSeccion(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{

				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'cambiar-estado': 
		
			$OSeccion = new CSeccion();

			$OSeccion->setCodSec( $_POST['codSec'] );
			
			if ( $_POST['estado'] == '1' ) {

				$OSeccion->setEstado( true );
			}elseif ( $_POST['estado'] == '2' ){

				$OSeccion->setEstado( 'F' );
			}

			$resultado = $OSeccion->cambiarEstadoSeccion(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{

				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'buscar': 
			
			$OSeccion = new CSeccion();

			$resultado = $OSeccion->buscarSeccion( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
			
    		
		break;

		case 'eliminar': 
		
			$OSeccion = new CSeccion();

			$OSeccion->setCodSec( $_POST['codSec'] );

			$resultado = $OSeccion->eliminarSeccion(); 
			
			if ($resultado) {
			
				echo json_encode( ['operacion' => true] );
			}else{
				
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'consultar': 
		
			$OSeccion = new CSeccion();

			$OSeccion->setCodSec( $_POST['codSec'] );

			$resultado = $OSeccion->consultarSeccion();
			
			echo json_encode( ['data' => $resultado] );
		break;

		case 'listar': 
		
			$OSeccion = new CSeccion();

			$secciones = $OSeccion->listarSecciones();

			echo json_encode( $secciones );
		break;
	}

