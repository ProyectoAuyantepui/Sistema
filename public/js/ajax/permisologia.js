$(function(){ cargarComboRoles() })



$(".modulo").click(function(){
    $("div .permisos").html("")
    $("div .permisos").html(`<div class="switch"></div>`)
    var rolSeleccionado = $('select#roles').find("option:selected").val() 
    var moduloSeleccionado = $(this).attr("id")
          
    $.ajax({ 

        dataType : 'json' ,
        type:'POST' , 
        url:'index.php?controlador=permisologia&actividad=consultar',
        data: {"codRol" : rolSeleccionado } 
    }) 
    .done(function(respuesta){
            
        mostrarPermisologia(respuesta , moduloSeleccionado)
    }) 
})




function mostrarPermisologia(respuesta , moduloSeleccionado){

  for ( i in respuesta.data ) {

              if ( respuesta.data[i].codMod == moduloSeleccionado ) {

                switch( respuesta.data[i].codMod ){
                      
                    case "M-001":
                      if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Iniciar sesion" , "iniciarSesion" , "iniciarSesion"  ) }
                    break
                      
                    case "M-002":
                      

                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Cerrar sesion" , "cerrarSesion" , "cerrarSesion"  ) }
                        
                    
                    break
                    case "M-003":
                      

                        
                        if ( respuesta.data[i].codPer == "P-05"  ) {crearSwitchDePermiso( respuesta.data[i].acceso , "Consulta de Bitacora" , "consultarBitacora" , "consultar"  ) }
                        
                    break
                    case "M-004":
                      

                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Generacion de reportes" , "generarReporte" , "generarReporte"  ) }
                        
                    break
                    case "M-005":
                      

                        
                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Gestionar Perfil" , "gestionarPerfil" , "gestionarPerfil"  ) }
                        
                    break
                    case "M-006":
                      

                        
                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Gestion Basica" , "gestionBasica" , "gestionBasica"  ) }
                        
                    break
                    case "M-007":
                      

                        
                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Gestion de Seguridad" , "seguridad" , "seguridad"  ) }
                        
                    break
                    case "M-008":
                      

                        
                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Reestablecer Contraseña" , "reestablecerClave" , "reestablecerClave"  ) }
                        
                    break
                    case "M-009":
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Horarios" , "crearHorarios" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Horarios" , "modificarHorarios" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Horarios" , "eliminarHorarios" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Horarios" , "listarHorarios" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Horarios" , "consultarHorarios" , "consultar"  ) }
                        
                         if ( respuesta.data[i].codPer == "P-06"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Cambiar Estado Horarios" , "cambiarEstadoHorarios" , "cambiarEstado"  ) }
                     
                    break
                    case "M-010":
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Docentes" , "crearDocentes" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Docentes" , "modificarDocentes" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Docentes" , "eliminarDocentes" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Docentes" , "listarDocentes" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Docentes" , "consultarDocentes" , "consultar"  ) }
                        
                         if ( respuesta.data[i].codPer == "P-06"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Cambiar Estado Docentes" , "cambiarEstadoDocentes" , "cambiarEstado"  ) }
                        
                    break
                    case "M-011"://categorias
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Categorias" , "crearCategorias" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Categorias" , "modificarCategorias" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Categorias" , "eliminarCategorias" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Categorias" , "listarCategorias" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Categorias" , "consultarCategorias" , "consultar"  ) }
                        
                    break
                    case "M-012"://ambientes
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Ambientes" , "crearAmbientes" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Ambientes" , "modificarAmbientes" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Ambientes" , "eliminarAmbientes" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Ambientes" , "listarAmbientes" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Ambientes" , "consultarAmbientes" , "consultar"  ) }
                        
                    break
                    case "M-013"://secciones
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Secciones" , "crearSecciones" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Secciones" , "modificarSecciones" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Secciones" , "eliminarSecciones" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Secciones" , "listarSecciones" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Secciones" , "consultarSecciones" , "consultar"  ) }
                        
                      break
                    case "M-014"://pnf

                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear PNF" , "crearPNF" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar PNF" , "modificarPNF" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar PNF" , "eliminarPNF" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar PNF" , "listarPNF" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar PNF" , "consultarPNF" , "consultar"  ) }
                        
                      
                      break
                    case "M-015"://ejes
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Ejes" , "crearEjes" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Ejes" , "modificarEjes" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Ejes" , "eliminarEjes" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Ejes" , "listarEjes" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Ejes" , "consultarEjes" , "consultar"  ) }
                        
                      
                      break
                    case "M-016"://unid curr
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear UnidCurr" , "crearUnidCurr" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar UnidCurr" , "modificarUnidCurr" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar UnidCurr" , "eliminarUnidCurr" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar UnidCurr" , "listarUnidCurr" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar UnidCurr" , "consultarUnidCurr" , "consultar"  ) }
                        
                      
                      break
                    case "M-017"://acti admi
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear ActiAdmi" , "crearActiAdmi" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar ActiAdmi" , "modificarActiAdmi" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar ActiAdmi" , "eliminarActiAdmi" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar ActiAdmi" , "listarActiAdmi" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar ActiAdmi" , "consultarActiAdmi" , "consultar"  ) }
                        
                     break
                    case "M-018"://comisiones
                      
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Comisiones" , "crearComisiones" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Comisiones" , "modificarComisiones" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Comisiones" , "eliminarComisiones" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Comisiones" , "listarComisiones" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Comisiones" , "consultarComisiones" , "consultar"  ) }
                        
                      break
                    case "M-019"://dependencias
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Dependencias" , "crearDependencias" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Dependencias" , "modificarDependencias" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Dependencias" , "eliminarDependencias" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Dependencias" , "listarDependencias" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Dependencias" , "consultarDependencias" , "consultar"  ) }
                        
               
                      break
                    case "M-020"://roles
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Roles" , "crearRoles" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Roles" , "modificarRoles" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Roles" , "eliminarRoles" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Roles" , "listarRoles" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Roles" , "consultarRoles" , "consultar"  ) }
                        
                      
                      break
                    case "M-021"://permisologia
                      

                        if ( respuesta.data[i].codPer == "P-01"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Crear Permisologia" , "crearPermisologia" , "crear"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-02"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Modificar Permisologia" , "modificarPermisologia" , "modificar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-03"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Eliminar Permisologia" , "eliminarPermisologia" , "eliminar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-04"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Listar Permisologia" , "listarPermisologia" , "listar"  ) }
                        
                        if ( respuesta.data[i].codPer == "P-05"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Permisologia" , "consultarPermisologia" , "consultar"  ) }
                        
                      
                      break

                    case "M-023"://respaldar
                      

                        
                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Respaldar" , "consultarRespaldar" , "consultar"  ) }
                        
                      
                      break
                    case "M-024"://reestablecer
                      

                        
                        if ( respuesta.data[i].codPer == "P-07"  ) { crearSwitchDePermiso( respuesta.data[i].acceso , "Consultar Reestablecer" , "consultarReestablecer" , "consultar"  ) }
                        
                      
                      break
                    }
                  
              }
              
            }
}


function crearSwitchDePermiso( acceso ,  textoAMostrar , id , name ){

    if ( acceso == true ) {

           
        $("div .switch").append(`<label>${textoAMostrar}
                                            <input type="checkbox" name="${name}" id="${id}" value="1" checked="checked">
                                            <span class="lever"></span>
                                        </label>`) 
                  
      }else if( acceso == false){

        $("div .switch").append(`<label>${textoAMostrar}
                                            <input type="checkbox" name="${name}" id="${id}" value="0" >
                                            <span class="lever"></span>
                                        </label>`)
        }

}



