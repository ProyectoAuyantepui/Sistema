
    

<!-- ELIMINAR Comision  -->

    <div id="eliminarComision" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Comision <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> esta Comisión?</p>
        <form class="formEliminarComision" >
            <input type="hidden" id="codCom" name="codCom"/>

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
                <a href="#" class="editar-comision blue-text" > Editar </a>
              </li>
              <li class="collection-item avatar">
                <i class="material-icons circle deep-orange">delete</i>
                <a href="#" class="eliminar-comision  deep-orange-text"> Eliminar </a>
              </li>
          </ul>
      </div>

    </div>


