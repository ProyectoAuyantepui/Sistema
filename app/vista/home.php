<?php $titulo = "Home";?>
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
  
  
  
  
    <div class="col s12 m3 oculto" codPer="P-04">

      <div class="card ">
        
        <div class="center-align green tarjeta" >
          <img src="public/img/calendar.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >HORARIOS</p>
        </div>

        <div class="card-content"  >
          <p>
            En este apartado se encuentra la gestión del horario de Sección, este proceso comprende la creación del horario, así como también de la asignación de docentes y ambientes vinculados a dichas secciones 
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="index.php?controlador=horarios&actividad=index" class="btn btn-lg green col s12 waves-effect">
              Ir al Módulo
            </a>    
          </div>
                  
        </div>

      </div>

    </div>

    <div class="col s12 m3 oculto" codPer="P-09">

      <div class="card ">

        <div class="center-align cyan tarjeta" >
          <img src="public/img/avatar/user05.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >DOCENTES</p>
        </div>

        <div class="card-content"  >
          <p>
            En este apartado se encuentra la gestión de Docentes, las actividades dentro del mismo son: Registrar Docente, Modificar Datos del docente, Eliminar Docente, y restablecer la contraseña de un docente en específico.
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="index.php?controlador=docentes&actividad=index" class="btn btn-lg cyan col s12 waves-effect">Ir al Módulo</a>   
          </div>      
        </div>

      </div>

    </div>

    <div class="col s12 m3 oculto" codPer="P-19">
      <div class="card ">
        <div class="center-align light-green darken-2 tarjeta" >
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >SECCIONES</p>
        </div>

        <div class="card-content"  >
          <p>
            Este apartado abarca la Creación, Edición, y Eliminación de todas las secciones de la UPTAEB por PNF, Trayecto, Turno y tipo esto quiere decir: Sección Regular o Sección de Repitencia
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="index.php?controlador=secciones&actividad=index" class="btn btn-lg light-green darken-2 col s12 waves-effect">Ir al Módulo</a>    
          </div>
                
        </div>
      </div>
    </div>

    <div class="col s12 m3 oculto" codPer="P-14">

      <div class="card ">
        <div class="center-align deep-orange tarjeta" >
          <img src="public/img/institution.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >AMBIENTES</p>
        </div>

        <div class="card-content"  >
          <p>
            Dentro de este módulo usted podrá Registrar un nuevo ambiente para un PNF en específico, además podrá modificar la información relacionada aa dicho ambiente y podrá eliminar el ambiente de ser necesario. 
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="index.php?controlador=ambientes&actividad=index" class="btn btn-lg deep-orange col s12 waves-effect">Ir al Módulo</a>    
          </div>
                
        </div>
      </div>
    </div>
  </section>
  <section class="row ">

  
    <div class="col s12 m3 oculto" codPer="P-40">

      <div class="card ">

        <div class="center-align deep-purple darken-2 tarjeta" >
          <img src="public/img/flat-book.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta " >UNIDADES CURRICULARES</p>
        </div>

        <div class="card-content"  >
          <p>
            Dentro de este apartado usted podrá: Registrar una U.C y vincularla 1) A un trayecto, 2) A una fase, 3) A un Eje, 4) A un PNF, además de asignarle Unidades de Crédito, Horas Administrativas y Académicas.
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="index.php?controlador=unidcurr&actividad=index" class="btn btn-lg deep-purple darken-2 col s12 waves-effect">
              Ir al Módulo
            </a>    
          </div>
                  
        </div>

      </div>
    </div>

    <div class="col s12 m3 oculto" codPer="P-45">
      <div class="card ">

        <div class="center-align green lighten-4 tarjeta" >
          <img src="public/img/calendar.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta black-text" >ACTIVIDADES ADMINISTRATIVAS</p>
        </div>

        <div class="card-content"  >
          <p>
            En esta sesión Usted podrá: Registrar, y/o modificar las actividades administrativas, debe indicar el título de la actividad así como también, la dependencia, y el tipo, además podrá eliminar una actividad si así lo desea. 
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="index.php?controlador=actiadmi&actividad=index" class="green lighten-4  black-text btn btn-lg red col s12 waves-effect">
              Ir al Módulo
            </a>    
          </div>
                  
        </div>

      </div>

    </div>
     <div class="col s12 m3 oculto" codPer="P-02">
      <div class="card ">

        <div class="center-align orange accent-2 tarjeta" >
          <img src="public/img/avatar/user04.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >PERFIL DE USUARIO</p>
        </div>

        <div class="card-content"  >
          <p>
            Esta sesión es accedida de manera independiente por el docente que inicia sesión , es decir solo usted tiene acceso a este módulo, podrá actualizar sus datos personales y su información de usuario.
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="index.php?controlador=perfil&actividad=index" class="btn btn-lg orange accent-2 col s12 waves-effect">
              Ir al Módulo
            </a>    
          </div>
                  
        </div>

      </div>

    </div>

     <div class="col s12 m3 oculto" codPer="P-60">
      <div class="card ">

        <div class="center-align red tarjeta" >
          <img src="public/img/pdf.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >REPORTES EN PDF</p>
        </div>

        <div class="card-content"  >
          <p>
           Esta Sesión corresponde al Módulo de Reportes, dentro de él está contemplado: Reportes de Horarios por sección, por ambientes, por docentes, así como también algunos reportes filtrados. 
          </p>
        </div>

        <div class="card-action">

          <div class="row">

            <a href="#" class="btn btn-lg red col s12 waves-effect">
              Ir al Módulo
            </a>    
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
    
    var OUser = JSON.parse( sessionStorage.getItem( 'user' ) )

    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=roles&actividad=consultar-permisos',
        data:{
          "codRol" : OUser.rol.codRol
        }
    }) 

    .done(function(respuesta){
        
        $.each( respuesta.data , function (i,item) {

            $("div[codPer=" + item.codPer + "]").removeClass("oculto")
            
        })
     })
})


</script>
</body>
</html>
