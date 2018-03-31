
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
            
            <div class="col s12 m4 ">
              <i class="material-icons prefix">code</i>
                <label for="crear_alias">Código</label>
                  <input  id="crear_codUniCur" name="codUniCur" type="text" name="codUniCur" class="validate" maxlength="10" rangelength=[2,10] placeholder="Código" required>
            </div>

            <div class="col s12 m4">
              <i class="material-icons prefix">call_split</i>
                <label for="crear_nombre"  >Nombre</label>
                  <input type="text" id="crear_nombre" name="nombre" class="validate" maxlength="60" placeholder="Nombre" required />
            </div>
          
            <div class="col s12 m4">
              <label >Trayecto</label>
              <select id="crear_trayecto" name="trayecto" >
                <option value="" selected disabled>Seleccione el Trayecto</option>
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
              <label for="crear_fase">Fase</label>
              <p>
                <input name="fase" class="with-gap" type="radio" id="crear_fase1" checked="checked" value="1" />
                <label for="crear_fase1">Fase 1</label>
                <input name="fase" class="with-gap" type="radio" id="crear_fase2" value="2" />
                <label for="crear_fase2">Fase 2</label>
                <input name="fase" type="radio" id="crear_anual" value="3" />
                <label for="crear_anual">Anual</label>
              </p>
            </div>
            <div class="col s12 m4">
              <label>Eje</label>
              <select class="browser-default" name="codEje" id="crear_eje">
                <option value="" disabled selected>Seleccione un Eje</option>
              </select>
            </div>

            <div class="col s12 m4">
              <label>PNF</label>
              <select class="browser-default" name="codPnf" id="crear_pnf">
                <option value="" disabled selected>Seleccione un PNF</option>
              </select>
            </div>
            
          </div>
          
          <div class="row">
            <div class="col s12 m4">
              <i class="material-icons prefix">call_split</i>
                <label for="crear_uniCre"  >Unidades de Crédito</label>
                  <input type="number" id="crear_uniCre" name="uniCre" placeholder="Unidades de Crédito"/>
            </div>
            
            <div class="col s12 m4 ">
              <i class="material-icons prefix">code</i>
                <label for="crear_htas">H.T.A.S</label>
                 <input  id="crear_htas" name="htas" type="number" name="htas" placeholder="H.T.A.S" >
              </p>
            </div>

            <div class="col s12 m4 ">
              <i class="material-icons prefix">code</i>
                <label for="crear_htis">H.T.I.S</label>
                  <input  id="crear_htis" name="htis" type="number" name="htis" placeholder="H.T.I.S" >
              </p>
            </div>

          </div>
          
          <div class="row">
            <div class="col s12 m12">
              <i class="material-icons prefix">remove_red_eye</i>
                <label data-success="Correcto..."  for="crear_observaciones" >Observaciones</label>
                  <textarea id="crear_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Observaciones" required></textarea>
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
            
            <div class=" col s12 m4 ">
              <i class="material-icons prefix">code</i>
                <label for="editar_codUniCur">Código</label>
                  <input  id="editar_codUniCur" name="codUniCur" type="text" name="codUniCur" placeholder="Código" required/>
              
            </div>

            <div class=" col s12 m4">
              <i class="material-icons prefix">call_split</i>
                <label for="editar_nombre"  >Nombre</label>
                  <input type="text" id="editar_nombre" name="nombre" class="validate" maxlength="60" placeholder="Nombre" required />
              
            </div>
          
            <div class="col s12 m4">
              <label >Trayecto</label>
              <select id="editar_trayecto" name="trayecto" class="browser-default">

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
              <label for="editar_fase">Fase</label>

              <p>
                <input name="fase" class="with-gap" type="radio" id="editar_fase1" checked="checked" value="1" />
                <label for="editar_fase1">Fase 1</label>
                <input name="fase" class="with-gap" type="radio" id="editar_fase2" value="2" />
                <label for="editar_fase2">Fase 2</label>
                <input name="fase" type="radio" id="editar_anual" value="3" />
                <label for="editar_anual">Anual</label>
              </p>
            </div>

            <div class="col s12 m4">
              <label>Eje</label>
              <select class="browser-default" name="codEje" id="editar_eje">
              </select>
            </div>

            <div class="col s12 m4">
              <label>PNF</label>
              <select class="browser-default" name="codPnf" id="editar_pnf">
              </select>
            </div>
            
          </div>
          
          <div class="row">
            <div class=" col s12 m4">
              <i class="material-icons prefix">call_split</i>
                <label for="editar_uniCre"  >Unidades de Crédito</label>
                  <input type="number" id="editar_uniCre" name="uniCre" placeholder="Unidades de Crédito" required="" />
            </div>

            <div class=" col s12 m4 ">
              <i class="material-icons prefix">code</i>
                <label for="editar_htas">H.T.A.S</label>
                  <input  id="editar_htas" name="htas" type="number" name="htas" placeholder="H.T.A.S">
            </div>

            <div class=" col s12 m4 ">
              <i class="material-icons prefix">code</i>
                <label for="editar_htis">H.T.I.S</label>
                  <input  id="editar_htis" name="htis" type="number" name="htis" placeholder="H.T.I.S" >
            </div>

          </div>
          
          <div class="row">
            <div class=" col s12 m12">
              <i class="material-icons prefix">remove_red_eye</i>
                <label data-success="Correcto..."  for="crear_observaciones" >Observaciones</label>
                  <textarea id="editar_observaciones" name="observaciones" class="materialize-textarea validate" maxlength="150" rangelength=[10,150] placeholder="Observaciones" required></textarea>
              
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