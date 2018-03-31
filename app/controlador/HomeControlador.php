<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }
// switch case a la variable actividad que recibimos en el index.php por get
	switch( $actividad ){

		case 'index': 

			if ( !$_SESSION ) { 
				header("location: index.php?controlador=login&actividad=index");
			}
			
			require_once "app/vista/home.php";
		break;
	}


