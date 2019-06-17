<?php $titulo = "Horario de Docente";?>    
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
  <section class="row">
    <!-- espacio reservado para mostrar cards de lado izquierdo -->
    <div class="col s12 m3 card-principal-izquierdo">
      <div class="card card-unidades-curriculares ">

      <div class="center-align primario tarjeta" >
        <img src="public/img/flat-book.png" alt="" class="responsive-img " width="90">
        <p class="titulo-tarjeta"> Informacion Del Docente </p>
      </div>

      <div class="card-content" style="padding: 0px;" >
        <ul class="collection docente" ></ul>  
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
    <div class="col s12 m9 card-principal-derecho">

        <span><button class='btn primario' title="Agregar Actividad Administrativa" id="agregarActAdm" > Agregar </button> </span>
        <span><button class=' btn primario' title="Quitar Actividad Administrativa" onclick="quitarBotonAsignarActividades()"> Eliminar </button> </span>

        <span><button class='btn primario TurnoManana' title="Turno Mañana"> Mañana </button> </span>
        <span><button class=' btn primario TurnoTarde' title="Turno Tarde"> Tarde </button> </span>
        <span><button class=' btn primario TurnoNoche' title="Turno Noche"> Noche </button></span>
      <!-- plantillas de horarios  -->
      <div class="card-plantilla-horario">
        <?php require_once "app/vista/horarios/docentes/plantilla_horarios.php"; ?>
      </div>
    </div>
  </section>
</main>

<div class="fixed-action-btn">

  <a href="?controlador=horariosDocentes&actividad=index" class="btn-floating btn-large waves-effect waves-light  deep-orange left " >
    <i class="material-icons ">arrow_back</i>
  </a>
</div>

    <div id="asignarActAdm" class="modal ">

      <div class="modal-header secundario">
        <span class="white-text">
          Asignar Actividad Administrativa
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearPnf" >
          <div class="row">
            <div class="col s12 m12 input-field">
              <div class="col s12 m12 input-field">
                <select id="tipoActAdm" name="tipoActAdm" required>
                  <option value="0" selected disabled> Seleccione el Tipo de Actividad </option>
                </select>
              </div>
<!--               <div class="col s12 m6 input-field">
                <select id="Dependencia" name="Dependencia" required>
                  <option value="" selected disabled> Seleccione la Dependencia </option>
                </select>
              </div> -->
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 input-field">
              <select id="titulo" name="titulo" required>
                <option value="0" selected disabled> Seleccione la Actividad </option>
              </select>
            </div>
          </div>

          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="button" class="btnCrearPnf btn btn-large waves-effect waves-light primario" onclick="botonAsignarActividades()"  >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>   

<script src="public/js/ajax/menu.js"></script>
<script>
  $(function(){ mostrarBloques() })

  function mostrarBloques(  ){
                
    var docente_seleccionado = JSON.parse( localStorage.getItem( 'docente_seleccionado' ) )
        
    $.ajax({           
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosDocentes&actividad=consultar',
      data: { "cedDoc" : docente_seleccionado.cedDoc }
    })
    .done(function(respuesta){

      console.log(respuesta)

      $.each( respuesta.data , function (i,item) {

        if ( item.tipo == 1 ) {

          $("table tr td[codTie="+item.codTie+"] div").html(`<h6> ${item.codUniCur} <br>
                                                                  ${item.nombremateria} <br>
                                                                  ${item.codAmb} <br>
                                                             </h6>`)
          $("table tr td[codTie="+item.codTie+"] div").attr("ocupado","ocupado")
          $("table tr td[codTie="+item.codTie+"] div").attr("codUniCur",item.codUniCur)
          $("table tr td[codTie="+item.codTie+"] div").attr("codAmb",item.codAmb)
          $("table tr td[codTie="+item.codTie+"] div").attr("codSec",item.codSec)
          $("table tr td[codTie="+item.codTie+"] div").attr("cedDoc",item.cedDoc)
          $("table tr td[codTie="+item.codTie+"] div").attr("codHor",item.codHor)
          $("table tr td[codTie="+item.codTie+"] div").removeAttr('draggable')
          $("table tr td[codTie="+item.codTie+"] div").removeAttr('class')
        } else if( item.tipo == 2) {

          $("table tr td[codTie="+item.codTie+"] div").html(`<h6>${item.titulo} <br> Tipo: ${item.tipActAdm}</h6>`)
          $("table tr td[codTie="+item.codTie+"] div").attr("ocupado","ocupado")
          $("table tr td[codTie="+item.codTie+"] div").attr("tipo","2")
          $("table tr td[codTie="+item.codTie+"] div").attr("codHor",item.codHor)
        }


      })
      $(".turno1").show();
      mostrarInformacionDocente()
    })
  }

function mostrarInformacionDocente() {

var docente_seleccionado = JSON.parse( localStorage.getItem( 'docente_seleccionado' ) )
var estadoDelDocente

if (docente_seleccionado.estado == true) {

  estadoDelDocente = 'Activo'
} else {

  estadoDelDocente = 'Inactivo'
}

    content = `<h5> Cedula: ${docente_seleccionado.cedDoc} </h5>
                <h5> Nombre: ${docente_seleccionado.nombre} </h5>
                <h5> Apellido: ${docente_seleccionado.apellido} </h5>
                <h5> Telefono: ${docente_seleccionado.telefono} </h5>
                <h5> Correo: ${docente_seleccionado.correo} </h5>
                <h5> Estado: ${estadoDelDocente} </h5>
                <h5> Observaciones: ${docente_seleccionado.observaciones} </h5>`

  $("ul.docente").append(content)
} // Fin Funcion mostrarInformacionDocente


$('#agregarActAdm').click(function() {

  var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )

  $('#titulo').val("0")

  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosDocentes&actividad=listarSelectTipoActAdm',
    data: obj_actividad
  })

  .done(function(respuesta){

    console.log( respuesta )

    if (respuesta.data.cantidad > 0) {

    var tipo
    var contenidoHTML = $("")

      for ( i in respuesta.data.data ) {

          contenidoHTML = `<option value="${respuesta.data.data[i].tipActAdm}">
                                ${respuesta.data.data[i].tipActAdm}
                            </option>`

          $('#tipoActAdm').append(contenidoHTML)
      }

    }else{

       $('#tipoActAdm').html(`<option value="">
                                No se encuentran ActAdms registrados en la base de datos
                            </option>`)
}

  $('select').material_select()
     
  })

  $('#asignarActAdm').modal('open')
});


function botonAsignarActividades() {

  $('#asignarActAdm').modal('close')
  $('.card-guardar-todo').show();
  $('#eliminarTodo').hide();
  $('#guardarTodo').show();

  $('table tbody tr td div[ocupado]').each(function(index, el) {
    
    var td = $(this).find('td');

    if ( $(this).attr('ocupado') == 'desocupado' ) {

      $(this).html('<div class="switch"> <label> <input type="checkbox" name="switchAsignarBloque" onchange="clickSwitchAsignarBloque( $(this) )"> <span class="lever"></span> </label> </div>')
    }

    $(this).removeAttr('draggable')
    $(this).removeAttr('class')
  });
}

function quitarBotonAsignarActividades() {

  $('.card-guardar-todo').show();
  $('#guardarTodo').hide();
  $('#eliminarTodo').show();

  $('table tbody tr td div[ocupado]').each(function(index, el) {
    
    var td = $(this).find('td');

    if ( $(this).attr('tipo') == '2' ) {

      $(this).html('<div class="switch"> <label> <input type="checkbox" name="switchAsignarBloque" onchange="clickSwitchRemoverBloque( $(this) )"> <span class="lever"></span> </label> </div>')
      $(this).parents("td").addClass("grey lighten-2")
    }

      $(this).removeAttr('draggable')
      $(this).removeAttr('class')
  });
}

function clickSwitchRemoverBloque( elemento ) {

  var codTie = elemento.parents("td").attr("codTie")
  // var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )
  var bloques_A_Eliminar = []

  if(elemento.is(":checked")) {

    // console.log($(this))
    elemento.parents("td").addClass("grey lighten-2")
  }else {

    bloques_A_Eliminar.push( elemento.attr('codHor') )

    elemento.parents("td").removeClass("grey lighten-2")
    localStorage.setItem("RemoverBloques", JSON.stringify( bloques_A_Eliminar ))
  }
}

function clickSwitchAsignarBloque( elemento ) {

  var codTie = elemento.parents("td").attr("codTie")

  if(elemento.is(":checked")) {
          
    elemento.parents("td")
    .addClass("grey lighten-2")
  }else {

    elemento.parents("td").removeClass("grey lighten-2") 
  }
}

function guardarTodo(){

  var bloqueHoras = []

  $("input:checkbox:checked").each(function (index) {

      bloqueHoras.push( $(this).parents("td").attr("codTie") )
  })

  var tipo = $('#tipoActAdm').val()
  var titulo = $('#titulo').val()
  var docente = JSON.parse( localStorage.getItem("docente_seleccionado") )

  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosDocentes&actividad=almacenarActAdm',
    data: { "bloqueHora" : bloqueHoras,
            "tipo" : tipo,
            "codActAdm" : titulo,
            "docente": docente }
  })
  .done(function(respuesta){

    Materialize.toast(
        'Actividades Asignadas Al Docente',
        1000,
        '',
        function(){ 
          location.href = '?controlador=horariosDocentes&actividad=mostrar' 
        }
    )       
  })
}

function EliminarTodo() {

  var bloqueHoras = []

  $("input:checkbox:checked").each(function (index) {

      bloqueHoras.push( $(this).parents("td").children('div').attr('codhor') )
  })

  console.log(bloqueHoras)

  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosDocentes&actividad=eliminarActAdm',
    data: { "bloqueHora" : bloqueHoras }
  })
  .done(function(respuesta){

    Materialize.toast(
        'Actividades Eliminadas Exitosamente',
        1000,
        '',
        function(){ 
          location.href = '?controlador=horariosDocentes&actividad=mostrar' 
        }
    )       
  })
}

function listarSelectTipoActAdm() {

  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosDocentes&actividad=listarSelectTipoActAdm'
  })
  .done(function(respuesta){

    console.log( respuesta )

    // Materialize.toast(
    //     'Actividades Asignadas Al Docente',
    //     1000,
    //     '',
    //     function(){ 
    //       location.href = '?controlador=horariosDocentes&actividad=mostrar' 
    //     }
    // )       
  })
}


  /* Act on the event */

$("#tipoActAdm").change(function() {

  var tipo = $('#tipoActAdm').val();

  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosDocentes&actividad=listarActiAdmiPorTipo',
    data: { "tipo" : tipo }
  })
  .done(function(respuesta){

    console.log( respuesta )

    if (respuesta.data.cantidad > 0) {

    var contenidoHTML = $("")

      for ( i in respuesta.data.data ) {

          contenidoHTML += `<option value="${respuesta.data.data[i].codActAdm}">
                                ${respuesta.data.data[i].titulo}
                            </option>`

          $('#titulo').html(contenidoHTML)
      }

    }else{

       $('#titulo').html(`<option value="">
                                No se encuentran Actividades Administrativas Registrados
                            </option>`)
    }  

    $('select').material_select()
  })
});

function moverBloque(codHor, codTie) {

  $.ajax({ 

    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosDocentes&actividad=mover-bloques',
    data: { 
      "codHor" : codHor,
      "codTie" : codTie
    }
  })
  .done(function(respuesta){

    Materialize.toast('Bloque Movido Exitosamente ', 1000);
  })
}

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
   // if ( e.target.getAttribute("ocupado") == 'ocupado' ) {
   //   // alert('Ocupado')
   // } else if ( e.target.getAttribute("ocupado") == 'desocupado' ) {
   //   // alert('Desocupado')
   // }

// console.log( e.target.getAttribute("ocupado") )
// console.log(e)
}

function handleDrop(e) {
  if (e.stopPropagation) {
    e.stopPropagation(); //evitamos abrir contenido en otra pagina al soltar
  }
  //hacemos el intercambio de contenido html de el elemento origne y destino
  // dragSrcEl Es El Valor del bloque que estoy tomando
  // this Es El Valor del bloque donde estoy soltando

  // if (dragSrcEl != this) {

    // alert(dragSrcEl.innerHTML)
    // dragSrcEl.innerHTML = this.innerHTML;
    // this.innerHTML = dragSrcEl.innerHTML;
    // e.dataTransfer.getData('text/html');
    // this.innerHTML = e.dataTransfer.getData('text/html');
    // this.classList.remove('over');
  // }

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

    moverBloque( codHor, codTie)
   } else if ( dragSrcEl.getAttribute("ocupado") == 'desocupado' ) {

    alert('No Puede Mover Un Bloque Desocupado')
   }

  // console.log( dragSrcEl.parentNode.getAttribute("codtie") )
  // console.log(e)
  // console.log( dragSrcEl.getAttribute("codHor") )
  // console.log( this.getAttribute("codHor") )
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