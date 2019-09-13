
<?php $titulo = "CREACION DE ROLES DE USUARIO";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
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
           <p class="titulo-tarjeta"  >ROLES DE USUARIO</p>
         </div>

         <div class="card-content"  >

           <p>
             We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating or backing us on Patreon. Any amount would help support and continue development on this project and is greatly appreciated. 
           </p>
                   
         </div>

       </div>
     </div>


   <div class="col s12 m9">
        

      <div class="card ">
        
        

        <div class="card-content"  >

          <form class="formCrearRol" >
            <div class="row">
              <div class="col s12 valign-wrapper">
                <p class="flow-text">DATOS DEL ROL</p>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <i class="material-icons prefix">call_split</i>
                <input type="text" id="crear_nombre" name="nombre" class="validate"  required />
                <label for="crear_nombre"  >Nombre</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <i class="material-icons prefix">remove_red_eye</i>
                <textarea id="crear_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
                <label data-success="Correcto..."  for="crear_observaciones" >Observaciones</label>
              </div>
            </div>
            <div class="row"> 
              <div class="col s12 m12 right">
                <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
                <button 
                  type="button" 
                  class="btn btn-large waves-effect waves-light teal" 
                  onclick='
                    $(".caja_permisos").show()
                    $(".caja_formulario").hide()
                  '>
                    EDITAR PERMISOS
                  </button>
                <button type="submit" class="btnCrearRol btn btn-large waves-effect waves-light primario" >GUARDAR TODO</button>
              </div>
            </div>
          </form>
                  
        </div>

      </div>
    </div>

    <div class="fixed-action-btn ">

      <a 
        href="?controlador=roles&actividad=index" 
        class="btn-floating btn-large waves-effect waves-light  deep-orange " 
      >
        <i class="material-icons " >arrow_back</i>
      </a>
    </div>
  </section>

  <section class="caja_permisos oculto">
    <?php require_once "__caja_permisos.php"; ?>
  </section>
</main>


<?php require_once "app/vista/plantilla/__scripts.php";  ?> 

<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script src="public/js/ajax/roles.js"></script>
</body>
</html>