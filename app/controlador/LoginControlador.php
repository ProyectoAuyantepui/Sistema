<?php 

require_once "app/modelo/CDocente.php";

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		case 'index': 
			
			// if ( $_SESSION ) { 
			// 	header("location: index.php?controlador=home&actividad=index");
			// }
			
			require_once "app/vista/login/login.php";
		break;
			
		case 'registro': 
			// if ( $_SESSION ) { 
			// 	header("location: index.php?controlador=home&actividad=index");
			// }
			require_once "app/vista/login/registro.php";
		break;

		case 'post-registro': 
		

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST['cedDoc'] ); 
			$ODocente->setCodCatDoc( 1 ); 
			$ODocente->setCodRol( "R-003" ); 
			$ODocente->setNombre( $_POST['nombre'] ); 
			$ODocente->setApellido( $_POST['apellido'] ); 
			$ODocente->setFecNac( $_POST['fecNac'] ); 
	    	$ODocente->setSexo( $_POST['sexo'] ); 
	    	$ODocente->setTelefono( $_POST['telefono'] ); 
	    	$ODocente->setCorreo( $_POST['correo'] ); 
	    	$ODocente->setDireccion( $_POST['direccion'] ); 
	    	$ODocente->setFecIng( $_POST['fecIng'] ); 
	    	$ODocente->setFecCon( $_POST['fecCon']); 
	    	$ODocente->setDedicacion( $_POST['dedicacion'] ); 
	    	$ODocente->setCondicion( $_POST['condicion'] ); 
	    	$ODocente->setUsuario( $_POST['usuario'] ); 
	    	$ODocente->setClave( $_POST['clave'] );
	    	$ODocente->setAvatar( $_POST['avatar'] ); 
	    	$ODocente->setEstado( 'FALSE' );
	    	$ODocente->setObservaciones( "Usuario registrado con rol de docente" );  

			$operacion = $ODocente->crearDocente();

			if ($operacion) {
				$OCatDoc = new CCatDoc();
				$ORol = new CRol();

				$ORol->setCodRol( $ODocente->getCodRol() );
				$OCatDoc->setCodCatDoc( $ODocente->getCodCatDoc() );

				$_SESSION['user'] = [

					'cedDoc' => $ODocente->getCedDoc(),
					'nombre' => $ODocente->getNombre(),
					'apellido' => $ODocente->getApellido(),
					'usuario' => $ODocente->getUsuario(),
					'correo' => $ODocente->getCorreo(),

					'rol' =>  $ORol->consultarRol( ),
					'categoria' =>  $OCatDoc->consultarCatDoc( ),
					
					'comisiones' =>   $ODocente->comisiones( ),
					'dependencias' =>   $ODocente->dependencias( ),
					'fecNac' => $ODocente->getFecNac(), 
					'sexo' => $ODocente->getSexo(),
					'telefono' => $ODocente->getTelefono(),
					'direccion' => $ODocente->getDireccion(), 
					'fecCon' => $ODocente->getFecCon(), 
					'fecIng' => $ODocente->getFecIng(), 
					'dedicacion' => $ODocente->getDedicacion(),
					'condicion' => $ODocente->getCondicion(),
					'estado' => $ODocente->getEstado(),
					'avatar' => $ODocente->getAvatar()
				];

				echo json_encode([  "operacion" => true, "data" => $_SESSION['user']  ]);
			}else{
				echo json_encode([  "operacion" => false ]);
			}

			
		break;

		case 'iniciar-sesion': 
		
			$ODocente = new CDocente();

			$ODocente->setUsuario( $_POST["usuario"] ); 
	    	$ODocente->setClave( $_POST["clave"] ); 

			$datos = $ODocente->validarDocente();

			if ( !$datos ) {
				echo json_encode([ "operacion" => false ]);
				exit;
			}

			$ODocente->setCedDoc( $datos->cedDoc );
			
			$OCatDoc = new CCatDoc();
			$ORol = new CRol();

			$OCatDoc->setCodCatDoc( $datos->codCatDoc );
			$ORol->setCodRol( $datos->codRol );

			$_SESSION['user'] = [

				'cedDoc' => $datos->cedDoc,
				'nombre' => $datos->nombre,
				'apellido' => $datos->apellido,
				'usuario' => $datos->usuario,
				'correo' => $datos->correo,
				'rol' =>  $ORol->consultarRol(  ),
				'comisiones' =>   $ODocente->comisiones( ),
				'dependencias' =>   $ODocente->dependencias( ),
				'categoria' =>  $OCatDoc->consultarCatDoc( ),
				'fecNac' => $datos->fecNac, 
				'sexo' => $datos->sexo, 
				'telefono' => $datos->telefono, 
				'direccion' => $datos->direccion, 
				'fecCon' => $datos->fecCon, 
				'fecIng' => $datos->fecIng, 
				'dedicacion' => $datos->dedicacion, 
				'condicion' => $datos->condicion,
				'estado' => $datos->estado,
				'avatar' => $datos->avatar 
			];

			echo json_encode([  "operacion" => true, "data" => $_SESSION['user']  ]);
			exit;

		break;

		case 'cerrar-sesion': 
		
		    session_unset(); 
		    session_destroy();
			header("location: index.php?controlador=login&actividad=index");
		break;

		case 'recuperar-clave': 
		
		break;

		case 'validar-correo': 
		
		break;

		case 'reestablecer-clave': 
		
		break;


	}
