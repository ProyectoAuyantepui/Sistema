<?php $titulo = "Horario de Seccion";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <link rel="stylesheet" type="text/css" href="public/css/estilos_de_horario.css">
    <title>Auyantepui - <?= $titulo ?></title>

<style>
  .ficha {
    width: 100%;
    height: 100px;
    float: center;
/*    background-color: red;
    color: white;*/
    cursor: move;
    /*padding: 0px;*/
    margin: 0px;
  }
  .ficha.over {
    border: 2px dashed #000;
  }

  .unidadesCurriculares:hover {
    cursor: pointer;
    color: #000;
    font-weight: 500;
  }

</style>
</head>
<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>
<main>
  <section class="row horario-seccion-principal">
    <!-- espacio reservado para mostrar cards de lado izquierdo -->
    <div class="col s12 m3 card-principal-izquierdo">
        <!-- panel donde muestro el listado de unidades curriculares -->
        <div class="card card-unidades-curriculares ">
          
          <div class="center-align primario tarjeta" >
            <img src="public/img/flat-book.png" alt="" class="responsive-img " width="90">
            <p class="titulo-tarjeta" >Unidades Curriculares</p>
          </div>

          <div class="card-content" style="padding: 0px;" >
            <ul class="collection unidadesCurriculares" ></ul>  
          </div>
        </div>
    </div>
    <!-- espacio reservado para mostrar cards de lado derecho -->
    <div class="col s12 m9 card-principal-derecho">
      <a align="right" class="btn red esteganografia"> Vaciar Horario</a>
      <!-- plantillas de horarios  -->
      <div class="card-plantilla-horario ">
        <?php require_once "app/vista/horarios/secciones/plantilla_horarios.php"; ?>
      </div>
    </div>
  </section>

  <section class="row seccion-sin-uc oculto">
    <div class="col s10 offset-s1">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class=" col s12 valign-wrapper">
              <p class="flow-text">UPS! No puede gestionar el horario de esta seccion hasta que halla registrado unidades curriculares de el mismo PNF , trayecto y fase</p>
            </div>

            <a href="?controlador=unidCurr&actividad=index" 
               class="btn cyan waves-effect input-field"
            >Ir al modulo unidades curriculares</a>  

            <a href="?controlador=horariosSecciones&actividad=index" 
               class="btn red waves-effect input-field"
            >Regresar</a>     
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="fixed-action-btn">
    <a href="?controlador=horariosSecciones&actividad=index" class="btn-floating btn-large waves-effect waves-light  deep-orange  left" >
      <i class="material-icons ">arrow_back</i>
    </a>
  </div>
</main>

<!-- VENTANAS DE DIALOGOS -->

<!-- MODAL DE OPERACIONES AL DAR CLICK A UNA UNIDAD CURRICULAR-->

<div id="modal_operaciones" class="modal bottom-sheet">

  <div class="modal-header secundario">
    <span class="white-text">Operaciones:<i class="modal-action modal-close material-icons right">close</i></span>
  </div>

  <div class="modal-content">

      <ul class="collection">
          <li class="collection-item avatar oculto opcion-para-no-asignadas">
            <i class="material-icons circle teal">add</i>
            <a href="#" class="asignar-actividad-horario teal-text" onclick="clickAsignarActividades()"> Asignar actividades</a>
          </li>

          <li class="collection-item avatar oculto opcion-para-asignadas">
            <i class="material-icons circle blue darken-3">edit</i>
            <a href="#" class="editar-actividad-horario blue-text" onclick="clickEditarActividades(  )"> Editar actividades </a>
          </li>
          
          <li class="collection-item avatar oculto opcion-para-asignadas">
            <i class="material-icons circle deep-orange">delete</i>
            <a href="#" class="eliminar-actividad-horario  deep-orange-text" onclick="clickEliminarActividades(  )"> Remover actividades </a>
          </li>
          
      </ul>
  </div>

</div>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>     
<?php require_once "__dialogos_esteganografia.php";  ?>  
<script type="text/javascript" src="public/js/ajax/esteganografia.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script src="public/js/ajax/mostrar_horario_secciones.js"></script>
</body>
</html>