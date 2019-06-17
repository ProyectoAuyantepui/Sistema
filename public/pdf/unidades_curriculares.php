<?php @include("src/__header.php"); ?>
     <table border="0" cellspacing="0" cellpadding="0">
             <thead>
               <tr>
                 <th class="no">#</th>
                 <th class="desc">CODIGO</th>
                 <th class="unit">NOMBRE</th>
                 <th class="desc">U. C.</th>
                 <th class="unit">TRAYECTO</th>
                 <th class="desc">FASE</th>
                 <th class="total">PNF</th>
                       
                 
               </tr>
             </thead>
             <tbody>
                <?php $cont = 1; ?>
               <?php foreach ( $this->data as $row ): ?>
                 <tr>
                    <td class="no"><?php echo $cont; ?></td>
                    <td class="desc"><h3><?php echo $row->codUniCur; ?></h3></td>
                    <td class="unit"><?php echo $row->nombre; ?></td>
                    <td class="desc"><?php echo $row->uniCre; ?></td>
                    <td class="unit"><?php echo $row->trayecto; ?></td>
                    <?php  if ( $row->fase == 3 ) { $row->fase = "anual"; } ?>
                    <td class="desc"><?php echo $row->fase; ?></td>
                    <td class="total"><?php echo $row->codPnf; ?></td>
                 </tr>
               <?php $cont++; ?>
               <?php endforeach ?>
             </tbody>
           </table>

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>
