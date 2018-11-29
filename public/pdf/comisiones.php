<?php @include("src/__header.php"); ?>
     <table border="0" cellspacing="0" cellpadding="0">
             <thead>
               <tr>
                 <th class="no">#</th>
                 <th class="desc">NOMBRE</th>
                 <th class="unit">DEPENDENCIA</th>
                       
                 
               </tr>
             </thead>
             <tbody>
                <?php $cont = 1; ?>
               <?php foreach ( $this->data as $row ): ?>
                 <tr>
                    <td class="no"><?php echo $cont; ?></td>
                    <td class="desc"><h3><?php echo $row->nombre; ?></h3></td>
                    <td class="unit"><?php echo $row->dependencia; ?></td>
                 </tr>
               <?php $cont++; ?>
               <?php endforeach ?>
             </tbody>
           </table>

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>