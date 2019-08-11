
$(".btn-generar-consulta").on("click",function(){
})

function mostrarHorarioDocente( cedDoc ){
  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosDocentes&actividad=consultar',
    data: { "cedDoc" : cedDoc }
  })
  .done(function(respuesta){

    var ambiente = ""

    $.each( respuesta.data , function (i,item) {

      if ( item.tipo == 1 ) {

        if ( item.codAmb == null ) {
          ambiente = "sin ambiente"
        }else{
          ambiente = item.codAmb
        }
        
        $("table tr td[codTie="+item.codTie+"]").html("")
        $("table tr td[codTie="+item.codTie+"]")
        .append(`
          <h6> ${item.codUniCur} <br>
                  ${item.nombremateria} <br>
                  ${item.codSec} <br>
                  ${ambiente} <br>
          </h6>`)


        $("table tr td[codTie="+item.codTie+"]").attr("ocupado","ocupado")
        $("table tr td[codTie="+item.codTie+"]").attr("codUniCur",item.codUniCur)
        $("table tr td[codTie="+item.codTie+"]").attr("codAmb",item.codAmb)
        $("table tr td[codTie="+item.codTie+"]").attr("codSec",item.codSec)
        $("table tr td[codTie="+item.codTie+"]").attr("cedDoc",item.cedDoc)
        $("table tr td[codTie="+item.codTie+"]").attr("codHor",item.codHor)
        $("table tr td[codTie="+item.codTie+"]").removeAttr('draggable')
        $("table tr td[codTie="+item.codTie+"]").removeAttr('class')

      } else if( item.tipo == 2) {

        $("table tr td[codTie="+item.codTie+"]").html(`<h6>${item.titulo} <br> Tipo: ${item.tipActAdm}</h6>`)
        $("table tr td[codTie="+item.codTie+"]").attr("ocupado","ocupado")
        $("table tr td[codTie="+item.codTie+"]").attr("tipo","2")
        $("table tr td[codTie="+item.codTie+"]").attr("codHor",item.codHor)
      }


    })
    
  })
}

function mostrarHorarioAmbiente( codAmb ){
  $.ajax({           
    dataType : 'json' ,
    type:'POST' , 
    url:'?controlador=horariosAmbientes&actividad=consultar',
    data: { "codAmb" : codAmb }
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
    
  })
}

function clickDocenteItem( cedDoc ){

  if ( $("#formHorarioSeccion input[name=tipo_consulta]:checked").val() == "CD" ) {
    
    sessionStorage.setItem( "docente_seleccionado" , JSON.stringify( cedDoc ) )
    sessionStorage.setItem( "consulta" , "consultar-disponibilidad-docente" )
    $(".plantilla table tr td.bloque-de-hora")
    .append(`<div class="switch">
              <label>
                <input 
                  type="checkbox" 
                  name="switchConsultarBloques" 
                  onchange="" 
                >
                <span class="lever"></span>
              </label>
            </div>`)
    $(".btn-generar-consulta").show()
  }else{
    
    mostrarHorarioDocente( cedDoc )
  }

  $(".formularios").hide("slow")
  $(".resultados_busqueda").hide("slow")
  $('div .botones-de-turnos').show() 
  $('div .turno1').show() 
  $(".btn-atras").show()
  $(".plantilla").show("slow")
}



function clickSeccionItem( codSec , turno ){
      sessionStorage.setItem( "seccion_seleccionada" , JSON.stringify( codSec ) )
    sessionStorage.setItem( "consulta" , "consultar-disponibilidad-seccion" )
    $('.btn-generar-consulta').addClass('oculto')
  var tabla_a_usar = false
    $(".plantilla table tr td.bloque-de-hora")
    .append(`<div class="switch">
              <label>
                <input 
                  type="checkbox" 
                  name="switchConsultarBloques" 
                  onchange="" 
                >
                <span class="lever"></span>
              </label>
            </div>`)
  $('.btn-limpiar-consulta').show();
  if ( turno == 1 ) {
    tabla_a_usar = "table#tablaTurno1" 
    $('div .turno1').show() 
  }

  if ( turno == 2 ) {
    tabla_a_usar = "table#tablaTurno2" 
    $('div .turno2').show() 
  }

  if ( turno == 3 ) {
    tabla_a_usar = "table#tablaTurno3" 
    $('div .turno3').show() 
  }

  //console.log( $("#formHorarioSeccion input[name=tipo_consulta]:checked").val() )
  $(".formularios").hide("slow")
  $(".resultados_busqueda").hide("slow")
  $(".btn-atras").show()
  $('div .fase').show() 
  $(".plantilla").show("slow")
}

function clickAmbienteItem( codAmb ){
  if ( $("#formHorarioSeccion input[name=tipo_consulta]:checked").val() == "CD" ) {
    sessionStorage.setItem( "ambiente_seleccionado" , JSON.stringify( codAmb ) )
    sessionStorage.setItem( "consulta" , "consultar-disponibilidad-ambiente" )
    $(".plantilla table tr td.bloque-de-hora")
    .append(`<div class="switch">
              <label>
                <input 
                  type="checkbox" 
                  name="switchConsultarBloques" 
                  onchange="" 
                >
                <span class="lever"></span>
              </label>
            </div>`)
    $(".btn-generar-consulta").show()
  }else{
    mostrarHorarioAmbiente( codAmb )
  }

  $(".formularios").hide("slow")
  $(".resultados_busqueda").hide("slow")
  $('div .botones-de-turnos').show() 
  $('div .turno1').show() 
  $(".btn-atras").show()
  $(".plantilla").show("slow")
}


function limpiarConsultaSeccion(){
  if ( $("input[name=switchConsultarBloques]:checked").length >= 0 ){
    $('.fase').removeClass('oculto')
    $('.bloque-de-hora').empty();
    $('.bloque-de-hora').append(`<div class="switch">
              <label>
                <input 
                  type="checkbox" 
                  name="switchConsultarBloques" 
                  onchange="" 
                >
                <span class="lever"></span>
              </label>
            </div>`)
    $("input[name=switchConsultarBloques]:checked").prop( "checked", false );
    
    Materialize.toast('Has limpiado la consulta',997)
    return false;

  }
}

function realizarConsultaDisponibilidad( fase ){

  if ( $("input[name=switchConsultarBloques]:checked").length == 0 ){
      $('.bloque-de-hora').empty();
    $('.bloque-de-hora').append(`<div class="switch">
              <label>
                <input 
                  type="checkbox" 
                  name="switchConsultarBloques" 
                  onchange="" 
                >
                <span class="lever"></span>
              </label>
            </div>`)
    
      $("input[name=switchConsultarBloques]:checked").prop( "checked", false );
    Materialize.toast('Debe seleccionar almenos un bloque de hora para consultar',997)
    return false;

  }
  
  else {

    var seccion_seleccionada = JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' ) )
    var arrayBloquesChecked = []


    var consulta = sessionStorage.getItem( 'consulta' ) 

       if ( consulta == "consultar-disponibilidad-seccion" ) {
      $.ajax({           
          dataType : 'json' ,
          type:'POST' , 
          url:'?controlador=horariosSecciones&actividad=consultar',
          data: {
            "codSec" : JSON.parse( sessionStorage.getItem( 'seccion_seleccionada' )),
            "fase_seleccionada" : fase
          }
      })
      .done(function(respuesta){

        if (respuesta.data.length>0) {
          var arrayBloquesChecked = []
          $("input[name=switchConsultarBloques]:checked").each(function(i,item){
            arrayBloquesChecked.push( { 
                "codTie" : $(this).parents("td").attr("codTie")
            } ) 
          })

          for (var i = 0; i < respuesta.data.length; i++) {
            for (var j = 0; j < arrayBloquesChecked.length; j++) {

            if (respuesta.data[i].codTie!= arrayBloquesChecked[j].codTie){
              Materialize.toast('No se Encontraron Registros Para Este Bloque',2000)
            }
              if (  respuesta.data[i].codTie ==   arrayBloquesChecked[j].codTie   ) {
              $("table tr td[codTie="+respuesta.data[i].codTie+"]").html(`
                  <h5 style="color:red">${"Ocupado"}</h5> 

                  <p>
                  ${'<b>'+"Unidad Curricular"+'</b>'+'<br>'+respuesta.data[i].nombremateria} <br>
                  ${'<b>'+"Ambiente"+'</b>'+'<br>'+respuesta.data[i].codAmb} <br>
                  ${'<b>'+"Docente"+'</b>'+'<br>'+respuesta.data[i].nombredocente} <br> <br> 
                  </p>
                  `)
            }
          }}
        }else{
          Materialize.toast('No se Encontraron Registros Para Este Bloque',2000)
        }
 
          
      })
      
    }

    else if ( consulta == "consultar-disponibilidad-ambiente" ) {
  
      $.ajax({           
          dataType : 'json' ,
          type:'POST' , 
          url:'?controlador=horariosAmbientes&actividad=consultar',
          data: {
            "codAmb" : JSON.parse( sessionStorage.getItem( 'ambiente_seleccionado' ) )
          }
      })
      .done(function(respuesta){

          var arrayBloquesChecked = []
          
          $("input[name=switchConsultarBloques]:checked").each(function(i,item){
            arrayBloquesChecked.push( { 
                "codTie" : $(this).parents("td").attr("codTie")
            } ) 
          })

          for (var i = 0; i < respuesta.data.length; i++) {
            //console.log(respuesta.data[i].codTie)
            for (var j = 0; j < arrayBloquesChecked.length; j++) {
              //console.log(arrayBloquesChecked[j].codTie)
              if (  respuesta.data[i].codTie ==   arrayBloquesChecked[j].codTie   ) {
              $("table tr td[codTie="+respuesta.data[i].codTie+"]").html(`
                  <h5 style="color:red">${"Ocupado"}</h5> 

                  <p>
                  ${'<b>'+"Unidad Curricular"+'</b>'+'<br>'+respuesta.data[i].nombremateria} <br>
                  ${'<b>'+"Sección"+'<br>'+'</b>'+respuesta.data[i].codSec} <br>
                  ${'<b>'+"Docente"+'<br>'+'</b>'+respuesta.data[i].nombredocente} <br> <br> </p>`)
            }
          }}
 
          
      })
      
    }else if ( consulta == "consultar-disponibilidad-docente" ) {

      $.ajax({           
          dataType : 'json' ,
          type:'POST' , 
          url:'?controlador=horariosDocentes&actividad=consultar',
          data: {
            "cedDoc" : JSON.parse( sessionStorage.getItem( 'docente_seleccionado' ) )
          }
      })
      .done(function(respuesta){
          var arrayBloquesChecked = []
          
          $("input[name=switchConsultarBloques]:checked").each(function(i,item){
            arrayBloquesChecked.push( { 
                "codTie" : $(this).parents("td").attr("codTie")
            } ) 
          })

          for (var i = 0; i < respuesta.data.length; i++) {
            //console.log(respuesta.data[i].codTie)
            for (var j = 0; j < arrayBloquesChecked.length; j++) {
              //console.log(arrayBloquesChecked[j].codTie)
              if (  respuesta.data[i].codTie ==   arrayBloquesChecked[j].codTie   ) {
              $("table tr td[codTie="+respuesta.data[i].codTie+"]").html(`
                  <h5 style="color:red">${"Ocupado"}</h5> 

                  <p>
                  ${'<b>'+"Unidad Curricular"+'<br>'+respuesta.data[i].nombremateria} <br>
                  ${'<b>'+'Sección'+'</b>'+'<br>'+respuesta.data[i].codSec} <br>
                  ${'<b>'+"Ambiente"+'</b>'+'<br>'+respuesta.data[i].codAmb} <br> <br> </p>`)
            }
          }}
      })   
    }
  }
}

function buscarPorTermino( element ){
  if (element.val()!='') {

    var url = 'index.php?controlador=horarios&actividad=buscador-inteligente'
    $(".resultados_busqueda").show("slow")
    
    $.ajax({  url : url, type : 'POST', data : { "filtro" : element.val() }, dataType : 'json' })

    .done(function(respuesta){
      
      var content1 = $('')
      var content2 = $('')
      var content3 = $('')

      $(".resultados_docentes ul").html('')
      $(".resultados_secciones ul").html('')
      $(".resultados_ambientes ul").html('')

      $(".resultados_docentes .cantidad_de_encontrados").html("(" + respuesta.resultados_docentes.length + ")")
      $(".resultados_secciones .cantidad_de_encontrados").html("(" + respuesta.resultados_secciones.length + ")")
      $(".resultados_ambientes .cantidad_de_encontrados").html("(" + respuesta.resultados_ambientes.length + ")")
      
      $.each( respuesta.resultados_docentes , function(i,item){

        content1 = `<a href="#" class="black-text" onclick='clickDocenteItem( "${item.cedDoc}" )'>
                      <li class="collection-item avatar">
                        <i class="material-icons circle green">insert_chart</i>
                        <span class="title">${item.nombre}</span>
                        
                        
                      </li>
                    </a>`

        $(".resultados_docentes ul").append(content1)


      }) 

      $.each( respuesta.resultados_secciones , function(i,item){

        content2 = `<a href="#" class="black-text" onclick='clickSeccionItem( "${item.codSec}" , "${item.turno}" )'>
                      <li class="collection-item avatar">
                        <i class="material-icons circle green">insert_chart</i>
                        <span class="title">${item.codSec}</span>
                        
                        
                      </li>
                    </a>`

        $(".resultados_secciones ul").append(content2)


      })

      $.each( respuesta.resultados_ambientes , function(i,item){

        content3 = `<a href="#" class="black-text" onclick='clickAmbienteItem( "${item.codAmb}" )'>
                      
                      <li class="collection-item avatar">
                        <i class="material-icons circle green">insert_chart</i>
                        <span class="title">${item.codAmb}</span>
                        
                        
                      </li>
                    </a>`

        $(".resultados_ambientes ul").append(content3)


      }) 
        
    })
  }else{
    $(".resultados_busqueda").hide("slow")
  }
}