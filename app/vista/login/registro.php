<?php $titulo = "Registro";?>
<html>
<?php require_once "app/vista/plantilla/__head.php";  ?>
<body>

<nav class="nav-extended">
  <div class="nav-wrapper primario">
    <ul class="left">
      <li>
        <a href="?controlador=login&actividad=index" class="waves-effect waves-light" href="#!" >
          <i class="material-icons ">arrow_back</i>
        </a>
      </li>
      <li class="brand-logo"> Auyantepui - Registro</li>
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
          
          

            <form id="form-registro-1" >

              <div class="col m12 valign-wrapper">
                <i class="material-icons left">person_add</i>
                <h5>Informacion personal</h5>
              </div>

              <div class="row">
                <div class="col s12  col m4">
                  <i class="material-icons prefix">assignment_ind</i>
                    <label data-success="Correcto..."  for="cedDoc">Cédula</label>
                      <input  id="cedDoc" name="cedDoc" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su cédula, debe contener de 6 a 8 caráteres y debe ser solo númerico" pattern="[0-9]{6,8}" placeholder="Cédula" required>
                </div>

                <div class="col s12  col m4">
                  <i class="material-icons prefix">account_circle</i>
                    <label data-success="Correcto..."  for="nombre" >Nombre</label>
                      <input id="nombre" name="nombre" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Nombre, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] placeholder="Nombre" required>
                </div>
                
                <div class="col s12  col m4">
                  <i class="material-icons prefix">account_box</i>
                    <label data-success="Correcto..."  for="apellido" >Apellido</label>
                      <input id="apellido" name="apellido" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Apellido, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] placeholder="Apellido" required>
                </div>
              </div>

              <div class="row">
                <div class="col s12 m4">
                  <label>Sexo</label>
                  <p>
                    <input name="sexo" type="radio" id="crear_sexo1" checked="checked" value="1" />
                    <label for="crear_sexo1">Femenino</label>
                    <input name="sexo" type="radio" id="crear_sexo2" value="2" />
                    <label for="crear_sexo2">Masculino</label>
                  </p>
                </div>

                <div class="col s12  col m4">
                  <i class="material-icons prefix">assignment_ind</i>   
                    <label data-success="Correcto..."  for="fecNac">Fecha de Nacimiento:</label>
                      <input type="text" name="fecNac" id="fecNac" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su fecha de Nacimiento" placeholder="Fecha de Nacimiento:"  required />
                </div>
                
                <div class="col s12  col m4">
                  <i class="material-icons prefix">phone</i>
                    <label data-success="Correcto..."  for="telefono"  >Teléfono ej: 02511234567</label>
                      <input id="telefono" name="telefono" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su número telefónico, solo puede contener números con un rango entre 10 y 11 carácteres" pattern="[0-9]{10,11}" placeholder="Teléfono" required>
                </div>

              </div>

              <div class="row">
                <div class="col s12  col m12 ">
                  <i class="material-icons prefix">call_split</i>
                    <label data-success="Correcto..."  for="textarea"  >Dirección</label>
                      <input type="text" id="direccion" name="direccion" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres" rangelength=[1,120] placeholder="Dirección" required></input>
                </div>
              </div>

              <div class="row">
                <div class=" col s12  col m12 right-align">
                  <button type="reset" class="btn-flat waves-effect" >deshacer</button>
                  <button type="submit" class="btn btn-raised waves-effect waves-light primario" >SIGUIENTE</button>
                </div>
              </div>      

                       


            </form>

            <form id="form-registro-2" class="oculto">

              <div class="col m12 valign-wrapper">
                <i class="material-icons left">assignment_ind</i>
                <h5>Informacion laboral</h5>
              </div>

              <div class="row">
                
                <div class="  col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la Categoría a la cual pertenece">
                  <label for="codCatDoc" >Categoría</label>
                  <select id="codCatDoc" name="codCatDoc" required >
                    <option value="" selected>Seleccione una opcion...</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                  </select>
                </div>

                <div class="col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la condición a la cual pertenece actualmente">
                  
                  <select id="condicion" name="condicion" required >
                    <option value="" selected>Seleccione una opcion...</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                  </select>
                  <label for="condicion" >Condición</label>
                </div>

                 
                <div class="col s12  col m4 tooltipped" data-position="bottom"  data-tooltip="Ingrese la Dedicación a la cual pertenece">
                  
                  <select id="dedicacion" name="dedicacion" required  >
                    <option value="" selected>Seleccione una opcion...</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                  </select>
                  <label for="dedicacion" >Dedicación</label>
                </div> 
              </div>

              <div class="row">
                
                <div class="col s12  col m6">
                  <i class="material-icons prefix">assignment_ind</i>   
                    <label data-success="Correcto..."  for="fecCon">Fecha de Concurso:</label>
                      <input type="text" name="fecCon" id="fecCon" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual realizó el corcurso en la Universidad" placeholder="Fecha de Concurso:"  required />
                </div>

                <div class="col s12  col m6">
                  <i class="material-icons prefix">assignment_ind</i>            
                    <label data-success="Correcto..."  for="fecIng">Fecha de Ingreso:</label>
                      <input type="text" name="fecIng" id="fecIng" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual ingresó en la Universidad" placeholder="Fecha de Ingreso:" required />   
                </div>
              </div>

              

              <div class="row">
                <div class=" col s12  col m12 right-align">
                  <button type="button" class="btn-flat waves-effect" onclick="
                    $('#form-registro-2').addClass('oculto'); 
                    $('#form-registro-1').removeClass('oculto')" >ATRAS</button>
                  <button type="submit" class="btn btn-raised waves-effect waves-light primario" >SIGUIENTE</button>
                </div>
              </div>     

                       


            </form>

            <form id="form-registro-3" class="oculto">

              <div class="col m12 valign-wrapper">
                <i class="material-icons left">account_circle</i>
                <h5>Informacion de usuario</h5>
              </div>
               
              <div class="row">
                
                <div class="col s12  col m6">
                  <i class="material-icons prefix">email</i>
                    <label data-success="Correcto..."  for="correo" >Correo</label>
                      <input id="correo" name="correo" type="email" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su correo con el siguiente formato dominio@servidor.extensión" placeholder="Correo" required >
                </div>
                      
              
                <div class="col s12  col m6 ">
                  <i class="material-icons prefix">person</i>
                    <label data-success="Correcto..."  for="usuario" >Usuario</label>
                      <input id="usuario" name="usuario" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Indique cual será su usuario para poder igresar al sistema" placeholder="Usuario" required>
                </div>
              </div>

              <div class="row">
                
                <div class="col s12  col m6">
                  <i class="material-icons prefix">screen_lock_portrait</i>
                    <label data-success="Correcto..."  for="clave" >Clave</label>
                      <input type="password" name="clave" id="clave" class="validate tooltipped" data-position="bottom"  data-tooltip="Indique cual será la contraseña que utilizará para ingresar al sistema" placeholder="Clave" required>
                </div>
                <div class="col s12  col m6 ">
                  <i class="material-icons prefix">screen_lock_landscape</i>
                    <label data-success="Correcto..."  for="clave" >Confirmar Clave</label>
                      <input type="password" class="form-control tooltipped" data-position="bottom"  data-tooltip="Por favor confirme su Contraseña" name="cclave" id="cclave" equalTo='#clave' placeholder="Confirmar Clave" required>
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



