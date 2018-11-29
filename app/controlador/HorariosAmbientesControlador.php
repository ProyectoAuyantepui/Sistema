<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
	
require_once "app/modelo/CHorario.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/horarios/ambientes/index.php";
		break;



		case 'editar': 

		break;

		case 'asignar': 
			require_once "app/vista/horarios/ambientes/asignar.php";
		break;

		case 'mostrar': 

			require_once "app/vista/horarios/ambientes/mostrar.php";
		break;

		case 'consultar': 

			$OHorario = new CHorario();

			$OHorario->setCodAmb( $_POST['codAmb'] );

			$resultado = $OHorario->consultarHorarioAmbiente();

			echo json_encode( ["data"=>$resultado ] );

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


		

		case 'ambientes-con-horario': 

			$OHorario = new CHorario();

			$resultado = $OHorario->listarAmbientesConHorario();

			echo json_encode( ["data"=>$resultado ] );

		break;

		



		
	}


