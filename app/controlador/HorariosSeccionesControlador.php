<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
	
require_once "app/modelo/CHorarioAcademico.php";
require_once "app/modelo/CHorarioAdministrativo.php";

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		
		// HORARIOS DE SECCIONES

		case 'index': 

			require_once "app/vista/horarios/secciones/index.php";
		break;

		case 'editar': 

		break;

		case 'asignar': 
			require_once "app/vista/horarios/secciones/asignar.php";
		break;

		case 'mostrar': 

			require_once "app/vista/horarios/secciones/mostrar.php";
		break;

		case 'consultar': 

			$OHorarioAcademico = new CHorarioAcademico();

			$OHorarioAcademico->setCodSec( $_POST['codSec'] );

			$resultado = $OHorarioAcademico->consultarHorarioSeccion();

			echo json_encode( ["data"=>$resultado ] );

		break;

		case 'almacenar': 

			$OHorarioAcademico = new CHorarioAcademico();

			$OHorarioAcademico->setCodSec( $_POST['codSec'] );

			$OHorarioAcademico->setCodAmb( $_POST['codAmb'] );

			$OHorarioAcademico->setCedDoc( $_POST['cedDoc'] );

			$OHorarioAcademico->setCodUniCur( $_POST['codUniCur'] );

			$OHorarioAcademico->setTipo( 1 );

			$OHorarioAcademico->setEstado( TRUE );

			for ($i=0; $i < count($_POST['horas']); $i++) { 

				$OHorarioAcademico->setCodTie( $_POST['horas'][$i] );

				$OHorarioAcademico->crearHorario();

			}

			echo json_encode(["operation"=>true]);

		break;

		case 'consultar-unid-curr':

			$OHorarioAcademico = new CHorarioAcademico();
			$OHorarioAcademico->setCodSec( $_POST['codSec'] );

			$resultado = $OHorarioAcademico->unidCurrHorarioSeccion();

			echo json_encode( ['data' => $resultado] );
		break;

		case 'consultar-unid-curr-asignadas':

			$OHorarioAcademico = new CHorarioAcademico();
			$OHorarioAcademico->setCodSec( $_POST['codSec'] );

			$resultado = $OHorarioAcademico->unidCurrAsignadas();

			echo json_encode( ['data' => $resultado] );
			
		break;



		
	}


