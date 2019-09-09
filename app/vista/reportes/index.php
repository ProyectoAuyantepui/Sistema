<?php $titulo = "GESTION DE REPORTES";?>
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
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>

<main >
  
  <section class="row ">
    <div class="col s12 valign-wrapper">
      <h5 class="valign">Reportes de Horarios</h5>
    </div>
    <div class="col s12 m4">

      <div class="card ">

        <div class="center-align cyan tarjeta" >
          <img src="public/img/horario1.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >HORARIO DE DOCENTE</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el Horario de un Docente registrado en el sistema en formato PDF con opcion de descargar
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="#" target="__blank" class="btn btn-lg cyan col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>   
          </div>      
        </div>

      </div>

    </div>

    
    <div class="col s12 m4">

      <div class="card ">

        <div class="center-align green  tarjeta" >
          <img src="public/img/horario2.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >HORARIO DE SECCION</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el Horario de una Seccion registrada en el sistema en formato PDF con opcion de descargar
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="#" target="__blank" class="btn btn-lg cyan col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>   
          </div>      
        </div>

      </div>

    </div>

    <div class="col s12 m4">

      <div class="card ">
        <div class="center-align deep-orange tarjeta" >
          <img src="public/img/horario3.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >HORARIO DE AMBIENTE</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el Horario de un ambiente registrado en el sistema en formato PDF con opcion de descargar
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="#" target="__blank" class="btn btn-lg deep-orange col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>    
          </div>
                
        </div>
      </div>
    </div>
  </section>

  <section class="row ">
    <div class="col s12 valign-wrapper">
      <h5 class="valign">Otros Reportes</h5>
    </div>
    <div class="col s12 m3">

      <div class="card ">

        <div class="center-align cyan tarjeta" >
          <img src="public/img/teacher.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Docentes</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el listado total de los Docentes registrados en el sistema en formato PDF con opcion de descargar
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="?controlador=reportes&actividad=reporte-docentes" target="__blank" class="btn btn-lg cyan col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>   
          </div>      
        </div>

      </div>

    </div>

    
    <div class="col s12 m3">

      <div class="card ">

        <div class="center-align cyan tarjeta" >
          <img src="public/img/dependencies.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Dependencias</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el listado total de las Dependencias donde laboran los docentes registradas en el sistema en formato PDF con opcion de descargar
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="?controlador=reportes&actividad=reporte-dependencias" target="__blank" class="btn btn-lg cyan col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>   
          </div>      
        </div>

      </div>

    </div>

    <div class="col s12 m3">

      <div class="card ">
        <div class="center-align deep-orange tarjeta" >
          <img src="public/img/comission.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Comisiones de docentes</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el listado total de las Comisiones de Docentes registradas en el sistema en formato PDF con opcion de descargar
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="#" target="__blank" class="btn btn-lg deep-orange col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>    
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
            En este sub-modulo usted puede generar un reporte con el listado total de las Secciones registradas en el sistema en formato PDF con opcion de descargar
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="?controlador=reportes&actividad=reporte-secciones" target="__blank" class="btn btn-lg blue darken-4 col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>    
          </div>
                
        </div>
      </div>
    </div>
  </section>
  <section class="row">
    <div class="col s12 m3">

      <div class="card ">
        <div class="center-align deep-orange tarjeta" >
          <img src="public/img/institution.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Ambientes</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el listado total de los Ambientes registradas en el sistema en formato PDF con opcion de descargar
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="?controlador=reportes&actividad=reporte-ambientes" target="__blank" class="btn btn-lg deep-orange col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>    
          </div>
                
        </div>
      </div>
    </div>
    <div class="col s12 m3">
      <div class="card ">
        <div class="center-align blue darken-4 tarjeta" >
          <img src="public/img/uniCur.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >Unidades Curriculares</p>
        </div>

        <div class="card-content"  >
          <p>
            En este sub-modulo usted puede generar un reporte con el listado total de las UNidades Curriculares registradas en el sistema en formato PDF con opcion de descargar
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="?controlador=reportes&actividad=reporte-unidades-curriculares" target="__blank" class="btn btn-lg blue darken-4 col s12 waves-effect"><i class="material-icons left">picture_as_pdf</i>  Generar Reporte</a>    
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
