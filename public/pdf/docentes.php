<?php @include("src/__header.php"); ?>
     <table border="0" cellspacing="0" cellpadding="0">
             <thead>
               <tr>
                 <th class="no">#</th>
                 <th class="desc">CEDULA</th>
                 <th class="unit">NOMBRE</th>
                 <th class="desc">APELLIDO</th>
                 <th class="unit">FECHA DE NACIMIENTO</th>
                 <th class="desc">SEXO</th>
                 <th class="total">TELEFONO</th>
                       
                 
               </tr>
             </thead>
             <tbody>
                <?php $cont = 1; ?>
               <?php foreach ( $this->data as $row ): ?>
                 <tr>
                   <td class="no"><?php echo $cont; ?></td>
                   <td class="desc"><h3><?php echo $row->cedDoc; ?></h3></td>
                   <td class="unit"><?php echo $row->nombre; ?></td>
                   <td class="desc"><?php echo $row->apellido; ?></td>
                   <td class="unit"><?php echo $row->fecNac; ?></td>
                   <?php  if ( $row->sexo == 1 ) { $row->sexo = "F"; } ?>
                   <?php  if ( $row->sexo == 2 ) { $row->sexo = "M"; } ?>
                   <td class="desc"><?php echo $row->sexo; ?></td>
                   <td class="total"><?php echo $row->telefono; ?></td>

                 
                 </tr>
               <?php $cont++; ?>
               <?php endforeach ?>
             </tbody>
           </table>

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>