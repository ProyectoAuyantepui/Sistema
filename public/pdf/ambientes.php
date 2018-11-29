<?php @include("src/__header.php"); ?>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">CODIGO</th>
            <th class="unit">UBICACIÓN</th>
            <th class="total">TIPO</th>
            
          </tr>
        </thead>
        <tbody>
           <?php $cont = 1; ?>
          <?php foreach ( $this->data as $row ): ?>
            <tr>
              <td class="no"><?php echo $cont; ?></td>
              <td class="desc"><h3><?php echo $row->codAmb; ?></h3></td>
              <td class="unit"><?php echo $row->ubicacion; ?></td>
              <?php 

              if ( $row->tipo == 1 ) { $tipo = "salon"; }
              if ( $row->tipo == 2 ) { $tipo = "cancha"; }
              if ( $row->tipo == 3 ) { $tipo = "sala de reunion"; }
              if ( $row->tipo == 4 ) { $tipo = "otros"; }
              ?>
                <td class="total"><?php echo $tipo; ?></td>
            
            </tr>
          <?php $cont++; ?>
          <?php endforeach ?>
        </tbody>
      </table>

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>