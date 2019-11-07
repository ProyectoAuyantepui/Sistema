<!-- 

Editar Datos del Docentes 
Contenido en el Section llamado en docentes.js
-->

<section class="row oculto" id="editarDocentes">

  <div class="col s4">
      <div class="card">
        <div class="center-align deep-orange tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/editar.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >Editar Docente</p>
        </div>
        <div class="card-content" style="padding: 0px;" >

          <ul class="collection" >
            
            <li class="collection-item avatar">
              <i class="material-icons circle green">edit</i>
              <span class="title">Restablecer contraseña</span>
              
              
            </li>
          </ul>          
      </div>
    </div>

      <div class="card" id="TarjetaDependencias">
        <div class="card-content" style="padding: 0px;" >

          <ul class="collection dependencias" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle deep-orange darken-1">people_outline</i>
              <span class="title">Dependencias</span>
            <table id="dependencias" class="bordered highlight">
            <thead id="thead">
              <tr id="thead">
                <th width="90%">
                  <p><strong>Nombre</strong></p>
                </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
            </li>
          </ul>  
        </div>

        <div class="card-action ">
          <div class="row" >

          <a href="#" class="btn teal darken-1  agregarDependencia tooltipped" style="display: block; margin-top: 10px" data-position="top"  data-delay="50" data-tooltip="Añadir un Docente a esta Dependencia"><i class="material-icons">add</i></a>


<!-- ELIMINAR DOCENTE DE UNA DEPENDENCIA
 -->
          <a href="#"  class="btn tooltipped red darken-3 eliminar-doc-dep" style="display: block; margin-top: 10px" data-position="top"  data-delay="50" data-tooltip="Eliminar docente de esta dependencia"><i class="material-icons">remove</i></a>


          </div> 
        </div>
      </div>

      <div class="card" id="TarjetaComisiones">

        <div class="card-content" style="padding: 0px;" >
          <ul class="collection comisiones" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle deep-orange darken-1">settings_input_component</i>
              <span class="title">Comisiones</span>
            <table id="comisiones" class="bordered highlight">
            <thead id="thead">
              <tr id="thead">
                <th width="90%">
                  <p><strong>Nombre</strong></p>
                </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
            </li>
          </ul>  
        </div>
      </div>

    </div>

    <div class="col s8">
      <div class="card">

        <div class="card-content" >
            <div class="row">
              <div class="col s12 valign-wrapper">
                <h5 class="valign">Informacion personal</h5>
              </div>
            </div>
            <form class="form-datos-perfil" >
              <div class="row">
                <div class="col s12  col m4">
                  <i class="material-icons prefix">account_circle</i>
                  <label data-success="Correcto..."  for="cedula" >Cédula</label>
                  <input  id="editar_cedDoc" name="cedDoc" type="text" class="validate tooltipped" data-position="bottom"  data-delay="50" data-tooltip="Cédula"   required>
                </div>

                <div class="col s12  col m4">
                  <i class="material-icons prefix">account_circle</i>
                  <label data-success="Correcto..."  for="nombre" >Nombre</label>
                  <input  id="editar_nombre" name="nombre" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Nombre, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] required>
                </div>
                
                <div class="col s12  col m4">
                  <i class="material-icons prefix">account_box</i>
                  <label data-success="Correcto..."  for="apellido" >Apellido</label>
                  <input  id="editar_apellido" name="apellido" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Apellido, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] required>
                </div>

                <div class="col s12 m4">
                  <label>Sexo</label>
                  <p>
                    <input  name="sexo" type="radio" id="editar_sexo1" checked="checked" value="1" />
                    <label for="editar_sexo1">Femenino</label>
                    <input  name="sexo" type="radio" id="editar_sexo2" value="2" />
                    <label for="editar_sexo2">Masculino</label>
                  </p>
                </div>
           
                <div class="col s12  col m4">
                    <i class="material-icons prefix">email</i>
                    <label data-success="Correcto..."  for="correo" >Correo</label>
                    <input id="editar_correo" name="correo" type="email" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su correo con el siguiente formato dominio@servidor.extensión" required  >
                </div>
              <div class="row">
                

                <div class="col s12  col m6">
                  <i class="material-icons prefix">assignment_ind</i>
                  <label data-success="Correcto..."  for="fecNac">Fecha de Nacimiento:</label>
                  <input  type="text" name="fecNac" id="editar_fecNac" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su fecha de Nacimiento"   required />   
                </div>
                
                <div class="col s12  col m6">
                  <i class="material-icons prefix">phone</i>
                  <label data-success="Correcto..."  for="telefono"  >Telefono ej: 02511234567</label>
                  <input  id="editar_telefono" name="telefono" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su número telefónico, solo puede contener números con un rango entre 10 y 11 carácteres" pattern="[0-9]{10,11}" required>
                </div>

              </div>

              <div class="row">
                <div class="col s12  col m12 ">
                  <i class="material-icons prefix">call_split</i>
                  <label data-success="Correcto..."  for="textarea"  >Dirección</label>
                  <input  type="text" id="editar_direccion" name="direccion" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres" rangelength=[1,120]  required></input>
                </div>
              </div>

            <div class="row">

              <div class="col s12 valign-wrapper">
                <h5 class="valign">Informacion laboral</h5>
              </div>
            </div>

                <div class="row">
                  
            <div class="col s12 m4">
              <label>Categoría</label>
              <select class="browser-default tooltipped" data-position="bottom"  data-delay="50" data-tooltip="Categoría del Docente" name="codCatDoc" id="editar_codCatDoc">
              </select>
            </div>

            <div class="col s12 m4">
              <label>Dedicación</label>
              <select class="browser-default tooltipped" data-position="bottom"  data-delay="50" data-tooltip="Dedicación a la cual pertenece el Docente" name="dedicacion" id="editar_dedicacion">
                <option value="1" >DEDICACIÓN EXCLUSIVA</option>
                <option value="2" >TIEMPO COMPLETO</option>
                <option value="3" >MEDIO TIEMPO</option>
                <option value="4" >TIEMPO COMVENCIONAL</option>
              </select>
            </div>

            <div class="col s12 m4">
              <label>Condición</label>
              <select class="browser-default tooltipped" data-position="bottom"  data-delay="50" data-tooltip="Condición Actual del Docente" name="condicion"  id="editar_condicion">
                <option value="1" >COMISIÓN DE SERVICIO</option>
                <option value="2" >PERMISO MÉDICO</option>
                <option value="3" >SABÁTICO</option>
                <option value="4" >PERMISO NO REMUNERADO</option>
              </select>
            </div>

                <div class="row">
                  
                  <div class="col s12  col m6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" name="fecCon" id="editar_fecCon" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual realizó el corcurso en la Universidad"   required />   
                    <label data-success="Correcto..."  for="fecCon">Fecha de Concurso:
                    </label>
                  </div>

                  <div class="col s12  col m6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" name="fecIng" id="editar_fecIng" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual ingresó en la Universidad"   required />   
                    <label data-success="Correcto..."  for="fecIng">Fecha de Ingreso:
                    </label>
                  </div>
                  
                </div>
                  

            <div class="row">

              <div class="col s12 valign-wrapper">
                <h5 class="valign">Informacion de Usuario</h5>
              </div>
            </div>

                <div class="row">
                  
               
                  <div class="col s12 m4">
                    <label>Rol</label>
                    <select class="browser-default tooltipped" data-position="bottom"  data-delay="50" data-tooltip="Rol para este Docente" name="rol" id="editar_codRol">
                    </select>
                  </div>
                
                  <div class="col s12  col m8 ">
                    <i class="material-icons prefix">person</i>
                    <label data-success="Correcto..."  for="usuario" >Usuario</label>
                    <input id="editar_usuario" name="usuario" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Indique cual será su usuario para poder igresar al sistema" required >
                  </div>
                </div>
                <div class="row">
                  <div class="col s12  col m12 ">
                      <i class="material-icons prefix">call_split</i>
                      <input  type="text" id="editar_observaciones" name="observaciones" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres" rangelength=[1,120]  required></input>
                    <label data-success="Correcto..."  for="textarea"  >Observaciones</label>
                  </div>
              </div>

              <div class="row"> 
                   <div class="col s12 m12 right">
                     <button type="submit" class="btnEditarComision btn waves-effect waves-light primario tooltipped" data-position="right"  data-delay="50" data-tooltip="Actualizar Docente" >Guardar
                    <i class="material-icons right">save</i></button>
                   </div>
              </div>
</form>

  <div class="fixed-action-btn">
    <a href="?controlador=docentes&actividad=index" class="btn-floating btn-large waves-effect waves-light  deep-orange  regresar " onclick='
       $(".regresar").hide()'>
      <i class="material-icons tooltipped" data-position="left"  data-delay="50" data-tooltip="Ir Atrás">arrow_back</i>
    </a>
  </div>
</form>

</section>




<!-- 

Registrar Datos del Docentes 
Contenido en el Section llamado en docentes.js
-->

<section class="row oculto" id="registrarDocente">
  <div class="col s4">
      <div class="card">
        <div class="center-align green darken-2 tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/registrar.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >Registrar Docente</p>
        </div>
        
      </div>

       <div class="card">

        <div class="card-content" style="padding: 0px;" >

          <ul class="collection dependencias" >
            <li class="collection-item avatar" style="">
              <i class="material-icons circle red darken-1">info</i>
          
              <span class="title">Registro de Docente</span>
              
              
            </li>
           
          </ul>
                  
        </div>

          <div class="card-content" style="padding: 0px;margin-bottom: 4%" >
            <ul class="collection" >
              <p>En esta sección podrás registrar a un docente, asignandole toda su información personal, laboral y de usuario, a diferencia del AutoRegistro podrás añadirle el Rol desde un principio, es decir, al llevar a cabo el AutoRegistro el usuario tendrá el rol de Docente cosa que no ocurre en este caso ya que tú decidirás que rol le colocas al Usuario!</p>

              <p><br>Al momento de la entrega de este sistema estarán disponibles 3 Roles, los cuales son: </p>
              

              <ul class="collection" >
                <li class="collection-item avatar" style="">
                  <i class="material-icons circle  blue darken-2">person</i>
                  <span class="title">DOCENTE</span>
              <p>Posee Permisos para:
                <ul>
                  <li>. Generar Reporte de su Horario</li>
                </ul>
                <ul>
                  <li>. Generación de Reportes del sistema</li>
                </ul>
              </p>
                </li>
              </ul>  
              <ul class="collection" >
                <li class="collection-item avatar" style="">
                  <i class="material-icons circle  blue darken-2">supervisor_account</i>
                  <span class="title">SUPERUSUARIO</span>
                </li>
              </ul>  
              <br><p>Docente 
              <i class="material-icons circle green  darken-1">person</i>
              <p>Posee Permiso para:

              <ul class="collection" >
                <li class="collection-item avatar" style="">
                  <i class="material-icons circle  blue darken-2">group</i>
                  <span class="title">Ver su Horario</span>
                </li>
              </ul>  
              <ul class="collection" >
                <li class="collection-item avatar" style="">
                  <i class="material-icons circle  blue darken-2">group</i>
                  <span class="title">Descargar su Horario</span>
                </li>
              </ul>  
              <ul class="collection" >
                <li class="collection-item avatar" style="">
                  <i class="material-icons circle  blue darken-2">group</i>
                  <span class="title">Visualizar y Modificar su perfil</span>
                </li>
              </ul>   
            </div>

      </div>

      

  </div>
   <div class="col s8">
      <div class="card">

        <div class="card-content" >
            <div class="row">

              <div class="col s12 valign-wrapper">
                <h5 class="valign">Informacion personal</h5>
              </div>

            </div>
            <form class="form-registrar-docentes">
              <div class="row">
                <div class="col s12 m2 ">
                  <label>Nacionalidad</label>
                    <select class="browser-default" name="nacionalidad" id="crear_nacionalidad">
                      <option value="V" >Venezolano</option>
                      <option value="E" >Extrajero</option>
                    </select>
                </div>

                <div class="input-field col s12 m2 ">
                  <i class="material-icons prefix">account_box</i>
                  <label for="cedDoc">Cédula</label>
                  <input  id="crear_cedDoc"  type="text"  name="cedDoc" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la cédula, este campo solo debe contener números desde 8 hasta 10 carácteres" pattern="[0-9]{7,10}" rangelength=[7,10] required>

                </div>

                <div class="input-field col s12  col m4">
                  <i class="material-icons prefix">account_circle</i>
                  <input  id="crear_nombre" name="nombre" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Nombre, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] required>
                  <label data-success="Correcto..."  for="nombre" >Nombre</label>
                </div>
                
                <div class="input-field col s12  col m4">
                  <i class="material-icons prefix">account_box</i>
                  <input  id="crear_apellido" name="apellido" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Apellido, este campo solo debe contener letras" pattern="[a-zA-zÑñáéíóúüÁÉÍÓÚÜ\s]+" rangelength=[2,20] required>
                  <label data-success="Correcto..."  for="apellido" >Apellido</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m4">
                  <label>Sexo</label>
                  <p>
                    <input  name="sexo" type="radio" id="crear_sexo1" checked="checked" value="1" />
                    <label for="crear_sexo1">Femenino</label>
                    <input  name="sexo" type="radio" id="crear_sexo2" value="2" />
                    <label for="crear_sexo2">Masculino</label>
                  </p>
                </div>
                  <div class="input-field col s12  col m6">
                    <i class="material-icons prefix">email</i>
                    <input id="crear_correo" name="correo" type="email" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su correo con el siguiente formato dominio@servidor.extensión" required  >
                    <label data-success="Correcto..."  for="correo" >Correo</label>
                  </div>
              </div>

              <div class="row">
                

                <div class="input-field col s12  col m6">
                  <i class="material-icons prefix">assignment_ind</i>
                  <input  type="text" name="fecNac" id="crear_fecNac" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la cédula, este campo solo debe contener números desde 8 hasta 10 carácteres"  required />   
                  <label data-success="Correcto..."  for="fecNac">Fecha de Nacimiento:</label>
                </div>
                
                <div class="input-field col s12  col m6">
                  <i class="material-icons prefix">phone</i>
                  <input  id="crear_telefono" name="telefono" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su número telefónico, solo puede contener números con un rango entre 10 y 11 carácteres" pattern="[0-9]{10,11}" required>
                  <label data-success="Correcto..."  for="telefono"  >Telefono ej: 02511234567</label>
                </div>

              </div>

              <div class="row">
                <div class="input-field col s12  col m12 ">
                  <i class="material-icons prefix">call_split</i>
                  <input  type="text" id="crear_direccion" name="direccion" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres" rangelength=[1,120]  required></input>
                  <label data-success="Correcto..."  for="textarea"  >Dirección</label>
                </div>
              </div>

          </div>

            <div class="row">

              <div class="input-field col s12 valign-wrapper">
                <h5 class="valign">Informacion laboral</h5>
              </div>
            </div>

                <div class="row">
                  
            <div class="col s12 m4">
              <label>Categoría</label>
              <select class="browser-default" name="codCatDoc" id="crear_codCatDoc">
              </select>
            </div>

                  <div class="col s12 m4">
                    <label>Dedicación</label>
                    <select class="browser-default" name="dedicacion" id="crear_dedicacion">
                      <option value="1" >DEDICACIÓN EXCLUSIVA</option>
                      <option value="2" >TIEMPO COMPLETO</option>
                      <option value="3" >MEDIO TIEMPO</option>
                      <option value="4" >TIEMPO COMVENCIONAL</option>
                    </select>
                  </div>

                  <div class="col s12 m4">
                    <label>Condición</label>
                    <select class="browser-default" name="condicion" id="crear_condicion">
                      <option value="1" >COMISIÓN DE SERVICIO</option>
                      <option value="2" >PERMISO MÉDICO</option>
                      <option value="3" >SABÁTICO</option>
                      <option value="4" >PERMISO NO REMUNERADO</option>
                    </select>
                  </div>

                  <div class="row">
                    
                    <div class="input-field col s12  col m6">
                      <i class="material-icons prefix">assignment_ind</i>
                      <input type="text" name="fecCon" id="crear_fecCon" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual realizó el corcurso en la Universidad"   required />   
                      <label data-success="Correcto..."  for="fecCon">Fecha de Concurso:
                      </label>
                    </div>

                    <div class="input-field col s12  col m6">
                      <i class="material-icons prefix">assignment_ind</i>
                      <input type="text" name="fecIng" id="crear_fecIng" class="datepicker validate tooltipped" data-position="bottom"  data-tooltip="Ingrese la fecha en la cual ingresó en la Universidad"   required />   
                      <label data-success="Correcto..."  for="fecIng">Fecha de Ingreso:
                      </label>
                    </div>
                    
                  </div>
            </div>

              <div class="row">

                <div class="input-field col s12 valign-wrapper">
                  <h5 class="valign">Informacion de usuario</h5>
                </div>
              </div>

                <div class="row">                          
                  <div class="col s12 m4">
                    <label>Rol</label>
                    <select class="browser-default" name="rol" id="editar_codRol">
                      <option value="R-001" >SuperUsuario</option>
                      <option value="R-003" selected>Docente</option>
                    </select>
                  </div>

                    <div class="input-field col s12  col m4 ">
                      <i class="material-icons prefix">person</i>
                      <input id="crear_usuario" name="usuario" type="text" class="validate tooltipped" data-position="bottom"  data-tooltip="Indique cual será su usuario para poder igresar al sistema" required >
                      <label data-success="Correcto..."  for="usuario" >Usuario</label>
                    </div>

                  <div class="input-field col s12  col m4">
                    <i class="material-icons prefix">phone</i>
                    <input  id="crear_clave" name="clave" type="text" class="validate tooltipped"  required>
                    <label data-success="Correcto..."  for="telefono"  >Clave</label>
                  </div>
                </div>

                 <div class="col s12 m12">
                    <select class="browser-default" id="crear_avatar" name="avatar" required>
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

                  <div class="row">
                    <div class="input-field col s12  col m12 ">
                        <i class="material-icons prefix">call_split</i>
                        <input  type="text" id="crear_observaciones" name="observaciones" class="validate tooltipped" data-position="bottom"  data-tooltip="Ingrese su Dirección, este campo posee un rango de entre 1 a 120 caráteres" rangelength=[1,120]  required></input>
                      <label data-success="Correcto..."  for="textarea"  >Observaciones</label>
                    </div>
                  </div>

                 <div class="row"> 
                   <div class="col s12 m12 right">
                     <button type="submit" class="btnEditarComision btn waves-effect waves-light primario" >Guardar
                    <i class="material-icons right">save</i></button>
                   </div>
                 </div>
            </div>
                   
          </div>
        </div>
      </div>

<div class="fixed-action-btn">
    <a href="?controlador=docentes&actividad=index" class="btn-floating btn-large waves-effect waves-light  green darken-2  regresar " onclick='
       $(".regresar").hide()'>
      <i class="material-icons tooltipped" data-position="left"  data-delay="50" data-tooltip="Ir Atrás">arrow_back</i>
    </a>
  </div>
</section>  

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


  <!--Eliminar Dependencia-->

    <div id="modal_eliminarDependencia" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Dependencia <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> esta Dependencia?</p>
        <form class="formEliminarDependencia" >
            <input type="hidden" id="codDep" name="codDep"/>

            <div class="row"> 
                <div class="col s12 left">
                  <button type="button" class="modal-action modal-close btn btn-flat waves-effect waves-light " >CANCELAR</button>
                  <button type="submit" class="btn waves-effect waves-light primario" >ADELANTE</button>
                </div>
            </div>

        </form>
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
                  <button type="submit" class="btn waves-effect waves-light primario" >ADELANTE</button>
                </div>
            </div>

        </form>
      </div>

    </div>

<!-- CREAR Dependencia  -->

    <div id="crearDependencia" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Añadir Dependencia
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    <div class="modal-content">
      <form class="formCrearDependencia" >
        <div class="row">
          <div class="col s12 m12">
            <div class="col s12 m12">
              <label>Dependencias</label>
              <select  class="browser-default" name="codDep" id="add_dep">
              </select>
            </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>


        <!-- ELIMINAR DocenteDependencia  -->

    <div id="eliminarDocDependencia" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Docente de la Dependencia <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text"><span class="red-text">Eliminar</span> al docente de esta Dependencia?</p>
        <form class="formEliminarDocenteDependencia" >
           <div class="row">
                  
            <div class="col s12 m4">
              <label>Docentes</label>
              <select class="browser-default"  id="desv-doc-dep">
              </select>
            </div>
            
            <!-- <div class="col s12 m10">
              <label >Docentes</label>
              <input list="agregar-docentes-datalist" name="agregar-docentes-datalist">
              <datalist id="agregar-docentes-datalist"></datalist>
            </div> -->

            <div class="col s12 m2">
              <button type="submit" class="btn waves-effect waves-light red accent-4" >ELIMINAR</button>
            </div>

          </div>

        </form>
      </div>

    </div>



    <script>
      

    $(".form-datos-perfil #editar_cedDoc").prop('readonly', true);
    </script>