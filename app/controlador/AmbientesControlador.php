<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/modelo/CAmbiente.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/ambientes/index.php";
		break;

		case 'crear': 
		try {
			$OAmbiente = new CAmbiente();

 			$OAmbiente->setCodAmb( $_POST['codAmb'] );
 			$OAmbiente->setUbicacion( $_POST['ubicacion'] );
 			$OAmbiente->setTipo( $_POST['tipo'] );
 			$OAmbiente->setObservaciones( $_POST['observaciones'] );

 			if ( isset( $_POST['estado'] ) ) {

 				$OAmbiente->setEstado( true );
 			}else{

 				$OAmbiente->setEstado( 'F' );
 			}
			
			

 			$resultado = $OAmbiente->crearAmbiente(); 

 				echo json_encode( ['operacion' => true] );
		} catch (Exception $e) {
			 	echo json_encode( ['operacion' => false] );
		}
			


 			
			
		break;

		case 'modificar': 
		
			$OAmbiente = new CAmbiente();

 			$OAmbiente->setCodAmb( $_POST['codAmb'] );
 			$OAmbiente->setUbicacion( $_POST['ubicacion'] );
 			$OAmbiente->setTipo( $_POST['tipo'] );
 			$OAmbiente->setObservaciones( $_POST['observaciones'] );
			
 			if ( isset( $_POST['estado'] ) ) {

 				$OAmbiente->setEstado( true );
 			}else{

 				$OAmbiente->setEstado( 'F' );
 			}
			
 			$resultado = $OAmbiente->modificarAmbiente(); 
			
 			if ($resultado) {

 				echo json_encode( ['operacion' => true] );
 			}else{

 				echo json_encode( ['operacion' => false] );
 			}
			
		break;

		case 'eliminar': 
		
			$OAmbiente = new CAmbiente();

			$OAmbiente->setCodAmb( $_POST['codAmb'] );

			$resultado = $OAmbiente->eliminarAmbiente(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{

				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'consultar': 
		
			$OAmbiente = new CAmbiente();

 			$OAmbiente->setCodAmb( $_POST['codAmb'] );

 			$resultado = $OAmbiente->consultarAmbiente();
			
 			echo json_encode( ['data' => $resultado] );
		break;

		case 'validarAmbiente': 
		
			$OAmbiente = new CAmbiente();

 			$OAmbiente->setCodAmb( $_POST['codAmb'] );

 			$respuesta = $OAmbiente->validarAmbiente();
			
			if (  $respuesta  ) {
				
				echo json_encode( [ 'data' => $respuesta , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
		break;

		case 'listar': 
		
			$OAmbiente = new CAmbiente();

 			$ambientes = $OAmbiente->listarAmbientes();

 			echo json_encode( ['data' => $ambientes] );
		break;

		case 'cambiar-estado': 
		
			$OAmbiente = new CAmbiente();

			$OAmbiente->setCodAmb( $_POST['codAmb'] );
			
			if ( $_POST['estado'] == '1' ) {

				$OAmbiente->setEstado( true );
			}elseif ( $_POST['estado'] == '2' ){

				$OAmbiente->setEstado( 'F' );
			}

			$resultado = $OAmbiente->cambiarEstadoAmbiente(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{

				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'buscar': 
		
			$OAmbiente = new CAmbiente();

			$resultado = $OAmbiente->buscarAmbiente( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
			
		  		
		break;

		case 'reporte-general': 
			$dompdf = new Dompdf();
			// para imprimir una pagina html

			$dompdf->loadHtml( file_get_contents( 'app/vista/ambientes/reportes/general.php' ) );
			// $dompdf->loadHtml( 'hello world' );

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('carta', 'landscape');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$dompdf->stream("prueba",[ 'Attachment' => 1 ]);
		break;
	}

