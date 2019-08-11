<?php @include("src/__header.php"); ?>
<style type="text/css">
  
table th,
table td,
table tbody tr:last-child td {
    padding: 4px;
}

table tbody tr td{
  text-align: center;
}
</style>

<h2> DATOS PERSONALES: </h2>
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
      <td ><h3><?php echo $this->data["docente"]->cedDoc; ?></h3></td>
      <td ><?php echo $this->data["docente"]->nombre; ?></td>
      <td ><?php echo $this->data["docente"]->apellido; ?></td>
      <td ><?php echo $this->data["docente"]->fecNac; ?></td>
      <?php  if ( $this->data["docente"]->sexo == 1 ) { $this->data["docente"]->sexo = "F"; } ?>
      <?php  if ( $this->data["docente"]->sexo == 2 ) { $this->data["docente"]->sexo = "M"; } ?>
      <td ><?php echo $this->data["docente"]->sexo; ?></td>
      <td ><?php echo $this->data["docente"]->telefono; ?></td>
    </tr>
 </tbody>
</table>

<h2> COMISIONES: </h2>
<?php if ( count( $this->data["comisiones"] ) > 0): ?>
  <table border="0" cellspacing="0" cellpadding="0">
    <thead>
     <tr>
       <th style='background-color:rgb(1, 79, 187);color:white;'>#</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>NOMBRE COMISION</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>DEPENDENCIA</th>
     </tr>
    </thead>
    <tbody>
    <?php $cont = 1; ?>
    <?php foreach ( $this->data["comisiones"] as $row ): ?>
      <tr>
        <td style='background-color:rgb(1, 79, 187);color:white;'><?php echo $cont; ?></td>
        <td ><h3><?php echo $row->nombre; ?></h3></td>
        <td ><?php echo $row->dependencia; ?></td>
      </tr>
    <?php $cont++; ?>
    <?php endforeach ?>
    </tbody>
  </table>
<?php else: ?>
  <h4> Usted no pertenece a ninguna comision de docente de esta institucion... </h4>
<?php endif; ?>


<h2> DEPENDENCIAS: </h2>

<?php if ( count( $this->data["dependencias"] ) > 0): ?>
  <table border="0" cellspacing="0" cellpadding="0">
    <thead>
     <tr>
       <th style='background-color:rgb(1, 79, 187);color:white;'>#</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>NOMBRE DEPENDENCIA</th>
     </tr>
    </thead>
    <tbody>
    <?php $cont = 1; ?>
    <?php foreach ( $this->data["dependencias"] as $row ): ?>
      <tr>
        <td style='background-color:rgb(1, 79, 187);color:white;'><?php echo $cont; ?></td>
        <td ><h3><?php echo $row->nombre; ?></h3></td>
      </tr>
    <?php $cont++; ?>
    <?php endforeach ?>
    </tbody>
  </table>

<?php else: ?>

  <h4> Usted no pertenece a ninguna dependencia de esta institucion... </h4>
<?php endif; ?>

<h2> SECCIONES: </h2>
<?php if ( count( $this->data["secciones"] ) > 0): ?>
  <table border="0" cellspacing="0" cellpadding="0">
   <thead>
     <tr>
       <th style='background-color:rgb(1, 79, 187);color:white;'>#</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>SECCION</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>UNIDAD CURRICULAR</th>
       <th style='background-color:rgb(1, 79, 187);color:white;'>NOMBRE U.C.</th>
     </tr>
   </thead>
   <tbody>
        <?php $cont = 1; ?>
       <?php foreach ( $this->data["secciones"] as $row ): ?>
         <tr>
           <td style='background-color:rgb(1, 79, 187);color:white;'><?php echo $cont; ?></td>
           <td ><h3><?php echo $row->codSec; ?></h3></td>
           <td ><?php echo $row->codUniCur; ?></td>
           <td ><?php echo $row->nombre; ?></td>
         </tr>
       <?php $cont++; ?>
       <?php endforeach ?>
   </tbody>
  </table>
<?php else: ?>
  <h4> Usted no imparte clases a ninguna seccion de esta institucion... </h4>
<?php endif; ?>


<h2> CARGA HORARIA DEL DOCENTE: </h2>
<table border="0" cellspacing="0" cellpadding="0">
 <tbody>
    <tr>
      <td colspan="2" style='background-color:rgb(1, 79, 187);color:white;'>
        <h3>
          CARGA HORARIA DEL DOCENTE
        </h3>
      </td>
    </tr>
    <tr>
      <td >
        <h3>
          TOTAL HORAS DE CLASE : 
        </h3>
      </td>
      <td >
        <?php echo $this->data["carga_horaria_docente"]->horas_de_clase; ?>  
      </td>
    </tr>
 </tbody>
</table>

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>