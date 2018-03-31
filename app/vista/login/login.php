<?php $titulo = "Login";?>
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>

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
<body>
<main>
  <section class="row">
    <div class="col s12 m4 offset-m4 card ">
      <div class="card-content " style="padding: 24px 0px 2px 0px;">
        <div class="row">
          <div class="col m12 center-align">
            <img src="public/img/logo.png" alt="" class=" responsive-img " width="90px">
            <p class="">SISTEMA AUYANTEPUI</p> 
          </div>
          
          <div class="col m12">
            <form class="form-login" method="POST">


              <div class="row" >
                <div class="input-field col m12 tooltipped" data-position="right"  data-tooltip="Ingrese su usuario para ingresar al sistema ">
                  <i class="material-icons prefix">account_circle</i>
                  <input  id="usuario" name="usuario" type="text" class="validate" required>
                  <label for="usuario">Usuario</label>
                </div>
              </div>

              <div class="row" >
                <div class="input-field col m12  tooltipped" data-position="right"  data-tooltip="Ingrese su contraseña para el ingreso al sistema">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="clave" name="clave" type="password" class="validate" required>
                  <label for="clave">Clave</label>
                </div>
              </div>
                              


              <div class="row">
                <div class="input-field col m12">
                  <button type="submit" class="btn btn-large waves-effect waves-light col s12 primario hoverable" >Acceder</button>
                </div>
              </div>

              <div class="row" style="margin: 0px;">
                <div class="input-field col m12">
                  <p class="">
                    <a href="#">¿Olvido su contraseña?</a>
                  </p>
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

<script src="public/js/validaciones/login.js"></script>
<script src="public/js/ajax/login.js"></script>
</body>
</html>
