<?php @include("src/__header.php"); ?>
<table border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th class="no">#</th>
      <th class="desc">CODIGO</th>
      <th class="unit">TRAYECTO</th>
      <th class="desc">MATRICULA</th>
      <th class="unit">TIPO</th>
      <th class="total">TURNO</th>
    </tr>
  </thead>
  <tbody>
     <?php $cont = 1; ?>
    <?php foreach ( $this->data as $row ): ?>
      <tr>
        <td class="no"><?php echo $cont; ?></td>
        <td class="desc"><?php echo $row->codSec; ?></td>

        <?php 
          if ( $row->tipo == 1 ) { $tipo = "regular"; }
          if ( $row->tipo == 2 ) { $tipo = "repitientes"; }

          if ( $row->turno == 1 ) { $turno = "mañana"; }
          if ( $row->turno == 2 ) { $turno = "tarde"; }
          if ( $row->turno == 3 ) { $turno = "noche"; }

          if ( $row->trayecto ==  0 ) { 

            $trayecto = "inicial"; 
          }else{

            $trayecto =  $row->trayecto;
          }


        ?>
        <td class="unit"><?php echo $row->trayecto; ?></td>
        <td class="desc"><?php echo $row->matricula; ?></td>
        <td class="unit"><?php echo $tipo; ?></td>
        <td class="total"><?php echo $turno; ?></td>

      
      </tr>
    <?php $cont++; ?>
    <?php endforeach ?>
  </tbody>
</table>

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>