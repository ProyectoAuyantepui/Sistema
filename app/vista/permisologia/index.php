<?php $titulo = "Permisos";?>
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>
<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>
<main>
  <section class="row">

  <!-- espacio reservado para mostrar cards de lado izquierdo -->
    <div class="col s12 m3 card-principal-izquierdo">
       
           <div class="card panel-permisos">
             
             <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
               <img src="public/img/section.png" alt="" class="responsive-img " width="90">
               <p class="titulo-tarjeta"  >Permisos</p>
             </div>

             <div class="card-content"  >

               <p>
                 We hope you have enjoyed using Materialize and if you feel like it has helped you out and want to support the team you can help us by donating or backing us on Patreon. Any amount would help support and continue development on this project and is greatly appreciated. 
               </p>
                       
             </div>

           </div>
         
      <!-- panel  -->
        <div class="card panel-rol-seleccionado oculto">
          
          <div class="center-align teal tarjeta" >
            <img src="public/img/flat-book.png" alt="" class="responsive-img " width="90">
            <p class="titulo-tarjeta" >Rol Seleccionado</p>
          </div>

          <div class="card-content" style="padding: 0px;" >
            <ul class="collection" ></ul>  
          </div>

          <div class="card-action"  >
            <div class="row">
                <a href="index.php?controlador=permisologia&actividad=index" 
                   class="btn cyan col s12 waves-effect input-field btn-large " 
                >     
                  SELECCIONAR OTRO ROL
                </a> 
            </div>
          </div>
        </div>



      


        

        


        
    </div>
  <!-- espacio reservado para mostrar cards de lado derecho -->
    <div class="col s12 m9 card-principal-derecho">
      
      <!-- card principal  -->
      <div class="card card-principal">

        <div class="card-content">

        <!-- casilla de seleccion de rol -->
          <div class="row seleccion-de-rol">
            <div class="col s12 valign-wrapper">
              <h5>Seleccione un rol de usuario</h5>
            </div>
          
            <div class="input-field col s12">
                <select id="combo_roles"></select>
                
              </div>
          </div>

          <!-- tabla de permisos -->
            <div class="row tabla-de-permisos oculto">
              <div class="col s12 valign-wrapper">
                <h5>Permisos para el rol seleccionado</h5>
              </div>
            
              <div class=" col s12">
                <?php require_once "__tabla-permisos.php"; ?>
              </div>
            </div>


        </div>
        
      </div>

      
    </div>
  </section>
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?> 


<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>

<script>
  $(function(){

    cargarComboRoles()
    
  })


  function cargarComboRoles(){
      
      var elemento = $('#combo_roles')

      elemento.html("")
      elemento.append(`<option value="" disabled selected>Choose your option</option>`)

      $.ajax({

          url:'?controlador=roles&actividad=listar',
          type:'POST',
          dataType:'json'
      })

      .done(function(respuesta){
     
          //pinto los roles en el select
          $.each(respuesta.data,function(i,item){

            elemento.append(`<option value="${item.codRol}">${item.nombre}</option>`)
                  
          })

          elemento.material_select()       
      })
      
  }

  function mostrarTablaPermisos( codRol ){
    $.ajax({

      url:'?controlador=permisologia&actividad=consultar',
      type:'POST',
      dataType:'json',
      data:{
        "codRol":codRol
      }
    })

    .done(function(respuesta){
      
      $.each(respuesta.data,function(i,item){

        $(".tabla-de-permisos table tbody tr[codMod=" + item.codMod + "]").addClass("grey lighten-2")
        $(".tabla-de-permisos table tbody tr[codMod=" + item.codMod + "] td#acceso_modulo").find("input[name=acceso_modulo]").click()
      })

      $(".tabla-de-permisos").show()

    })     
          
    
  }

  //evento al dar click a una opcion del select
  $("#combo_roles").change(function(){
    var codRol = $(this).val()
    $.ajax({

      url:'?controlador=roles&actividad=consultar',
      type:'POST',
      dataType:'json',
      data:{
        "codRol":codRol
      }
    })

    .done(function(respuesta){
      $(".panel-rol-seleccionado ul.collection").html("")
      $(".panel-rol-seleccionado ul.collection")
        .append(`<li class="collection-item">${respuesta.data.nombre}</li>`)
      $(".panel-rol-seleccionado").show()

      
      $(".seleccion-de-rol").hide()
      $(".panel-permisos").hide()

      mostrarTablaPermisos( codRol )
    })

    
    
  })
</script>
</body>
</html>