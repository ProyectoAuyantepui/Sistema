
<?php $titulo = "CREAR DOCENTE";?>
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

<section class="caja_formulario row" >
  
<div class="col s12 m3">
  <div class="card ">
    <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
     <img src="public/img/avatar/user05.png" alt="" class="responsive-img " width="90">
     <p class="titulo-tarjeta"  >CREAR DOCENTES</p>
    </div>
    <div class="card-content row">
     <p class="col s12" style="padding: 10px 1px 1px 1px;">
       <a class="btn-floating btn pulse  waves-effect  primario">
         <i class="material-icons left">settings</i>
       </a>
       Este módulo corresponde a la gestion de Docentes en el sistema 
     </p>

     <p class="col s12" style="padding: 10px 1px 1px 1px;">
       
       <a class="btn-floating btn waves-effect  cyan">
         <i class="material-icons left">add</i>
       </a>
       Atraves de este modulo puede crear nuevos Docentes en el sistema.
     </p>
    </div>
  </div>
</div>

<div class="col s12 m9">
  <div class="card ">
    <div class="card-content"  >
      <form class="formCrearDocente" >
        <!-- DATOS PERSONALES -->
        <div class="row">
          <div class="col s12 valign-wrapper">
            <p class="flow-text">INFORMACION PERSONAL</p>
          </div>
        </div>
        <div class="row">
          <div class="col s1 input-field">
            <select name="nacionalidad" id="nacionalidad">
              <option value="V" >V</option>
              <option value="E" >E</option>
            </select>
          </div>
          <div class="col s3 input-field">
            
            <label for="cedDoc">Cédula</label>
            <input  
              id="cedDoc"  
              type="text"  
              name="cedDoc" 
              class="validate tooltipped" 
              data-position="bottom"  
              data-tooltip="Ingrese la cédula, este campo solo debe contener números desde 8 hasta 10 carácteres" 
              pattern="[0-9]{7,10}" 
              rangelength=[7,10] 
              required
            >
          </div>
          <div class="col s4 input-field">
            <i class="material-icons prefix">account_circle</i>
            <input  
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
              <input  name="sexo" type="radio" id="sexo1" checked="checked" value="1" />
              <label for="sexo1">Femenino</label>
              <input  name="sexo" type="radio" id="sexo2" value="2" />
              <label for="sexo2">Masculino</label>
            </p>
          </div>
          <div class="col s4 input-field">
            <i class="material-icons prefix">phone</i>
            <input  
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
              id="usuario" 
              name="usuario" 
              type="text" 
              class="validate tooltipped" 
              data-position="bottom"  
              data-tooltip="Indique cual será su usuario para poder igresar al sistema" required 
            >
            <label data-success="Correcto..."  for="usuario" >Usuario</label>
          </div>
          <div class="col s4 input-field">
            <select id="avatar" name="avatar" required>
              <option value="" disabled selected>Seleccione un avatar de usuario</option>
              
              <option value="public/img/avatar/user01.png" 
                data-icon="public/img/avatar/user01.png" >     
                Avatar 01
              </option>

              <option value="public/img/avatar/user02.png" 
                data-icon="public/img/avatar/user02.png" >     
                Avatar 02
              </option>

              <option value="public/img/avatar/user03.png" 
                data-icon="public/img/avatar/user03.png" >     
                Avatar 03
              </option>

              <option value="public/img/avatar/user04.png" 
                data-icon="public/img/avatar/user04.png" >     
                Avatar 04
              </option>

              <option value="public/img/avatar/user05.png" 
                data-icon="public/img/avatar/user05.png" >     
                Avatar 05
              </option>

              <option value="public/img/avatar/user06.png" 
                data-icon="public/img/avatar/user06.png" >     
                Avatar 06
              </option>
            </select>
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

<div class="fixed-action-btn">

  <a href="?controlador=docentes&actividad=index" 
     class="btn-floating btn-large waves-effect waves-light  deep-orange  "  
  >
    <i class="material-icons ">arrow_back</i>
  </a>

</div>

</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>    
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/validaciones/docentes.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script type="text/javascript">
  $(function(){

    /*
    cargarComboDependencias()*/
    cargarComboCategorias()
    cargarComboDedicaciones()
    cargarComboRoles()
  })

/*  function cargarComboDependencias(){
    $(".formCrearDocente select#codDep").html("")
    
    $.ajax({

        url:'?controlador=dependencias&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
       
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codDep}">
                                    ${item.nombre}
                                </option>`
        }) 
        
        $(".formCrearDocente select#codDep").html(contenidoHTML)  
        $('select').material_select()    
    })
  }*/

  function cargarComboCategorias(){
    $(".formCrearDocente select#codCatDoc").html("")
    
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
        
        $(".formCrearDocente select#codCatDoc").html(contenidoHTML)  
        $('select').material_select()    
    })
  }

  function cargarComboDedicaciones(){
    $(".formCrearDocente select#codDed").html("")
    
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
        
        $(".formCrearDocente select#codDed").html(contenidoHTML)  
        $('select').material_select()    
    })
  }

  function cargarComboRoles(){
    $(".formCrearDocente select#codRol").html("")
    
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
        
        $(".formCrearDocente select#codRol").html(contenidoHTML)  
        $('select').material_select()    
    })
  }

  $(".formCrearDocente").on("submit",function( event ){

    event.preventDefault()
    if ( !$(this).valid() ) { return false; }

    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=docentes&actividad=consultar',
        data:{
          "cedDoc" : $('.formCrearDocente input[name=nacionalidad]').val() + "-" + $('.formCrearDocente input[name=cedDoc]').val()
        } 
    })                      
    .done(function(respuesta_cedula){

        if (respuesta_cedula.operacion == true) {

            Materialize.toast('Ya existe un usuario usando ese numero de cedula...',997,'rounded');
            $('.formCrearDocente input[name=cedDoc]').addClass("invalid")                      
        }else{

            $.ajax({ 
              dataType : 'json',
              type:'POST',
              url:'index.php?controlador=docentes&actividad=crear',
              data:$('.formCrearDocente').serialize() 
            })                      
            .done(function(respuesta){

              if ( respuesta.operacion == true ) {
                
                Materialize.toast('listo...',997,'' , function(){
                  location.href = '?controlador=docentes&actividad=index'
                })
              }

            })
        }              
        
    })

    
  })

  


</script>
</body>
</html>

