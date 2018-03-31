
<?php $titulo = "Secciones";?>
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>

<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>

<main>
  <section class="row" >
   <div class="col s12 m3">
      <div class="card ">
        
        <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >Secciones</p>
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


          
           <table id="tabla_Seccion" class="bordered highlight">
            <thead id="thead">
              <tr id="thead">
                <th width="20%">
                  <p ><strong>Codigo</strong></p>
                </th>
                <th width="20%">
                  <p><strong>Trayecto</strong></p>
                </th>
                <th width="20%">
                  <p><strong>Turno</strong></p>
                </th>
                <th width="10%">
                  <p><strong>Estado</strong></p>
                </th>
                <th width="5%"></th>
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
</main>


<div class="fixed-action-btn">
  <a class="btn-floating btn-large pulse waves-effect waves-light  secundario   crear-Seccion">
    <i class="material-icons">add</i>
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
    
    <script src="public/js/ajax/menu.js"></script>
    <script src="public/vendor/paginacion.js"></script>


    <script src="public/js/ajax/secciones.js"></script>

</body>
</html>