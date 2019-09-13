<!-- MODAL ESTEGANOGRAFÍA SELECCIÓN DE IMAGEN -->
<div id="modal_solImgSte" class="modal">
 <div class="modal-header secundario">
   <span class="white-text">Seleccione Una imagen:<i class="modal-action modal-close material-icons right">close</i></span>
 </div>

 <div class="modal-content">
          <span>Seleccionar imagen:</span>
           <input type="file" id="imgSteSubmit" style="margin-bottom: 15px" accept="image/png" onchange="preview_image(event)">
            <img id="output_image"/>
         <button type="button" class="btn btn-primary btn-block" style="margin-top: 15px" id="submitImgSte">Subir Imagen</button>
 </div>

</div>

<!-- MODAL ESTEGANOGRAFÍA SUBIR IMAGEN CON ESTEGANOGRAFIA-->
  
<div id="modal_upImgSte" class="modal">

 <div class="modal-header secundario">
   <span class="white-text">Seleccione la imagen que le fue enviada al correo:<i class="modal-action modal-close material-icons right">close</i></span>
 </div>

 <div class="modal-content">
          <span>Seleccionar imagen:</span>
           <input type="file" id="imgUpSubmit" accept="image/png" style="margin-bottom: 15px" onchange="preview_image1(event)">
            <img id="output_image1"/>
            <input type="text" name="confirmPass" id="confirmPass" style="margin-bottom: 15px" placeholder="Confirmar Clave" required>
         <button type="button" class="btn btn-primary btn-block"  id="upImgSte">Acceder</button>
 </div>
</div>




<?php require_once "app/vista/plantilla/__scripts.php";  ?>     
<?php require_once "__dialogos_esteganografia.php";  ?>  
<script type="text/javascript" src="public/js/ajax/esteganografia.js"></script>