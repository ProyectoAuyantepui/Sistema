<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/modelo/CHorario.php";
require_once 'app/modelo/CActiAdmi.php';
require_once "app/modelo/CBitacora.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/horarios/docentes/index.php";
		break;

		case 'mostrar': 

			require_once "app/vista/horarios/docentes/mostrar.php";
		break;
		
		case 'consultar': 

			$OHorario = new CHorario();

			$OHorario->setCedDoc( $_POST['cedDoc'] );

			$resultado = $OHorario->consultarHorarioDocente();

			echo json_encode( ["data"=>$resultado ] );

		break;

		case 'docentes-con-horario': 

			$OHorario = new CHorario();

			$resultado = $OHorario->listarDocentesConHorario();

			echo json_encode( ["data"=>$resultado ] );

		break;

		case 'almacenarActAdm':

			$OHorario = new CHorario();

			$OHorario->setCedDoc( $_POST['docente']['cedDoc'] );
			$OHorario->setCodActAdm( $_POST['codActAdm'] );
			$OHorario->setCodAmb( NULL );
			$OHorario->setTipo( 2 );
			$OHorario->setCodUniCur( NULL );
			$OHorario->setEstado( TRUE );

			for ($i=0; $i < count($_POST['bloqueHora']); $i++) {
	
				$OHorario->setCodTie( $_POST['bloqueHora'][$i] );

				$resultado = $OHorario->asignarActividadHorario();

			}

			$resultado = $OHorario->consultarHorarioDocente();

			echo json_encode( ["data"=>$resultado ] );
		break;

		case 'listarSelectTipoActAdm':

			$OActiAdmi = new CActiAdmi();
			$resultado = $OActiAdmi->listarActiAdmiDistintos();

			echo json_encode( ["data"=>$resultado ] );
		break;
		
		case 'listarActiAdmiPorTipo':

			// var_dump($_POST);
			// exit();

			$OActiAdmi = new CActiAdmi();
			$OActiAdmi->setTipActAdm( $_POST['tipo'] );
			$resultado = $OActiAdmi->listarActiAdmiPorTipo();

			echo json_encode( ["data"=>$resultado ] );
		break;

		case 'mover-bloques':

			$OHorario = new CHorario();
			$OHorario->setCodHor( $_POST['codHor'] );
			$OHorario->setCodTie( $_POST['codTie'] );
			$resultado = $OHorario->moverBloqueDocente();

			echo json_encode( ['data' => $resultado] );

		break;

		case 'eliminarActAdm':

			$OHorario = new CHorario();

			for ($i=0; $i < count($_POST['bloqueHora']); $i++) {
	
				$OHorario->setCodHor( $_POST['bloqueHora'][$i] );

				$resultado = $OHorario->eliminarDocente();

			}

			echo json_encode( ['data' => $resultado] );
		break;
	}


