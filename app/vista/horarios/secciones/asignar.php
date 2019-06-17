<?php $titulo = "HORARIO DE LA SECCIÓN";?>
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

      <!-- card de asignacion de ambientes  -->
      <div class="card-guardar-todo oculto"> 
        <div class="card ">
          <div class="card-content">
            <div class="row">
              <div class=" col s12 valign-wrapper">
                <p class="flow-text">¿Desea guardar todos los cambios?</p>
              </div>

              <a href="#" 
                 class="btn cyan col s12 pulse waves-effect input-field"
                 onclick="guardarTodo()" 
              >Guardar todo</a>  
              
              <a href="#" class="btn btn-flat col s12 waves-effect input-field">Cancelar todo</a>    
            </div>
          </div>
        </div>
      </div>

  </div>

  <!-- espacio reservado para mostrar cards de lado derecho -->
  <div class="col s12 m9 card-principal-derecho">
    
    <!-- plantillas de horarios  -->
    <div class="card-plantilla-horario">
      <?php require_once "app/vista/horarios/secciones/plantilla_horarios.php"; ?>
    </div>

    <!-- card de asignacion de docente  -->
    <div class="card-asignar-docente oculto">
      <div class="card ">

        <div class="card-content">

          <div class="valign-wrapper">
            <h5>Asignacion de docente</h5>
          </div>

          <div class="row select_docentes">

            <div class="input-field col s10">
              <select id="docente"  name="docente"></select>
              <label>Seleccione docente</label>
            </div>
          
            <div class="col s2"> 
              <a href="#" class="btn btn-large cyan col s12 waves-effect" onclick="asignarDocente()">Agregar</a>
            </div>
          </div>

          <div class="row tabla-docente-asignado oculto">
            <div class="col s12">      
              <table  class="bordered highlight">
                <thead class="teal white-text">
                  <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>      
            </div>
          </div>

        </div>

      </div>
    </div>

    <!-- card de asignacion de ambientes  -->
    <div class="card-asignar-ambientes oculto">
      
      <div class="card ">
        <div class="card-content">
          <div class="valign-wrapper row">
          
            <h5 class="col s6">Asignacion de ambientes</h5>
            
            <div class="col s6">
              <a  href="#" 
                  class="btn cyan btn-large right waves-effect btn-click-asignar-ambiente"
                  onclick='clickAsignarAmbientes( $(this) )'
              >
                Agregar ambiente
              </a>
            </div>

          </div>

          <div class="row select_ambientes oculto">
            
            <div class="input-field col s5">
              <select 
                id="bloques"  
                name="bloques" 
                multiple 
                onchange='
                  if ( $("#bloques option:selected").length == 0 ) {

                    $("select#ambiente").html("")
                    $("select#ambiente").attr("disabled")
                    $("select#ambiente").material_select()

                  }else{
                    
                    

                    var array_bloques=[]
                    var $el=$("select#bloques")
                    
                    $el.find("option:selected").each(function(){
                        array_bloques.push({ "codTie" : $(this).val() })
                    })



                    $.ajax({           
                      dataType : "json" ,
                      type:"POST" , 
                      url:"?controlador=horariosSecciones&actividad=consultar-ambientes-disponibles",
                      data:{
                        "array_bloques" : array_bloques
                      }
                    })
                    .done(function(respuesta){

                      $("select#ambiente").html("")
                      $("select#ambiente").removeAttr("disabled")
                      $.each(respuesta.data,function(i,item){

                        $("select#ambiente").append(`<option value="${item.codAmb}">${item.codAmb}</option>`)

                       
                          
                      })

                      $("select#ambiente").material_select()
                    })
                  }
                
              '>
                
              </select>
              <label>Seleccione los bloques</label>
            </div>

            <div class="input-field col s5">
              <select id="ambiente"  name="ambiente" disabled></select>
              <label>Seleccione un ambiente</label>
            </div>
            
            <div class="col s2">
              
              <a 
                href="#" 
                class="btn btn-large cyan col s12 waves-effect " 
                onclick='asignarAmbiente()  '
              >Listo</a>
            </div>
          </div>

          <div class="row tabla-ambientes-asignados">
            <div class="col s12 ">      
              <table  class="bordered highlight">
                <thead class="teal white-text">
                  <tr>
                    <th>Bloque</th>
                    <th>Ambiente</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table> 
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>

<div class="fixed-action-btn boton-paso-2" >
  <a class="btn-floating btn btn-large cyan  " onclick="mostrarPaso2()">
    <i class="material-icons">arrow_forward</i>
  </a>
</div>

</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>   
<script src="public/js/ajax/menu.js"></script>
<script>
          
  $(function(){
      
    mostrarBloques(  )
    var uc_seleccionada = JSON.parse( localStorage.getItem( 'uc_seleccionada' ) )
    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
    var objeto_actividad = {
      "codUniCur" : uc_seleccionada.codUniCur,
      "codSec" : seccion_seleccionada.codSec,
      "cedDoc" : "S/A",
      "array_bloques" : []
    }          
    localStorage.setItem( 'obj_actividad' , JSON.stringify( objeto_actividad ) )                    
  })

  function mostrarBloques(  ){
          
    var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
    var tablaAUsar = false
    if ( seccion_seleccionada.turno == 1 ) {
      tablaAUsar = "table#tablaTurno1" 
      $('div .turno1').show() 
    }
    if ( seccion_seleccionada.turno == 2 ) {
      tablaAUsar = "table#tablaTurno2" 
      $('div .turno2').show() 
    }
    if ( seccion_seleccionada.turno == 3 ) {
      tablaAUsar = "table#tablaTurno3" 
      $('div .turno3').show() 
    }
    $.ajax({ 
            
      dataType : 'json' ,
      type:'POST' , 
      url:'?controlador=horariosSecciones&actividad=consultar',
      data: { "codSec" : seccion_seleccionada.codSec, "fase_seleccionada" : seccion_seleccionada.fase_seleccionada  }
    })
    .done(function(respuesta){

      $.each( respuesta.data , function (i,item) {

        $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"] div").html(`<p >${item.codUniCur}</p>`)
        $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"] div").attr("ocupado","ocupado")
        $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"] div").attr("codUniCur",item.codUniCur)
        $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"] div").attr("codAmb",item.codAmb)
        $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"] div").attr("codSec",item.codSec)
        $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"] div").attr("cedDoc",item.cedDoc)
        $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"] div").attr("codHor",item.codHor)   
      })
      
      var uc_seleccionada = JSON.parse( localStorage.getItem( 'uc_seleccionada' ) )

      $("table tr td div[ocupado=desocupado]")
      .append(`<div class="switch">
                <label>
                  <input 
                    type="checkbox" 
                    name="switchAsignarBloque" 
                    onchange="clickSwitchAsignarBloque( $(this) )" 
                  >
                  <span class="lever"></span>
                </label>
              </div>`)
      $(".card-unidad-curricular p.titulo-tarjeta")
      .append(`${uc_seleccionada.nombre}`)
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
    })            
  }

  // evento al dar click a un suiche
  function clickSwitchAsignarBloque( elemento ) {

    var codTie = elemento.parents("td").attr("codTie")
    var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )

    if(elemento.is(":checked")) {
            
      elemento.parents("td")
      .addClass("grey lighten-2")
      obj_actividad.array_bloques.push( { "codTie" : codTie, "codAmb" : "S/A" } )
      localStorage.setItem("obj_actividad", JSON.stringify( obj_actividad ))
    }else {

      elemento.parents("td").removeClass("grey lighten-2") 
      var indice = obj_actividad.array_bloques.indexOf(codTie); // obtenemos el indice
      obj_actividad.array_bloques.splice(indice, 1); // 1 es la cantidad de elemento a eliminar
      localStorage.setItem("obj_actividad", JSON.stringify( obj_actividad ))
    }
  }

  // click boton paso 2
  function mostrarPaso2(  ){
    var uc_seleccionada = JSON.parse( localStorage.getItem( 'uc_seleccionada' ) )

    if ( $("input[name=switchAsignarBloque]:checked").length == 0 ){

      Materialize.toast('Debe seleccionar los respectivos bloques de hora',997)
      return false;
    }else if ( $("input[name=switchAsignarBloque]:checked").length < uc_seleccionada.htas ){

      Materialize.toast('Aun no se completan la totalidad de horas de trabajos semanales',997)
      return false;    
    }else if ( $("input[name=switchAsignarBloque]:checked").length > uc_seleccionada.htas ){

      Materialize.toast('Ha superado la cantidad de horas de trabajo para esta unidad curricular',997)
      return false;
    }else if ( $("input[name=switchAsignarBloque]:checked").length == uc_seleccionada.htas ) {

      var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )
              
      $.ajax({           
        dataType : 'json' ,
        type:'POST' , 
        url:'?controlador=horarios&actividad=consultar-docentes-disponibles',
        data: { "array_bloques" : obj_actividad.array_bloques } 
      })
      .done(function(respuesta){

        $(".card-asignar-docente select#docente").html("")
        $.each( respuesta.data, function( i,item ){
          $(".card-asignar-docente select#docente")
          .append(`
                    <option 
                      value="${item.cedDoc}" 
                      cedDoc="${item.cedDoc}" 
                      nombre="${item.nombre}" 
                      apellido="${item.apellido}"
                    > 
                      ${item.nombre} - ${item.apellido}
                    </option>
          `)
        })
        $(".card-asignar-docente select#docente").material_select()          
      })

      mostrarBloquesAmbientes()
      $(".card-asignar-docente").show()
      $(".card-asignar-ambientes").show()
      $(".card-guardar-todo").show()
      $(".card-plantilla-horario").hide()
      $(".boton-paso-2").hide()
    }     
  }


function asignarDocente(){

  var cedDoc = $(".card-asignar-docente select#docente option:selected").attr("cedDoc")
  var nombre = $(".card-asignar-docente select#docente option:selected").attr("nombre")
  var apellido = $(".card-asignar-docente select#docente option:selected").attr("apellido") 
  var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )
  obj_actividad.cedDoc = cedDoc
  localStorage.setItem("obj_actividad", JSON.stringify( obj_actividad ))
  $(".card-asignar-docente .tabla-docente-asignado table tbody")
  .append(`
    <tr>
      <td>${ cedDoc }</td>
      <td>${ nombre }</td>
      <td>${ apellido }</td>
    </tr>
  `)
  $(".card-asignar-docente .select_docentes").hide()
  $(".card-asignar-docente .tabla-docente-asignado").show()
  Materialize.toast('Listo...',997)
}

function clickAsignarAmbientes( elemento ){

  var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )
  $("select#bloques").html("")

  $.each( obj_actividad.array_bloques , function( i,item ){
            
    if ( item.codAmb == "S/A" ) {
      $("select#bloques")
      .append(`
        <option value="${item.codTie}"> 
        ${item.codTie} 
        </option>
      `)
    }  
  })
  $("select#bloques").material_select()
  $(".select_ambientes").show()
  elemento.hide()
}

function asignarAmbiente(){

  var codAmb = $("select#ambiente option:selected").val( )
  var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )
  var array_bloques_seleccionados=[]
  var $el=$("select#bloques")              
  $el.find("option:selected").each(function(){
            array_bloques_seleccionados.push( $(this).val() )
  })


  for (var i = 0; i < obj_actividad.array_bloques.length; i++) {

    for (var j = 0; j < array_bloques_seleccionados.length; j++) {

      if ( obj_actividad.array_bloques[i].codTie == array_bloques_seleccionados[j] ) {
              
        obj_actividad.array_bloques[i].codAmb = codAmb
      }
    }        
  }

  localStorage.setItem("obj_actividad", JSON.stringify( obj_actividad ))               
  mostrarBloquesAmbientes()
  $(".select_ambientes").hide()
  $(".btn-click-asignar-ambiente").show()
  $("select#ambiente").html("")
  $("select#ambiente").attr("disabled")
  $("select#ambiente").material_select()
}        

function mostrarBloquesAmbientes(){

  var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )
  $(".card-asignar-ambientes .tabla-ambientes-asignados table tbody").html("")
  $.each( obj_actividad.array_bloques,function(i,item){

    var ambiente = item.codAmb
    if ( ambiente == "S/A" ) {

      ambiente = `<p>Sin asignar</p>`
    }

    $(".card-asignar-ambientes .tabla-ambientes-asignados table tbody")
    .append(`
        <tr codTie="${item.codTie}" >
          <td>${item.codTie}</td>
          <td>${ ambiente }</td>
        </tr>
    `)
  })
}

// click boton paso 2
function guardarTodo(  ){

  var obj_actividad = JSON.parse( localStorage.getItem("obj_actividad") )
  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosSecciones&actividad=almacenar',
    data: obj_actividad
  })
  .done(function(respuesta){

    Materialize.toast(
        'Actividades Asignadas Al Horario',
        1700,
        '',
        function(){ 
          location.href = '?controlador=horariosSecciones&actividad=mostrar' 
        }
    )       
  })
}
</script>
</body>
</html>