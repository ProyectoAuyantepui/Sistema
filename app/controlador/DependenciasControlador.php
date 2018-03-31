<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CDependencia.php";

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		case 'index': 

			require_once "app/vista/dependencias/index.php";
		break;

		case 'crear': 
		
			$ODependencia = new CDependencia();

			$ODependencia->setNombre( $_POST['nombre'] );
			$ODependencia->setDescripcion( $_POST['descripcion'] );
			$resultado = $ODependencia->crearDependencia(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
		
		break;


		case 'modificar': 
		
			$ODependencia = new CDependencia();
			$ODependencia->setCodDep( $_POST['codDep'] );
			$ODependencia->setNombre( $_POST['nombre'] );
			$ODependencia->setDescripcion( $_POST['descripcion'] );
			$resultado = $ODependencia->modificarDependencia(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
			
		break;

		case 'buscar': 
		
			$ODependencia = new CDependencia();

			$resultado = $ODependencia->buscarDependencia( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
			
    		
		break;

		case 'eliminar': 
		
			$ODependencia = new CDependencia();
			$ODependencia->setCodDep( $_POST['codDep'] );
			$resultado = $ODependencia->eliminarDependencia(); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
			
		break;

		case 'consultar': 
			
			$ODependencia = new CDependencia();
			$ODependencia->setCodDep( $_POST['codDep'] );
			$resultado = $ODependencia->consultarDependencia(); 

			echo json_encode( ['operacion' => true , 'data' => $resultado] );
		break;

		case 'listar': 
		
			$ODependencia = new CDependencia();

			echo json_encode([ 'data' => $ODependencia->listarDependencias() ]);
		break;

		case 'listar-docentes-por-dependencias': 
		
			$ODependencia = new CDependencia();
			$ODependencia->setCedDoc( $_POST['cedDoc'] );
			$docentes = $ODependencia->docentes();

			echo json_encode([ 'data' => $docentes ]);
		break;

		case 'desvincular-docente': 
			
			$ODependencia = new CDependencia();
			$ODependencia->setCodDep( $_POST['codDep'] );
			$resultado = $ODependencia->desvincularDocDep( $_POST['cedDoc'] ); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}

		break;
	}

