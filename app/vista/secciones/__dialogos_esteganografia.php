<!-- MODAL ESTEGANOGRAFÍA SELECCIÓN DE IMAGEN -->
<div id="modal_solImgSte" class="modal">
 <div class="modal-header secundario">
   <span class="white-text">Seleccione Una imagen:<i class="modal-action modal-close material-icons right">close</i></span>
 </div>

 <div class="modal-content">
     <ul class="collection">
         <li class="collection-item avatar">
          <span>Seleccionar imagen:</span>
           <input type="file" id="imgSteSubmit" accept="image/png" onchange="preview_image(event)">
            <img id="output_image"/>
         </li>
     </ul>
     <ul>
       <li>
         <button type="button" class="btn btn-primary btn-block" id="submitImgSte">Subir Imagen</button>
       </li>
     </ul>
 </div>

</div>

<!-- MODAL ESTEGANOGRAFÍA SUBIR IMAGEN CON ESTEGANOGRAFIA-->
  
<div id="modal_upImgSte" class="modal">

 <div class="modal-header secundario">
   <span class="white-text">Seleccione la imagen que le fue enviada al correo:<i class="modal-action modal-close material-icons right">close</i></span>
 </div>

 <div class="modal-content">
     <ul class="collection">
         <li class="collection-item avatar">
          <span>Seleccionar imagen:</span>
           <input type="file" id="imgUpSubmit" accept="image/png" onchange="preview_image1(event)">
            <img id="output_image1"/>
            <input type="text" name="confirmPass" id="confirmPass" placeholder="Confirmar Clave" required>
         </li>
     </ul>
     <ul>
       <li>
         <button type="button" class="btn btn-primary btn-block" id="upImgSte">Acceder</button>
       </li>
     </ul>
 </div>
</div>




<?php require_once "app/vista/plantilla/__scripts.php";  ?>     
<?php require_once "__dialogos_esteganografia.php";  ?>  
<script type="text/javascript" src="public/js/ajax/esteganografia.js"></script>