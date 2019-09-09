
<?php $titulo = "Comisiones";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <title>Auyantepui - <?= $titulo ?></title>
</head>
<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>
<main>
  <section class="row" id="tarjetaComisiones">
   <div class="col s12 m3">
      <div class="card ">
        
        <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/comission.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >COMISIONES</p>
        </div>
        <div class="card-content row">
          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating btn waves-effect  primario">
              <i class="material-icons left">settings</i>
            </a>
            Este módulo corresponde a la gestion de Comisiones en el sistema 
          </p>

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            
            <a class="btn-floating btn waves-effect  cyan">
              <i class="material-icons left">add</i>
            </a>
            Atraves de este modulo puede crear nuevas Comisiones.
          </p>

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating btn waves-effect  green">
              <i class="material-icons left">search</i>
            </a>

            <a class="btn-floating btn waves-effect pink darken-1">
              <i class="material-icons left">edit</i>
            </a>

            <a class="btn-floating btn waves-effect  red">
              <i class="material-icons left">delete</i> 
            </a>

            Así como también consultar , modificar los datos o eliminar las Comisiones existentes en el sistema
          </p>

        </div>
      </div>
    </div>


    <div class="col m9">
      <div class="card ">

        <div class=" white-text" style="padding: 0px; margin:0px;">

          <nav class="primario">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input id="search" type="search" name="filtro" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>
        </div>

        <div class="card-content" >
          <table class=" bordered highlight" id="tabla_comisiones">
            <thead id="thead">
              <tr id="thead">
                <th >
                  <p><strong>Nombre</strong></p>
                </th>
                <th >
                  <p><strong>Descripcion</strong></p>
                </th>
                <th ></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table> 

          <div class="mensaje valign-wrapper grey-text">
            <i class="material-icons left">close</i>
            <h5 >No se encuentran resultados..</h5>
          </div>

        </div>
      </div>
    </div>
    
  </section>

  <section class="row oculto" id="tarjetaDocentes">
   <div class="col s12 m5">
      <div class="card ">
        
        <div class="card-content"  >
          <a href="#" class="right btn-large teal darken-1 add-doc  tooltipped" data-position="top"  data-delay="50" data-tooltip="Añadir un Docente a esta Dependencia"><i class="material-icons">add</i></a>

          <a href="#" class="right btn-large tooltipped indigo darken-3 cambiar-coordinador" data-position="top"  data-delay="50" data-tooltip="Cambiar Coordinador"><i class="material-icons">people_outline</i></a>

          <a href="#"  class="right btn-large tooltipped red darken-3 eliminar-doc-com" data-position="top"  data-delay="50" data-tooltip="Eliminar docente de esta dependencia"><i class="material-icons">sentiment_dissatisfied</i></a>

          <table id="tabla_docentes" class="bordered highlight ss">
            <thead id="thead">
              <tr id="thead">
                <th width="25%">
                  <p><strong>Cedula</strong></p>
                </th>
                <th width="25%">
                  <p><strong>Nombre</strong></p>
                </th>
                <th width="25%">
                  <p><strong>Apellido</strong></p>
                </th>

                <th width="5%"></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
                  
        </div>

      </div>
    </div>


    <div class="col s12 m7">
       <div class="card ">

         <div class="card-content"  >

           <form class="formEditarComision" >
            <input  id="editar_codCom"  type="hidden" name="codCom">
            <div class="row">
             <div class="row">
             <div class=" col s12 m12 input-field">
               <i class="material-icons prefix">call_split</i>
                   <input type="text" id="editar_nombre" name="nombre" class="validate" rangelength=[3,60] maxlength="65" required placeholder="" />
                 <label for="editar_nombre"  >nombre</label>
             </div>
           </div>
           <div class="row">
             <div class="col s12 m12 input-field">
               <i class="material-icons prefix">call_split</i>
               <input type="text" id="editar_dependencia" name="dependencia" class="validate" maxlength="220" rangelength=[2,220] required placeholder="" />
               <label for="editar_dependencia"  >Dependencia</label>
             </div>
           </div>
           <div class="row">
             <div class="col s12 m12 input-field">
               <i class="material-icons prefix">call_split</i>
                   <textarea id="editar_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Descripción" required></textarea>
                 <label for="editar_descripcion" >Descripción</label>
             </div>
           </div>
           <div class="row"> 
             <div class="col s12 m12 right">
               <button type="submit" class="btnEditarComision btn waves-effect waves-light primario" >Guardar
              <i class="material-icons right">save</i></button>
             </div>
           </div>
           
           </form>
                   
         </div>

       </div>
     </div> 
  </section>

  <div class="fixed-action-btn">
    <a href="?controlador=comisiones&actividad=vista-crear" class="btn-floating btn-large pulse waves-effect waves-light  secundario " >
      <i class="material-icons">add</i>
    </a>
  </div>
</main>




<!-- VENTANAS DE DIALOGO -->
<?php require_once "__dialogos.php"; ?>
<?php require_once "app/vista/plantilla/__scripts.php";  ?> 
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/validaciones/comisiones.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script src="public/js/ajax/comisiones.js"></script>
</body>
</html>