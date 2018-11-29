
<?php $titulo = "CREACION DE COMISIONES DE DOCENTES";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    
    
    <title>Auyantepui - <?= $titulo ?></title>
</head>

<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>

<main>
  <section class="caja_formulario row" >
    
    <div class="col s12 m3">
       <div class="card ">
         
         <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
           <img src="public/img/section.png" alt="" class="responsive-img " width="90">
           <p class="titulo-tarjeta"  >CREAR COMISIONES DE DOCENTES</p>
         </div>
         <div class="card-content row">
           <p class="col s12" style="padding: 10px 1px 1px 1px;">
             <a class="btn-floating btn pulse  waves-effect  primario">
               <i class="material-icons left">settings</i>
             </a>
             Este módulo corresponde a la gestion de Comisiones de dcentes en el sistema 
           </p>

           <p class="col s12" style="padding: 10px 1px 1px 1px;">
             
             <a class="btn-floating btn waves-effect  cyan">
               <i class="material-icons left">add</i>
             </a>
             Atraves de este modulo puede crear nuevas Comisiones.
           </p>

         </div>
       </div>
     </div>


    <div class="col s12 m9">
      <div class="card ">
        <div class="card-content"  >

          <form class="formCrearComision" >
              <select class="oculto" ></select>
            <div class="row">
              <div class="col s12 valign-wrapper">
                <p class="flow-text">DATOS DE LA COMISION</p>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m4">
                <i class="material-icons prefix">call_split</i>
                <input type="text" id="crear_nombre" name="nombre" class="validate"  required />
                <label for="crear_nombre"  >Nombre</label>
              </div>
           
              <div class="input-field col s12 m4">
                <select required  id="docente_dependencia" name="docente_dependencia">
                  <option value="" selected disabled>Seleccione una opcion...</option>
                  <?php foreach ($listado_dependencias["data"] as $dependencia): ?>
                    <option value="<?=  $dependencia->codDep ?>"> <?php echo $dependencia->nombre; ?> </option>
                  <?php endforeach ?>
                </select>
                <label for="docente_dependencia" >Dependencia</label>
              </div>

              <div class="input-field col s12 m4">
                <select required  id="docente_coordinador" name="docente_coordinador">
                  <option value="" selected disabled>Seleccione una opcion...</option>
                  <?php foreach ($listado_de_docentes["data"] as $docente): ?>
                    <option value="<?=  $docente->cedDoc ?>"> <?php echo $docente->nombre . " " . $docente->apellido; ?> </option>
                  <?php endforeach ?>
                </select>
                <label for="docente_coordinador" >Docente Coordinador</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 m12">
                <i class="material-icons prefix">remove_red_eye</i>
                <textarea id="crear_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
                <label data-success="Correcto..."  for="crear_descripcion" >Descripcion</label>
              </div>
            </div>
            <div class="row"> 
              <div class="col s12 m12 right">
                <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
                <button type="submit" class="btnCrearComision btn btn-large waves-effect waves-light primario" >GUARDAR TODO</button>
              </div>
            </div>
          </form>
                  
        </div>
      </div>
    </div>

    <div class="fixed-action-btn ">

      <a 
        href="?controlador=comisiones&actividad=index" 
        class="btn-floating btn-large waves-effect waves-light  deep-orange " 
      >
        <i class="material-icons " >arrow_back</i>
      </a>
    </div>
  </section>

</main>


<?php require_once "app/vista/plantilla/__scripts.php";  ?> 

<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script src="public/js/validaciones/comisiones.js"></script>
<script src="public/js/ajax/comisiones.js"></script>
</body>
</html>