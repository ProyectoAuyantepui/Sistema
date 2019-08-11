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
			$ODocente->setClave( $_POST['cedDoc'] );
			$ODocente->setImgPerfil( $_POST['avatar'] ); 
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
			$ODocente->setImgPerfil( $_POST['avatar'] ); 
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

		case 'obbImgSte':
		if (isset($_FILES)) {

			echo json_encode(['respuesta' => 'success']);
			$ODocente = new CDocente();
			$ODocente->setCedDoc( $_POST["cedDocLinkSte"] ); 
			$ODocente->setImgSte( $_FILES["imgSteUpload"] ); 
			$linkDataImgSte = $ODocente->linkDataImgSte();
		}
			
		break;

		case 'compararTextSte':
		if (isset($_FILES)) {

			$ODocente = new CDocente();
			$ODocente->setCedDoc( $_POST["cedDocComparedSte"] ); 
			$ODocente->setClave( $_POST["confirmPass"] ); 
			$claveDoc=$ODocente->obbPassUserSte();
			$confirmPass=$ODocente->comparedPass($claveDoc);
			$file=$_FILES['imgSteCompared'];		
			$ext=strtolower(substr($file['name'],strrpos($file['name'],'.')));
			if(strtoupper($ext)=='.PNG'){
					$img = imagecreatefrompng($file['tmp_name']);
					$msg = $ODocente::unlinkDataImgSte($img);
					$cadena_de_texto = $msg;
					$cadena_buscada='$2y';
					$posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
					if ($posicion_coincidencia === false) {
					  	echo json_encode(['codError' => '1']);
					  	exit();
    				}
					  
					imagedestroy($img);
					// echo json_encode(['data' => $msg, 'clave' =>$claveDoc['clave']]);
					echo json_encode(['data' => $confirmPass]);
			}
		}
			
		break;
	}

