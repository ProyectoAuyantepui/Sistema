<?php 
// if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CHorario.php";
require_once "app/modelo/CDocente.php";
require_once "app/modelo/CSeccion.php";
require_once "app/modelo/CAmbiente.php";
  switch($actividad){

    case 'index': 

      require_once "app/vista/horarios/index.php";
    break;  

		case 'consultar-docentes-disponibles':
			
			$OHorario = new CHorario();
			$valores = "";

			foreach ( $_POST["array_bloques"] as $field){

			    $valores.="'".$field["codTie"]."'";
			    $valores.=',';
			}

			$valores = substr($valores, 0, -1);
			$OHorario->setCodTie( $valores );
			$result = $OHorario->consultarDocentesDisponibles();

			echo json_encode( [

				"operacion" => true,
				"data" => $result
			] );

		break;

		case 'consulta-rapida-horarios': 

			require_once "app/vista/horarios/consultas-rapidas.php";
		break;

		case 'buscador-inteligente': 
			
			$OSeccion = new CSeccion();

			$resultados_secciones = $OSeccion->buscarSeccion( $_POST['filtro'] );

			$OAmbiente = new CAmbiente();

			$resultados_ambientes = $OAmbiente->buscarAmbiente( $_POST['filtro'] );

			$ODocente = new CDocente();

			$resultados_docentes = $ODocente->buscarDocente( $_POST['filtro'] ); 

			echo json_encode( [ 
				"resultados_docentes" => $resultados_docentes , 
				"resultados_ambientes" => $resultados_ambientes,
				"resultados_secciones" => $resultados_secciones
			] );
		break;

	}

