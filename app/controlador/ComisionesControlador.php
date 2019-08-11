<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CComision.php";

require_once "app/modelo/CDocente.php";

require_once "app/modelo/CDependencia.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/comisiones/index.php";
		break;

		case 'vista-crear': 
			$ODocente = new CDocente();
			$ODependencias = new CDependencia();

			$listado_de_docentes = $ODocente->listarDocentes();
			$listado_dependencias= $ODependencias->listarDependencias();
			require_once "app/vista/comisiones/crear.php";
		break;

		case 'vista-editar': 

			$OComision = new CComision();
			$ODependencias = new CDependencia();
			$OComision->setCodCom( $_GET['codCom'] );
			$comision = $OComision->consultarComision(); 
			$docentes_comision = $OComision->docentes();

			$listado_dependencias= $ODependencias->listarDependencias();
			$coordinador_comision = $OComision->coordinador();

			require_once "app/vista/comisiones/editar.php";
		break;

		case 'crear': 
		
			$OComision = new CComision();

			$OComision->setNombre( $_POST['nombre'] );
			$OComision->setDependencia( $_POST['docente_dependencia'] );
			$OComision->setDescripcion( $_POST['descripcion'] );
			$resultado = $OComision->crearComision(); 

			if ($resultado["result"]) {
				$OComision->setCodCom( $resultado["last_id"] );
				$OComision->setCedDoc( $_POST["docente_coordinador"] );
				$resultado = $OComision->asignarCoordinador( );
				echo json_encode( ['operacion' => $resultado] );
			}else{


				echo json_encode(['operacion' => false]);
			}
		
		break;


		case 'modificar': 

			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$OComision->setNombre( $_POST['nombre'] );
			$OComision->setDependencia( $_POST['editar_dependencia'] );
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
			$OComision->setCedDoc( $_POST['cedDoc'] );

			$resultado = $OComision->desvincularDocente( );

				if ($resultado) {

					echo json_encode( ['operacion' => true] );
				}else{


					echo json_encode(['operacion' => false]);
				}

			

		break;

		case 'cambiar-coordinador': 
			
			$OComision = new CComision();
			$OComision->setCodCom( $_POST['codCom'] );
			$OComision->setCedDoc( $_POST['cedDoc'] );
			$resultado = $OComision->cambiarCoordinador(  ); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
			
		break;

		case 'listarComisionesXDocente': 
		
			$OComision = new CComision();
			$OComision->setCedDoc( $_POST['cedDoc'] );
			$comisiones = $OComision->listarComisionesXDocente();

			echo json_encode( $comisiones );
		break;

		case 'listar': 
		
			$OComision = new CComision();
			$comisiones = $OComision->listarComisiones();

			echo json_encode( $comisiones );
		break;

		case 'docentes-disponibles': 
		
			$OComision = new CComision();
			$OComision->setCodCom($_POST['codCom']);
			$docentes = $OComision->docentesDisponiblesComision();

			echo json_encode([ 'data' => $docentes ]);
		break;


		case 'docentes-comision': 
		
			$OComision = new CComision();
			$OComision->setCodCom($_POST['codCom']);
	
			$docentes_comision = $OComision->docentes();

			$coordinador_comision = $OComision->coordinador();

			echo json_encode( [ "docentes" => $docentes_comision , "coordinador" => $coordinador_comision] );
		break;


		}

