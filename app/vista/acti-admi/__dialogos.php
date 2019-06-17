<!-- CREAR ActAdm  -->

    <div id="crearActAdm" class="modal modal-grande">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Actividad Administrativas 
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearActAdm" >

          <div class="row">
      
            <div class="col s12 m6 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="crear_titulo" name="titulo" class="validate" rangelength=[3,60] maxlength="65" placeholder="título" required />
                <label for="crear_titulo"  >título</label>
            </div>

          
            <div class="col s12 m6 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="crear_dependencia" name="dependencia" class="validate" rangelength=[3,60] maxlength="65" placeholder="título" required />
                <label for="crear_dependencia"  >Dependencia</label>
            </div>
          </div>
          <div class="row">

            <div class="col s12 m12 input-field">
              <select id="crear_tipActAdm" name="tipActAdm" required>
                <option value="" selected disabled>Seleccione un tipo de act. administrativa</option>
                <option value="CI" >Creación Intelectual (CI)</option>
                <option value="IC" >Integración Comunidad (IC)</option>
                <option value="AA" >Asesoría Académica (AA)</option>
                <option value="GA" >Gestión Académica (GA)</option>
                <option value="OAA" >Otras Act. Académicas (OAA)</option>
              </select>
              <label >Tipo de Actividad</label>
            </div>

          </div>

          <div class="row">
            <div class="col s12 m12 input-field">
              <i class="material-icons prefix">remove_red_eye</i>
                  <textarea id="crear_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Observaciones" required></textarea>
                <label data-success="Correcto..."  for="crear_observaciones" >Observaciones</label>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnCrearActAdm btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- EDITAR ActAdm -->

    <div id="editarActAdm" class="modal modal-grande">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar Actividad Administrativa <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarActAdm" >
            
            <input  id="editar_codActAdm" type="hidden" name="codActAdm">
          <div class="row">
      
            <div class=" col s12 m6 input-field">
              <i class="material-icons prefix">call_split</i>
                <label for="editar_titulo"  >título</label>
                  <input type="text" id="editar_titulo" name="titulo" class="validate" placeholder="título" rangelength=[3,60] maxlength="65" required />
            </div>
      <div class="col s12 m6 input-field ">
              <select  name="dependencia" id="editar_dependencia" required>
                <option value="" disabled selected>Seleccione una Dependencia</option>
              </select>
              <label>Dependencia</label>
            </div>

          </div>
          <div class="row">

            <div class="col s12 m12 input-field">
              <select id="editar_tipActAdm" name="tipActAdm" required>
                <option value="" disabled>Seleccione un tipo de act. administrativa</option>
                <option value="CI" >Creación Intelectual (CI)</option>
                <option value="IC" >Integración Comunidad (IC)</option>
                <option value="AA" >Asesoría Académica (AA)</option>
                <option value="GA" >Gestión Académica (GA)</option>
                <option value="OAA" >Otras Act. Académicas (OAA)</option>
              </select>
              <label >Tipo de Actividad</label>
            </div>

          </div>

          <div class="row">
            <div class=" col s12 m12 input-field">
              <i class="material-icons prefix">remove_red_eye</i>
                <label data-success="Correcto..."  for="editar_observaciones" >Observaciones</label>
                  <textarea id="editar_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Observaciones" required></textarea>
              
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnEditarActAdm btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR ActAdm  -->

    <div id="eliminarActAdm" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Actividad Administrativa <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> esta Actividad Administrativa ?</p>
        <form class="formEliminarActAdm" >
            <input type="hidden" id="codActAdm" name="codActAdm"/>

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
              <a href="#" class="editar-ActAdm blue-text"> Editar </a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle deep-orange">delete</i>
              <a href="#" class="eliminar-ActAdm  deep-orange-text"> Eliminar </a>
            </li>
        </ul>
    </div>

  </div>


