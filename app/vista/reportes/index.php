<?php $titulo = "Reportes";?>
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
<style type="text/css">
.collection .collection-item.avatar{
    min-height: 64px;
  }
.collection{
   margin: 0px; 
}
  .collection .collection-item{
    line-height: 3rem;
  }
</style>
<body>
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>

<main >
  


  <section class="row gestion-administrativa">

    <div class="col s12 valign-wrapper">
      <h5 class="valign">Reportes</h5>
    </div>
  
<div class="col s12 m3">

      <div class="card ">

        <div class="center-align red tarjeta" >
          <img src="public/img/pdf.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Reportes Filtrados</p>
        </div>

        <div class="card-content"  >
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolorum natus rerum tenetur modi dolorem facilis animi totam cumque ipsam, consequatur aspernatur reiciendis, praesentium in iste est atque temporibus cupiditate!
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="#" class="btn btn-lg red col s12 waves-effect">
              Generar Reporte
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit labore laborum perspiciatis natus harum, quos reiciendis vel quae ad voluptates soluta recusandae, rerum numquam error ex est accusantium dolorum, repellat.
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="#" class="btn btn-lg cyan col s12 waves-effect">Generar Reporte</a>   
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur nobis laudantium voluptate voluptas, odit ad earum possimus rerum quibusdam repellendus rem iusto nostrum sequi voluptates praesentium! Cum nesciunt quidem expedita!
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="#" class="btn btn-lg blue darken-4 col s12 waves-effect">Generar Reporte</a>    
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia cumque, quia similique nisi saepe veritatis, fugit vitae itaque doloribus repellat, porro aliquam magni beatae earum cum! Quasi delectus fugit ipsa.
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="#" class="btn btn-lg deep-orange col s12 waves-effect">Generar Reporte</a>    
          </div>
                
        </div>
      </div>
    </div>

  </section>

  
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>
<script src="public/js/ajax/menu.js"></script>
</body>
</html>
