
<!-- CREAR Seccion  -->

    <div id="crearSeccion" class="modal modal-grande">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Sección 
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearSeccion" >

          <div class="row">

            <div class="input-field col s1">
                <select id="prefijo-codigo">
                  <option value="PNFI">PNFI</option>
                  <option value="PNFA">PNFA</option>
                </select>
            </div>

            <div class="input-field col s11 m3 ">
              <input  id="crear_codSec" name="codSec" type="text" name="codSec" class="validate" required>
              <label for="crear_codSec">Código</label>
            </div>

            <div class="col s12 m4">
              <label>Trayecto</label>
              <select name="trayecto" id="crear_trayecto">
                <option value="" disabled selected>Seleccione un Trayecto</option>
                <option value="0">Trayecto Inicial</option>
                <option value="1">Trayecto 1</option>
                <option value="2">Trayecto 2</option>
                <option value="3">Trayecto 3</option>
                <option value="4">Trayecto 4</option>
              </select>
            </div>
          
            <div class="input-field col s12 m4 ">
              <i class="material-icons prefix">code</i> 
              <input  id="crear_matricula" name="matricula" type="number" min="1" max="120"  name="matricula" class="validate" required>
              <label for="crear_matricula">Matricula</label>
              </p>
            </div>
          
          </div>
          <div class="row">
            
            <div class=" col s12 m4">
              <label>Tipo</label>
              <p>
                <input name="tipo" type="radio" id="crear_tipo1" checked="checked" value="1" />
                <label for="crear_tipo1">Regular</label>
                <input name="tipo" type="radio" id="crear_tipo2" value="2" />
                <label for="crear_tipo2">Repitientes</label>
              </p>
            </div>
            
            <div class="col s12 m4 ">
              <label>Turno</label>
              <select name="turno" id="crear_turno">
                <option value="" disabled selected>Seleccione un turno</option>
                <option value="1">Mañana</option>
                <option value="2">Tarde</option>
                <option value="3">Noche</option>
              </select>
              
            </div>

            <div class="col s12 m4">
              <label>Estado inicial</label>
              <p>
                <div class="switch">
                  <label>
                    No disponible
                    <input type="checkbox" name="estado" id="crear_estado" checked="checked" value="1" >
                    <span class="lever"></span>
                    Disponible
                  </label>
                </div>
              </p>
            </div>
          
          </div>

          <div class="input-field col s12 m12">
              <i class="material-icons prefix">remove_red_eye</i>
              <textarea id="crear_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
              <label data-success="Correcto..."  for="crear_observaciones" >Observaciones</label>
          </div>

          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnCrearSeccion btn btn-large waves-effect waves-light primario" >GUARDAR</button>
             </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- EDITAR Seccion -->

    <div id="editarSeccion" class="modal modal-grande">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar Sección <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarSeccion" >
            
            <div class="row">
            
            <div class="col s12 m4 ">
              <label for="editar_codSec">Código</label>
              <input  id="editar_codSec" name="codSec" type="text" readonly="readonly" name="codSec" >
              
            </div>
            <div class="col s12 m4">
               <label>Trayecto</label>
              <select name="trayecto" id="editar_trayecto" class="browser-default">
                <option value="0">Trayecto Inicial</option>
                <option value="1">Trayecto 1</option>
                <option value="2">Trayecto 2</option>
                <option value="3">Trayecto 3</option>
                <option value="4">Trayecto 4</option>
              </select>
             
            </div> 
          
            <div class="col s12 m4 ">

              <label for="editar_matricula">Matricula</label>
              <input  id="editar_matricula" name="matricula" type="number" min="1" max="120"  name="matricula" class="validate" required>
              </p>
            </div>
          
          </div>
          <div class="row">
            
            <div class=" col s12 m4">
              <label>Tipo</label>
              <p>
                <input name="tipo" type="radio" id="editar_tipo1" value="1" />
                <label for="editar_tipo1">Regular</label>
                <input name="tipo" type="radio" id="editar_tipo2" value="2" />
                <label for="editar_tipo2">Repitientes</label>
              </p>
            </div>
            
            <div class="col s12 m4 ">
              <label>Turno</label>
              <select name="turno" id="editar_turno" class="browser-default">
                <option value="1">Mañana</option>
                <option value="2">Tarde</option>
                <option value="3">Noche</option>
              </select>
              
            </div>

            <div class="col s12 m4">
              <label>Estado </label>
              <p>
                <div class="switch">
                  <label>
                    No disponible
                    <input type="checkbox" name="estado" >
                    <span class="lever"></span>
                    Disponible
                  </label>
                </div>
              </p>
            </div>
          
          </div>

          <div class="col s12 m12">
              <label data-success="Correcto..."  for="editar_observaciones" >Observaciones</label>
              <textarea id="editar_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
              
          </div>

          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnEditarSeccion btn btn-large waves-effect waves-light primario" >GUARDAR</button>
             </div>
          </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR Seccion  -->

    <div id="eliminarSeccion" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Seccion <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> este Seccion?</p>
        <form class="formEliminarSeccion" >
            <input type="hidden" id="codSec" name="codSec"/>

            <div class="row"> 
                <div class="col s12 left">
                  <button type="button" class="modal-action modal-close btn btn-flat waves-effect waves-light " >CANCELAR</button>
                  <button type="submit" class="btn waves-effect waves-light primario" >ADELANTE</button>
                </div>
            </div>

        </form>
      </div>

    </div>

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
              <a href="#" class="editar-Seccion blue-text"> Editar </a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle deep-orange">delete</i>
              <a href="#" class="eliminar-Seccion  deep-orange-text"> Eliminar </a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle red">access_alarms</i>
              <a href="#" class="ver-horario red-text"> Ver horario </a>
            </li>
        </ul>
    </div>

  </div>
