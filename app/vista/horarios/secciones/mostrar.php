
<?php $titulo = "
    Horario de la seccion 
    <script>
    var seccion = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
    document.write(seccion.codSec)
    </script>";?>
    
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>
<style type="text/css">

th, td {
  border-right: 1px solid #e1e1e1;
}

tr:last-of-type,
td:last-of-type {
  border-right: none;
  border-bottom: none;
}
th, td {
  text-align: center;
  padding: 1rem 0.75rem;
}

</style>
<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>
<main>
<section class="row">

<!-- espacio reservado para mostrar cards de lado izquierdo -->
  <div class="col s12 m3 card-principal-izquierdo">
    <!-- panel donde muestro el listado de unidades curriculares -->
      <div class="card card-unidades-curriculares ">
        
        <div class="center-align teal tarjeta" >
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
    
    <!-- plantillas de horarios  -->
    <div class="card-plantilla-horario">
      <?php require_once "app/vista/horarios/secciones/plantilla_horarios.php"; ?>
    </div>



        

      


    
    
  
  </div>
</section>








</main>

<!-- VENTANAS DE DIALOGOS -->
<?php require_once "__dialogos.php"; ?>

      <?php require_once "app/vista/plantilla/__scripts.php";  ?> 
      
      <script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
      <script src="public/vendor/jvalidate/additional-methods.min.js"></script>
      <script src="public/js/validaciones/config-default.js"></script>
      
      <script src="public/js/ajax/menu.js"></script>
      <script src="public/vendor/paginacion.js"></script>

      <script>
          
        $(function(){

          cargarUnidadesCurriculares()
          mostrarBloques(  )
          pintarUnidadesCurricularesAsignadas()   
        })

        function cargarUnidadesCurriculares(){

          var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
          $.ajax({ 
            
            dataType : 'json' ,
            type:'POST' , 
            url:'?controlador=horariosSecciones&actividad=consultar-unid-curr',
            data: {
              "codSec" : seccion_seleccionada.codSec
            }
          })
          .done(function(respuesta){

            $("ul.unidadesCurriculares").html('')

            $.each( respuesta.data , function(i,item){

              content = `<a 
                            class="collection-item boton-unidad-curricular teal white-text"  
                            codUniCur="${item.codUniCur}" 
                            asignada="no-asignada"
                            onclick="clickUnidadCurricular( $(this) )"
                            onmouseover="mouseoverUnidadCurricular( $(this) )"
                            onmouseout="mouseoutUnidadCurricular( $(this) )"
                          >
                          ${item.nombre}
                        </a>`

              $("ul.unidadesCurriculares").append(content)
            }) 

          })
        }

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
            data: {
              "codSec" : seccion_seleccionada.codSec
            }
          })
          .done(function(respuesta){

            $.each( respuesta.data , function (i,item) {

              $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"]").html(`<p >${item.codUniCur}</p>`)

              $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"]").attr("ocupado","ocupado")
              $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"]").attr("codUniCur",item.codUniCur)
              $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"]").attr("codAmb",item.codAmb)
              $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"]").attr("codSec",item.codSec)
              $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"]").attr("cedDoc",item.cedDoc)
              $(""+ tablaAUsar +" tr td[codTie="+item.codTie+"]").attr("codHor",item.codHor)   
            })
          })            
        }

        function pintarUnidadesCurricularesAsignadas(){

          var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )
          $.ajax({ 
            
            dataType : 'json' ,
            type:'POST' , 
            url:'?controlador=horariosSecciones&actividad=consultar-unid-curr-asignadas',
            data: {
              "codSec" : seccion_seleccionada.codSec
            }
          })
          .done(function(respuesta){
            
            $.each( respuesta.data , function(i,item){

              $("ul.unidadesCurriculares a[codUniCur=" + item.codUniCur + "]")
              .addClass( "green darken-2" )
              .addClass( "white-text" )
              .attr("asignada","asignada")
            })
          })
        }

        function clickAsignarActividades(){

          
          var seccion_seleccionada = JSON.parse( localStorage.getItem( 'seccion_seleccionada' ) )

          


          
          
          
          $("#modal_operaciones").modal("close")
          location.href = "index.php?controlador=horariosSecciones&actividad=asignar"
        }

        // evento click cuando le doy click a una uc
        function clickUnidadCurricular( elemento ){

          localStorage.setItem( 'uc_seleccionada' , JSON.stringify( elemento.attr("codUniCur") ) )

          if ( elemento.attr("asignada") == "asignada" ) {
            $("#modal_operaciones .opcion-para-asignadas").show()
          }else{
            $("#modal_operaciones .opcion-para-asignadas").hide()
          }

          $("#modal_operaciones").modal("open")           
        }

        // al pasar el raton sobre una uc
        function mouseoverUnidadCurricular( elemento ){

          if ( elemento.attr("asignada") == "asignada" ) {
            $("table tr td[codUniCur="+ elemento.attr("codUniCur") +"] ")
            .addClass("green darken-2 white-text")                  
          }

          if ( elemento.attr("asignada") == "no-asignada" ) {
            $("table tr td[ocupado=desocupado] ")
            .addClass("teal white-text")
            .append(`<p> Sin asignar </p>`)
          }
        }

        // al retirar el cursor de una uc
        function mouseoutUnidadCurricular( elemento ){    
          $("table tr td.bloque-de-hora").removeClass("teal green darken-2 white-text")
          $("table tr td[ocupado=desocupado] ").html("")      
        }


      </script>

  </body>
  </html>