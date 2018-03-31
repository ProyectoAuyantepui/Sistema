<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CComision.php";

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		case 'index': 

			require_once "app/vista/comisiones/index.php";
		break;

		case 'crear': 
		
			$OComision = new CComision();

			$OComision->setNombre( $_POST['nombre'] );
			$OComision->setDependencia( $_POST['dependencia'] );
			$OComision->setDescripcion( $_POST['descripcion'] );
			$resultado = $OComision->crearComision(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
		
		break;


		case 'modificar': 
		
			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$OComision->setNombre( $_POST['nombre'] );
			$OComision->setDependencia( $_POST['dependencia'] );
			$OComision->setDescripcion( $_POST['descripcion'] );
			$resultado = $OComision->modificarComision(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
			
		break;

		case 'buscar': 
		
			$OComision = new CComision();

			$resultado = $OComision->buscarComision( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
			
    		
		break;

		case 'eliminar': 
		
			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$resultado = $OComision->eliminarComision(); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
			
		break;

		case 'consultar': 
			
			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$resultado = $OComision->consultarComision(); 

			echo json_encode( ['operacion' => true , 'data' => $resultado] );
		break;

		case 'agregar-docente': 
			
			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$OComision->setCedDoc( $_POST['cedDoc'] );
			$resultado = $OComision->agregarDocente(); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}

		break;

		case 'desvincular-docente': 
			
			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$resultado = $OComision->desvincularDocente( $_POST['cedDoc'] ); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}

		break;

		case 'asignar-coordinador': 
			
			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$resultado = $OComision->asignarCoordinador( $_POST['cedDoc'] ); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
			
		break;

		case 'listar': 
		
			$OComision = new CComision();
			$comision = $OComision->listarComisiones();

			echo json_encode([ 'data' => $comision ]);
		break;

		case 'add-doc-com': 
		
			$OComision = new CComision();
			$OComision->setCodCom($_POST['codCom']);
			$docentes = $OComision->addDocCom($_POST['cedDoc']);

			echo json_encode([ 'data' => $docentes ]);
		break;


		case 'listar-docentes-por-comision': 
		
			$OComision = new CComision();
			$OComision->setCodCom($_POST['codCom']);
			$docentes = $OComision->docentes();

			echo json_encode([ 'data' => $docentes ]);
		break;

		}

