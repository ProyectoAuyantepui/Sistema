<?php @include("src/__header.php"); ?>
<style type="text/css">
  body{
    font-size: 0.6em;
  }
</style>
     <table border="0" cellspacing="0" cellpadding="0">
             <thead>
               <tr>
                 <th class="no">#</th>
                 <th class="total">CEDULA</th>
                 <th class="total">NOMBRE</th>
                 <th class="total">APELLIDO</th>
                 <th class="total">FECHA DE NACIMIENTO</th>
                 <th class="total">SEXO</th>
                 <th class="total">TELEFONO</th>
                       
                 
               </tr>
             </thead>
             <tbody>
                <?php $cont = 1; ?>
               <?php foreach ( $this->data as $row ): ?>
                 <tr>
                   <td style="text-align: center;" class="no"><?php echo $cont; ?></td>
                   <td style="text-align: center;" class="unit"><?php echo $row->cedDoc; ?></td>
                   <td style="text-align: center;" class="unit"><?php echo $row->nombre; ?></td>
                   <td style="text-align: center;" class="unit"><?php echo $row->apellido; ?></td>
                   <td style="text-align: center;" class="unit"><?php echo $row->fecNac; ?></td>
                   <?php  if ( $row->sexo == 1 ) { $row->sexo = "F"; } ?>
                   <?php  if ( $row->sexo == 2 ) { $row->sexo = "M"; } ?>
                   <td style="text-align: center;" class="unit"><?php echo $row->sexo; ?></td>
                   <td style="text-align: center;" class="unit"><?php echo $row->telefono; ?></td>

                 
                 </tr>
               <?php $cont++; ?>
               <?php endforeach ?>
             </tbody>
           </table>

<?php @include("src/__frase.php"); ?>

<?php @include("src/__footer.php"); ?>