<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
	
require_once "app/modelo/CHorario.php";
require_once "app/modelo/CBitacora.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/horarios/secciones/index.php";
		break;

		case 'asignar': 
			require_once "app/vista/horarios/secciones/asignar.php";
		break;

		case 'mostrar': 

			require_once "app/vista/horarios/secciones/mostrar.php";
		break;

		case 'editar': 

			require_once "app/vista/horarios/secciones/editar.php";
		break;

		case 'mover': 

			require_once "app/vista/horarios/secciones/mover.php";
		break;

		case 'consultar': 

			$OHorario = new CHorario();

			$OHorario->setCodSec( $_POST['codSec'] );
			$resultado = $OHorario->consultarHorarioSeccion( $_POST['fase_seleccionada'] );
			
			echo json_encode( ["data"=>$resultado ] );

		break;

		case 'consultar-actividades-por-uc': 
			
			$OHorario = new CHorario();

			$OHorario->setCodSec( $_POST['codSec'] );
			$OHorario->setCodUniCur( $_POST['codUniCur'] );

			

			$resultado = $OHorario->consultarActividadesPorUniCur();

			echo json_encode( $resultado );

		break;

		case 'cambiar-docente-horario': 
			
			$OHorario = new CHorario();

			$OHorario->setCedDoc( $_POST['cedDoc'] );
			$OHorario->setCodSec( $_POST['codSec'] );
			$OHorario->setCodUniCur( $_POST['codUniCur'] );

			

			$resultado = $OHorario->cambiarDocenteHorarioSeccion();

			echo json_encode( [ "operacion" => true ] );

		break;

		case 'cambiar-ambiente-horario':

			$OHorario = new CHorario();

			$OHorario->setCodAmb( $_POST['codAmb'] );
			$OHorario->setCodSec( $_POST['codSec'] );
			$OHorario->setCodUniCur( $_POST['codUniCur'] );
			$OHorario->setCodTie( $_POST['codTie'] );

/*			$OHorario->setCodAmb( 'G-23 ' );
			$OHorario->setCodSec( 'IN-2221' );
			$OHorario->setCodUniCur( 'PIPT269' );
			$OHorario->setCodTie( 'T-09 ' );*/

			$resultado = $OHorario->cambiarAmbienteHorarioSeccion();

			echo json_encode( [ "operacion" => true ] );

		break;

		case 'consultar-ambientes-disponibles':

			$OHorario = new CHorario();
			$valores = "";

			foreach ( $_POST["array_bloques"] as $field){

				$valores.="'".$field["codTie"]."'";
				$valores.=',';
			}

			$valores = substr($valores, 0, -1);

			$OHorario->setCodTie( $valores );
			
			$result = $OHorario->consultarAmbientesDisponibles();
			
			echo json_encode( [

				"operacion" => true,
				"data" => $result
			] );

		break;

		case 'almacenar': 


			$OHorario = new CHorario();

			$OHorario->setCodSec( $_POST['codSec'] );

			// $OHorario->setCodAmb( $_POST['codAmb'] );
			if ( $_POST["cedDoc"] == 'S/A' ) {
				$OHorario->setCedDoc( NULL );
			}else{
				$OHorario->setCedDoc( $_POST['cedDoc'] );	
			}

			$OHorario->setCodUniCur( $_POST['codUniCur'] );

			$OHorario->setTipo( 1 );

			$OHorario->setEstado( TRUE );

			for ($i=0; $i < count($_POST['array_bloques']); $i++) { 

				$OHorario->setCodTie( $_POST['array_bloques'][$i]['codTie'] );
				
				if ( $_POST['array_bloques'][$i]['codAmb'] == 'S/A' ) {
					$OHorario->setCodAmb( NULL );
				}else{
					$OHorario->setCodAmb( $_POST['array_bloques'][$i]['codAmb'] );	
				}

				$resultado = $OHorario->asignarActividadHorario();

			}

			echo json_encode($resultado);


		break;

		case 'consultar-unid-curr':

			$OHorario = new CHorario();
			$OHorario->setCodSec( $_POST['codSec'] );

			$resultado = $OHorario->unidCurrHorarioSeccion( $_POST["fase_seleccionada"] );

			echo json_encode( ['data' => $resultado] );
		break;

		case 'consultar-unid-curr-asignadas':

			$OHorario = new CHorario();
			$OHorario->setCodSec( $_POST['codSec'] );

			$resultado = $OHorario->unidCurrAsignadasHorarioSeccion( $_POST["fase_seleccionada"] );

			echo json_encode( ['data' => $resultado] );
			
		break;

		
		case 'mover-bloques':

			$OHorario = new CHorario();
			$OHorario->setCodHor( $_POST['codHor'] );
			$OHorario->setCodTie( $_POST['codTie'] );
			$OHorario->setCodSec( $_POST['codSec'] );
			$OHorario->setCodUniCur( $_POST['codUniCur'] );
			$resultado = $OHorario->MoverBloque();

			echo json_encode( ['data' => $resultado] );

		break;

		case 'vaciar-horario':
			
			$OHorario = new CHorario();
			$OHorario->setCodSec( $_POST['seccion_seleccionada'] );
			$resultado = $OHorario->vaciarHorario();
			if (isset($_POST["nombreImagen"])) {
  			 unlink("public/img/steganografy/ste/".$_POST["nombreImagen"]);
			}
			echo json_encode( ['data' => $resultado] );

		break;

		case 'eliminar':

			$OHorario = new CHorario();
			$OHorario->setCodSec( $_POST['codSec'] );
			$OHorario->setCodUniCur( $_POST['codUniCur'] );
			$resultado = $OHorario->eliminar();

			echo json_encode( ['data' => $resultado] );
		break;
		
	}


