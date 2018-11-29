
<?php $titulo = "Horario de Ambiente";?>
    
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <link rel="stylesheet" type="text/css" href="public/css/estilos_de_horario.css">
    <title>Auyantepui - <?= $titulo ?></title>
</head>
<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>
<main>
  <section class="row">
    <!-- espacio reservado para mostrar cards de lado izquierdo -->
    <div class="col s12 m3 card-principal-izquierdo">
      <div class="card card-unidades-curriculares ">

        <div class="center-align primario tarjeta" >
          <img src="public/img/flat-book.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"> Informacion Del Ambiente </p>
        </div>

        <div class="card-content" style="padding: 0px;" >
          <ul class="collection ambiente" ></ul>  
        </div>

        <div class="card-guardar-todo oculto"> 
          <div class="card ">
            <div class="card-content">
              <div class="row">
                <div class=" col s12 valign-wrapper">
                  <p class="flow-text">¿Desea guardar todos los cambios?</p>
                </div>

                <a href="#" class="btn cyan col s12 pulse waves-effect input-field" id="guardarTodo" onclick="guardarTodo()" 
                > Registrar Actividades </a>
                <a href="#" class="btn cyan col s12 pulse waves-effect input-field" id="eliminarTodo" onclick="EliminarTodo()" 
                >Eliminar Actividades</a>
                
                <a href="#" class="btn btn-flat col s12 waves-effect input-field">Cancelar todo</a>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- espacio reservado para mostrar cards de lado derecho -->
    <div class="col s12 m9 offset-s1 card-principal-derecho">

        <span><button class='btn primario TurnoManana' title="Turno Mañana"> Mañana </button> </span>
        <span><button class=' btn primario TurnoTarde' title="Turno Tarde"> Tarde </button> </span>
        <span><button class=' btn primario TurnoNoche' title="Turno Noche"> Noche </button></span>
      <!-- plantillas de horarios  -->
      <div class="card-plantilla-horario">
        <?php require_once "app/vista/horarios/ambientes/plantilla_horarios.php"; ?>
      </div>
    </div>
  </section>
  <div class="fixed-action-btn">

    <a href="?controlador=horariosAmbientes&actividad=index" class="btn-floating btn-large waves-effect waves-light  deep-orange  left-align" >
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
      
<script src="public/js/ajax/menu.js"></script>
<script>

  $(function(){ mostrarBloques( ) })
  
  function mostrarBloques(  ){
                
    var ambiente_seleccionado = JSON.parse( localStorage.getItem( 'ambiente_seleccionado' ) )
    $.ajax({ 
                  
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosAmbientes&actividad=consultar',
      data: { "codAmb" : ambiente_seleccionado.codAmb }
    })
    
    .done(function(respuesta){

      $.each( respuesta.data , function (i,item) {

        $("table tr td[codTie="+item.codTie+"]").html(`<h6 >${item.codUniCur} <br> 
                                                            ${item.nombremateria} <br> 
                                                            ${item.nombredocente} <br>
                                                            ${item.codSec} 
                                                       </h6>`)

        $("table tr td[codTie="+item.codTie+"]").attr("ocupado","ocupado")
        $("table tr td[codTie="+item.codTie+"]").attr("codUniCur",item.codUniCur)
        $("table tr td[codTie="+item.codTie+"]").attr("codAmb",item.codAmb)
        $("table tr td[codTie="+item.codTie+"]").attr("codSec",item.codSec)
        $("table tr td[codTie="+item.codTie+"]").attr("cedDoc",item.cedDoc)
        $("table tr td[codTie="+item.codTie+"]").attr("codHor",item.codHor)   
      })
      $(".turno1").show();
      mostrarInformacionAmbiente();
    })            
  }

function mostrarInformacionAmbiente() {

  var ambiente_seleccionado = JSON.parse( localStorage.getItem( 'ambiente_seleccionado' ) )
  var estadoDelDocente

  console.log(ambiente_seleccionado)

      content = `<h5> Ambiente: ${ambiente_seleccionado.codAmb} </h5>
                  <h5> Ubicacion: ${ambiente_seleccionado.ubicacion} </h5>
                  <h5> Observaciones: ${ambiente_seleccionado.observaciones} </h5>`

  $("ul.ambiente").append(content)
} // Fin Funcion mostrarInformacionDocente

$(".TurnoManana").click(function() {

  $(".turno1").show();
  $(".turno2").hide();
  $(".turno3").hide();
});

$(".TurnoTarde").click(function() {

  $(".turno1").hide();
  $(".turno2").show();
  $(".turno3").hide();
});

$(".TurnoNoche").click(function() {

  $(".turno1").hide();
  $(".turno2").hide();
  $(".turno3").show();
});

</script>

</body>
</html>