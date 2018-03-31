<!-- CREAR Eje  -->

    <div id="crearEje" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Eje 
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearEje" >
          <div class="row">
            <div class="col s12 m12">
              <i class="material-icons prefix">call_split</i>
                <label for="crear_nombre" >nombre</label>
                  <input type="text" id="crear_nombre" name="nombre" class="validate" rangelength=[3,60] maxlength="65" required />
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <i class="material-icons prefix">remove_red_eye</i>
                <label data-success="Correcto..."  for="crear_descripcion" >Descripcion</label>
                  <textarea id="crear_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnCrearEje btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- EDITAR Eje -->

    <div id="editarEje" class="modal">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar Eje <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarEje" >
            <input  id="editar_codEje"  type="hidden" name="codEje">
            <div class="row">
            <div class=" col s12 m12">
              <i class="material-icons prefix">call_split</i>
                <label for="editar_nombre"  >nombre</label>
                  <input type="text" id="editar_nombre" name="nombre" class="validate"  required />
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <i class="material-icons prefix">remove_red_eye</i>
                <label for="editar_descripcion" >Descripcion</label>
                  <textarea id="editar_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnEditarEje btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR Eje  -->

    <div id="eliminarEje" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Eje <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> este Eje?</p>
        <form class="formEliminarEje" >
            <input type="hidden" id="codEje" name="codEje"/>

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
                <a href="#" class="editar-eje blue-text"> Editar </a>
              </li>
              <li class="collection-item avatar">
                <i class="material-icons circle deep-orange">delete</i>
                <a href="#" class="eliminar-eje  deep-orange-text"> Eliminar </a>
              </li>
          </ul>
      </div>

    </div>