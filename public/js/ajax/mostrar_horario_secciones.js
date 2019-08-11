  $(function(){ cargarUnidadesCurriculares() })

  function cargarUnidadesCurriculares(){

    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )
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
          
    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )
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

      $.each( respuesta.data , function (i,item) {

        if ( item.nombredocente == null ) {

          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").html(` <h6> ${item.codUniCur} <br>
                                                                                ${item.nombremateria} <br>
                                                                            </h6> `)
        } else {

          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").html(` <h6> ${item.codUniCur} <br>
                                                                                ${item.nombremateria} <br>
                                                                                ${item.nombredocente} <br>
                                                                                ${item.codAmb} <br>
                                                                            </h6> `)
        }

          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("ocupado","ocupado")
          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codUniCur",item.codUniCur)
          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codAmb",item.codAmb)
          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codSec",item.codSec)
          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("cedDoc",item.cedDoc)
          $(""+ tabla_a_usar +" tr td[codTie="+item.codTie+"] div").attr("codHor",item.codHor)
      })
    })            
  }

  function pintarUnidadesCurricularesAsignadas(){

    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )
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
  }

  function clickAsignarActividades(){

    $("#modal_operaciones").modal("close")
    location.href = "index.php?controlador=horariosSecciones&actividad=asignar"
  }

  function clickEliminarActividades(){

    // $("#modal_operaciones").modal("close")
    var uc_seleccionada = JSON.parse( sessionStorage.getItem( 'uc_seleccionada' ) )
    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )

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

    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )

    sessionStorage.setItem( 'uc_seleccionada' , JSON.stringify( uc_seleccionada ) )

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

function moverBloque(codHor, codTie) {

  $.ajax({ 

  dataType : 'json' ,
  type:'POST' , 
  url:'?controlador=horariosSecciones&actividad=mover-bloques',
  data: { 
    "codHor" : codHor,
    "codTie" : codTie
  }
  })
  .done(function(respuesta){

    Materialize.toast('Bloque Movido Exitosamente ', 1000,"",function(){
      location.href = "?controlador=horariosSecciones&actividad=mostrar"
    });
  })
}


  function postEsteganografia(nombreImg){
  var codigo_item_seleccionado = $(this).parents("tr").data("id")
  var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )
  $.ajax({ 

    dataType : 'json' ,
    type:'POST' , 
    url:'index.php?controlador=horariosSecciones&actividad=vaciar-horario',
    data:{ 
      "seccion_seleccionada" : seccion_seleccionada['codSec'], 
      "nombreImagen": nombreImg
    } 
  }) 
  .done(function(respuesta){
    Materialize.toast('Horario Removido Exitosamente',1000,'',function(){ location.href = '?controlador=horariosSecciones&actividad=mostrar' });
  })        
}


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

    moverBloque( codHor, codTie)
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