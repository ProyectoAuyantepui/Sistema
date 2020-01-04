<?php 
  if (isset($_SESSION['databaseRespaldo'])) {
    header('location:index.php?controlador=home&actividad=index');
  }
?>
<?php $titulo = "EDITAR INFORMACION DEL DOCENTE";?>
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
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>

<main >
  
  <section class="row">
    <div class="col s3">
      <div class="card">
        <div class="center-align teal tarjeta" id="avatar-de-usuario">
          <img src="public/img/teacher.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" ></p>
        </div>
        <div class="card-content" style="padding: 0px;" >

          <ul class="collection" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle primario">perm_contact_calendar</i>
              <a 
                href="#" 
                target="__blank" 
                class="title blue-text"
                >VER HORARIO DEL DOCENTE</a>
            </li>

            <li class="collection-item avatar" style="">
              <i class="material-icons circle deep-orange">perm_contact_calendar</i>
              <a 
                href="#" 
                target="__blank" 
                class="title orange-text"
                >GENERAR REPORTE DE DOCENTE</a>
            </li>

            <li class="collection-item avatar" style="">
              <i class="material-icons circle red">perm_contact_calendar</i>
              <a 
                href="#" 
                target="__blank" 
                class="title red-text"
                >REPORTE DE CARGA HORARIA</a>
            </li>

            <li class="collection-item avatar cambiar-clave">
              <i class="material-icons circle teal">edit</i>
              <a href="#" class="title teal-text">REESTABLECER CONTRASEÑA</a>
              
              
            </li>

            

          </ul>
                  
        </div>
      </div>

      <div class="card">
        <div class="card-content" style="padding: 0px;" >

          <ul class="collection listado-comisiones" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle primario">perm_contact_calendar</i>
              <a 
                target="__blank" 
                class="title blue-text"
                >COMISIONES</a>
            </li>

          </ul>
                  
        </div>
      </div>

      <div class="card">
        <div class="card-content" style="padding: 0px;" >

          <ul class="collection listado-dependencias" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle primario">perm_contact_calendar</i>
              <a 
                target="__blank" 
                class="title blue-text"
                >DEPENDENCIAS</a>
            </li>

          </ul>
                  
        </div>
      </div>

    </div>


    <div class="col s12 m9">
      <div class="card ">
        <div class="card-content"  >
          <form class="formEditarDocente" >
            <!-- DATOS PERSONALES -->
            <div class="row">
              <div class="col s12 valign-wrapper">
                <p class="flow-text">INFORMACION PERSONAL</p>
              </div>
            </div>
            <input
              id="cedDoc"  
              type="hidden"  
              name="cedDoc" 
            >
            <div class="row">
          
              <div class="col s4 input-field">
                
                <i class="material-icons prefix">assignment_ind</i>
                <input
                  placeholder="" 
                  disabled

                  id="cedDoc_mostar"  
                  type="text"  
                  class="tooltipped" 
                  
                >
                <label for="cedDoc">Cédula</label>
              </div>
              <div class="col s4 input-field">
                <i class="material-icons prefix">account_circle</i>
                <input
                  placeholder=""  
                  id="nombre" 
                  name="nombre" 
                  type="text" 
                  class="validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese su Nombre, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" 
                  rangelength=[2,20] 
                  required
                >
                <label data-success="Correcto..."  for="nombre" >Nombre</label>
              </div>
              <div class="col s4 input-field">
                <i class="material-icons prefix">account_box</i>
                <input
                  placeholder=""  
                  id="apellido" 
                  name="apellido" 
                  type="text" 
                  class="validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese su Apellido, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" 
                  rangelength=[2,20] 
                  required
                >
                <label data-success="Correcto..."  for="apellido" >Apellido</label>
              </div>
            </div>
            <div class="row">
              <div class="col s4 input-field">
                <i class="material-icons prefix">assignment_ind</i>
                <input
                  placeholder=""  
                  type="text" 
                  name="fecNac" 
                  id="fecNac" 
                  class="datepicker validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese la cédula, este campo solo debe contener números desde 8 hasta 10 carácteres"  
                  required 
                >   
                <label data-success="Correcto..."  for="fecNac">Fecha de Nacimiento:</label>
              </div>
              <div class="col s4 ">
                <label>Sexo</label>
                <p>
                  <input
                    placeholder=""  name="sexo" type="radio" id="sexo1" checked="checked" value="1" />
                  <label for="sexo1">Femenino</label>
                  <input
                    placeholder=""  name="sexo" type="radio" id="sexo2" value="2" />
                  <label for="sexo2">Masculino</label>
                </p>
              </div>
              <div class="col s4 input-field">
                <i class="material-icons prefix">phone</i>
                <input
                  placeholder=""  
                  id="telefono" 
                  name="telefono" 
                  type="text" 
                  class="validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese su número telefónico, solo puede contener números con un rango entre 10 y 11 carácteres" 
                  pattern="[0-9]{10,11}" 
                  required
                >
                <label 
                  data-success="Correcto..."  
                  for="telefono"  
                >
                Telefono ej: 02511234567
                </label>
              </div>
              
            </div>
            <div class="row">
              <div class="col s4 input-field">
                <i class="material-icons prefix">email</i>
                <input
                  placeholder="" 
                  id="correo" 
                  name="correo" 
                  type="email" 
                  class="validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese su correo con el siguiente formato dominio@servidor.extensión" 
                  required  
                >
                <label data-success="Correcto..."  for="correo" >Correo</label>
              </div>
              <div class="col s8 input-field">
                <i class="material-icons prefix">call_split</i>
                <input
                  placeholder=""  
                  type="text" 
                  id="direccion" 
                  name="direccion" 
                  class="validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres" 
                  rangelength=[1,120]  
                  required
                ></input>
                <label data-success="Correcto..."  for="textarea"  >Dirección</label>
              </div>
            </div>
            <!-- DATOS LABORALES -->
            <div class="row">
              <div class="col s12 valign-wrapper">
                <p class="flow-text">INFORMACION LABORAL</p>
              </div>
            </div>
            <div class="row">
              <div class="col s4 input-field">
                <label>Categoría</label>    
                <select name="codCatDoc" id="codCatDoc"></select>
                
              </div>
              <div class="col s4 input-field">
                <label>Dedicación</label>     
                <select name="codDed" id="codDed"></select>
                
              </div>
              <div class="col s4 input-field">
                <label>Condición</label>    
                <select name="condicion" id="condicion">
                  <option value="ORDINARIO">ORDINARIO</option>
                  <option value="TIEMPO COMPLETO">TIEMPO COMPLETO</option>
                </select>
              </div>
            </div>
            <div class="row">
              
              <div class="col s6 input-field">
                <i class="material-icons prefix">assignment_ind</i>
                <input
                  placeholder="" 
                  type="text" 
                  name="fecCon" 
                  id="fecCon" 
                  class="datepicker validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese la fecha en la cual realizó el corcurso en la Universidad"   
                  required 
                >   
                <label 
                  data-success="Correcto..."  
                  for="fecCon"
                >Fecha de Concurso:
                </label>
              </div>
              <div class="col s6 input-field">
                <i class="material-icons prefix">assignment_ind</i>
                <input
                  placeholder="" 
                  type="text" 
                  name="fecIng" 
                  id="fecIng" 
                  class="datepicker validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Ingrese la fecha en la cual ingresó en la Universidad"   required 
                />   
                <label 
                  data-success="Correcto..."  
                  for="fecIng"
                >Fecha de Ingreso:
                </label>
              </div>
            </div>

            <!-- DATOS DE USUARIO -->
            <div class="row">
              <div class="col s12 valign-wrapper">
                <p class="flow-text">INFORMACION DE USUARIO</p>
              </div>
            </div>
            <div class="row">
              <div class="col s4 input-field">
                <label>Rol de Usuario</label>
                <select name="codRol" id="codRol"></select>
              </div>
              <div class="col s4 input-field">
                <i class="material-icons prefix">person</i>
                <input
                  placeholder="" 
                  id="usuario" 
                  name="usuario" 
                  type="text" 
                  class="validate tooltipped" 
                  data-position="bottom"  
                  data-tooltip="Indique cual será su usuario para poder igresar al sistema" required 
                >
                <label data-success="Correcto..."  for="usuario" >Usuario</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 input-field">
                <button 
                  type="submit" 
                  class="btn btn-large waves-effect waves-light primario" 
                > Guardar
                  <i class="material-icons right">check</i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div> 
    </div>
  </section>

</main>

<div class="fixed-action-btn">

  <a href="?controlador=docentes&actividad=index" 
     class="btn-floating btn-large waves-effect waves-light  deep-orange  "  
  >
    <i class="material-icons ">arrow_back</i>
  </a>

</div>


<!-- ASIGNAR DEPENNDECIA  -->

    <div id="asignarDependencias" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Asignar Dependencias
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formAsignarDependencias" >
          <div class="row">
            <div class="col s12 m12  input-field">
              <select name="codDep" id="codDep"></select>
              <label for="codDep"  >Seleccione una dependencia</label>
            </div>
          </div>
          
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class=" btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- ASIGNAR COMISION  -->

    <div id="asignarComision" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Asignar Comisiones
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formAsignarComisiones" >
          <div class="row">
            <div class="col s12 m12  input-field">
              <select name="codCom" id="codCom"></select>
              <label for="codCom"  >Seleccione una comision</label>
            </div>
          </div>
          
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class=" btn btn-large waves-effect waves-light primario" >GUARDAR</button>
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
<script type="text/javascript">
  
$(function(){
  var docente_seleccionado = JSON.parse( sessionStorage.getItem( "docente_seleccionado" ) )
  cargarComboCategorias()
  cargarComboDedicaciones()
  cargarComboRoles()
  editar( docente_seleccionado )
  cargarComisionesDocente( docente_seleccionado )
  cargarDependenciasDocente( docente_seleccionado )

})
  function cargarComboCategorias(){
    $(".formEditarDocente select#codCatDoc").html("")
    
    $.ajax({

        url:'?controlador=catDoc&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
       
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codCatDoc}">
                                    ${item.nombre}
                                </option>`
        }) 
        
        $(".formEditarDocente select#codCatDoc").html(contenidoHTML)  
        $('select').material_select()    
    })
  }

  function cargarComboDedicaciones(){
    $(".formEditarDocente select#codDed").html("")
    
    $.ajax({

        url:'?controlador=dedicaciones&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
       
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codDed}">
                                    ${item.nombre}
                                </option>`
        }) 
        
        $(".formEditarDocente select#codDed").html(contenidoHTML)  
        $('select').material_select()    
    })
  }

  function cargarComboRoles(){
    $(".formEditarDocente select#codRol").html("")
    
    $.ajax({

        url:'?controlador=roles&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
       
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codRol}">
                                    ${item.nombre}
                                </option>`
        }) 
        
        $(".formEditarDocente select#codRol").html(contenidoHTML)  
        $('select').material_select()    
    })
  }
  function editar( cedDoc ){ 

    $.ajax({ 

      dataType : 'json' ,
      type:'POST' , 
      url:'index.php?controlador=docentes&actividad=consultar',
      data:{ "cedDoc" : cedDoc} 
    }) 
    .done(function(respuesta){

      $(".formEditarDocente input[name=cedDoc]").val( respuesta.data.cedDoc );
      
      $(".formEditarDocente #cedDoc_mostar").val( respuesta.data.cedDoc );

      $(".formEditarDocente #codCatDoc").val( respuesta.data.codCatDoc )

      $(".formEditarDocente #codRol").val( respuesta.data.codRol )
                  
      $(".formEditarDocente #nombre").val( respuesta.data.nombre )

      $(".formEditarDocente #apellido").val( respuesta.data.apellido )

      $(".formEditarDocente #fecNac").val( respuesta.data.fecNac )

      if ( respuesta.data.sexo == 1 ) { $(".formEditarDocente #editar_sexo1").attr( "checked" , true ) }
      if ( respuesta.data.sexo == 2 ) { $(".formEditarDocente #editar_sexo2").attr( "checked" , true ) }

      $(".formEditarDocente #telefono").val( respuesta.data.telefono )

      $(".formEditarDocente #correo").val( respuesta.data.correo )

      $(".formEditarDocente #direccion").val( respuesta.data.direccion )

      $(".formEditarDocente #condicion").val( respuesta.data.condicion )

      $(".formEditarDocente #codDed").val( respuesta.data.codDed )

      $(".formEditarDocente #fecCon").val( respuesta.data.fecCon )

      $(".formEditarDocente #fecIng").val( respuesta.data.fecIng )

      $(".formEditarDocente #usuario").val( respuesta.data.usuario )

      $(".formEditarDocente #observaciones").val( respuesta.data.observaciones )

      $(".formEditarDocente #avatar").val( respuesta.data.avatar )

      $("#avatar-de-usuario img").attr( "src" , respuesta.data.avatar )

      $(".titulo-tarjeta").append( respuesta.data.nombre + " " + respuesta.data.apellido )

      $('select').material_select() 

    }) 
  }

  function cargarComisionesDocente( cedDoc ){
    
    $.ajax({

        url:'?controlador=docentes&actividad=comisiones',
        type:'POST',
        dataType:'json',
        data:{ "cedDoc" : cedDoc }
    })

    .done(function(respuesta){
        if ( respuesta.data.length == 0 ) {
          var contenidoHTML = $("") 
          contenidoHTML = `<li class="collection-item avatar" >
                              (AUN SIN COMISIONES)
                            </li>`
          $("ul.listado-comisiones ").append( contenidoHTML )
        }else if (respuesta.data.length > 0){

          var contenidoHTML = $("")        
          $.each( respuesta.data, function(i,item){

              contenidoHTML = `<li class="text-black collection-item avatar" codCom="${item.codCom}">
                                  <span class="title">${item.nombre}</span>
                                </li>`
              $("ul.listado-comisiones ").append( contenidoHTML )
          })
        }

        $("ul.listado-comisiones").append( contenidoHTML ) 
        
        
    })
  }

  function cargarDependenciasDocente( cedDoc ){
    
    $.ajax({

        url:'?controlador=docentes&actividad=dependencias',
        type:'POST',
        dataType:'json',
        data:{ "cedDoc" : cedDoc }
    })

    .done(function(respuesta){


        if ( respuesta.data.length == 0 ) {
      
          var contenidoHTML = $("") 
          contenidoHTML = `<li class="collection-item avatar" >
                              (AUN SIN DEPENDENCIAS)
                            </li>`
          $("ul.listado-dependencias ").append( contenidoHTML )
      
        }else if (respuesta.data.length > 0){

          var contenidoHTML = $("")        
      
          $.each( respuesta.data, function(i,item){

              contenidoHTML = `<li 
                                  class="collection-item avatar" 
                                  codDep="${item.codDep}"
                              >
                                <span class="title">${item.nombre}</span>
                                <i class="material-icons secondary-content" onclick="clickEliminarDependencia( ${item.codDep} )">close</i>
                              </li>`
      
              $("ul.listado-dependencias ").append( contenidoHTML )
      
          }) 


        }


        contenidoHTML = `<li class="collection-item row" >
                            <a class=" btn primario col s12" onclick="clickAsignarDependencia(  )"> ASIGNAR </a>
                          </li>`
        
        $("ul.listado-dependencias ").append( contenidoHTML )
        
        
        
        
    })
  }

  $(".formEditarDocente").on("submit",function(event){
    event.preventDefault()
    if ( !$(this).valid() ) { return false; }
    $.ajax({

      url:'?controlador=docentes&actividad=modificar',
      type:'POST',
      dataType:'json',
      data: $(this).serialize()
    })
    .done(function(respuesta){
      Materialize.toast('Listo...',997,'',function(){
        var docente_seleccionado = JSON.parse( sessionStorage.getItem( "docente_seleccionado" ) )
        cargarComboCategorias()
        cargarComboDedicaciones()
        cargarComboRoles()
        editar( docente_seleccionado )
      })

    })
  })


  function clickAsignarDependencia( ){
    var docente_seleccionado = JSON.parse( sessionStorage.getItem( "docente_seleccionado" ) )
    $.ajax({

      url:'?controlador=docentes&actividad=consultar-dependencias-disponibles',
      type:'POST',
      dataType:'json',
      data : {

        "cedDoc" : docente_seleccionado
      }
    })
    .done(function(respuesta){
     if (  respuesta.data.length > 0 ) {

    
       $("select#codDep").html("")

            var contenidoHTML = $("")        
            
            $.each( respuesta.data, function(i,item){

                contenidoHTML += `<option value="${item.codDep}">
                                        ${item.nombre}
                                    </option>`
            }) 
            
            $("select#codDep").html(contenidoHTML)  
            $('select').material_select()    
            $("#asignarDependencias").modal("open")
     }


    })
  }  

  function clickEliminarDependencia( codDep ){
    var docente_seleccionado = JSON.parse( sessionStorage.getItem( "docente_seleccionado" ) )
    
    $.ajax({

      url:'?controlador=docentes&actividad=eliminar-dependencia-docente',
      type:'POST',
      dataType:'json',
      data : {

        "cedDoc" : docente_seleccionado,
        "codDep" : codDep
      }
    })
    .done(function(respuesta){
     Materialize.toast('Listo...',997,"",function(){
      location.href = "?controlador=docentes&actividad=vista-editar"
     })

    })
  }

  

  $(".formAsignarDependencias").on("submit",function(event){

    event.preventDefault()
    var docente_seleccionado = JSON.parse( sessionStorage.getItem( "docente_seleccionado" ) )
    var codDep = $("select#codDep option:selected").val( )

    $.ajax({
      url:'?controlador=docentes&actividad=asignar-dependencia',
      type:'POST',
      dataType:'json',
      data: {

        "codDep" : codDep,
        "cedDoc" : docente_seleccionado
      }
    })
    .done(function(respuesta){

      Materialize.toast('Listo...',997,"",function(){
       location.href = "?controlador=docentes&actividad=vista-editar"
      })
      
    })
  })

  
</script>
</body>
</html>
