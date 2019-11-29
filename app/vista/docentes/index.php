
<?php $titulo = "DOCENTES";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    
    
    <title>Auyantepui - <?= $titulo ?></title>
</head>

<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>

<main>
  <section class="row" id="tarjetaDocentes">
   <div class="col s12 m3">
      <div class="card ">
        
        <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/teacher.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >DOCENTES</p>
        </div>
        <div class="card-content row">
          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating primario">
              <i class="material-icons left">settings</i>
            </a>
            Este módulo corresponde a la gestion de Docentes en el sistema 
          </p>

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            
            <a class="btn-floating cyan">
              <i class="material-icons left">add</i>
            </a>
            Atraves de este modulo puedes registrar nuevos Docentes.
          </p>

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating green">
              <i class="material-icons left">search</i>
            </a>

            <a class="btn-floating pink darken-1">
              <i class="material-icons left">edit</i>
            </a>

            <a class="btn-floating red">
              <i class="material-icons left">delete</i> 
            </a>

            Así como también consultar , modificar los datos o eliminar los Docentes existentes en el sistema
          </p>

        </div>
      </div>
    </div>


    <div class="col m9 formulario-docente">
      <div class="card ">

        <div class=" white-text" style="padding: 0px; margin:0px;">

          <nav class="primario">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input id="search" type="search" name="filtro" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>

        </div>

        <div class="card-content" >


          
          <table id="tabla-docentes" class="bordered highlight">
            <thead id="thead">
              <tr id="thead">
                <th >
                  <p><strong>Cedula</strong></p>
                </th>
                <th >
                  <p><strong>Nombre</strong></p>
                </th>
                <th >
                  <p><strong>Apellido</strong></p>
                </th>

                <th >
                  <p><strong>Estado</strong></p>
                </th>

                <th ></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table> 


          <div class="mensaje valign-wrapper grey-text">
            <i class="material-icons left">close</i>
            <h5 >No se encuentran resultados..</h5>
          </div>

        </div>
      </div>
    </div>
    
  </section>

</main>

<div class="fixed-action-btn " id="registrar">
  <input type="hidden" name="item_seleccionado">
    <a href="?controlador=docentes&actividad=vista-crear" class="btn-floating btn-large pulse waves-effect waves-light  secundario  tooltipped crear-docente" data-position="left"  data-delay="50" data-tooltip="Añadir Docente">
    <i class="material-icons">add</i>
  </a>
</div>
<!-- OPERACIONES -->

<div id="modal_operaciones" class="modal bottom-sheet">

 <div class="modal-header secundario">
   <span class="white-text">Operaciones:<i class="modal-action modal-close material-icons right">close</i></span>
 </div>

 <div class="modal-content">
       <input type="hidden" name="item_seleccionado">
     <ul class="collection">
         <li class="collection-item avatar">
           <i class="material-icons circle blue darken-3">edit</i>
           <a href="#" class="editar-docente blue-text"> Editar </a>
         </li>
         <li class="collection-item avatar">
           <i class="material-icons circle deep-orange">delete</i>
           <a href="#" class="eliminar-docente  deep-orange-text"> Eliminar </a>
         </li>
     </ul>
 </div>

</div>

<!--Eliminar Docente-->

<div id="modal_eliminarDocente" class="modal">

 <div class="modal-header secundario">
   <span class="white-text">
     Eliminar Docente <i class="modal-action modal-close material-icons right">close</i>
   </span>
 </div>

 <div class="modal-content">
   <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> este Docente?</p>
   <form class="formEliminarDocente" >
       <input type="hidden" id="cedDoc" name="cedDoc"/>

       <div class="row"> 
           <div class="col s12 left">
             <button type="button" class="modal-action modal-close btn btn-flat waves-effect waves-light " >CANCELAR</button>
             <button type="submit" class="btn waves-effect waves-light primario">ADELANTE</button>
           </div>
       </div>

   </form>
 </div>

</div>




  <?php require_once "app/vista/plantilla/__scripts.php";  ?>
    
    <script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
    <script src="public/vendor/jvalidate/additional-methods.min.js"></script>
    <script src="public/js/validaciones/config-default.js"></script>
    
    <script src="public/js/ajax/menu.js"></script>
    <script src="public/vendor/paginacion.js"></script>

    <script type="text/javascript">
      $(function(){ 
        
        listar()
        
        $("#search").keyup(function(){
          if( $(this).val() != ""){

            $("#tabla-docentes tbody>tr").hide();
            $("#tabla-docentes td:buscar('" + $(this).val() + "')").parent("tr").show();
          }else{

            $("#tabla-docentes tbody>tr").show();
          }
        })

      })

      $.extend( $.expr[":"], {

          "buscar": function(elem, i, match, array){

              return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
          }
      })

      function listar(){

          var url = 'index.php?controlador=docentes&actividad=listar'
          
          $.ajax({  url : url, type : 'POST', dataType : 'json' })

          .done(function(respuesta){
              
              if (respuesta.data.length > 0) {
                  var content = $("")
                  $(".mensaje").hide()
                  $("#tabla-docentes").show()
                  $("#tabla-docentes tbody").html('')
                  var switche

                    $.each(respuesta.data, function(i, item) {

                      if ( item.estado == true ) {
                          switche = '<input type="checkbox" name="switch" checked="checked">'
                      }else{
                          switche = '<input type="checkbox" name="switch">'
                      }

                      content = `<tr data-id="${item.cedDoc }">
                                          <td >${ item.cedDoc }</td>
                                          <td >${ item.nombre }</td>
                                          <td >${ item.apellido }</td>
                                          <td >
                                              <div class="switch">
                                                  <label>
                                                      ${switche}
                                                      <span class="lever"></span>
                                                  </label>
                                              </div>
                                          </td>
                                          <td  >
                                              <a href="#" class="mostrarOperaciones">
                                                  <i class="material-icons black-text">more_vert</i>
                                              </a>
                                          </td>   
                                      </tr>`

                      $("#tabla-docentes tbody").append(content)
                    })

                  $("#tabla-docentes").paginationTdA({ elemPerPage: 8 })
              }else{
                  $("#tabla-docentes").hide()
                  $(".mensaje").show()
                  
              }
          })
      }

      $("body").on( "click", ".editar-docente", function(){ 
        
        var cedDoc = $("#modal_operaciones input[name=item_seleccionado]").val( )
        sessionStorage.setItem( "docente_seleccionado" , JSON.stringify( cedDoc ) )  
        location.href = "?controlador=docentes&actividad=vista-editar"
      })

      $("#tabla-docentes").on("click","a.mostrarOperaciones",function(){

          var codigo_item_seleccionado= $(this).parents("tr").data("id")

          $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

          $("#modal_operaciones").modal("open")
      })

      $("body").on("click", ".eliminar-docente", function(){
          var cedDoc = $("#modal_operaciones input[name=item_seleccionado]").val( )
          $(".formEliminarDocente #cedDoc").val( cedDoc )
          $("#modal_operaciones").modal("close")
          $("#modal_eliminarDocente").modal("open")
      })


      function eliminar( cedDoc ){ 

          $.ajax({ 
              dataType : 'json', 
              type:'POST' ,
              url:'index.php?controlador=docentes&actividad=eliminar' ,
              data:{ "cedDoc" : cedDoc }
          })

          .done(function(respuesta){

              if (respuesta.operacion == true) {

                  $('#modal_eliminarDocente').modal('close')
                  Materialize.toast('Listo...',997)
                          
                  listar()                   
                                          
              }else{

                  Materialize.toast('Error...',997)
                          
                  listar()
              }
          }) 
      }

      $('.formEliminarDocente').on("submit",function(evento){  
          
          evento.preventDefault()    
          var cedDoc = $("#modal_operaciones input[name=item_seleccionado]").val( )
      
      
          eliminar( cedDoc )
      })



      function cambiarEstado( estado , cedDoc ){
        $.ajax({    
          dataType : 'json' , 
          type:'POST' , 
          url:'index.php?controlador=docentes&actividad=cambiar-estado' ,
          data: {
            "cedDoc" : cedDoc,
            "estado" : estado
          } 
        })
        .done(function(respuesta){
      //console.log(respuesta)
            if (respuesta.operacion == true) {


              Materialize.toast('Listo...',997)

                                            
            }else{
                        
              Materialize.toast('Error...',997)

            }
        })

      }
      $("#tabla-docentes").on("change","input[name=switch]",function() {
          var cedDoc = $(this).parents("tr").data("id")
          var estado = false
          if($(this).is(":checked")) {
            estado = '1'
            ////console.log("Is checked");
          }else {
            estado = '2'
            ////console.log("Is Not checked");
          }

          cambiarEstado( estado , cedDoc )
      })
    </script>
</script>
</body>
</html>