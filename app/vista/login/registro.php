<?php $titulo = "REGISTRO";?>
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

<nav class="nav-extended">
  <div class="nav-wrapper primario">
    <ul class="left">
      <li>
        <a href="?controlador=login&actividad=index" class="waves-effect waves-light" href="#!" >
          <i class="material-icons ">arrow_back</i>
        </a>
      </li>
      <li class="brand-logo"> Auyantepui - REGISTRO</li>
    </ul>
    <ul class="right ">
      <li>
        <a class="waves-effect waves-light" href="#!" >
          <i class="material-icons ">refresh</i>
        </a>
      </li>
      <li>
        <a class="waves-effect waves-light" href="#!" >
          <i class="material-icons ">help</i>
        </a>
      </li>        
    </ul>
  </div>
  <div class="nav-content primario" style="height: 40vh;" ></div>
</nav>

<main class="row">
  <section class="col m10 offset-m1">
    <div class="card" style="margin-top: -35vh;">
      <div class="card-content ">
        <div class="row">
          
          

            <form id="form-registro-1" novalidate="novalidate" >

              <div class="col m12 valign-wrapper">
                <i class="material-icons left">person_add</i>
                <h5>Informacion personal</h5>
              </div>

              <div class="row">
                
                <div class="col s1 input-field">
                  <select name="nacionalidad" id="nacionalidad">
                    <option value="V-" >V</option>
                    <option value="E-" >E</option>
                  </select>
                </div>
                <div class="col s3 input-field">
            
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
                    placeholder="Cedula" 
                  >
                  <label for="cedDoc">Cédula</label>
                </div>

                <div class="input-field col s12  col m4">
                  <i class="material-icons prefix">account_circle</i>
                  
                  <input id="nombre" name="nombre" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Nombre, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] placeholder="Nombre" required>
                  <label data-success="Correcto..."  for="nombre" >Nombre</label>
                </div>
                
                <div class="input-field col s12  col m4">
                  <i class="material-icons prefix">account_box</i>
                 
                  <input id="apellido" name="apellido" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Apellido, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] placeholder="Apellido" required>
                   <label data-success="Correcto..."  for="apellido" >Apellido</label>
                </div>
              </div>

              <div class="row">
                <div class="col s12 m4">
                  
                  <p>
                    <input name="sexo" type="radio" id="crear_sexo1" checked="checked" value="1" />
                    <label for="crear_sexo1">Femenino</label>
                    <input name="sexo" type="radio" id="crear_sexo2" value="2" />
                    <label for="crear_sexo2">Masculino</label>
                  </p>

                </div>

                <div class="input-field col s12  col m4">
                  <i class="material-icons prefix">assignment_ind</i>   
                  
                  <input type="text" name="fecNac" id="fecNac" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su fecha de Nacimiento" placeholder="Fecha de Nacimiento:"  required />
                  <label data-success="Correcto..."  for="fecNac">Fecha de Nacimiento:</label>
                </div>
                
                <div class="input-field col s12  col m4">
                  <i class="material-icons prefix">phone</i>
                  
                  <input id="telefono" name="telefono" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su número telefónico, solo puede contener números con un rango entre 10 y 11 carácteres" pattern="[0-9]{10,11}" placeholder="Teléfono" required>
                  <label data-success="Correcto..."  for="telefono"  >Teléfono ej: 02511234567</label>
                </div>

              </div>

              <div class="row">
                <div class="input-field col s12  col m12 ">

                  <i class="material-icons prefix">call_split</i>
                  
                  <input type="text" id="direccion" name="direccion" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres"  placeholder="Dirección" required/>
                  <label data-success="Correcto..."  for="direccion"  >Dirección</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field  col s12  col m12 right-align">
                  <button type="reset" class="btn-flat waves-effect" >deshacer</button>
                  <button type="submit" class="btn btn-raised waves-effect waves-light primario" >SIGUIENTE</button>
                </div>
              </div>      

                       


            </form>

            <form id="form-registro-2" class="oculto" novalidate="novalidate">

              <div class="col m12 valign-wrapper">
                <i class="material-icons left">assignment_ind</i>
                <h5>Informacion laboral</h5>
              </div>

              <div class="row">
                
                <div class="input-field   col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la Categoría a la cual pertenece">
                  
                  <select id="codCatDoc" name="codCatDoc" required ></select>
                  <label for="codCatDoc" >Categoría</label>
                </div>

                <div class="input-field col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la condición a la cual pertenece actualmente">
                  
                  <select id="condicion" name="condicion" required >
                    <option value="condicion"> REPOSO </option>
                  </select>
                  <label for="condicion" >Condición</label>
                </div>

                 
                <div class="input-field col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la Dedicación a la cual pertenece">
                  
                  <select id="codDed" name="codDed" required ></select>
                  <label for="codDed" >Dedicación</label>
                </div> 
              </div>

              <div class="row">
                
                <div class="input-field col s12  col m6">
                  <i class="material-icons prefix">assignment_ind</i>   
                  
                  <input type="text" name="fecCon" id="fecCon" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual realizó el corcurso en la Universidad" placeholder="Fecha de Concurso:"  required />
                  <label data-success="Correcto..."  for="fecCon">Fecha de Concurso:</label>
                </div>

                <div class="input-field col s12  col m6">
                  <i class="material-icons prefix">assignment_ind</i>            
                  
                  <input type="text" name="fecIng" id="fecIng" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual ingresó en la Universidad" placeholder="Fecha de Ingreso:" required />  
                  <label data-success="Correcto..."  for="fecIng">Fecha de Ingreso:</label> 
                </div>
              </div>

              

              <div class="row">
                <div class="input-field  col s12  col m12 right-align">
                  <button type="button" class="btn-flat waves-effect" onclick="
                    $('#form-registro-2').addClass('oculto'); 
                    $('#form-registro-1').removeClass('oculto')" >ATRAS</button>
                  <button type="submit" class="btn btn-raised waves-effect waves-light primario" >SIGUIENTE</button>
                </div>
              </div>     

                       


            </form>

            <form id="form-registro-3" class="oculto"  novalidate="novalidate">

              <div class="col m12 valign-wrapper">
                <i class="material-icons left">account_circle</i>
                <h5>Informacion de usuario</h5>
              </div>
               
              <div class="row">
                
                <div class="input-field col s12  col m6">
                  <i class="material-icons prefix">email</i>
                  
                  <input id="correo" name="correo" type="email" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su correo con el siguiente formato dominio@servidor.extensión" placeholder="Correo" required >
                  <label data-success="Correcto..."  for="correo" >Correo</label>
                </div>
                      
              
                <div class="input-field col s12  col m6 ">
                  <i class="material-icons prefix">person</i>
                  
                  <input id="usuario" name="usuario" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Indique cual será su usuario para poder igresar al sistema" placeholder="Usuario" required>
                  <label data-success="Correcto..."  for="usuario" >Usuario</label>
                </div>
              </div>

              <div class="row">
                
                <div class="input-field col s12  col m6">
                  <i class="material-icons prefix">screen_lock_portrait</i>
                  
                  <input type="password" name="clave" id="clave" class="validate tooltipped" name="clave" data-position="bottom"  type="password"  data-tooltip="Indique cual será su clave para poder igresar al sistema">
                  <label data-success="Correcto..."  for="clave" >Clave</label>
                </div>
                <div class="input-field col s12  col m6 ">
                  <i class="material-icons prefix">screen_lock_landscape</i>
                  
                  <input type="password" class="validate tooltipped" name="clave" data-position="bottom"  data-tooltip="Repita su clave" name="cclave" id="cclave" equalTo='#clave' placeholder="Confirmar Clave" required>
                  <label data-error="Las claves no coinciden" data-success="Correcto..."  for="clave" >Confirmar Clave</label>
                </div>

                <div class="row">
                 <div class="input-field col s12 m12">
                    <select class="icons" id="avatar" name="avatar" required>
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

              <div class="row">
                <div class=" col s12  col m12 right-align">
                  <button type="button" class="btn-flat waves-effect" onclick="
                    $('#form-registro-3').addClass('oculto'); 
                    $('#form-registro-2').removeClass('oculto')
                  " >ATRAS</button>
                  <button type="submit" class="btn btn-raised waves-effect waves-light primario" >listo</button>
                </div>
              </div>     

            </form>

        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/validaciones/registro.js"></script>
<script src="public/js/ajax/registro.js"></script>
</body>
</html>



