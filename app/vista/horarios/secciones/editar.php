<?php $titulo = "MODIFICAR HORARIO DE LA SECCIÓN";?>
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
<?php require_once "app/vista/plantilla/__navbar.php";  ?>
<main>
<section class="row" style="padding-bottom: 80px;">

  <!-- espacio reservado para mostrar cards de lado izquierdo -->
  <div class="col s12 m3 card-principal-izquierdo">

      <!-- panel principal para  unidad curricular-->
      <div class="card-unidad-curricular ">
        
        <div class="card ">

          <div class="center-align cyan tarjeta" >
            <img src="public/img/flat-book.png" alt="" class="responsive-img " width="90">
            <p class="titulo-tarjeta" >    </p>
          </div>

          <div class="card-content" style="padding: 0px;" >
            <ul class="collection"></ul> 
          </div>

        </div>
      </div>

  </div>

  <!-- espacio reservado para mostrar cards de lado derecho -->
  <div class="col s12 m9 card-principal-derecho">

    <!-- card de modificar docente  -->
    <div class="card-modificar-docente ">
      <div class="card ">

        <div class="card-content">

          <div class="valign-wrapper row">
          
            <h5 class="col s12">Docente Asignado</h5>

            <div class="col s6 div-botones">
              
            </div>
            
          </div>
          <div class="select_docentes row oculto">

            <div class="input-field col s10">
              <select id="docente"  name="docente"></select>
              <label>Seleccione docente</label>
            </div>
          
            <div class="col s2"> 
              <a href="#" class="btn btn-large green col s12 waves-effect" onclick="asignarDocente()">Agregar</a>
            </div>
          </div>

          <div class="row tabla-docente-asignado ">
            <div class="col s12">      
              <table  class="bordered centered highlight" id="tabla_docentes">

                <thead class="primario white-text">
                  <tr>
                    <th>CEDULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>      
            </div>
          </div>

        </div>

      </div>
    </div>

    <!-- card de modificar ambientes  -->
    <div class="card-modificar-ambientes ">
      
      <div class="card ">
        <div class="card-content">
          <div class="valign-wrapper row">
          
            <h5 class="col s12">Ambientes Asignados</h5>

            
          </div>

          <div class="row tabla-ambientes-asignados">
            <div class="col s12 ">      
              <table  class="bordered  centered highlight" id="tabla_ambientes">
                <thead class=" primario white-text">
                  <tr>
                    <th>BLOQUE</th>
                    <th>AMBIENTE</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table> 
            </div>
          </div>

          <div class="select_ambientes row oculto">

            <div class="input-field col s10">
              <select id="ambientes"  name="ambiente"></select>
              <label>Seleccione ambiente</label>
            </div>
          
            <div class="col s2"> 
              <a href="#" class="btn btn-large green col s12 waves-effect" onclick="cambiarAmbiente()">Agregar</a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>



  <div class="fixed-action-btn">
    <a href="?controlador=horariosSecciones&actividad=mostrar" class="btn-floating btn-large waves-effect waves-light  deep-orange  left" >
      <i class="material-icons ">arrow_back</i>
    </a>
  </div>


</section>


</main>




<?php require_once "app/vista/plantilla/__scripts.php";  ?>   
<script src="public/js/ajax/menu.js"></script>
<script>
          
  $(function(){
    
    var uc_seleccionada = JSON.parse( sessionStorage.getItem( 'uc_seleccionada' ) )
    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )

    $(".card-unidad-curricular ul.collection")
    .append(`<li class="collection-item">
              Codigo U.C.: 
              ${uc_seleccionada.codUniCur}
            </li>
            <li class="collection-item">
              Nombre: 
              ${uc_seleccionada.nombre}
            </li>
            <li class="collection-item">
              Horas de trabajo semanales: 
              ${uc_seleccionada.htas}
            </li>
    `)

    cargarDatosHorario()
  })

  function cargarDatosHorario(){

    var uc_seleccionada = JSON.parse( sessionStorage.getItem( 'uc_seleccionada' ) )
    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )

    $.ajax({ 
            
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=consultar-actividades-por-uc',
      data: { 
          "codSec" : seccion_seleccionada.codSec,
          "codUniCur" : uc_seleccionada.codUniCur
      }
    })
    .done(function(respuesta){

      var docente = respuesta.docente
      var actividades_horario = respuesta.actividades
      var contenido_tabla_ambientes = $("")

      sessionStorage.setItem( 'actividades_horario' , JSON.stringify( actividades_horario ) )

      if ( docente == false ) {

        $(".div-botones").html(`
                            <a  href="#" 
                                class="btn green btn-large right waves-effect"
                                onclick='clickCambiarDocente(  )'
                            >
                            ASIGNAR
                          </a>`)

        $("table#tabla_docentes").hide()
      }else{
        
        $(".div-botones").html(`
                            <a  href="#" 
                                class="btn deep-orange btn-large right waves-effect"
                                onclick='clickCambiarDocente(  )'
                            >
                           CAMBIAR
                          </a>`)
        

        $("table#tabla_docentes tbody").html(`
          <tr cedDoc="${ docente.cedDoc } ">
            <td> ${ docente.cedDoc } </td>
            <td> ${ docente.nombre } </td>
            <td> ${ docente.apellido } </td>
          </tr>
        `)
        $("table#tabla_docentes").show()  
      }
       

      $("table#tabla_ambientes tbody").html("")

      var btn_ambiente = false
      var ambiente = false
      
      $.each(actividades_horario, function(i,item){

            if ( item.codAmb == null ) {
              btn_ambiente = `<a  href="#" 
                                  class="btn green btn-large right waves-effect"
                                  onclick="clickCambiarAmbiente(  )"
                              >
                              agregar
                              </a>`
              ambiente = `<p> sin asignar </p>`
            }else{
              btn_ambiente = `<a  href="#" 
                                  class="btn deep-orange btn-large right waves-effect"
                                  onclick="clickCambiarAmbiente( )"
                              >
                              CAMBIAR
                              </a>`
              ambiente = item.codAmb
            }
            contenido_tabla_ambientes += `<tr 
                                              codAmb="${ item.codHor }" 
                                              codTie="${item.codTie}"
                                              codUniCur="${item.codUniCur}" 
                                              codSec="${item.codSec}"
                                          >
                                            <td> ${ item.codTie } </td>
                                            <td> ${ ambiente } </td>
                                            <td> ${ btn_ambiente } </td>
                                          </tr>`
      })

      $("table#tabla_ambientes tbody").html( contenido_tabla_ambientes )

    })
  }

  function clickCambiarDocente(  ){
    var actividades_horario = JSON.parse( sessionStorage.getItem('actividades_horario') )
    var array_bloques = []


    $.each( actividades_horario ,function(i,item){
      array_bloques.push( { "codTie" : item.codTie } ) 
    })

    
    $.ajax({ 
            
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horarios&actividad=consultar-docentes-disponibles',
      data: { "array_bloques" : array_bloques }
    })
    .done(function(respuesta){
      $("select#docente").html("")
        $.each( respuesta.data , function( i,item ){
          $("select#docente").append(`<option value="${ item.cedDoc } ">${ item.nombre }</option>`)
        })
      $("select#docente").material_select()
      $(".div-botones").hide()
      $(".select_docentes").show()
    })
  }

  function clickCambiarAmbiente(  ){

    var codTie = $("#tabla_ambientes tbody tr").attr( "codTie" )
    var codSec = $("#tabla_ambientes tbody tr").attr( "codSec" )
    var codUniCur = $("#tabla_ambientes tbody tr").attr( "codUniCur" )
    var array_bloques = []
   /* $.each( actividades_horario ,function(i,item){
      array_bloques.push( { "codTie" : item.codTie } ) 
    })*/
    array_bloques.push( { "codTie" : codTie } )
    $.ajax({ 
            
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosAmbientes&actividad=consultar-ambientes-disponibles',
      data: { 
        "array_bloques" : array_bloques
      }
    })
    .done(function(respuesta){

      $("select#ambientes").html("")
        $.each( respuesta.data , function( i,item ){
          $("select#ambientes").append(`<option value="${ item.codAmb }" codTie="${ codTie }" >${ item.codAmb }</option>`)
        })
      $("select#ambientes").material_select()
      $(".select_ambientes").show()
    })
  }

  function cambiarAmbiente(  ){

    var uc_seleccionada = JSON.parse( sessionStorage.getItem( 'uc_seleccionada' ) )
    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )
    var codAmb = $("select#ambientes option:selected").val( )
    var codTie = $("select#ambientes option:selected").attr("codTie")



    $.ajax({ 
                
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=cambiar-ambiente-horario',
      data: { 
        "codAmb" : codAmb,
        "codTie" : codTie,
        "codUniCur" : uc_seleccionada.codUniCur,
        "codSec" : seccion_seleccionada.codSec
      }
    })
    .done(function(respuesta){
        if ( respuesta.operacion == true ) {
          Materialize.toast(
            'Listo...',
            1000,
            '',
            function(){ 
              cargarDatosHorario()

            }
          )

          $(".div-botones-ambiente").show()
          $(".select_ambientes").hide()


        }else{
          Materialize.toast('Error...',1000)

          $(".div-botones-ambiente").show()
          $(".select_ambientes").hide()
          $("#tabla_ambientes").hide()
        }


    })
  }

  function asignarDocente(){

    var cedDoc = $("select#docente option:selected").val( )
    var uc_seleccionada = JSON.parse( sessionStorage.getItem( 'uc_seleccionada' ) )
    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )
  

    $.ajax({ 
                
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=cambiar-docente-horario',
      data: { 
        "cedDoc" : cedDoc,
        "codUniCur" : uc_seleccionada.codUniCur,
        "codSec" : seccion_seleccionada.codSec
      }
    })
    .done(function(respuesta){
        if ( respuesta.operacion == true ) {
          Materialize.toast(
            'Listo...',
            1000,
            '',
            function(){ 
              cargarDatosHorario()

            }
          )

          $(".div-botones").show()
          $(".select_docentes").hide()

        }else{
          Materialize.toast('Error...',1000)

          $(".div-botones").show()
          $(".select_docentes").hide()

        }


    })
  }
</script>
</body>
</html>