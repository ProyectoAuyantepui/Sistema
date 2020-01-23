<?php 
require_once "app/modelo/CCatDoc.php";
require_once "app/modelo/CBitacora.php";

	switch($actividad){

		case 'index': 
			require_once "app/vista/cat-doc/index.php";
		break;

		case 'crear':

			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$OCatDoc = new CCatDoc();

	 		$OCatDoc->setNombre( ucwords($_POST["nombre"] ));
	 		$OCatDoc->setDescripcion( $_POST["descripcion"] );

	 		$resultado = $OCatDoc->crearCatDoc(); 

			if ( $resultado ) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
		break;

		case 'modificar':

			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$OCatDoc = new CCatDoc();

	 		$OCatDoc->setCodCatDoc( $_POST["codCatDoc"] );

	 		$OCatDoc->setNombre( $_POST["nombre"] );
	 		$OCatDoc->setDescripcion( $_POST["descripcion"] );

	 		$resultado = $OCatDoc->modificarCatDoc(); 

			if ( $resultado ) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
		break;
		
		case 'eliminar':

			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$OCatDoc = new CCatDoc();
			$OCatDoc->setCodCatDoc( $_POST["codCatDoc"] );

	 		$resultado = $OCatDoc->eliminarCatDoc(); 
			if ( $resultado ) {
				echo json_encode( ['operacion' => true] );
			}else{
				echo json_encode( ['operacion' => false] );
			}
	 		
		break;

		case 'consultar':

			$OCatDoc = new CCatDoc();
			$OCatDoc->setCodCatDoc( $_POST["codCatDoc"] );
	 		$resultado = $OCatDoc->consultarCatDoc(); 
			
	 		echo json_encode( ['data' => $resultado] );
		break;

		case 'listar':

			//if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

			$OCatDoc = new CCatDoc();

	 		$categorias = $OCatDoc->listarCatDoc(); 
				
	 		echo json_encode( $categorias );
		break;

		case 'buscar': 

			if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
			
			$OCatDoc = new CCatDoc();

			$resultado = $OCatDoc->buscarCatDoc( $_POST['filtro'] ); 
			
			if (  $resultado  ) {
				
				echo json_encode( [ 'data' => $resultado , 'operacion' => true] );
			}else{

				echo json_encode(['operacion' => false]);
			}
		break;
	}

