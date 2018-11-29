<?php 
require_once "app/modelo/CCatDoc.php";
require_once "app/modelo/CRol.php";
require_once "app/modelo/CDocente.php";

	switch($actividad){

		case 'index': 
			
			if ( $_SESSION ) {  header("location: index.php?controlador=home&actividad=index"); }
			
			require_once "app/vista/login/login.php";
		break;
			
		case 'registro': 
			if ( $_SESSION ) {  header("location: index.php?controlador=home&actividad=index"); }
			
			require_once "app/vista/login/registro.php";
		break;

		case 'post-registro': 
		

			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST['cedDoc'] ); 
			$ODocente->setCodCatDoc( $_POST['codCatDoc'] ); 
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
	    	$ODocente->setCodDed( $_POST['codDed'] ); 
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
					'codDed' => $ODocente->getCodDed(),
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

			$ODocente->setUsuario( $_POST['usuario'] ); 
	    	$ODocente->setClave( $_POST['clave'] ); 

			$respuesta = $ODocente->validarUsuario();
			
			if ( $respuesta["operacion"] == false ) {
				
				echo json_encode([ "operacion" => false , "error" => $respuesta["codigo_error"] ]);
				exit;
			}


			$ODocente->setCedDoc($respuesta['data']['cedDoc'] );
						
			$OCatDoc = new CCatDoc();
			$ORol = new CRol();

			$OCatDoc->setCodCatDoc( $respuesta['data']['codCatDoc'] );
			$ORol->setCodRol( $respuesta['data']['codRol'] );

			$_SESSION['user'] = [

				'cedDoc' =>$respuesta['data']['cedDoc'],
				'nombre' => $respuesta['data']['nombre'],
				'apellido' => $respuesta['data']['apellido'],
				'usuario' => $respuesta['data']['usuario'],
				'correo' => $respuesta['data']['correo'],
				'rol' =>  $ORol->consultarRol(  ),
				'comisiones' =>   $ODocente->comisiones( ),
				'dependencias' =>   $ODocente->dependencias( ),
				'categoria' =>  $OCatDoc->consultarCatDoc( ),
				'fecNac' => $respuesta['data']['fecNac'], 
				'sexo' => $respuesta['data']['sexo'], 
				'telefono' => $respuesta['data']['telefono'], 
				'direccion' => $respuesta['data']['direccion'], 
				'fecCon' => $respuesta['data']['fecCon'], 
				'fecIng' => $respuesta['data']['fecIng'], 
				'codDed' => $respuesta['data']['codDed'], 
				'condicion' => $respuesta['data']['condicion'],
				'estado' => $respuesta['data']['estado'],
				'avatar' => $respuesta['data']['avatar'] 
			];

			echo json_encode([  'operacion' => true, 'data' => $_SESSION['user']  ]);
		break;

		case 'cerrar-sesion': 
		
		    session_unset(); 
		    session_destroy();
			header("location: index.php?controlador=login&actividad=index");
		break;

		case 'recuperar-clave': 
		
		break;

		case 'validar-correo': 
			
			$ODocente = new CDocente();

			$ODocente->setCorreo( $_POST["correo"] );
			$respuesta = $ODocente->validarCorreo();
			
			if ( $respuesta["cantidad"] == 0 ) {
							
				echo json_encode([ "operacion" => false , "error" => "1" ]);
				exit;
			}else{

				echo json_encode([ "operacion" => true , "data" => $respuesta["data"] ]);
				exit;
			}

			
		break;

		case 'reestablecer-clave': 

			$token = substr(
							str_shuffle(
								str_repeat(
									"0123456789abcdefghijklmnopqrstuvwxyz", 
									75
								)
							), 
							0, 
							75
						);

			require_once "app/core/CorreoAuyantepui.php";

			$o = new CorreoAuyantepui();
			
			$o->destinatario["correo"] = $_POST["correo"];
			$o->destinatario["nombre"] = "Usuario Recuperar";

			$o->nombre_plantilla = "reestablecer-clave";

			$o->asunto = "Auyantepui - Recuperar Cuenta";

			$o->data = [
				"link" => "http://localhost/PROYECTO/SISTEMA-REPOSITORIO/index.php?controlador=login&actividad=vista-nueva-clave&token=" . $token . ""
			];

			$respuesta = $o->enviarEmail();

			if ( $respuesta["operacion"] == true ) {


				setcookie("token_recuperacion", $token, time() + (60*10) );
			}

			echo json_encode(
				[ 
					"operacion" => $respuesta["operacion"],
					"destinatario" => $respuesta["destinatario"]
				]
			);
			exit();
			
			
		break;

		case 'vista-nueva-clave': 

			if ( isset( $_GET["token"] ) ) {
				//echo "token valido";

				if( isset( $_COOKIE['token_recuperacion']) ){

					//echo "<p>La cookie esta activa</p>";

					if ( $_GET["token"] == $_COOKIE['token_recuperacion'] ) {
						// echo "todo esta coincidiendo";
						require_once "app/vista/login/recuperar-cuenta.php";
					}else{
						echo "el token y la cookie no coinciden";
					}
				}else{
							 
					echo "<p>La cookie no existe</p>";
				}
			}else{

				echo "el token es invalido";
			}
			
			
			
		break;

		case 'recuperar-cuenta': 
			
			$ODocente = new CDocente();

			$ODocente->setCedDoc( $_POST["cedDoc"] );
			$ODocente->setClave( $_POST["clave"] );

			$respuesta = $ODocente->actualizarClave();
			
			if ( $respuesta ) {
							
				echo json_encode([ "operacion" => true , "data" => $respuesta ]);
				exit;
			}else{

				echo json_encode([ "operacion" => false ]);
				exit;
			}
			
		break;


	}
