<!-- CREAR AMBIENTE  -->

    <div id="crearAmbiente" class="modal modal-grande">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Ambiente 
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
        <form class="formCrearAmbiente" >

          <div class="row">
            <div class="col s12 m2 input-field ">
              <i class="material-icons prefix">code</i>
                
              <input  id="crear_codAmb" name="codAmb" type="text" name="codAmb" rangelength=[3,4] class="validate"  required>
              <label for="crear_codAmb" data-success="Correcto...">Código</label>
            </div>

            <div class="col s12 m10 input-field">
              <i class="material-icons prefix">call_split</i>
                
              <input type="text" id="crear_ubicacion" name="ubicacion" class="validate" maxlength="60" rangelength=[5,60]  required />  
              <label for="crear_ubicacion"  data-success="Correcto...">Ubicación</label>
            </div>
          </div>

          <div class="row">
            <div class="col s12 m6">
              <label>Tipo</label>
              <p>
                <input name="tipo" type="radio" id="crear_tipo1" checked="checked" value="1" />
                <label for="crear_tipo1">Salon</label>
                <input name="tipo" type="radio" id="crear_tipo2" value="2" />
                <label for="crear_tipo2">Cancha</label>
                <input name="tipo" type="radio" id="crear_tipo3" value="3" />
                <label for="crear_tipo3">Sala de reunion</label>
                <input name="tipo" type="radio" id="crear_tipo4" value="4" />
                <label for="crear_tipo4">Otros</label>
              </p>
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
            <div class="row">
            
              <div class="input-field col s12 m12">
                
                <textarea id="editar_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
                <label data-success="Correcto..."  for="observaciones" >Observaciones</label>
              </div>
            
            </div>
            <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnCrearAmbiente btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- EDITAR AMBIENTE -->

    <div id="editarAmbiente" class="modal modal-grande">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar Ambiente <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarAmbiente" >
            
            <div class="row">
              
              <div class=" col s12 m2 ">
                  <label for="editar_codAmb">Código</label>
                  <input  id="editar_codAmb"  type="text" readonly="readonly" name="codAmb" >

              </div>
              <div class=" col s12 m10 input-field">
                
                <input type="text" id="editar_ubicacion" name="ubicacion" class="validate" maxlength="60" placeholder="" rangelength=[5,60]  required />
                <label for="editar_ubicacion"  >ubicación</label>
                
              </div>
            
            </div>
            <div class="row">
            
              <div class="col s12 m6">
                <label>Tipo</label>
                <p>
                  <input name="tipo" type="radio" id="editar_tipo1" value="1" />
                  <label for="editar_tipo1">Salon</label>
                  <input name="tipo" type="radio" id="editar_tipo2" value="2" />
                  <label for="editar_tipo2">Cancha</label>
                  <input name="tipo" type="radio" id="editar_tipo3" value="3" />
                  <label for="editar_tipo3">Sala de reunion</label>
                  <input name="tipo" type="radio" id="editar_tipo4" value="4" />
                  <label for="editar_tipo4">Otros</label>
                </p>
              </div>
              <div class="col s12 m6">
                <label>Estado actual</label>
                <p>
                  <div class="switch">
                    <label>
                      No disponible
                      <input type="checkbox" name="estado">
                      <span class="lever"></span>
                      Disponible
                    </label>
                  </div>
                </p>
              </div>
            
            </div>
            <div class="row">
            
              <div class=" col s12 m12 input-field">
                
                <textarea id="editar_observaciones" name="observaciones" class="materialize-textarea validate" placeholder="" maxlength="150" rangelength=[10,150]  required></textarea>

                <label data-success="Correcto..."  for="editar_observaciones" >Observaciones</label>
              </div>
            
            </div>
            <div class="row"> 
            
              <div class="col s12 m12 right">
                <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
                <button type="submit" class="btnCrearAmbiente btn btn-large waves-effect waves-light primario" >GUARDAR</button>
              </div>
            
            </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR AMBIENTE  -->

    <div id="eliminarAmbiente" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Ambiente <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> este ambiente?</p>
        <form class="formEliminarAmbiente" >
            <input type="hidden" id="codAmb" name="codAmb"/>

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
              <a href="#" class="editar-ambiente blue-text"> Editar </a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle deep-orange">delete</i>
              <a href="#" class="eliminar-ambiente  deep-orange-text"> Eliminar </a>
            </li>
        </ul>
    </div>

  </div>