<?php 

// switch case a la variable actividad que recibimos en el index.php por get
	switch( $actividad ){

		case '404': 
			echo "Error , direccion no encontrada";
		break;

		case '500': 
			echo "Error , servidor no disponible";
		break;

	}


