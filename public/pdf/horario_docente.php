<?php @include("src/__header.php"); 
@include("config/config.php");?>

<style type="text/css">
	
table th,
table td,
table tbody tr:last-child td {
  	padding: 4px;
  	border: 1px solid rgb(1, 79, 187);
}

table tbody tr td{
	text-align: center;
}
</style>


<table border="0" cellspacing="0" cellpadding="0" style="margin-top: -15px" >
 <thead>
   <tr>
<!--      <th style='background-color:rgb(1, 79, 187);color:white;'>PNF/CARRERA</th>
      <tH><?php //echo strtoupper($this->data["datos_docente"]->carrera); ?></tH> -->
      <th style='background-color:rgb(1, 79, 187);color:white;'>DOCENTE</th>
      <tH><?php echo strtoupper($this->data["datos_docente"]->docNom), " " ,strtoupper($this->data["datos_docente"]->apellido); ?></tH>
      <th style='background-color:rgb(1, 79, 187);color:white;'>CÉDULA</th>
      <tH><?php echo strtoupper($this->data["datos_docente"]->cedDoc); ?></tH>
   </tr>
 </thead>
 <tbody>
    <tr>
      <td style='background-color:rgb(1, 79, 187);color:white;'>DEDICACIÓN</td>
      <td ><?php echo $this->data["datos_docente"]->dedicacion; ?></td>
      <td style='background-color:rgb(1, 79, 187);color:white;'>CONDICIÓN</td>
      <td ><?php echo $this->data["datos_docente"]->condicion; ?></td>
      <td style='background-color:rgb(1, 79, 187);color:white;'>CATEGORÍA</td>
      <td ><?php echo $this->data["datos_docente"]->categoria; ?></td>
    </tr>
    <tr>
<!--       <td style='background-color:rgb(1, 79, 187);color:white;'>PREGRADO</td>
      <td ><?php //echo $this->data["datos_docente"]->pregrado; ?></td>
      <td style='background-color:rgb(1, 79, 187);color:white;' >POSTGRADO</td>
      <td colspan="3"><?php //echo $this->data["datos_docente"]->postgrado; ?></td> -->
    </tr>
 </tbody>
</table>




<!-- <h2 style="margin-top: -10px"> DATOS PERSONALES: </h2>
<table border="0" cellspacing="0" cellpadding="0">
 <thead>
   <tr>
     <th style='background-color:rgb(1, 79, 187);color:white;'>CEDULA</th>
     <th style='background-color:rgb(1, 79, 187);color:white;'>NOMBRE</th>
     <th style='background-color:rgb(1, 79, 187);color:white;'>APELLIDO</th>
     <th style='background-color:rgb(1, 79, 187);color:white;'>FECHA DE NACIMIENTO</th>
     <th style='background-color:rgb(1, 79, 187);color:white;'>SEXO</th>
     <th style='background-color:rgb(1, 79, 187);color:white;'>TELEFONO</th>
   </tr>
 </thead>
 <tbody>
    <tr>
      <td ><h3><?php echo $this->data["datos_docente"]->cedDoc; ?></h3></td>
      <td ><?php echo $this->data["datos_docente"]->nombre; ?></td>
      <td ><?php echo $this->data["datos_docente"]->apellido; ?></td>
      <td ><?php echo $this->data["datos_docente"]->fecNac; ?></td>
      <?php  if ( $this->data["datos_docente"]->sexo == 1 ) { $this->data["datos_docente"]->sexo = "F"; } ?>
      <?php  if ( $this->data["datos_docente"]->sexo == 2 ) { $this->data["datos_docente"]->sexo = "M"; } ?>
      <td ><?php echo $this->data["datos_docente"]->sexo; ?></td>
      <td ><?php echo $this->data["datos_docente"]->telefono; ?></td>
    </tr>
 </tbody>
</table> -->

<h4 style="text-align: center;margin-top: -20px;margin-bottom: -0.5px"> ACTIVIDADES ACADÉMICAS: </h4>
<?php if ( count( $this->data["acti_admi_doc"] ) > 0): ?>
  <table border="0" cellspacing="0" cellpadding="0">
   <thead>
     <tr>
       <th style='background-color:rgb(1, 79, 187);color:white;'>UNIDAD CURRICULAR</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>CÓDIGO</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>SECCION</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>AULA</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>EJE DE FORMACIÓN</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>FASE</th>
     </tr>
   </thead>
   <tbody>
        <?php $cont = 1; ?>
       <?php foreach ( $this->data["acti_admi_doc"] as $row ): ?>
         <tr>
           <td ><?php echo $row->nombre; ?></td>
           <td ><?php echo $row->codUniCur; ?></td>
           <td ><h3><?php echo $row->codSec; ?></h3></td>
           <td ><?php echo $row->codAmb; ?></td>
           <td ><?php echo $row->eje; ?></td>
           <td ><?php echo $row->fase; ?></td>
         </tr>
       <?php $cont++; ?>
       <?php endforeach ?>
   </tbody>
  </table>
<?php else: ?>
  <h4> Usted no imparte clases a ninguna seccion de esta institucion... </h4>
<?php endif; ?> 

<h4 style="text-align: center;margin-top: -20px;margin-bottom: -0.5px"> CREACIÓN INTELECTUAL, INTEGRACIÓN COMUNIDAD, GESTIÓN ACADÉMICA Y OTRAS ACTIVIDADES </h4>
<?php if ( count( $this->data["oaa_doc"] ) > 0): ?>
  <table border="0" cellspacing="0" cellpadding="0">
   <thead>
     <tr>
       <th style='background-color:rgb(1, 79, 187);color:white;'>TIPO DE ACTIVIDAD</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>DESCRIPCIÓN</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>DEPENDENCIA</th>
     </tr>
   </thead>
   <tbody>
        <?php $cont = 1; ?>
       <?php foreach ( $this->data["oaa_doc"] as $row ): ?>
         <tr>
           <td ><?php echo strtoupper($row->tipActAdm);?></td>
           <td ><?php echo strtoupper($row->observaciones); ?></td>
           <td ><h3><?php echo strtoupper($row->dependencia); ?></h3></td>
         </tr>
       <?php $cont++; ?>
       <?php endforeach ?>
   </tbody>
  </table>
<?php endif; ?> 


<table border='0' cellspacing='0' cellpadding='0' width='100%' style="margin-top: -15px;">
<thead>
	<tr >
		<th style='background-color:rgb(1, 79, 187);color:white;' colspan="8">HORARIO DEL DOCENTE</th> 
	</tr>
	<tr >
		<th style='background-color:rgb(1, 79, 187);color:white;'>HORA</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>LUNES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>MARTES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>MIERCOLES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>JUEVES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>VIERNES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>SABADO</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>OBSERVACIÓN</th> 
	</tr>
</thead>	
<tbody>

<?php 
for ($j=0; $j < count($this->data["array_horas_dia"]); $j++) { 
	
	echo "<tr>";

	echo "<td class='desc' style='background-color:rgb(1, 79, 187);color:white;'>
			" . date('h:i A', strtotime($this->data["array_horas_dia"][$j]->horEnt)) . 
			" / " . date('h:i A', strtotime($this->data["array_horas_dia"][$j]->horSal)) .  
		"</td>";

	for ($i=0; $i < count($this->data["array_dias"]); $i++) { 

		foreach ($this->data["array_tiempos"] as $t_tiempo) {
			
			if ( $t_tiempo->codHor == $this->data["array_horas_dia"][$j]->codHor ) {

				if ( $t_tiempo->codDia == $this->data["array_dias"][$i]->codDia ) {

					echo "<td>";

					foreach ($this->data["horario_docente"] as $t_horario) {
			
						if ( $t_horario->codTie == $t_tiempo->codTie ) {
			
							if ( $t_horario->tipo == 1 ) {
								echo "<span>" . $t_horario->codUniCur . "</span>";
								echo "<span>-" . $t_horario->codSec . "</span>";
								echo "<span>-" . $t_horario->codAmb . "</span>";
							}else{
								echo "<p>" . $t_horario->titulo . "</p>";
							}
						}
					}

					echo "</td>";
				}
			}



		}
	}
	echo "</tr>";
}
?>

<tr><td colspan="8" style='background-color:rgb(1, 79, 187);color:white;'>TARDE</td></tr>
<?php 
for ($j=0; $j < count($this->data["array_horas_tarde"]); $j++) { 
	
	echo "<tr>";

	echo "<td class='desc' style='background-color:rgb(1, 79, 187);color:white;'>
			" . date('h:i A', strtotime($this->data["array_horas_tarde"][$j]->horEnt)) . 
			" / " . date('h:i A', strtotime($this->data["array_horas_tarde"][$j]->horSal)) .  
		"</td>";

	for ($i=0; $i < count($this->data["array_dias"]); $i++) { 

		foreach ($this->data["array_tiempos"] as $t_tiempo) {
			
			if ( $t_tiempo->codHor == $this->data["array_horas_tarde"][$j]->codHor ) {

				if ( $t_tiempo->codDia == $this->data["array_dias"][$i]->codDia ) {

					echo "<td>";

					foreach ($this->data["horario_docente"] as $t_horario) {
			
						if ( $t_horario->codTie == $t_tiempo->codTie ) {
			
							if ( $t_horario->tipo == 1 ) {
								echo "<span>" . $t_horario->codUniCur . "</span>";
								echo "<span>-" . $t_horario->codSec . "</span>";
								echo "<span>-" . $t_horario->codAmb . "</span>";
							}else{
								echo "<p>" . $t_horario->titulo . "</p>";
							}
						}
					}

					echo "</td>";
				}
			}



		}
	}
	echo "</tr>";
}
?>

<tr><td colspan="8" style='background-color:rgb(1, 79, 187);color:white;'>NOCHE</td></tr>

<?php 
for ($j=0; $j < count($this->data["array_horas_noche"]); $j++) { 
	
	echo "<tr>";

	echo "<td class='desc' style='background-color:rgb(1, 79, 187);color:white;'>
			" . date('h:i A', strtotime($this->data["array_horas_noche"][$j]->horEnt)) . 
			" / " . date('h:i A', strtotime($this->data["array_horas_noche"][$j]->horSal)) .  
		"</td>";

	for ($i=0; $i < count($this->data["array_dias"]); $i++) { 

		foreach ($this->data["array_tiempos"] as $t_tiempo) {
			
			if ( $t_tiempo->codHor == $this->data["array_horas_noche"][$j]->codHor ) {

				if ( $t_tiempo->codDia == $this->data["array_dias"][$i]->codDia ) {

					echo "<td>";

					foreach ($this->data["horario_docente"] as $t_horario) {
			
						if ( $t_horario->codTie == $t_tiempo->codTie ) {
			
							if ( $t_horario->tipo == 1 ) {
								echo "<span>" . $t_horario->codUniCur . "</span>";
								echo "<span>-" . $t_horario->codSec . "</span>";
								echo "<span>-" . $t_horario->codAmb . "</span>";
							}else{
								echo "<p>" . $t_horario->titulo . "</p>";
							}
						}
					}

					echo "</td>";
				}
			}

			

		}
	}
	echo "</tr>";
}
?>
</tbody>
</table> 
<table width="100%" style="margin-top: -10px" >

	<tr>
		<td style="background-color:rgb(1, 79, 187);color:white; ">HORAS CLASES : </td>
		<td ><?php echo $this->data["carga_horaria_docente"]->horas_de_clase; ?></td>
		<td colspan="2">FIRMA DEL DOCENTE</td>
		<td colspan="3">Coordinador de PNF o Jefe Dpto (Firma y Sello)</td>
	</tr>

	<tr>
		<td style="background-color:rgb(1, 79, 187);color:white;">CREACION INTELECTUAL (CI) : </td>
	
		<td ><?php echo $this->data["carga_horaria_docente"]->horas_ci; ?></td>
		<td colspan="2"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>
		<td colspan="3"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>
	</tr>

	<tr>
		<td style="background-color:rgb(1, 79, 187);color:white;">INTEGRACION COMUNIDAD (IC) : </td>
	
		<td ><?php echo $this->data["carga_horaria_docente"]->horas_ic; ?></td>
		<td colspan="2"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>
		<td colspan="3"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>
	</tr>

	<tr>
		<td style="background-color:rgb(1, 79, 187);color:white;">ASESORIA ACADEMICA (AA) : </td>
	
		<td ><?php echo $this->data["carga_horaria_docente"]->horas_ase_aca; ?></td>
		<td colspan="2"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>
		<td colspan="3"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>
	</tr>

	<tr>
		<td style="background-color:rgb(1, 79, 187);color:white;">GESTION ACADEMICA (GC) : </td>
	
		<td ><?php echo $this->data["carga_horaria_docente"]->horas_ga; ?></td>
		<td colspan="2">FECHA</td>
		<td colspan="3"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>

	</tr>

	<tr>
		<td style="background-color:rgb(1, 79, 187);color:white;">HORAS OTRAS ACTIVIDADES ACADEMICAS (OAA): </td>
	
		<td ><?php echo $this->data["carga_horaria_docente"]->horas_oaa; ?></td>
		<td colspan="2" style='border: inset 0pt;border-right: 1px solid #0d47a1;'><?= $config["fecha_completa"] ?></td>
		<td colspan="3"  style='border: inset 0pt;border-right: 1px solid #0d47a1;'></td>
	</tr>

	<tr>
		<td style="background-color:rgb(1, 79, 187);color:white;">TOTAL HORAS CLASES+ADM : </td>
	
		<td ><?php echo $this->data["carga_horaria_docente"]->total_horas; ?></td>
		<td colspan="2" style='border: inset 0pt;border-right: 1px solid #0d47a1;border-bottom: 1px solid #0d47a1;'></td>
		<td colspan="3"  style='border: inset 0pt;border-right: 1px solid #0d47a1;border-bottom: 1px solid #0d47a1;'></td>
	</tr>


</table>

<!-- <?php @include("src/__frase.php"); ?>
<?php @include("src/__footer.php"); ?> -->

