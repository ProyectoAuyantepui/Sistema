<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CEje.php";
require_once "app/modelo/CBitacora.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/ejes/index.php";
		break;

		case 'crear': 
		
			$OEje = new CEje();

			$OEje->setNombre( ucwords($_POST['nombre'] ));
			$OEje->setDescripcion( $_POST['descripcion'] );

			$resultado = $OEje->crearEje(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{

				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'modificar': 
		
			$OEje = new CEje();

			$OEje->setCodEje( $_POST['codEje'] );
			$OEje->setNombre(ucwords( $_POST['nombre'] ));
			$OEje->setDescripcion( $_POST['descripcion'] );
			
			$resultado = $OEje->modificarEje(); 
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'eliminar': 
		
			$OEje = new CEje();

			$OEje->setCodEje( $_POST['codEje'] );

			$resultado = $OEje->eliminarEje(); 
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'consultar': 
		
			$OEje = new CEje();

			$OEje->setCodEje( $_POST['codEje'] );

			$resultado = $OEje->consultarEje();
			
			echo json_encode(['data' => $resultado]);
		break;

		case 'listar': 
		
			$OEje = new CEje();

			$ejes = $OEje->listarEjes();

			echo json_encode(  $ejes );
		break;

		case 'buscar': 
	 		$OEje = new CEje();

	 		$resultado = $OEje->buscarEje( $_POST['filtro'] ); 
	 		
	 		if (  $resultado  ) {
	 			
	 			echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
	 		}else{

	 			echo json_encode(['operacion' => false]);
	 		}
		break;
	}
