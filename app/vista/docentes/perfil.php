<?php $titulo = "Perfil de usuario";?>
<!DOCTYPE html>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>


<body>
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>

<main >
  
  <section class="row">


    <div class="col s4">
      <div class="card">
        <div class="center-align teal tarjeta" >
          <img src="<?= $_SESSION['user']['avatar'] ?>" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" ><?= $_SESSION['user']['nombre'] ?></p>
        </div>
        <div class="card-content" style="padding: 0px;" >

          <ul class="collection" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle deep-orange darken-1">phone</i>
          
              <span class="title">Ver mi horario</span>
              
              
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle cyan">person</i>
              <span class="title">Descargar mi horario</span>
              
              
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle green">edit</i>
              <span class="title">Cambiar contraseña</span>
              
              
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle primario">play_arrow</i>
              <span class="title">Title</span>
              
              
            </li>
          </ul>
                  
        </div>
      </div>

      <div class="card">

        <div class="card-content" style="padding: 0px;" >

          <ul class="collection dependencias" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle deep-orange darken-1">phone</i>
          
              <span class="title">Dependencias</span>
              
              
            </li>
           
          </ul>
                  
        </div>

        <div class="card-action">
          <div class="row">
            <a href="#" class="btn teal col s12 waves-effect">
              Ir a dependencias
            </a>   
          </div> 
        </div>

      </div>

      <div class="card">

        <div class="card-content" style="padding: 0px;" >

          <ul class="collection comisiones" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle deep-orange darken-1">phone</i>
          
              <span class="title">Comisiones</span>
              
              
            </li>
          </ul>
                  
        </div>

        <div class="card-action">
          <div class="row">
            <a href="#" class="btn teal col s12 waves-effect">
              Ir a comisiones
            </a>   
          </div> 
        </div>

      </div>

    </div>

    <div class="col s8">
      <div class="card">

        <div class="card-content" >

          <div class="row">


            <div class="row">

              <div class="col s12 valign-wrapper">
                <h5 class="valign">Informacion personal</h5>
              </div>

            </div>
            <form id="form-datos-perfil" onsubmit="return console.log( $(this).serialize() )">

              <div class="row">


                <div class="input-field  col s12  col m4">
                  <i class="material-icons prefix">account_circle</i>
                  <input disabled id="nombre" name="nombre" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Nombre, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] required>
                  <label data-success="Correcto..."  for="nombre" >Nombre</label>
                </div>
                
                <div class="input-field  col s12  col m4">
                  <i class="material-icons prefix">account_box</i>
                  <input disabled id="apellido" name="apellido" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Apellido, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] required>
                  <label data-success="Correcto..."  for="apellido" >Apellido</label>
                </div>

                <div class="col s12 m4">
                  <label>Sexo</label>
                  <p>
                    <input disabled name="sexo" type="radio" id="crear_sexo1" checked="checked" value="1" />
                    <label for="crear_sexo1">Femenino</label>
                    <input disabled name="sexo" type="radio" id="crear_sexo2" value="2" />
                    <label for="crear_sexo2">Masculino</label>
                  </p>
                </div>
              </div>

              <div class="row">
                

                <div class="input-field  col s12  col m6">
                  <i class="material-icons prefix">assignment_ind</i>
                  <input disabled type="text" name="fecNac" id="fecNac" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su fecha de Nacimiento"   required />   
                  <label data-success="Correcto..."  for="fecNac">Fecha de Nacimiento:</label>
                </div>
                
                <div class="input-field  col s12  col m6">
                  <i class="material-icons prefix">phone</i>
                  <input disabled id="telefono" name="telefono" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su número telefónico, solo puede contener números con un rango entre 10 y 11 carácteres" pattern="[0-9]{10,11}" required>
                  <label data-success="Correcto..."  for="telefono"  >Telefono ej: 02511234567</label>
                </div>

              </div>

              <div class="row">
                <div class="input-field  col s12  col m12 ">
                  <i class="material-icons prefix">call_split</i>
                  <input disabled type="text" id="direccion" name="direccion" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres" rangelength=[1,120]  required></input>
                  <label data-success="Correcto..."  for="textarea"  >Dirección</label>
                </div>
              </div>

          </div>
        
                  
        </div>
      </div>
      <div class="card">

        <div class="card-content" >

          <div class="row">


            <div class="row">

              <div class="col s12 valign-wrapper">
                <h5 class="valign">Informacion laboral</h5>
              </div>
            </div>

                <div class="row">
                  
                  <div class="input-field  col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la categoria a la cual pertenece actualmente">
                    
                    <select id="codCatDoc" name="codCatDoc" required disabled>
                      <option value="" disabled selected>Seleccione una categoria de docente</option>
                    </select>
                    <label for="codCatDoc" >Categoria</label>
                  </div>

                  <div class="input-field  col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la condición a la cual pertenece actualmente">
                    
                    <select id="condicion" name="condicion" required disabled>
                      <option value="" selected>Seleccione una opcion...</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select>
                    <label for="condicion" >Condición</label>
                  </div>

                   
                  <div class="input-field  col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la Dedicación a la cual pertenece">
                    
                    <select id="dedicacion" name="dedicacion" required  disabled>
                      <option value="" selected>Seleccione una opcion...</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select>
                    <label for="dedicacion" >Dedicación</label>
                  </div> 
                </div>

                <div class="row">
                  
                  <div class="input-field  col s12  col m6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" name="fecCon" id="fecCon" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual realizó el corcurso en la Universidad"   required disabled/>   
                    <label data-success="Correcto..."  for="fecCon">Fecha de Concurso:
                    </label>
                  </div>

                  <div class="input-field  col s12  col m6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" name="fecIng" id="fecIng" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual ingresó en la Universidad"   required disabled/>   
                    <label data-success="Correcto..."  for="fecIng">Fecha de Ingreso:
                    </label>
                  </div>
                  
                </div>
          </div>
        
                  
        </div>
      </div>
      <div class="card">

        <div class="card-content" >

          <div class="row">

            <div class="row">

              <div class="col s12 valign-wrapper">
                <h5 class="valign">Informacion de usuario</h5>
              </div>
            </div>

                <div class="row">
                  
                  <div class="input-field  col s12  col m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" name="correo" type="email" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su correo con el siguiente formato dominio@servidor.extensión" required  disabled>
                    <label data-success="Correcto..."  for="correo" >Correo</label>
                  </div>
                        
                
                  <div class="input-field  col s12  col m6 ">
                    <i class="material-icons prefix">person</i>
                    <input id="usuario" name="usuario" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Indique cual será su usuario para poder igresar al sistema" required disabled>
                    <label data-success="Correcto..."  for="usuario" >Usuario</label>
                  </div>
                </div>

                <div class="row">
                   <div class="input-field col s12 m12">
                      <select class="icons" id="avatar" name="avatar" required disabled>
                        <option value="" disabled selected>Seleccione un avatar de usuario</option>
                        
                        <option value="public/img/avatar/user01.png" 
                          data-icon="public/img/avatar/user01.png" class="circle">     
                          Avatar 01
                        </option>

                        <option value="public/img/avatar/user02.png" 
                          data-icon="public/img/avatar/user02.png" class="circle">     
                          Avatar 02
                        </option>

                        <option value="public/img/avatar/user03.png" 
                          data-icon="public/img/avatar/user03.png" class="circle">     
                          Avatar 03
                        </option>

                        <option value="public/img/avatar/user04.png" 
                          data-icon="public/img/avatar/user04.png" class="circle">     
                          Avatar 04
                        </option>

                        <option value="public/img/avatar/user05.png" 
                          data-icon="public/img/avatar/user05.png" class="circle">     
                          Avatar 05
                        </option>

                        <option value="public/img/avatar/user06.png" 
                          data-icon="public/img/avatar/user06.png" class="circle">     
                          Avatar 06
                        </option>
                      </select>
                      <label>Avatar de usuario</label>
                    </div>
                </div>
           

          </div>
                 
        </div>
      </div>
    </div>



  </section>

</main>

<div class="fixed-action-btn" style="right: 50%;">
  <a class="btn-floating btn btn-large pulse waves-effect waves-light cyan" 
  onclick="
    $(this).addClass('oculto')
    $('input').removeAttr('disabled')
    $('select').removeAttr('disabled')
    $('select').material_select();
    $('.btn-guardar').removeClass('oculto')
    $('.btn-cancelar').removeClass('oculto')
  ">
    <i class="material-icons">edit</i>
  </a>

</div>

<div class="fixed-action-btn" style="right: 47%;">
  
  <button type="submit" class="btn-floating btn btn-large waves-effect waves-light primario  btn-guardar oculto" style="margin-right:  15px;">
    <i class="material-icons">save</i>
  </button>


  
  <a href="?controlador=docentes&actividad=perfil" class="btn-floating btn btn-large waves-effect waves-light red darken-2 btn-cancelar oculto">
    <i class="material-icons">close</i>
  </a>

</div>
</form>
<?php require_once "app/vista/plantilla/__scripts.php";  ?>

<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>

<script src="public/js/ajax/menu.js"></script>
<script src="public/js/ajax/perfil.js"></script>


</body>
</html>
