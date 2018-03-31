<?php $titulo = "Gestion de horarios";?>
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>
<style type="text/css">
  main{
    margin-top: 35px;
  }
  div.tarjeta{
    padding: 24px 0px 2px 0px;margin: 0px;

  }
  div.tarjeta .titulo-tarjeta{
    font-size: 24px;
    font-weight: 300;
    line-height: 22px;
    margin-top: 4px;
    margin-bottom: 8px;
    color: #fff;
  }
</style>

<body>
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>

<main >

  <section class="row">

    <div class="col s12 valign-wrapper">
      <h5 class="valign">Gestion de horarios</h5>
    </div>
  


    <div class="col s12 m4">

      <div class="card ">

        <div class="center-align cyan tarjeta" >
          <img src="public/img/avatar/user05.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Horarios de docentes</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="?controlador=horarios&actividad=hdocentes" class="btn btn-lg cyan col s12 waves-effect">This is a link</a>   
          </div>      
        </div>

      </div>

    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="center-align green  tarjeta" >
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Horarios de secciones</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="?controlador=horariosSecciones&actividad=index" class="btn btn-lg green  col s12 waves-effect">This is a link</a>    
          </div>
                
        </div>
      </div>
    </div>

    <div class="col s12 m4">

      <div class="card ">
        <div class="center-align deep-orange tarjeta" >
          <img src="public/img/institution.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Horarios de ambientes</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="?controlador=horarios&actividad=hambientes" class="btn btn-lg deep-orange col s12 waves-effect">This is a link</a>    
          </div>
                
        </div>
      </div>
    </div>

  </section>

  <div class="fixed-action-btn">
    <a class="btn-floating btn-large pulse waves-effect waves-light  secundario ">
      <i class="material-icons">help</i>
    </a>
  </div>
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>

<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>

</body>
</html>
