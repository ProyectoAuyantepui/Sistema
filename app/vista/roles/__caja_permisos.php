<div class="fixed-action-btn ">

  <a 
    href="#" 
    class="btn-floating btn-large waves-effect waves-light  deep-orange " 
    onclick='
      $(".caja_permisos").hide()
      $(".caja_formulario").show()
    '
  >
    <i class="material-icons " >arrow_back</i>
  </a>
</div>

<div class="row">
  
  <div class="col s6  valign-wrapper">
      <p class="flow-text">PERMISOS DEL ROL</p>


    
  </div>

  <div class="col s6  valign-wrapper right">
      <!-- <p class="flow-text">
        MARCAR TODOS

        <div class="switch ">
          <label>
            <input 
              type="checkbox" 
              name="marcar_todos" 
              onchange='
                $("input:checkbox").prop("checked", $(this).prop("checked"))
              ' 
            >
            <span class="lever"></span>
          </label>
        </div>
      </p> -->
      

    
  </div>
</div>

<div class="row">
  <div class="col m6">
    
    <div class="card ">
      <div class="card-content" >
        <div class=" row valign-wrapper">
          <p class="flow-text">GESTION DE USUARIO</p>
        </div>
        <table class="tabla_permisos_por_rol">
            <tbody>
              <tr codPer="P-01">
                <td>INICIAR SESION</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange=""
                        checked="checked" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
              
              <tr codPer="P-02">
                <td>PERFIL DE USUARIO</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                        checked="checked"
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-71">
                <td>VER MI HORARIO</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                        checked="checked"
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
              <tr codPer="P-03">
                <td>RECUPERAR CONTRASEÑA</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                        checked="checked"
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>


      </div>  
    </div>


    <div class="card ">
      <div class="card-content" >
        <div class=" row valign-wrapper">
          <p class="flow-text">GESTION BASICA</p>
        </div>
        <table class="tabla_permisos_por_rol">
            <tbody>



              <tr codPer="P-35">
                <td>GESTIONAR EJES DE FORMACION</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-25">
                <td>GESTIONAR CATEGORIAS DE DOCENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
              <tr codPer="P-50">
                <td>GESTIONAR COMISONES DE DOCENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
              <tr codPer="P-55">
                <td>GESTIONAR DEPENDENCIAS</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
              <tr codPer="P-40">
                <td>GESTIONAR UNIDADES CURRICULARES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
              <tr codPer="P-45">
                <td>ACTIVIDADES ADMINISTRATIVAS</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr> 

              <tr codPer="P-60">
                <td>GENERAR REPORTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>


      </div>  
    </div>

    <div class="card ">
      <div class="card-content" >
        <div class=" row valign-wrapper">
          <p class="flow-text">SEGURIDAD</p>
        </div>
        <table class="tabla_permisos_por_rol">
            <tbody>
              <tr codPer="P-63">
                <td>CREAR ROLES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-64">
                <td>MODIFICAR ROLES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-66">
                <td>CONSULTAR ROLES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-65">
                <td>ELIMINAR ROLES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-67">
                <td> CONSULTAR BITACORA</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>


      </div>  
    </div>
  </div>
  <div class="col m6">



    <div class="card ">
      <div class="card-content" >
        <div class=" row valign-wrapper">
          <p class="flow-text">GESTION DE DOCENTES</p>
        </div>
        <table class="tabla_permisos_por_rol">
            <tbody>
              <tr codPer="P-10">
                <td>CREAR DOCENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-11">
                <td>MODIFICAR DOCENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-13">
                <td>CONSULTAR DOCENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-12">
                <td>ELIMINAR DOCENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>


      </div>  
    </div>


    <div class="card ">
      <div class="card-content" >
        <div class=" row valign-wrapper">
          <p class="flow-text">GESTION DE SECCIONES</p>
        </div>
        <table class="tabla_permisos_por_rol">
            <tbody>
              <tr codPer="P-19">
                <td>CREAR SECCIONES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-21">
                <td>MODIFICAR SECCIONES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-23">
                <td>CONSULTAR SECCIONES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-22">
                <td>ELIMINAR SECCIONES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>


      </div>  
    </div>

    <div class="card ">
      <div class="card-content" >
        <div class=" row valign-wrapper">
          <p class="flow-text">GESTION DE AMBIENTES</p>
        </div>
        <table class="tabla_permisos_por_rol">
            <tbody>
              <tr codPer="P-14">
                <td>CREAR AMBIENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-16">
                <td>MODIFICAR AMBIENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-18">
                <td>CONSULTAR AMBIENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-17">
                <td>ELIMINAR AMBIENTES</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>


      </div>  
    </div>


    <div class="card ">
      <div class="card-content" >
        <div class=" row valign-wrapper">
          <p class="flow-text">MANTENIMIENTO</p>
        </div>
        <table class="tabla_permisos_por_rol">
            <tbody>
              

              <tr codPer="P-69">
                <td>RESPALDO DE BASE DE DATOS</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>

              <tr codPer="P-70">
                <td> REESTABLECER BASE DE DATOS</td>
                <td>
                  <div class="switch">
                    <label>
                      <input 
                        type="checkbox" 
                        name="permiso" 
                        onchange="" 
                      >
                      <span class="lever"></span>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>


      </div>  
    </div>
  </div>
</div>