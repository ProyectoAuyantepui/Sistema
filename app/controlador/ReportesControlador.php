<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/core/PdfAuyantepui.php";
require_once "app/core/ExcelAuyantepui.php";
require_once "app/modelo/CSeccion.php";
require_once "app/modelo/CDocente.php";
require_once "app/modelo/CAmbiente.php";
require_once "app/modelo/CComision.php";
require_once "app/modelo/CUnidCurr.php";
require_once "app/modelo/CDependencia.php";
require_once "app/modelo/CHorario.php";
require_once "app/modelo/CTiempo.php";


	switch( $actividad ){

		case 'index': 
			require_once "app/vista/reportes/index.php";
		break;

		case 'reporte-secciones': 

			$OSeccion = new CSeccion(); 
			$secciones = $OSeccion->listarSecciones(); 

			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Listado de Secciones";
			$OPdf->nombre_plantilla = "secciones";
			$OPdf->data = $secciones["data"];
			$OPdf->cargarConfiguracion( 'letter', 'portrait' );
			$OPdf->generarPDF();
		break;

		case 'reporte-ambientes': 

			$OAmbiente = new CAmbiente(); 
			$ambientes = $OAmbiente->listarAmbientes(); 

			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Listado de Ambientes";
			$OPdf->nombre_plantilla = "ambientes";
			$OPdf->data = $ambientes["data"];
			$OPdf->cargarConfiguracion( 'letter', 'portrait' );
			$OPdf->generarPDF();
		break;

		case 'reporte-docentes': 

			
			$ODocente = new CDocente(); 
			$docentes = $ODocente->listarDocentes(); 

			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Listado de Docentes";
			$OPdf->nombre_plantilla = "docentes";
			$OPdf->data = $docentes["data"];
			$OPdf->cargarConfiguracion( 'letter', 'landscape' );
			$OPdf->generarPDF();
		break;

		case 'reporte-docentes-excel': 

			
			$ODocente = new CDocente(); 
			$docentes = $ODocente->listarDocentes(); 

			require_once "public/excel/docentes.php";
			//$OPdf = new ExcelAuyantepui();
			// $OPdf->fecha_actual = $config["fecha_completa"];
			// $OPdf->titulo = "Listado de Docentes";
			// $OPdf->nombre_plantilla = "docentes";
			// $OPdf->data = $docentes["data"];
			// $OPdf->cargarConfiguracion( 'letter', 'landscape' );
			// $OPdf->generarPDF();
		break;

		case 'reporte-docente': 

			
			$ODocente = new CDocente(); 
			$ODocente->setCedDoc( $_GET["cedDoc"] );
			$docente = $ODocente->consultarDocente(  ); 
			$comisiones = $ODocente->comisiones();
			$dependencias = $ODocente->dependencias();
			$secciones = $ODocente->secciones();
			/*echo "<pre>";
			var_dump( $comisiones );
			exit();
			echo "</pre>";*/
			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Reporte de Docente";
			$OPdf->nombre_plantilla = "docente";
			$OPdf->data = [
				"docente" => $docente,
				"comisiones" => $comisiones,
				"dependencias" => $dependencias,
				"secciones" => $secciones
  			];
			$OPdf->cargarConfiguracion( 'letter', 'portrait' );
			$OPdf->generarPDF();
		break;

		case 'reporte-unidades-curriculares': 

			
			$OUnidCurr = new CUnidCurr(); 
			$unidades_curriculares = $OUnidCurr->listarUnidCurr(); 

			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Listado de Unidades Curriculares";
			$OPdf->nombre_plantilla = "unidades_curriculares";
			$OPdf->data = $unidades_curriculares["data"];
			$OPdf->cargarConfiguracion( 'letter', 'portrait' );
			$OPdf->generarPDF();
		break;

		case 'reporte-horario-seccion':
			
			$OHorario = new CHorario();
			$OHorario->setCodSec( $_GET["codSec"] );
			$horario_seccion = $OHorario->consultarHorarioSeccion( $_GET["fase_seleccionada"] );

			$OTiempo = new CTiempo(); 
			$array_horas = $OTiempo->listarHoras();
			$array_dias = $OTiempo->listarDias();
			$array_tiempos = $OTiempo->listarTiempo();
			
			$array_tiempos = $array_tiempos["data"];
			$array_horas = $array_horas["data"];
			$array_dias = $array_dias["data"];

			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Horario de una seccion";
			$OPdf->nombre_plantilla = "horario_seccion";
			$OPdf->data = [

				"horario_seccion" => $horario_seccion,
				"array_horas" => $array_horas,
				"array_dias" => $array_dias,
				"array_tiempos" => $array_tiempos
 			];

 			$OPdf->cargarConfiguracion( 'letter', 'portrait' );

			$OPdf->generarPDF();
		break;

		case 'reporte-horario-ambiente':

			$OHorario = new CHorario();
			$OHorario->setCodAmb( $_GET["codAmb"] );
			$horario_ambiente = $OHorario->consultarHorarioAmbiente();

			$OTiempo = new CTiempo(); 
			$array_horas = $OTiempo->listarHoras();
			$array_dias = $OTiempo->listarDias();
			$array_tiempos = $OTiempo->listarTiempo();
			
			$array_tiempos = $array_tiempos["data"];
			$array_horas = $array_horas["data"];
			$array_dias = $array_dias["data"];

			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Horario de un ambiente";
			$OPdf->nombre_plantilla = "horario_ambiente";
			$OPdf->data = [

				"horario_ambiente" => $horario_ambiente,
				"array_horas" => $array_horas,
				"array_dias" => $array_dias,
				"array_tiempos" => $array_tiempos
 			];

 			$OPdf->cargarConfiguracion( 'letter', 'portrait' );

			$OPdf->generarPDF();
		break;

		case 'reporte-horario-docente':

			$ODocente = new CDocente();
			$ODocente->setCedDoc( $_GET["cedDoc"] );
			$datos_docente = $ODocente->consultarHorarioDocente();
			$acti_admi_doc = $ODocente->acti_admi_doc();
			$oaa_doc = $ODocente->oaa_doc();


			$OHorario = new CHorario();
			$OHorario->setCedDoc( $ODocente->getCedDoc() );
			$horario_docente = $OHorario->consultarHorarioDocente();

			$carga_horaria_docente = $OHorario->consultarCargaHorariaDocente();

			$OTiempo = new CTiempo(); 
			$array_horas_dia = $OTiempo->listarHorasDia();
			$array_horas_tarde = $OTiempo->listarHorasTarde();
			$array_horas_noche = $OTiempo->listarHorasNoche();
			$array_dias = $OTiempo->listarDias();
			$array_tiempos = $OTiempo->listarTiempo();
			
			$array_tiempos = $array_tiempos["data"];
			$array_horas_dia = $array_horas_dia["data"];
			$array_horas_tarde = $array_horas_tarde["data"];
			$array_horas_noche = $array_horas_noche["data"];
			$array_dias = $array_dias["data"];

			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "Horario del Personal Docente";
			$OPdf->nombre_plantilla = "horario_docente";
			$OPdf->data = [

				"datos_docente" => $datos_docente,
				"horario_docente" => $horario_docente,
				"acti_admi_doc" => $acti_admi_doc,
				"oaa_doc" => $oaa_doc,
				"carga_horaria_docente" => $carga_horaria_docente,
				"array_horas_dia" => $array_horas_dia,
				"array_horas_tarde" => $array_horas_tarde,
				"array_horas_noche" => $array_horas_noche,
				"array_dias" => $array_dias,
				"array_tiempos" => $array_tiempos,
 			];

 			$OPdf->cargarConfiguracion( 'letter', 'portrait' );

			$OPdf->generarPDF();
		break;

		case 'prueba':
		
			$OPdf = new PdfAuyantepui();
			$OPdf->fecha_actual = $config["fecha_completa"];
			$OPdf->titulo = "reporte de prueba";
			$OPdf->nombre_plantilla = "prueba";
			$OPdf->data = [
				["codAmb" => "fdsf"],
				["codAmb" => "fdsf"],
				["codAmb" => "fdsf"],
				["codAmb" => "fdsf"]
			];
			$OPdf->cargarConfiguracion( 'letter', 'portrait' );
			$OPdf->generarPDF();
		break;
	}











	/*case 'reporte-horario-seccion': 

		/*echo "<table border='2'>
			<tr>
			  <td >HORA</td>
			  <td >LUNES</td>
			  <td >MARTES</td>
			  <td >MIERCOLES</td>
			  <td >JUEVES</td>
			  <td >VIERNES</td>
			  <td >SABADO</td>
			  <td >DOMINGO</td>
			  
			</tr>
		";
			for ($j=0; $j < count($array_horas); $j++) { 
				
				$array_final[$j]["hora"] = $array_horas[$j]->codHor;

				echo "<tr>";

				echo "<td>" . $array_horas[$j]->codHor . "</td>";

				for ($i=0; $i < count($array_dias); $i++) { 

					foreach ($tiempos["data"] as $key => $value) {
						
						if ( $value->codHor == $array_horas[$j]->codHor ) {

							if ( $value->codDia == $array_dias[$i]->codDia ) {
								//echo "<td>" . $value->codTie;
								echo "<td>";

								foreach ($horario_seccion as $clave => $horario) {
						
									if ( $horario->codTie == $value->codTie ) {
						
											echo "<p>" . $horario->codUniCur . "</p>";
									}
								}

								echo "</td>";
							}
						}
					}
				}
				echo "</tr>";
			}

			
		echo "</table>";

		
	break;*/