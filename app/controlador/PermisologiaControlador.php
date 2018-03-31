<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CRol.php";

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		case 'index': 
		
			require_once "app/vista/permisologia/index.php";
		break;

		case 'consultar': 
		
			$ORol = new CRol();
			
			$ORol->setCodRol( $_POST['codRol'] );

			$result = $ORol->consultarPermisologia();

			echo json_encode( [  'operacion' => true, 'data' => $result  ] );
		break;

		case 'consultar-por-sesion': 
		
			$ORol = new CRol();
			$ORol->setCodRol( $_SESSION['codRol'] );
			$result = $ORol->consultarPermisologia();
			
			echo json_encode([ 'operacion' => true,'data' => $result ]);
		break;
	}

?>