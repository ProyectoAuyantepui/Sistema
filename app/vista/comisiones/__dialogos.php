<!-- CREAR Comision  -->

    <div id="crearComision" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Comision
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearComision" >
          <div class="row">
            <div class="col s12 m12">
              <i class="material-icons prefix">call_split</i>
                <label for="crear_nombre"  >Nombre</label>
                  <input type="text" id="crear_nombre" name="nombre" class="validate" rangelength=[3,60] maxlength="65" placeholder="Nombre" required />
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <i class="material-icons prefix">call_split</i>
                <label for="crear_dependencia"  >Dependencia</label>
                <input type="text" id="crear_dependencia" name="dependencia" class="validate"  placeholder="Dependencia" maxlength="220" rangelength=[10,220] required />
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <i class="material-icons prefix">remove_red_eye</i>
                <label data-success="Correcto..."  for="crear_descripcion" >Descripción</label>
                  <textarea id="crear_descripcion" name="descripcion" class="materialize-textarea validate"  placeholder="Descripción" maxlength="150" rangelength=[10,150] required></textarea>
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

    <!-- ELIMINAR DocenteComision  -->

    <div id="eliminarDocComision" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar Docente de la Comision <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text"><span class="red-text">Eliminar</span> al docente de esta Comisión!!</p>
        <form class="formEliminarDocenteComision" >
           <div class="row">
                  
            <div class="col s12 m4">
              <label>Docentes</label>
              <select class="browser-default" name="cedDoc" id="desv-ced-doc">
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

<!-- AGREGAR Docente  -->

    <div id="agregarDocente" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Agregar docente a la comisión
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formAsignarDocente" >
          <div class="row">
                  
            <div class="col s12 m6">
              <label>Nombre</label>
              <select class="center" name="cedDoc" id="add-ced-doc" >
              </select>
            </div>
            
            <!-- <div class="col s12 m10">
              <label >Docentes</label>
              <input list="agregar-docentes-datalist" name="agregar-docentes-datalist">
              <datalist id="agregar-docentes-datalist"></datalist>
            </div> -->

            <div class="col s12 m2">
              <button type="submit" class="btn waves-effect waves-light primario" >GUARDAR</button>
            </div>

          </div>

          
        </form>
      </div>
    </div>

<!-- Cambiar coordinador  -->

    <div id="cambiarCoordinador" class="modal">

      <div class="modal-header secundario">
        <span class="white-text">
          Seleccionar docente
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCambiarCoordinador" >
          
          <div class="row">
                  
            <div class="col s12 m4">
              <label>Docentes</label>
              <select class="browser-default" name="cedDoc" id="cambiar-coor-doc">
              </select>
            </div>
            
            <div class="col s12 m2">
              <button type="submit" class="btn waves-effect waves-light primario" >GUARDAR</button>
            </div>

          </div>

          
        </form>
      </div>
    </div>

