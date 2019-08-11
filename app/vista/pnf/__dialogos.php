<!-- CREAR PNF  -->

    <div id="crearPnf" class="modal ">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear PNF 
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearPnf" >
          <div class="row">
            <div class="col s12 m12 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="crear_codPnf" name="codPnf" class="validate" placeholder="" maxlength="6" required />
                <label for="crear_codPnf"  data-success="Correcto...">Codigo</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 input-field">
              <i class="material-icons prefix">remove_red_eye</i>
                  <textarea id="crear_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="" required></textarea>
                <label data-success="Correcto..."  for="crear_descripcion" >Descripción</label>
            </div>
          </div>
          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnCrearPnf btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- EDITAR Pnf -->

    <div id="editarPnf" class="modal ">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar PNF <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarPnf" >
           <input  id="editar_codPnf" type="hidden" name="codPnf" >
            <div class="row">
              <div class="col s12 m12 input-field">
                <i class="material-icons prefix">call_split</i>
                    <input type="text" id="editar_codPnf" name="codPnf" disabled placeholder=""  />
                  <label for="editar_codPnf"  >Codigo</label>
                
              </div>
            
            </div>
            <div class="row">
            
              <div class="col s12 m12 input-field">
                <i class="material-icons prefix">remove_red_eye</i>
                    <textarea id="editar_descripcion" name="descripcion" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="" required></textarea>
                  <label data-success="Correcto..."  for="editar_descripcion" >Descripción</label>
              </div>
            
            </div>
            <div class="row"> 
            
              <div class="col s12 m12 right">
                <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
                <button type="submit" class="btnCrearPnf btn btn-large waves-effect waves-light primario" >GUARDAR</button>
              </div>
            
            </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR Pnf  -->

    <div id="eliminarPnf" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar PNF <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> este Pnf?</p>
        <form class="formEliminarPnf" >
            <input type="hidden" id="codPnf" name="codPnf"/>

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
              <a href="#" class="editar-pnf blue-text"> Editar </a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle deep-orange">delete</i>
              <a href="#" class="eliminar-pnf  deep-orange-text"> Eliminar </a>
            </li>
        </ul>
    </div>

  </div>

