<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/modelo/CActiAdmi.php";
require_once "app/modelo/CBitacora.php";
	
	switch($actividad){

		case 'index': 

			require_once "app/vista/acti-admi/index.php";
		break;

		case 'crear': 
		
			$OActiAdmi = new CActiAdmi();
			
			$OActiAdmi->setTitulo( ucfirst($_POST['titulo'] ));
			$OActiAdmi->setObservaciones( $_POST['observaciones'] );
			$OActiAdmi->setDependencia( $_POST['dependencia'] );
			$OActiAdmi->setTipActAdm( $_POST['tipActAdm'] );

			$resultado = $OActiAdmi->crearActiAdmi(); 
			
			if ($resultado) {
				$OBitacora = new CBitacora();
				$OBitacora->setAccion("Insertar actividad administrativa : " . ucfirst($_POST['titulo'] ) . " ");
				$OBitacora->guardarTransaccion(); 
				echo json_encode( ['operacion' => true] );
			}else{
				
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'modificar': 
		
			$OActiAdmi = new CActiAdmi();

			$OActiAdmi->setcodActAdm( $_POST['codActAdm'] );
			$OActiAdmi->setTitulo( $_POST['titulo'] );
			$OActiAdmi->setObservaciones( $_POST['observaciones'] );
			$OActiAdmi->setDependencia( $_POST['dependencia'] );
			$OActiAdmi->setTipActAdm( $_POST['tipActAdm'] );
			
			$resultado = $OActiAdmi->modificarActiAdmi(); 
			
			if ($resultado) {
				
				echo json_encode(  ['operacion' => true] );
			}else{
				
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'eliminar': 
		
			$OActiAdmi = new CActiAdmi();

			$OActiAdmi->setCodActAdm( $_POST['codActAdm'] );

			$resultado = $OActiAdmi->eliminarActiAdmi(); 
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
		break;



		case 'consultar': 
		
			$OActiAdmi = new CActiAdmi();

			$OActiAdmi->setCodActAdm( $_POST['codActAdm'] );

			$resultado = $OActiAdmi->consultarActiAdmi();
			
			
			echo json_encode(['data' => $resultado]);
		break;

		case 'listar': 
		
			$OActiAdmi = new CActiAdmi();

			$OActiAdmi = $OActiAdmi->listarActiAdmi();


			echo json_encode( $OActiAdmi );
		break;

		case 'buscar': 
			$OActiAdmi = new CActiAdmi();

			$resultado = $OActiAdmi->buscarActiAdmi( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
		break;
	}

