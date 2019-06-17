<?php @include("src/__header.php"); ?>

<style type="text/css">
	
table th,
table td,
table tbody tr:last-child td {
  	padding: 8px;
  	border: 1px solid rgb(1, 79, 187);
}

table tbody tr td{
	text-align: center;
}
</style>


<table border='0' cellspacing='0' cellpadding='0' width='100%'>
<thead>
	<tr >
		<th style='background-color:rgb(1, 79, 187);color:white;' width='18%'>HORA</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>LUNES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>MARTES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>MIERCOLES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>JUEVES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>VIERNES</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>SABADO</th>
		<th style='background-color:rgb(1, 79, 187);color:white;'>DOMINGO</th> 
	</tr>
</thead>	
<tbody>

<?php 
for ($j=0; $j < count($this->data["array_horas"]); $j++) { 
	
	echo "<tr>";

	echo "<td class='desc' style='background-color:rgb(1, 79, 187);color:white;' width='18%'>
			" . date('h:i A', strtotime($this->data["array_horas"][$j]->horEnt)) . 
			" / " . date('h:i A', strtotime($this->data["array_horas"][$j]->horEnt)) .  
		"</td>";

	for ($i=0; $i < count($this->data["array_dias"]); $i++) { 

		foreach ($this->data["array_tiempos"] as $t_tiempo) {
			
			if ( $t_tiempo->codHor == $this->data["array_horas"][$j]->codHor ) {

				if ( $t_tiempo->codDia == $this->data["array_dias"][$i]->codDia ) {

					echo "<td>";

					foreach ($this->data["horario_ambiente"] as $t_horario) {
			
						if ( $t_horario->codTie == $t_tiempo->codTie ) {
			
							echo "<p>" . $t_horario->codUniCur . "</p>";
							echo "<p>" . $t_horario->codSec . "</p>";
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
</table>;  

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>

