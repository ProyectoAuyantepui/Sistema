<?php $titulo = "RECUPERAR CUENTA";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
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
            <p class="titulo-proyecto">RECUPERAR CUENTA</p> 
          </div>
          
          <div class="col m12">
            <form class="form-recuperar" novalidate="novalidate">


              <div class="row" >
               <div class="input-field col s12">
                 <i class="material-icons prefix">screen_lock_portrait</i>
                 
                 <input type="password" name="clave" id="clave" class="validate tooltipped" data-position="bottom"  data-tooltip="Indique cual será la contraseña que utilizará para ingresar al sistema"  required>
                 <label data-success="Correcto..."  for="clave" >Clave</label>
               </div>
               <div class="input-field col s12  ">
                 <i class="material-icons prefix">screen_lock_landscape</i>
                 
                 <input type="password" class="form-control tooltipped" data-position="bottom"  data-tooltip="Por favor confirme su Contraseña" name="cclave" id="cclave" equalTo='#clave'  required>
                 <label data-success="Correcto..."  for="cclave" >Confirmar Clave</label>
               </div>
              </div>
                              


              <div class="row">
                <div class="input-field col m12">
                  <button type="submit" class="btn btn-large waves-effect waves-light col s12 primario hoverable" >GUARDAR</button>
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

      <a href="index.php?controlador=login&actividad=registro" class="btn btn-floating pulse right btn-large waves-effect waves-light cyan tooltipped" data-position="right"  data-tooltip="<p >Si eres docente de nuestra institucion , <br>te invitamos a que te registres en el sistema  <br>para llevar un mejor seguimientod de tu horario <br></p>">
        <i class="material-icons">person_add</i>
      </a>

      <a class="btn btn-floating  btn-small waves-effect waves-light pink darken-1  tooltipped" data-position="top"  data-tooltip="¿Necesita de nuestra Ayuda?">
        <i class="material-icons ">help</i>
      </a>

      <a class="btn btn-floating  btn-small waves-effect waves-light blue darken-4 tooltipped" data-position="top"  data-tooltip="Acerca de nuestra institucion y <br> del grupo de desarrollo ">
        <i class="material-icons ">account_balance</i>
      </a>

      <a class="btn btn-floating  btn-small waves-effect waves-light blue-grey  tooltipped" data-position="top"  data-tooltip="El sistema Auyantepui esta basado en  <br>las libertades del software libre  <br>presione aqui para conocer mas sobre <br> el desarrollo del sistema">  
        <i class="material-icons ">code</i>
      </a>
        
    </div>
    
  </section>
</main> 
<?php require_once "app/vista/plantilla/__scripts.php";  ?>
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script type="text/javascript">
  $('.form-recuperar').validate({
    messages:{
      clave:{
        required:"Introduzca una clave",
        rangelength:"Por favor introduzca un valor de 6 a 8 caracteres"
      },

      cclave:{
        required:"Por favor, confirme la clave ingresada clave",
        equalTo:"Las contraseñas no coinciden"
      }
    }
  })

  $(".form-recuperar").on("submit",function(){

    event.preventDefault()
    if ( !$(this).valid() ) { return false; }

    $.ajax({ 
      dataType : 'json',
      type:'POST',
      url:'index.php?controlador=login&actividad=recuperar-cuenta',
      data:{
        "clave" : $(".form-recuperar input[name=clave]").val( ),
        "cedDoc" : sessionStorage.getItem( "cedDoc" )
      } 
    })                      
    .done(function(respuesta){

      if ( respuesta.operacion == true ) {

        sessionStorage.removeItem( "cedDoc" )

        Materialize.toast( 
              'Listo, cuenta recuperada! </br> le invitamos a iniciar sesion con su nueva contraseña...', 
              1700 , 
              '',
              function(){
                $(".form-recuperar input").val("")
                window.location.href = "index.php?controlador=login&actividad=index"
              }
        )

      }else if( respuesta.operacion == false ){
        Materialize.toast( 
              'Error, cuenta no recuperada! </br> le invitamos a que vuelva a intentar reestablecer su cuenta...', 
              1700 , 
              '',
              function(){  }
        )
      }
    })
  })
</script>
</body>
</html>
