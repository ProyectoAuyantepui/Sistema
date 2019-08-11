<?php $titulo = "PERFIL DE USUARIO";?>
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
  <?php  require_once "app/vista/plantilla/__navbar.php"; ?>

  <main >

    <section class="row">


      <div class="col s3">
        <div class="card">
          <div class="center-align teal tarjeta" >
            <img src="<?= 'public/img/perfil/'.$_SESSION['user']['imgPerfil'] ?>" alt="" class="responsive-img " width="90">
            <p class="titulo-tarjeta" ><?= $_SESSION['user']['nombre'] ?></p>
          </div>
          <div class="card-content" style="padding: 0px;" >

            <ul class="collection" >
              <li class="collection-item avatar" style="">
                <i class="material-icons circle teal darken-2">perm_contact_calendar</i>
                <a 
                href="?controlador=reportes&actividad=reporte-horario-docente&cedDoc=<?php echo $_SESSION["user"]["cedDoc"]; ?>" 
                target="__blank" 
                class="title"
                >VER MI HORARIO</a>
              </li>

              <li class="collection-item avatar cambiar-img-perfil">
                <i class="material-icons circle red">sentiment_very_satisfied</i>
                <a href="#" class="title">CAMBIAR FOTO DE PERFIL</a>
              </li>

              <li class="collection-item avatar cambiar-clave">
                <i class="material-icons circle green">edit</i>
                <a href="#" class="title">CAMBIAR CONTRASEÑA</a>
              </li>
            </ul>

          </div>
        </div>

        <div class="card">

          <div class="card-content" style="padding: 0px;" >

            <ul class="collection dependencias" >
              <li class="collection-item avatar" style="">
                <i class="material-icons circle brown lighten-1">person_add</i>
                <span class="title">DEPENDENCIAS</span>
              </ul>                  
            </div>
          </div>

          <div class="card">

            <div class="card-content" style="padding: 0px;" >

              <ul class="collection comisiones" >
                <li class="collection-item avatar" style="">
                  <i class="material-icons circle  blue darken-2">group</i>
                  <span class="title">COMISIONES</span>
                </li>
              </ul>                  
            </div>
          </div>

        </div>

        <div class="col s9">
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
                    <div class="input-field col s12 col m4">
                      <i class="material-icons prefix">account_circle</i>
                      <label data-success="Correcto..."  for="cedula" >Cédula</label>
                      <input  id="cedDoc" name="cedDoc" type="text" class="validate tooltipped" data-position="bottom"  data-delay="50" data-tooltip="Cédula"   required>
                    </div>

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

                    <div class="row">

                      <div class="col s12  col m4">
                        <label>Sexo</label>
                        <p>
                          <input disabled name="sexo" type="radio" id="crear_sexo1" checked="checked" value="1" />
                          <label for="crear_sexo1">Femenino</label>
                          <input disabled name="sexo" type="radio" id="crear_sexo2" value="2" />
                          <label for="crear_sexo2">Masculino</label>
                        </p>
                      </div>
                      <div class="input-field  col s12  col m4">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input disabled type="text" name="fecNac" id="fecNac" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su fecha de Nacimiento"   required />   
                        <label data-success="Correcto..."  for="fecNac">Fecha de Nacimiento:</label>
                      </div>

                      <div class="input-field  col s12  col m4">
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

<section id="modalCambiarImgPerfil" class="oculto modal">

  <div class="modal-header secundario">
    <span class="white-text">
      Actualizar Imagen del Perfil
      <i class="modal-action modal-close material-icons right">close</i>
    </span>
  </div>
  <div class="modal-content">
    <form id="formCambiarImgPerfil">
      <div class="input-field col s12  col m6 ">
        <div class="file-field input-field">
          <div class="btn">
            <span>Buscar</span>
            <input type="file" name="cambiarImgPerfil">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col s12 m12 right">
          <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
          <button type="submit" class=" btn btn-large waves-effect waves-light primario" >GUARDAR</button>
        </div>
      </div>
    </form>
  </section>

  <section id="modalCambiarClave" class="oculto modal">

    <div class="modal-header secundario">
      <span class="white-text">
        Actualizar Contraseña
        <i class="modal-action modal-close material-icons right">close</i>
      </span>
    </div>
    <div class="modal-content">
      <form id="formCambiarClave">

        <div class="row">
          <div class="input-field col s12  col m12">
            <i class="material-icons prefix">screen_lock_portrait</i>  
            <input type="password" name="claveVieja" id="claveVieja" class="validate tooltipped"  data-position="bottom"  data-tooltip="Indique su clave Actual">
            <label data-success="Correcto..."  for="clave" >Clave Actual</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12  col m6">
            <i class="material-icons prefix">screen_lock_portrait</i>                  
            <input id="claveNueva" name="claveNueva" type="password" class="validate tooltipped"  data-position="bottom"  data-tooltip="Indique cual será su clave para poder igresar al sistema">
            <label data-success="Correcto..."  for="clave" >Clave</label>
          </div>

          <div class="input-field col s12  col m6 ">
            <i class="material-icons prefix">screen_lock_landscape</i>                  
            <input type="password" class="validate tooltipped" name="repetirClaveNueva" data-position="bottom"  data-tooltip="Repita su clave" name="cclave" id="cclave" equalTo='#claveNueva' placeholder="Confirmar Clave" required>
            <label data-error="Las claves no coinciden" data-success="Correcto..."  for="clave" >Confirmar Clave</label>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12 m12 right">
            <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
            <button type="submit" class=" btn btn-large waves-effect waves-light primario" >GUARDAR</button>
          </div>
        </div>
      </form>
    </section>
    <?php require_once "app/vista/plantilla/__scripts.php";  ?>

    <script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
    <script src="public/vendor/jvalidate/additional-methods.min.js"></script>
    <script src="public/js/validaciones/config-default.js"></script>

    <script src="public/js/ajax/menu.js"></script>
    <script src="public/js/ajax/perfil.js"></script>

    <script>


      $(".cambiar-clave").on("click",function(){
        $("#modalCambiarClave").modal("open")
      })

      $(".cambiar-img-perfil").on("click",function(){
        $("#modalCambiarImgPerfil").modal("open")
      })

      $("#claveNueva").on("focusout", function (e) {
        if ($(this).val() != $("#cclave").val()) {
          $("#cclave").removeClass("valid").addClass("invalid");
        } else {
          $("#cclave").removeClass("invalid").addClass("valid");
        }
      });

      $("#cclave").on("keyup", function (e) {
        if ($("#claveNueva").val() != $(this).val()) {
          $(this).removeClass("valid").addClass("invalid");
        } else {
          $(this).removeClass("invalid").addClass("valid");
        }
      });


      $('#formCambiarClave').on("submit",function(evento){  

        evento.preventDefault()

        var OUser = JSON.parse( sessionStorage.getItem( "user" ) )

        var cedDoc = OUser.cedDoc
        var claveVieja = $('#formCambiarClave input[name="claveVieja"]').val()
        var claveNueva = $('#formCambiarClave input[name="claveNueva"]').val()

        actualizarClave( cedDoc, claveVieja, claveNueva )

      })

      $('#formCambiarImgPerfil').on("submit",function(evento){  
        evento.preventDefault()
        var OUser = JSON.parse( sessionStorage.getItem( "user" ) )
        var usuario = OUser.usuario
        var imgPerfil = $('#formCambiarImgPerfil input[name="cambiarImgPerfil"]')[0].files[0]
        var datos = new FormData();
        datos.append("usuarioImgPerfil",usuario);
        datos.append("updateImgPerfil",imgPerfil);
        $.ajax({    
          dataType : 'json',
          url:'index.php?controlador=perfil&actividad=actualizarImgPerfil' ,
          method:"POST",
          data:datos,
          cache: false,
          contentType:false,
          processData:false
        }).done(function(respuesta){
            Materialize.toast(
              'Hemos actualizado su Imagen de Perfil!',    
              2200
            );  
        })

      })
    </script>
  </body>
  </html>
