<?php $titulo = "LOGIN";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <title>Auyantepui - <?= $titulo ?></title>
    <style type="text/css">
      body{
        width: 100%;
        height:100%;
           background:url('public/img/fondo.jpg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }
      main{
        margin-top: 50px;
      }
    </style>
</head>
<body>
<main>
  <section class="row">
    <div class="col s12 m4 offset-m4 card " style="margin-top: 50px; ">
      <div class="card-content " style="padding: 35px 0px 2px 0px;">
        <div class="row">
          <div class="col m12 center-align">
            <img src="public/img/logo.png" alt="" class=" responsive-img " width="90px">
            <p class="titulo-proyecto">SISTEMA AUYANTEPUI</p> 
          </div>
          
          <div class="col m12">
            <form class="form-login" novalidate="novalidate">


              <div class="row" >
                <div class="input-field col m12 tooltipped" data-position="right"  data-tooltip="Ingrese su usuario para ingresar al sistema ">
                  <i class="material-icons prefix">account_circle</i>
                  <input  id="usuario" name="usuario" type="text" class="validate" required aria-required="true">
                  <label for="usuario">Usuario</label>
                </div>
              </div>

              <div class="row" >
                <div class="input-field col m12  tooltipped" data-position="right"  data-tooltip="Ingrese su contraseña para el ingreso al sistema">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="clave" name="clave" type="password" class="validate" required aria-required="true">
                  <label for="clave">Clave</label>
                </div>
              </div>
                              


              <div class="row">
                <div class="input-field col m12">
                  <button type="submit" class="btn btn-large waves-effect waves-light col s12 primario hoverable" id="acceder">Acceder</button>
                </div>
              </div>

              <div class="row" style="margin: 0px;">
                <div class="input-field col m12">
                  <p class="">
                    <a href="#" onclick="clickOlvidoPass()">¿Olvido su contraseña?</a>
                  </p>
                </div>          
              </div>

            </form>

            <form class="form-correo oculto" novalidate="novalidate" >


              <div class="row" >
                <div class="input-field col s12 ">
                  <i class="material-icons prefix">email</i>
                                  
                  <input id="correo" name="correo" type="email" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su correo con el siguiente formato dominio@servidor.extensión"  required aria-required="true" >
                  <label data-success="Correcto..."  for="correo" >Correo</label>
                </div>
              </div>
                              


              <div class="row">
                <div class="input-field col m12">
                  <button type="submit" class="btn btn-large waves-effect waves-light col s12 primario hoverable" >Enviar</button>
                </div>
              </div>

            </form>
          </div>
        </div> 
      </div>
    </div>    
  </section>  

  <section class="row">

    <div class="col s12 m4 offset-m4">

      <a href="index.php?controlador=login&actividad=registro" class="btn btn-floating pulse right btn-large waves-effect waves-light cyan tooltipped" data-position="right"  data-tooltip="<p >Si eres docente de nuestra institucion , <br> te invitamos a que te registres en el sistema </p>">
        <i class="material-icons">person_add</i>
      </a>

      <!--<a class="btn btn-floating  btn-small waves-effect waves-light pink darken-1  tooltipped" data-position="top"  data-tooltip="¿Necesita de nuestra Ayuda?">
        <i class="material-icons ">help</i>
      </a> -->

      <a class="btn btn-floating  btn-small waves-effect waves-light green darken-1  tooltipped" data-position="top"  data-tooltip="Sobre Nosotros" href="app/vista/about.auyantepui.php">
        <i class="material-icons ">info</i>
      </a> 

      <a class="btn btn-floating  btn-small waves-effect waves-light blue darken-4 tooltipped" data-position="top"  data-tooltip="Acerca de nuestra institución" href="http://uptaeb.edu.ve/site/index.php" target="_blank">
        <i class="material-icons ">account_balance</i>
      </a>

      <a class="btn btn-floating  btn-small waves-effect waves-light blue-grey  tooltipped" data-position="top"  data-tooltip="El sistema Auyantepui esta basado en  <br>las libertades del software libre  <br>presione aqui para conocer más sobre <br> el desarrollo del sistema" href="https://github.com/ProyectoAuyantepui/Sistema" target="_blank">  
        <i class="material-icons ">code</i>
      </a>
        
    </div>
    
  </section>
</main> 
<?php require_once "app/vista/plantilla/__scripts.php";  ?>
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/validaciones/login.js"></script>
<script src="public/js/ajax/login.js"></script>

<script type="text/javascript">
  
  function clickOlvidoPass(){

    $(".form-login").hide()
    $(".titulo-proyecto").html("REESTABLECER CONTRASEÑA")
    
    $(".form-correo").removeClass("oculto")
  }

  $(".form-correo").validate({

    messages: {
    
      correo:{
        required: "Por favor especifique su correo electronico",
        email: "La sintaxis correcta deberia ser: nombre@dominio.com"
      }
    }        
  })

  $(".form-correo").on("submit",function(){
    event.preventDefault()
    if ( !$(this).valid() ) { return false; }

    $.ajax({ 
      dataType : 'json',
      type:'POST',
      url:'index.php?controlador=login&actividad=validar-correo',
      data:{
        "correo" : $(".form-correo input[name=correo]").val( )
      } 
    })                      
    .done(function(respuesta){


      if ( respuesta.operacion == true ) {

        $.ajax({ 
          dataType : 'json',
          type:'POST',
          url:'index.php?controlador=login&actividad=reestablecer-clave',
          data:{
            "correo" : respuesta.data.correo,
            "cedDoc" : respuesta.data.cedDoc
          } 
        })                      
        .done(function(respuesta_recuperacion){

          if( respuesta_recuperacion.operacion == false ){
            Materialize.toast( 'Error: No esta conectado a una red de internet </br> se cancelo la operacion', 1700)
          }else if( respuesta_recuperacion.operacion == true ){

            Materialize.toast( 
                  'Listo, le hemos enviado un correo de recuperacion </br> a la direccion de correo : </br>' + respuesta_recuperacion.destinatario + '', 
                  1700 , 
                  '',
                  function(){
                    $(".form-correo input[name=correo]").val("")
                    window.location.href = "index.php?controlador=login&actividad=index"
                  }
            )

            sessionStorage.setItem( "cedDoc" , respuesta.data.cedDoc )
          }


        })
      }else if(respuesta.operacion == false){

        Materialize.toast( 'Error: El correo no existe...', 1700)
        $("body").find("input[name='correo']").addClass("invalid").next("label").attr("data-error","Error: El correo no existe...")
      }
    })
  })

 
</script>
</body>
</html>
