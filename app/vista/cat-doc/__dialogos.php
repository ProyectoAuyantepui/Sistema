<!-- CREAR CatDoc  -->

    <div id="crearCatDoc" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Categoria de docentes
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearCatDoc" >
          <div class="row">
            <div class="col s12 m12  input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="crear_nombre" name="nombre" class="validate" placeholder="nombre" required />
                <label for="crear_nombre"  >nombre</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12  input-field">
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
    
    <!-- EDITAR CatDoc -->

    <div id="editarCatDoc" class="modal">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar Categoria de docentes <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarCatDoc" >
            <input  id="editar_codCatDoc"  type="hidden" name="codCatDoc">

          <div class="row">
            <div class=" col s12 m12  input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="editar_nombre" name="nombre" class="validate" placeholder="" required />
                <label for="editar_nombre"  >nombre</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12  input-field">
              <i class="material-icons prefix">remove_red_eye</i>
                  <textarea id="editar_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Descripción" required></textarea>
                <label for="editar_descripcion" >Descripción</label>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnEditarCatDoc btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR CatDoc  -->

    <div id="eliminarCatDoc" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar CatDoc <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> esta Categoria de docentes?</p>
        <form class="formEliminarCatDoc" >
            <input type="hidden" id="codCatDoc" name="codCatDoc"/>

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
                <a href="#" class="editar-cat-doc blue-text"> Editar </a>
              </li>
              <li class="collection-item avatar">
                <i class="material-icons circle deep-orange">delete</i>
                <a href="#" class="eliminar-cat-doc  deep-orange-text"> Eliminar </a>
              </li>
          </ul>
      </div>

    </div>