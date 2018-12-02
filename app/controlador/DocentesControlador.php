<?php 

require_once "app/modelo/CDocente.php";

	switch($actividad){

		case 'index': 
			
			require_once "app/vista/docentes/index.php";
		break;

		case 'vista-crear': 
			
			require_once "app/vista/docentes/crear.php";
		break;

		case 'vista-editar': 
			
			require_once "app/vista/docentes/editar.php";
		break;

		case 'crear': 

			$_POST['cedDoc'] = str_pad($_POST['cedDoc'], 8, "0", STR_PAD_LEFT);

			$cedula = strtoupper($_POST['nacionalidad'] . "-" .  $_POST['cedDoc']);
			
			$ODocente = new CDocente();
			$ODocente->setCedDoc( $cedula ); 
			$ODocente->setCodCatDoc( $_POST['codCatDoc'] ); 
			$ODocente->setCodRol( $_POST["codRol"] ); 
			$ODocente->setNombre( $_POST['nombre'] ); 
			$ODocente->setApellido( $_POST['apellido'] ); 
			$ODocente->setFecNac( $_POST['fecNac'] ); 
			$ODocente->setSexo( $_POST['sexo'] ); 
			$ODocente->setTelefono( $_POST['telefono'] ); 
			$ODocente->setCorreo( $_POST['correo'] ); 
			$ODocente->setDireccion( $_POST['direccion'] ); 
			$ODocente->setFecIng( $_POST['fecIng'] ); 
			$ODocente->setFecCon( $_POST['fecCon']); 
			$ODocente->setCodDed( $_POST['codDed'] ); 
			$ODocente->setCondicion( $_POST['condicion'] ); 
			$ODocente->setUsuario( $_POST['usuario'] ); 
			$ODocente->setCarrera( $_POST['carrera'] ); 
			$ODocente->setClave( $cedula );
			$ODocente->setAvatar( $_POST['avatar'] ); 
			$ODocente->setEstado( 'FALSE' );
			$ODocente->setObservaciones( "Usuario registrado con rol de docente" );  
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
			$ODocente->setCodRol( $_POST["codRol"] ); 
			$ODocente->setNombre( $_POST['nombre'] ); 
			$ODocente->setApellido( $_POST['apellido'] ); 
			$ODocente->setFecNac( $_POST['fecNac'] ); 
			$ODocente->setSexo( $_POST['sexo'] ); 
			$ODocente->setTelefono( $_POST['telefono'] ); 
			$ODocente->setCorreo( $_POST['correo'] ); 
			$ODocente->setDireccion( $_POST['direccion'] ); 
			$ODocente->setFecIng( $_POST['fecIng'] ); 
			$ODocente->setFecCon( $_POST['fecCon']); 
			$ODocente->setCodDed( $_POST['codDed'] ); 
			$ODocente->setCondicion( $_POST['condicion'] ); 
			$ODocente->setUsuario( $_POST['usuario'] ); 
			$ODocente->setAvatar( $_POST['avatar'] ); 
			$ODocente->setEstado( 'FALSE' );
			$ODocente->setObservaciones( "Usuario registrado con rol de docente" );  
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

		case 'listar':

			

			$ODocente = new CDocente();

	 		$docentes = $ODocente->listarDocentes(); 
				
	 		echo json_encode( $docentes );
		break;

		case 'dependencias':


			

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
	 		$dependencias = $ODocente->dependencias(); 
				
	 		echo json_encode( ["data" => $dependencias] );
		break;

		case 'comisiones':

			

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
	 		$comisiones = $ODocente->comisiones(); 
				
	 		echo json_encode( ["data" => $comisiones] );
		break;

		case 'cambiarRol':

			
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
			
			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
			$ODocente->setCodDep( $_POST["codDep"] ); 
	 		$respuesta = $ODocente->asignarDependencia(); 
				
	 		echo json_encode(['data' => $respuesta]);
		break;

		case 'asignar-comision':
			
			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
			$ODocente->setCodCom( $_POST["codCom"] ); 
	 		$respuesta = $ODocente->asignarComision(); 
				
	 		echo json_encode(['data' => $respuesta]);
		break;

		case 'eliminar-dependencia-docente':

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
			$ODocente->setCodDep( $_POST["codDep"] ); 
	 		$respuesta = $ODocente->eliminarDependenciaDocente(); 
				
	 		echo json_encode(['data' => $respuesta]);
		break;

		case 'consultar-dependencias-disponibles':
			
			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
			$dependencias = $ODocente->consultarDependenciasDisponibles();
				
	 		echo json_encode(['data' => $dependencias]);
		break;

		case 'consultar-comisiones-disponibles':
			
			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] ); 
			$comisiones = $ODocente->consultarComisionesDisponibles();
				
	 		echo json_encode(['data' => $comisiones]);
		break;
	}

