
<!-- CREAR UnidadCurricular  -->

    <div id="crearUnidadCurricular" class="modal modal-grande">

      <div class="modal-header secundario">
        <span class="white-text">
          Crear Unidad Curricular 
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content">
        <form class="formCrearUnidadCurricular" >

          <div class="row">
            
            <div class="col s12 m4 input-field ">
              <i class="material-icons prefix">code</i>
                  <input  type="text" id="crear_codUniCur" name="codUniCur"  class="validate" maxlength="10" rangelength=[2,10] placeholder="Código" required>
                <label data-success="Correcto..." for="crear_codUniCur">Código</label>
            </div>

            <div class="col s12 m4 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="crear_nombre" name="nombre" class="validate" rangelength=[3,60] placeholder="Nombre" required />
                <label data-success="Correcto..." for="crear_nombre"  >Nombre</label>
            </div>
          
            <div class="col s12 m4 input-field">
              <select id="crear_trayecto" name="trayecto" required>
                <option value="" selected disabled>Seleccione el Trayecto</option>
                <option value="1" >Trayecto Inicial</option>
                <option value="2" >Trayecto 1</option>
                <option value="3" >Trayecto 2</option>
                <option value="4" >Trayecto 3</option>
                <option value="5" >Trayecto 4</option>
              </select>
              <label data-success="Correcto..." data-error="Select an option" for="crear_trayecto">Trayecto</label>
            </div>
          </div>
          <div class="row">

             <div class="col s12 m4 ">
              <p>
                <input name="fase" class="with-gap" type="radio" id="crear_fase1" checked="checked" value="1"   />
                <label for="crear_fase1">Fase 1</label>

                <input name="fase" class="with-gap" type="radio" id="crear_fase2" value="2" />
                <label for="crear_fase2">Fase 2</label>

                <input name="fase" type="radio" id="crear_anual" value="3" />
                <label for="crear_anual">Anual</label>
              </p>
              <label for="crear_fase">Fase</label>
            </div>
            <div class="col s12 m4 input-field ">
              <i class="material-icons prefix">call_split</i>
              <select  name="codEje" id="crear_eje" required>
                <option value="" selected disabled>Seleccione el Eje</option>
              </select>
            </div>

            <div class="col s12 m4 input-field ">
              <select  name="codPnf" id="crear_pnf" required>
                <option value="" disabled selected>Seleccione un PNF</option>
              </select>
              <label>PNF</label>
            </div>
            
          </div>
          
          <div class="row">
            <div class="col s12 m4 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="number" id="crear_uniCre" name="uniCre" placeholder="Unidades de Crédito" required />
                <label for="crear_uniCre"  >Unidades de Crédito</label>
            </div>
            
            <div class="col s12 m4 input-field ">
              <i class="material-icons prefix">code</i>
                 <input  id="crear_htas" type="number" name="htas" placeholder="H.T.A.S" required>
                <label for="crear_htas">H.T.A.S</label>
              </p>
            </div>

            <div class="col s12 m4 input-field ">
              <i class="material-icons prefix">code</i>
                  <input  id="crear_htis"  type="number" name="htis" placeholder="H.T.I.S" required>
                <label for="crear_htis">H.T.I.S</label>
              </p>
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
              <button type="submit" class="btnCrearUnidadCurricular btn btn-large waves-effect waves-light primario" >GUARDAR</button>
             </div>
          </div>

        </form>
      </div>
    </div>
    
    <!-- EDITAR UnidadCurricular -->

    <div id="editarUnidadCurricular" class="modal modal-grande">
      
      <div class="modal-header secundario">
        <span class="white-text">
          Editar Unidad Curricular <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>

      <div class="modal-content">
          
          <form class="formEditarUnidadCurricular" >
          
            <div class="row">
                  <input id="codUniCur" name="codUniCur" type="hidden"  >

            <div class=" col s12 m6 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="text" id="editar_nombre" name="nombre" class="validate" maxlength="60" placeholder="Nombre" required />
                <label for="editar_nombre"  >Nombre</label>
              
            </div>
          
            <div class="col s12 m6 input-field">
              <label >Trayecto</label>
              <select id="editar_trayecto" name="trayecto" >

                <option value="1" >Trayecto Inicial</option>
                <option value="2" >Trayecto 1</option>
                <option value="3" >Trayecto 2</option>
                <option value="4" >Trayecto 3</option>
                <option value="5" >Trayecto 4</option>
              </select>
            </div>
          </div>
                    <div class="row">

              <div class="col s12 m4 ">
              <p>
                <input name="fase" class="with-gap" type="radio" id="editar_fase1"  value="1"   />
                <label for="editar_fase1">Fase 1</label>

                <input name="fase" class="with-gap" type="radio" id="editar_fase2" value="2" />
                <label for="editar_fase2">Fase 2</label>

                <input name="fase" type="radio" id="editar_anual" value="3" />
                <label for="editar_anual">Anual</label>
              </p>
              <label for="editar_fase">Fase</label>
            </div>

            <div class="col s12 m4 input-field">
              
              <select  name="codEje" id="editar_eje">
              </select>
              <label>Eje</label>
            </div>

            <div class="col s12 m4 input-field">
              
              <select  name="codPnf" id="editar_pnf">
              </select>
              <label>PNF</label>
            </div>
            
          </div>
          
          <div class="row">
            <div class=" col s12 m4 input-field">
              <i class="material-icons prefix">call_split</i>
                  <input type="number" id="editar_uniCre" name="uniCre" placeholder="Unidades de Crédito" required />
                <label for="editar_uniCre"  >Unidades de Crédito</label>
            </div>

            <div class=" col s12 m4 input-field ">
              <i class="material-icons prefix">code</i>
                  <input  id="editar_htas" name="htas" type="number" name="htas" placeholder="H.T.A.S" required>
                <label for="editar_htas">H.T.A.S</label>
            </div>

            <div class=" col s12 m4 input-field ">
              <i class="material-icons prefix">code</i>
                  <input  id="editar_htis" name="htis" type="number" name="htis" placeholder="H.T.I.S" required>
                <label for="editar_htis">H.T.I.S</label>
            </div>

          </div>
          
          <div class="row">
            <div class="col s12 m12 input-field">
              <i class="material-icons prefix">remove_red_eye</i>
                  <textarea id="editar_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Observaciones" required></textarea>
                <label data-success="Correcto..."  for="editar_observaciones" >Observaciones</label>
              
            </div>

          </div>

          <div class="row"> 
            <div class="col s12 m12 right">
              <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
              <button type="submit" class="btnEditarUnidadCurricular btn btn-large waves-effect waves-light primario" >GUARDAR</button>
             </div>
          </div>
          
          </form>

      </div>
    </div>
    

<!-- ELIMINAR UnidadCurricular  -->

    <div id="eliminarUnidadCurricular" class="modal">
          <input type="hidden" name="item_seleccionado">
      <div class="modal-header secundario">
        <span class="white-text">
          Eliminar UnidadCurricular <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
    
      <div class="modal-content">
        <p class="black-text">¿Realmente desea <span class="red-text">Eliminar</span> este UnidadCurricular?</p>
        <form class="formEliminarUnidadCurricular" >
            <input type="hidden" id="codUniCur" name="codUniCur"/>

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
              <a href="#" class="editar-UnidadCurricular blue-text"> Editar </a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle deep-orange">delete</i>
              <a href="#" class="eliminar-unidadcurricular  deep-orange-text"> Eliminar </a>
            </li>
        </ul>
    </div>

  </div>