<?php 

require_once "app/modelo/CDocente.php";

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		case 'index': 
			
			require_once "app/vista/docentes/index.php";
		break;

		case 'crear': 
			$ODocente = new CDocente();
			$ODocente->setCedDoc( $_POST['cedDoc'] );
			$ODocente->setCodCatDoc( $_POST['codCatDoc'] );
			$ODocente->setCodRol( $_POST['rol'] );
			$ODocente->setNombre( $_POST['nombre'] );
			$ODocente->setApellido( $_POST['apellido'] );
			$ODocente->setFecNac( $_POST['fecNac'] );
			$ODocente->setSexo( $_POST['sexo'] );
			$ODocente->setTelefono( $_POST['telefono'] );
			$ODocente->setCorreo( $_POST['correo'] );
			$ODocente->setDireccion( $_POST['direccion'] );
			$ODocente->setFecIng( $_POST['fecIng'] );
			$ODocente->setFecCon( $_POST['fecCon'] );
			$ODocente->setDedicacion( $_POST['dedicacion'] );
			$ODocente->setCondicion( $_POST['condicion'] );
			$ODocente->setUsuario( $_POST['usuario'] );
			$ODocente->setClave( $_POST['clave'] );
			$ODocente->setEstado( TRUE );
			$ODocente->setAvatar( $_POST['avatar']  );
			$ODocente->setObservaciones( $_POST['observaciones'] );
			$resultado = $ODocente->crearDocente(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}		
		break;

		case 'modificar': 
			$ODocente = new CDocente();
			$ODocente->setCedDoc( $_POST['cedDoc'] );
			$ODocente->setCodCatDoc( $_POST['codCatDoc'] );
			$ODocente->setCodRol( $_POST['rol'] );
			$ODocente->setNombre( $_POST['nombre'] );
			$ODocente->setApellido( $_POST['apellido'] );
			$ODocente->setFecNac( $_POST['fecNac'] );
			$ODocente->setSexo( $_POST['sexo'] );
			$ODocente->setTelefono( $_POST['telefono'] );
			$ODocente->setCorreo( $_POST['correo'] );
			$ODocente->setDireccion( $_POST['direccion'] );
			$ODocente->setFecIng( $_POST['fecIng'] );
			$ODocente->setFecCon( $_POST['fecCon'] );
			$ODocente->setDedicacion( $_POST['dedicacion'] );
			$ODocente->setCondicion( $_POST['condicion'] );
			$ODocente->setUsuario( $_POST['usuario'] );
			$ODocente->setObservaciones( $_POST['observaciones'] );
			$resultado = $ODocente->modificarDocente(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}			
		break;

		case 'eliminar': 
			$docentes = new CDocente();
			$docentes->setCedDoc( $_POST['cedDoc'] );
			$resultado = $docentes->eliminarDocente(); 

			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}
		break;

		case 'consultar': 

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 

	 		$result = $ODocente->consultarDocente(); 
			
	 		if ( $result ) {

	 			echo json_encode([ 'operacion' => true, 'data' => $result ]);
	 		}else{

	     		echo json_encode([ 'operacion' => false ]);
	 		}

		break;

		case 'perfil': 
			if ( !$_SESSION ) { 
				header("location: index.php?controlador=login&actividad=index"); 
			}
			require_once "app/vista/perfil/index.php";
		break;

		case 'listar':

			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$ODocente = new CDocente();

	 		$docentes = $ODocente->listarDocentes(); 
				
	 		echo json_encode(['data' => $docentes]);
		break;

		case 'buscar': 
	
		break;

		case 'dependencias':


			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
	 		$docentes = $ODocente->dependencias(); 
				
	 		echo json_encode(['data' => $docentes]);
		break;

		case 'comisiones':


			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
	 		$docentes = $ODocente->comisiones(); 
				
	 		echo json_encode(['data' => $docentes]);
		break;

		case 'cambiarRol':


			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
	 		$docentes = $ODocente->cambiarRol(); 
				
	 		echo json_encode(['data' => $docentes]);
		break;

		case 'cambiar-estado': 
		
			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST['cedDoc'] );
			
			if ( $_POST['estado'] == '1' ) {

				$ODocente->setEstado( true );
			}elseif ( $_POST['estado'] == '2' ){

				$ODocente->setEstado( 'F' );
			}

			$resultado = $ODocente->cambiarEstadoDocente(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{

				echo json_encode( ['operacion' => false] );
			}
		break;

		case 'asignar-dependencia':


			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
			$ODocente->setCodDep( $_POST["codDep"] ); 
	 		$respuesta = $ODocente->asignarDependencia(); 
				
	 		echo json_encode(['data' => $respuesta]);
	 		var_dump($respuesta);
		break;

		case 'desvincular-doc-dep':


			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
			$ODocente->setCodDep( $_POST["codDep"] ); 
	 		$respuesta = $ODocente->desvincularDocDep(); 
				
	 		echo json_encode(['data' => $respuesta]);
	 		var_dump($respuesta);
		break;
	}

