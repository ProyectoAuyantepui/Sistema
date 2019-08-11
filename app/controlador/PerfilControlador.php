<?php 
require_once "app/modelo/CDocente.php";
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

	switch($actividad){

		case 'index': 
		
			require_once "app/vista/perfil/index.php";
		break;

		case 'actualizarImgPerfil': 
			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$OPerfil = new CDocente();
			$OPerfil->setUsuario( $_POST["usuarioImgPerfil"] );
			$OPerfil->setImgPerfil( $_FILES["updateImgPerfil"] );
			$resultado = $OPerfil->actualizarImgPerfil(); 
			if ( $resultado["operacion"] == false ) {
				
				echo json_encode([ "operacion" => false]);
				exit;
			}	
			echo json_encode([  "operacion" => true]);
		break;
		
		case 'actualizar-clave': 
			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$OPerfil = new CDocente();
			$OPerfil->setCedDoc( $_POST["cedDoc"] );
			$OPerfil->setClave([ "clave_vieja" => $_POST["claveVieja"] , "clave_nueva" => $_POST["claveNueva"]  ]  );
			$resultado = $OPerfil->cambiarClavePerfil(); 
			if ( $resultado["operacion"] == false ) {
				
				echo json_encode([ "operacion" => false , "error" => $resultado["codigo_error"] ]);
				exit;
			}	
			echo json_encode([  "operacion" => true]);
		break;

		case 'modificar': 
			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
			$OPerfil = new CDocente();
			$OPerfil->setCedDoc( $_POST['cedDoc'] );
			$OPerfil->setNombre( $_POST['nombre'] );
			$OPerfil->setApellido( $_POST['apellido'] );
			$OPerfil->setFecNac( $_POST['fecNac'] );
			$OPerfil->setSexo( $_POST['sexo'] );
			$OPerfil->setTelefono( $_POST['telefono'] );
			$OPerfil->setCorreo( $_POST['correo'] );
			$OPerfil->setDireccion( $_POST['direccion'] );
			$OPerfil->setUsuario( $_POST['usuario'] );
	    	$OPerfil->setImgPerfil($_POST['avatar']); 
			$resultado = $OPerfil->modificarPerfil(); 
			
			if ($resultado) {

				echo json_encode( ['operacion' => true] );
			}else{


				echo json_encode(['operacion' => false]);
			}			
		break;
	}

?>