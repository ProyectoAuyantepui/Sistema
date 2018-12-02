<?php $titulo = "Horario de Seccion";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
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
      <a align="right" href="#" class="vaciar-horario btn red"> Vaciar Horario</a>
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
<script src="public/js/ajax/menu.js"></script>
<script>
  $(function(){ cargarUnidadesCurriculares() })

  function cargarUnidadesCurriculares(){

    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
    $.ajax({ 
      
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=consultar-unid-curr',
      data: {
        "codSec" : seccion_seleccionada.codSec,
        "fase_seleccionada" : seccion_seleccionada.fase_seleccionada
      }
    })
    .done(function(respuesta){
      if ( respuesta.data.length == 0 ) {

        $(".horario-seccion-principal").hide()
        $(".seccion-sin-uc").show()
      }else{

        $("ul.unidadesCurriculares").html('')

        $.each( respuesta.data , function(i,item){

          content = `<a 
                        class="collection-item boton-unidad-curricular primario white-text"  
                        codUniCur="${item.codUniCur}"
                        nombre="${item.nombre}"
                        htas="${item.htas}" 
                        asignada="no-asignada"
                        onclick="clickUnidadCurricular( $(this) )"
                        onmouseover="mouseoverUnidadCurricular( $(this) )"
                        onmouseout="mouseoutUnidadCurricular( $(this) )"
                      >
                      ${item.nombre}
                    </a>`

          $("ul.unidadesCurriculares").append(content)


        }) 

        mostrarBloques(  )
        pintarUnidadesCurricularesAsignadas()
      }

    })
  }

  function mostrarBloques(  ){
          
    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
    var tabla_a_usar = false

    if ( seccion_seleccionada.turno == 1 ) {
      tabla_a_usar = "table#tablaTurno1" 
      $('div .turno1').show() 
    }

    if ( seccion_seleccionada.turno == 2 ) {
      tabla_a_usar = "table#tablaTurno2" 
      $('div .turno2').show() 
    }

    if ( seccion_seleccionada.turno == 3 ) {
      tabla_a_usar = "table#tablaTurno3" 
      $('div .turno3').show() 
    }

    $.ajax({ 
      
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=consultar',
      data: {
        "codSec" : seccion_seleccionada.codSec,
        "fase_seleccionada" : seccion_seleccionada.fase_seleccionada
      }
    })
    .done(function(respuesta){
      var ambiente = ""
      var cedula_docente = ""
      var nombre_docente = ""

      $.each( respuesta.data , function (i,item) {
        
        if ( item.codAmb == null ) {
          ambiente = "sin ambiente"
        }else{
          ambiente = item.codAmb
        }

        if ( item.cedDoc == null ) {
          nombre_docente = "sin docente"
          cedula_docente = null
        }else{
          cedula_docente = item.cedDoc
          nombre_docente = item.nombredocente
        }

        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").html("")
        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div")
        .append(`
                  <h6>
                    ${item.codUniCur} <br>
                    ${item.nombremateria} <br>
                    ${nombre_docente} <br>
                    ${ambiente} <br>
                  </h6>
        `)

        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("ocupado","ocupado")
        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codUniCur",item.codUniCur)
        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codAmb",ambiente)
        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codSec",item.codSec)
        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("cedDoc",cedula_docente)
        $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codHor",item.codHor)
      })
    })            
  }

  /*function pintarUnidadesCurricularesAsignadas(){

    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
    $.ajax({ 
            
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=consultar-unid-curr-asignadas',
      data: { 
          "codSec" : seccion_seleccionada.codSec, 
          "fase_seleccionada" : seccion_seleccionada.fase_seleccionada
      }
    })
    .done(function(respuesta){
      $.each( respuesta.data , function(i,item){

        $("ul.unidadesCurriculares a[codUniCur=" + item.codUniCur + "]")
        .addClass( "pink darken-1 white-text" )
        .attr("asignada","asignada")
      })
    })
  }*/

  function pintarUnidadesCurricularesAsignadas(){

    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
    $.ajax({ 
            
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=consultar-unid-curr-asignadas',
      data: { 
          "codSec" : seccion_seleccionada.codSec, 
          "fase_seleccionada" : seccion_seleccionada.fase_seleccionada
      }
    })
    .done(function(respuesta){
      $.each( respuesta.data , function(i,item){
console.log(respuesta)
        $("ul.unidadesCurriculares a[codUniCur=" + item.codUniCur + "]")
        .addClass( "pink darken-1 white-text" )
        .attr("asignada","asignada")
      })
    })
  }

  function clickAsignarActividades(){

    $("#modal_operaciones").modal("close")
    location.href = "index.php?controlador=horariosSecciones&actividad=asignar"
  }

  function clickEliminarActividades(){

    // $("#modal_operaciones").modal("close")
    var uc_seleccionada = JSON.parse( localStorage.getItem( 'uc_seleccionada' ) )
    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )

    $.ajax({

      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=eliminar',
      data: { 
        "codSec" : seccion_seleccionada.codSec,
        "codUniCur" : uc_seleccionada.codUniCur
      }
    })
    .done(function(respuesta){

      Materialize.toast('Actividades Eliminadas Exitosamente',1000,'',function(){ location.href = '?controlador=horariosSecciones&actividad=mostrar' });
    })
  }

  function clickEditarActividades(){

    $("#modal_operaciones").modal("close")          
    location.href = "index.php?controlador=horariosSecciones&actividad=editar"
  }

  // evento click cuando le doy click a una uc
  function clickUnidadCurricular( elemento ){

    var uc_seleccionada = {

      "codUniCur" : elemento.attr("codUniCur"),
      "nombre" : elemento.attr("nombre"),
      "htas" : elemento.attr("htas"),
    }

    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )

    localStorage.setItem( 'uc_seleccionada' , JSON.stringify( uc_seleccionada ) )

    if ( elemento.attr("asignada") == "asignada" ) {

      

      $("#modal_operaciones .opcion-para-asignadas").show()
      $("#modal_operaciones .opcion-para-no-asignadas").hide()

      
    }else{
      $("#modal_operaciones .opcion-para-asignadas").hide()
      $("#modal_operaciones .opcion-para-no-asignadas").show()
    }

    $("#modal_operaciones").modal("open")           
  }

  // al pasar el raton sobre una uc
  function mouseoverUnidadCurricular( elemento ){

    if ( elemento.attr("asignada") == "asignada" ) {
      $("table tr td[codUniCur="+ elemento.attr("codUniCur") +"] div")
      .addClass("pink darken-1 white-text")                  
    }

    if ( elemento.attr("asignada") == "no-asignada" ) {
      $("table tr td[ocupado=desocupado] div")
      .addClass("primario white-text")
      .append(`<p> Sin asignar </p>`)
    }
  }

  // al retirar el cursor de una uc
  function mouseoutUnidadCurricular( elemento ){    
    $("table tr td.bloque-de-hora").removeClass("primario pink darken-1 white-text")
    $("table tr td[ocupado=desocupado] ").html("")      
  }

function moverBloque(codHor,codTie ,codSec, codUniCur) {

  $.ajax({ 

  dataType : 'json' ,
  type:'POST' , 
  url:'?controlador=horariosSecciones&actividad=mover-bloques',
  data: { 
    "codHor" : codHor,
    "codTie" : codTie,
    "codSec" : codSec, 
    "codUniCur" : codUniCur
  }
  })
  .done(function(respuesta){

    Materialize.toast('Bloque Movido Exitosamente ', 1000,"",function(){
      cargarUnidadesCurriculares()
    });
  })
}

$('body').on('click','a.vaciar-horario',function(){

  // var codigo_item_seleccionado = $(this).parents("tr").data("id")
  var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
  // alert(seccion_seleccionada['codSec']);

  $.ajax({ 

    dataType : 'json' ,
    type:'POST' , 
    url:'index.php?controlador=horariosSecciones&actividad=vaciar-horario',
    data:{ "seccion_seleccionada" : seccion_seleccionada['codSec'] } 
  }) 
  .done(function(respuesta){
    Materialize.toast('Horario Removido Exitosamente',1000,'',function(){ location.href = '?controlador=horariosSecciones&actividad=mostrar' });
  })        
})


var dragSrcEl = null;
var cols = document.querySelectorAll('div .ficha');
// var cols = $("div .ficha").html();
//guardamos el contenido que queremos cambiar para la transferencia al dejar de arrastrar
function handleDragStart(e) {
  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault();
  }
  e.dataTransfer.dropEffect = 'move';  //efecto al mover
  return false;
}
function handleDragEnter(e) {
  this.classList.add('over');//agregamos borde rojo en el estilo css
}
function handleDragLeave(e) {
  this.classList.remove('over'); //eliminamos borde rojo en el estilo css
}

function handleDragEnd(e) {
  [].forEach.call(cols, function (col) {
    e.dataTransfer.getData('');
    col.classList.remove('over');//eliminamos el borde rojo de todas las columnas
  });

}

function handleDrop(e) {
  if (e.stopPropagation) {
    e.stopPropagation(); //evitamos abrir contenido en otra pagina al soltar
  }
  //hacemos el intercambio de contenido html de el elemento origne y destino
  // dragSrcEl Es El Valor del bloque que estoy tomando
  // this Es El Valor del bloque donde estoy soltando


  if ( e.target.getAttribute("ocupado") == 'ocupado' ) {
    alert('Este Bloque Esta Ocupado')
      // e.target.innerHTML = ""
   } else if ( e.target.getAttribute("ocupado") == 'desocupado' && dragSrcEl.getAttribute("ocupado") == 'ocupado') {
    // alert('Desocupado')

    codTie = this.parentNode.getAttribute("codtie");
    codHor = dragSrcEl.getAttribute("codHor")
    codsec = dragSrcEl.getAttribute("codsec")
    codunicur = dragSrcEl.getAttribute("codunicur")

    this.innerHTML = dragSrcEl.innerHTML;
    this.classList.remove('over');
    dragSrcEl.innerHTML = ''
    dragSrcEl.removeAttribute('codunicur')
    dragSrcEl.removeAttribute('codamb')
    dragSrcEl.removeAttribute('codsec')
    dragSrcEl.removeAttribute('ceddoc')
    dragSrcEl.removeAttribute('codhor')
    dragSrcEl.setAttribute("ocupado", 'desocupado' )
    dragSrcEl.setAttribute("class", "ficha")
    dragSrcEl.setAttribute("draggable", 'true' )

    this.setAttribute("ocupado", 'ocupado' )
    this.setAttribute("codhor", codHor )
    this.setAttribute("codsec", codsec )
    this.setAttribute("codunicur", codunicur )
    moverBloque( codHor, codTie ,codsec, codunicur )
   } else if ( dragSrcEl.getAttribute("ocupado") == 'desocupado' ) {

    alert('No Puede Mover Un Bloque Desocupado')
   }
return false;
}

//agregamos todos los eventos anteriores a cada columna mediante un ciclo
[].forEach.call(cols, function(col) {
   col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragenter', handleDragEnter, false);
  col.addEventListener('dragover', handleDragOver, false);
  col.addEventListener('dragleave', handleDragLeave, false);
  col.addEventListener('drop', handleDrop, false);
  col.addEventListener('dragend', handleDragEnd, false);
});

</script>
</body>
</html>