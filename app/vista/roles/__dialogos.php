<!-- CREAR ROL  -->

    <div id="crearRol" class="modal ">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Rol
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearRol" >
          <div class="row">
            <div class="input-field col s12 m12">
              <i class="material-icons prefix">call_split</i>
              <input type="text" id="crear_nombre" name="nombre" class="validate"  required />
              <label for="crear_nombre"  >Nombre</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m12">
              <i class="material-icons prefix">remove_red_eye</i>
              <textarea id="crear_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
              <label data-success="Correcto..."  for="crear_observaciones" >Observaciones</label>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnCrearRol btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- EDITAR Rol -->

    <div id="editarRol" class="modal ">

      <div class="modal-header secundario">
        <span class="white-text">
          Editar Rol
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formEditarRol" >

          <input type="hidden" id="editar_codRol" name="codRol"/>

          <div class="row">
            <div class=" col s12 m12">
              <label for="editar_nombre"  >Nombre</label>
              <input type="text" id="editar_nombre" name="nombre" class="validate"  required />
              
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <label data-success="Correcto..."  for="editar_observaciones" >Observaciones</label>
              <textarea id="editar_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] required></textarea>
              
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnEditarRol btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    

<!-- ELIMINAR Rol  -->

    <div id="eliminarRol" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Rol <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> este Rol?</p>
        <form class="formEliminarRol" >
            <input type="hidden" id="codRol" name="codRol"/>

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
              <a href="#" class="editar-roles blue-text"> Editar </a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle deep-orange">delete</i>
              <a href="#" class="eliminar-rol deep-orange-text"> Eliminar </a>
            </li>
        </ul>
    </div>

  </div>