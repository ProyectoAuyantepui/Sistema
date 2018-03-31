<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CUnidCurr.php";

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		case 'index': 

			require_once "app/vista/unid-curr/index.php";
		break;

		case 'crear': 
		
			$OUnidCurr = new CUnidCurr();
			$OUnidCurr->setCodUniCur( $_POST['codUniCur'] );
			$OUnidCurr->setCodEje( 1 );
			$OUnidCurr->setCodPnf( 'PNFI' );
			$OUnidCurr->setNombre( $_POST['nombre'] );
			
			$OUnidCurr->setUniCre( $_POST['uniCre'] );
			$OUnidCurr->setTrayecto( $_POST['trayecto'] );
			$OUnidCurr->setFase( $_POST['fase'] );
			$OUnidCurr->setHtas( $_POST['htas'] );
			$OUnidCurr->setHtis( $_POST['htis'] );
			$OUnidCurr->setObservaciones( $_POST['observaciones'] );
			$resultado = $OUnidCurr->crearUnidCurr(); 
				
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
				
		break;

		case 'modificar': 
		
			$OUnidCurr = new CUnidCurr();
			$OUnidCurr->setCodUniCur( $_POST['codUniCur'] );
			$OUnidCurr->setCodEje( $_POST['codEje']);
			$OUnidCurr->setCodPnf( $_POST['codPnf']);
			$OUnidCurr->setNombre( $_POST['nombre'] );
			
			$OUnidCurr->setUniCre( $_POST['uniCre'] );
			$OUnidCurr->setTrayecto( $_POST['trayecto'] );
			$OUnidCurr->setFase( $_POST['fase'] );
			$OUnidCurr->setHtas( $_POST['htas'] );
			$OUnidCurr->setHtis( $_POST['htis'] );
			$OUnidCurr->setObservaciones( $_POST['observaciones'] );
			
			$resultado = $OUnidCurr->modificarUnidCurr(); 
				
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
				
		break;

		case 'eliminar': 
		
			$OUnidCurr = new CUnidCurr();

			$OUnidCurr->setCodUniCur( $_POST['codUniCur'] );

			$resultado = $OUnidCurr->eliminarUnidCurr(); 
				
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'consultar': 
		
			$OUnidCurr = new CUnidCurr();

			$OUnidCurr->setCodUniCur( $_POST['codUniCur'] );

			$resultado = $OUnidCurr->consultarUnidCurr();
				
			echo json_encode( ['data' => $resultado] );
		break;


		

		case 'listar': 
		
			$OUnidCurr = new CUnidCurr();

			$uniCur = $OUnidCurr->listarUnidCurr();

			echo json_encode(['data' => $uniCur]);
		break;
		
			case 'buscar': 
		
			$OUnidCurr = new CUnidCurr();

			$resultado = $OUnidCurr->buscarUnidCurr( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
    		
		break;
	}
