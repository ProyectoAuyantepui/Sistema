
<?php $titulo = "Comisiones";?>
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>

<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>

<main>
  <section class="row" id="tarjetaComisiones">
   <div class="col s12 m3">
      <div class="card ">
        
        <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >Comisiones</p>
        </div>

        <div class="card-content"  >

          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating or backing us on Patreon. Any amount would help support and continue development on this project and is greatly appreciated. 
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


          
          <table class="tabla-comisiones bordered highlight">
            <thead id="thead">
              <tr id="thead">
                <th width="50%">
                  <p><strong>Nombre</strong></p>
                </th>
                <th width="40%">
                  <p><strong>Descripcion</strong></p>
                </th>

                <th width="10%"></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
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

          <table id="tabla-docentes" class="bordered highlight ss">
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
            <tbody>
            </tbody>
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
             <div class=" col s12 m12">
               <i class="material-icons prefix">call_split</i>
                 <label for="editar_nombre"  >nombre</label>
                   <input type="text" id="editar_nombre" name="nombre" class="validate" rangelength=[3,60] maxlength="65" required />
             </div>
           </div>
           <div class="row">
             <div class="col s12 m12">
               <i class="material-icons prefix">call_split</i>
               <label for="editar_dependencia"  >Dependencia</label>
               <input type="text" id="editar_dependencia" name="dependencia" class="validate" maxlength="220" rangelength=[2,220] required />
             </div>
           </div>
           <div class="row">
             <div class="col s12 m12">
               <i class="material-icons prefix">call_split</i>
                 <label for="editar_descripcion" >Descripción</label>
                   <textarea id="editar_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Descripción" required></textarea>
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

</main>


<div class="fixed-action-btn">
  <a  class="btn-floating btn-large pulse waves-effect waves-light  secundario  crear-Comision" >
    <i class="material-icons">add</i>
  </a>

  <a href="?controlador=comisiones&actividad=index" class="btn-floating btn-large waves-effect waves-light  deep-orange  regresar oculto" onclick='

    $(".regresar").hide()
    $(".crear-Comision").show()

  '>
    <i class="material-icons ">arrow_back</i>
  </a>
</div>



    
    <!--
      VENTANAS DE DIALOGOS DE REGISTRAR EDITAR ELIMINAR Y OPERACIONES 
    -->
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