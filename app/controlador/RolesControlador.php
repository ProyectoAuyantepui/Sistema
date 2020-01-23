<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
require_once "app/modelo/CRol.php";
require_once "app/modelo/CBitacora.php";

	switch($actividad){

		case 'index': 

			require_once "app/vista/roles/index.php";
		break;

		case 'vista-crear': 
		
			require_once "app/vista/roles/crear.php";
			
		break;


		case 'vista-editar': 
		
			require_once "app/vista/roles/editar.php";
			
		break;

		case 'crear': 

			$codigo = "R-".rand();

			$ORol = new CRol();

			$ORol->setCodRol( $codigo );
			$ORol->setNombre( $_POST['nombre'] );
			$ORol->setObservaciones( $_POST['observaciones'] );	

			$resultadoRol = $ORol->crearRol(); 
				
			if ($resultadoRol) {
				
				for ($i=0; $i < count( $_POST["permisos"] ); $i++) { 
					$ORol->setCodPer( $_POST["permisos"][$i] );
					$ORol->asignarPermisos();
				}

				echo json_encode( ['operacion' => true] );
				

			}else{

				
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'modificar': 
		
			$ORol = new CRol();

			$ORol->setCodRol( $_POST['codRol'] );
			$ORol->setNombre( $_POST['nombre'] );
			$ORol->setObservaciones( $_POST['observaciones'] );
			
			$resultado = $ORol->modificarRol(); 
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'modificar-permisos': 
			
			$ORol = new CRol();

			$ORol->setCodRol( $_POST['codRol'] );
			$ORol->setCodPer( $_POST['codPer'] );

			if ( $_POST["operacion"] == "I" ) {
				$resultado = $ORol->asignarPermisos( );
			}elseif( $_POST["operacion"] == "D" ){
				$resultado = $ORol->eliminarPermisos( );
			}
			
			if ($resultado) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
			
		break;

		case 'eliminar': 
		
			$ORol = new CRol();

			$ORol->setCodRol( $_POST['codRol'] );

			$resultado = $ORol->eliminarRol(); 
			if ( $resultado["operacion"] == false ) {
				
				echo json_encode([ "operacion" => false , "error" => $resultado["codigo_error"] ]);
				exit;
			}
				echo json_encode( ['operacion' => true] );
			
		break;

		case 'consultar': 
		
			$ORol = new CRol();

			$ORol->setCodRol( $_POST['codRol'] );

			$resultado = $ORol->consultarRol();
			
			echo json_encode(['data' => $resultado]);
		break;

		case 'listar': 
		
			$ORol = new CRol();

			$roles = $ORol->listarRoles(); 
				
			echo json_encode( $roles );
		break;


		case 'consultar-permisos': 
		
			$ORol = new CRol();
			
			$ORol->setCodRol( $_POST['codRol'] );

			$permisos = $ORol->consultarPermisos();

			echo json_encode( $permisos );
		break;

		case 'consultar-permisos-por-sesion': 
		
			$ORol = new CRol();
			$ORol->setCodRol( $_SESSION['codRol'] );
			$permisos = $ORol->consultarPermisos();
			
			echo json_encode( $permisos );
		break;
	}
