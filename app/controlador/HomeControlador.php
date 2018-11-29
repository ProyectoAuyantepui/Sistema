<?php 
if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

	switch( $actividad ){

		case 'index': 
		
			require_once "app/vista/home.php";
		break;
	}


