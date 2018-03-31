<?php $titulo = "Home";?>
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>


<body>
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>

<main >
  


  <section class="row gestion-administrativa">

    <div class="col s12 valign-wrapper">
      <h5 class="valign">Gestion administrativa</h5>
    </div>
  
    <div class="col s12 m3">

      <div class="card ">

        <div class="center-align green tarjeta" >
          <img src="public/img/calendar.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Horarios</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="#" class="btn btn-lg green col s12 waves-effect">
              This is a link
            </a>    
          </div>
                  
        </div>

      </div>

    </div>

    <div class="col s12 m3">

      <div class="card ">

        <div class="center-align cyan tarjeta" >
          <img src="public/img/avatar/user05.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Docentes</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="#" class="btn btn-lg cyan col s12 waves-effect">This is a link</a>   
          </div>      
        </div>

      </div>

    </div>

    <div class="col s12 m3">
      <div class="card ">
        <div class="center-align blue darken-4 tarjeta" >
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Secciones</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="#" class="btn btn-lg blue darken-4 col s12 waves-effect">This is a link</a>    
          </div>
                
        </div>
      </div>
    </div>

    <div class="col s12 m3">

      <div class="card ">
        <div class="center-align deep-orange tarjeta" >
          <img src="public/img/institution.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Ambientes</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="#" class="btn btn-lg deep-orange col s12 waves-effect">This is a link</a>    
          </div>
                
        </div>
      </div>
    </div>

  </section>
  <section class="row gestion-administrativa">

  
    <div class="col s12 m3">

      <div class="card ">

        <div class="center-align red tarjeta" >
          <img src="public/img/pdf.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Reportes en PDF</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="#" class="btn btn-lg red col s12 waves-effect">
              This is a link
            </a>    
          </div>
                  
        </div>

      </div>

    </div>



  </section>

    <section class="row">
    
    <div class="col s12 valign-wrapper">
      <h5 class="valign">Gestion de usuario</h5>
    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="center-align purple tarjeta" >
          <img src="public/img/calendar.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Ver mi horario</p>
        </div>

        <div class="card-content"  >
          <p>
            We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating. 
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="#" class="btn btn-lg purple col s12 waves-effect">This is a link</a>   
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>
<script src="public/js/ajax/menu.js"></script>
<script type="text/javascript">
  
  $(function(){
    var OUser = JSON.parse( localStorage.getItem("user") )
    
    if( OUser.rol.codRol == "R-003" ){
      $(".gestion-administrativa").hide()
    } 

  })
</script>
</body>
</html>
