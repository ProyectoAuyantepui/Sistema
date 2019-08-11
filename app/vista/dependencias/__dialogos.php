<!-- CREAR Dependencia  -->

    <div id="crearDependencia" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Dependencia
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearDependencia" >
          <div class="row">
            <div class="col s12 m12 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="crear_nombre" name="nombre" class="validate" placeholder="Nombre" required />
                <label for="crear_nombre"  >nombre</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 input-field">
              <i class="material-icons prefix">remove_red_eye</i>
                  <textarea id="crear_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Descripción" required></textarea>
                <label data-success="Correcto..."  for="crear_descripcion" >Descripción</label>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class=" btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- EDITAR Dependencia -->

    <div id="editarDependencia" class="modal">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar Dependencia de docentes <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarDependencia" >
            <input  id="editar_codDep"  type="hidden" name="codDep">
            <div class="row">
            <div class=" col s12 m12 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="editar_nombre" name="nombre" class="validate" placeholder="" required />
                <label for="editar_nombre"  >nombre</label>
            </div>
          </div>
          
          <div class="row">
            <div class="col s12 m12 input-field">
              <i class="material-icons prefix">remove_red_eye</i>
                  <textarea id="editar_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Descripción" required></textarea>
                <label for="editar_descripcion" >Descripción</label>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnEditarDependencia btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR Dependencia  -->

    <div id="eliminarDependencia" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Dependencia <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> esta Dependencia de docentes?</p>
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
                <a href="#" class="editar-dependencia blue-text"> Editar </a>
              </li>
              <li class="collection-item avatar">
                <i class="material-icons circle deep-orange">delete</i>
                <a href="#" class="eliminar-dependencia  deep-orange-text"> Eliminar </a>
              </li>
          </ul>
      </div>

    </div>