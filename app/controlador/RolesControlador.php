<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CRol.php";

// switch case a la variable actividad que recibimos en el index.php por get

	switch($actividad){

		case 'index': 

			require_once "app/vista/roles/index.php";
		break;

		case 'crear': 
		
			$codigo = "R-".rand();

			$ORol = new CRol();

			$ORol->setCodRol( $codigo );
			$ORol->setNombre( $_POST['nombre'] );
			$ORol->setObservaciones( $_POST['observaciones'] );	

			$resultadoRol = $ORol->crearRol(); 
				
			if ($resultadoRol) {
				
				$resPermisologia = $ORol->asignarPermisologiaBasica(); 

				if ( $resPermisologia ) {

					echo json_encode( ['operacion' => true] );
				}

			}else{

				
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'modificar': 
		
			$ORol = new CRol();

			$ORol->setCodRol( $_POST['codRol'] );
			$ORol->setNombre( $_POST['nombre'] );
			$ORol->setObservaciones( $_POST['observaciones'] );
			
			$resultado = $ORol->modificarRol(); 
			
			if ($resultado) {
				
				echo json_encode( ['operation' => true] );
			}else{
				echo json_encode( ['operation' => false] );
			}
			
		break;

		case 'eliminar': 
		
			$ORol = new CRol();

			$ORol->setCodRol( $_POST['codRol'] );

			$resultado = $ORol->eliminarRol(); 
			
			if ($resultado) {
				echo json_encode( ['operation' => true] );
			}else{
				echo json_encode( ['operation' => false] );
			}
			
		break;

		case 'consultar': 
		
			$ORol = new CRol();

			$ORol->setCodRol( $_POST['codRol'] );

			$resultado = $ORol->consultarRol();
			
			echo json_encode(['data' => $resultado]);
		break;

		case 'listar': 
		
			$ORol = new CRol();

			$roles = $ORol->listarRoles(); 
				
			echo json_encode(['data' => $roles]);
		break;
	}
