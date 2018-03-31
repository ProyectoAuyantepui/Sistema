
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

              <a href="#" class="btn cyan col s12 pulse waves-effect input-field">Guardar todo</a>  
              
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

          <div class="row">
            <div class="input-field col s10">
                <select>
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
                <label>Seleccione docente</label>
              </div>
            <div class="col s2">
              
              <a href="#" class="btn btn-large cyan col s12 waves-effect">Agregar</a>
            </div>
          </div>

          <div class="row">
                <div class="col s12 ">
                  
                    <table  class="bordered highlight">
                      <thead class="teal white-text">
                        <tr>
                          <th>gdfgdf</th>
                           <th>gdfgdf</th>
                            <th>gdfgdf</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>gdfgdf</td>
                             <td>gdfgdf</td>
                              <td>gdfgdf</td>
                          </tr>
                      </tbody>

                      
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
          <div class="valign-wrapper">
            <h5>Asignacion de ambientes</h5>
          </div>

          <div class="row">
            <div class="input-field col s5">
                <select id="bloques" multiple>
                  <option value="2">Option 2</option>
                  <option value="2">Option 2</option>
                  <option value="2">Option 2</option>
                </select>
                <label>Seleccione bloques</label>
            </div>

            <div class="input-field col s5">
                <select id="ambiente" disabled>
                  <option value="2">Option 2</option>
                  <option value="2">Option 2</option>
                  <option value="2">Option 2</option>
                </select>

                <label>Seleccione ambiente</label>
            </div>

            <div class="col s2">
              
              
              <a href="#" class="btn btn-large cyan col s12 waves-effect">Agregar</a>
            </div>
          </div>

          <div class="row">
                <div class="col s12 ">
                  
                    <table  class="bordered highlight">
                      <thead class="teal white-text">
                        <tr>
                          <th>gdfgdf</th>
                           <th>gdfgdf</th>
                            <th>gdfgdf</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>gdfgdf</td>
                             <td>gdfgdf</td>
                              <td>gdfgdf</td>
                          </tr>

                          <tr>
                            <td>gdfgdf</td>
                             <td>gdfgdf</td>
                              <td>gdfgdf</td>
                          </tr>
                      </tbody>

                      
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
      
      <script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
      <script src="public/vendor/jvalidate/additional-methods.min.js"></script>
      <script src="public/js/validaciones/config-default.js"></script>
      
      <script src="public/js/ajax/menu.js"></script>
      <script src="public/vendor/paginacion.js"></script>

      <script>
          
        $(function(){

          
          mostrarBloques(  )

          var uc_seleccionada = JSON.parse( localStorage.getItem( 'uc_seleccionada' ) )
          localStorage.setItem("actividades_asignadas", JSON.stringify( new Array() ))

          
          $("table tr td[ocupado=desocupado]")
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
                    .append(`Matematica`)
                    $(".card-unidad-curricular ul.collection")
                    .append(`<li class="collection-item">
                                Codigo U.C.:
                              </li>
                              <li class="collection-item">
                                Horas de trabajo asignadas: 
                              </li>
                              <li class="collection-item">
                                Total de horas de trabajo: 
                              </li>
                    `)
          

                      
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

        

        

        // evento al dar click a un suiche
        function clickSwitchAsignarBloque( elemento ) {

          var codTie = elemento.parents("td").attr("codTie")
          var actividades_asignadas = JSON.parse(localStorage.getItem("actividades_asignadas"))
          var OBloques = new Object()

          if(elemento.is(":checked")) {
            
            elemento.parents("td")
            .addClass("grey lighten-2")

            OBloques = codTie

            actividades_asignadas.push( OBloques )
            localStorage.setItem("actividades_asignadas", JSON.stringify( actividades_asignadas ))
          }else {

            elemento.parents("td").removeClass("grey lighten-2")
            
            var indice = actividades_asignadas.indexOf(codTie); // obtenemos el indice
            actividades_asignadas.splice(indice, 1); // 1 es la cantidad de elemento a eliminar
            localStorage.setItem("actividades_asignadas", JSON.stringify( actividades_asignadas ))
          }
        }

        // click boton paso 2
        function mostrarPaso2(  ){

          $(".card-asignar-docente").show()
          $(".card-asignar-ambientes").show()
          $(".card-guardar-todo").show()

          $(".card-plantilla-horario").hide()

          $(".boton-paso-2").hide()
        }


      </script>

  </body>
  </html>