<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/modelo/CPnf.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/pnf/index.php";
		break;

		case 'crear': 
		
			$OPnf = new CPnf();

			$OPnf->setCodPnf( strtoupper($_POST['codPnf'] ));
	 			$validar = $OPnf->validarPnf();

	 		if ( $validar["cantidad"] > 0 ) {
	 			echo json_encode( [ "operacion" => false , "error" => "1" ] );
	 			exit();
	 		}
			$OPnf->setDescripcion( $_POST['descripcion'] );

			$resultado = $OPnf->crearPnf(); 
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'modificar': 
		
			$OPnf = new CPnf();

			$OPnf->setCodPnf( strtoupper($_POST['codPnf'] ));
			$OPnf->setDescripcion( $_POST['descripcion'] );
			
			$resultado = $OPnf->modificarPnf(); 
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			

		break;

		case 'eliminar': 
		
			$OPnf = new CPnf();

			$OPnf->setCodPnf( $_POST['codPnf'] );

			$resultado = $OPnf->eliminarPnf(); 
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'consultar': 
		
			$OPnf = new CPnf();

			$OPnf->setCodPnf( $_POST['codPnf'] );

			$resultado = $OPnf->consultarPnf();
			
			echo json_encode(['data' => $resultado]);
		break;

		case 'listar': 
		
			$OPnf = new CPnf();

			$pnf = $OPnf->listarPnf();

			echo json_encode( $pnf );
		break;

		case 'buscar': 
			$OPnf = new CPnf();

			$resultado = $OPnf->buscarPnf( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
    		
		break;
	}

