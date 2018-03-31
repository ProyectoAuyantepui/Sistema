$(function(){ listar() })

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}


function listar(){

    var url = 'index.php?controlador=comisiones&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            
            $(".mensaje").hide()
            $(".tabla-comisiones").show()
            $(".tabla-comisiones tbody").html('')

            var content = $("")
            $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.codCom }">
                                <td width="20%">${ item.nombre }</td>
                                <td width="30%">${ item.dependencia }</td>                                        <td width="5%" >
                                    <a href="#" class="mostrarOperaciones">
                                        <i class="material-icons black-text">more_vert</i>
                                    </a>   
                            </tr>`

                $(".tabla-comisiones tbody").append(content)
              })

            $(".tabla-comisiones").paginationTdA({ elemPerPage: 4 })
        }else{
            $(".tabla-comisiones").hide()
            $(".mensaje").show()
            
        }
    })
}

function crear(formulario){

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=comisiones&actividad=crear',
        data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){

        if (respuesta.operacion == true) {

            Materialize.toast('Listo...',997)
            limpiarCasillas()
            $("#crearComision").modal("close")
            listar()
                                   
        }else{

            Materialize.toast('Error...',997)
        }
    })
}
function editar( codCom ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=comisiones&actividad=consultar',
            data:{ "codCom" : codCom} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")
        $(".formEditarComision #editar_codCom").val( respuesta.data.codCom )
        $(".formEditarComision #editar_nuevoCodCom").val( respuesta.data.codCom )
        $(".formEditarComision #editar_nombre").val( respuesta.data.nombre )
        $(".formEditarComision #editar_dependencia").val( respuesta.data.dependencia )
        $(".formEditarComision #editar_descripcion").val( respuesta.data.descripcion )

    if ( respuesta.data.estado == true ) {  
            $(".formEditarComision input[name=estado]").val( "1" ).click()
        }

    }) 
}


function eliminar( codCom ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=comisiones&actividad=eliminar' ,
        data:{ "codCom" : codCom }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarComision').modal('close')
            Materialize.toast('Listo...',997)
                    
            listar()                   
                                    
        }else{

            Materialize.toast('Error...',997)
                    
            listar()
        }
    }) 
}

function modificar( formulario ){

    $.ajax({    
        dataType : 'json' , 
        type:'POST' , 
        url:'index.php?controlador=comisiones&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarComision').modal('close')
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=comisiones&actividad=buscar'

    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        if (respuesta.operacion == true) {
            var content = $('')
            $(".tabla-comisiones tbody").html('')
            $(".mensaje").hide()
            $(".tabla-comisiones").show()      
              
            var switche 
            var tipo

            $.each(respuesta.data, function(i, item) {

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else {
                  switche = '<input type="checkbox" name="switch">'
                }


                content = `<tr data-id="${item.codCom }">
                            <td width="20%">${ item.nombre }</td>
                            <td width="30%">${ item.dependencia }</td>
                            <td width="10%">
                                <div class="switch">
                                    <label>
                                        ${switche}
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </td>
                            <td width="5%" >
                                <a href="#" class="mostrarOperaciones">
                                    <i class="material-icons black-text">more_vert</i>
                                </a>
                            </td>   
                                    </tr>`

                $(".tabla-comisiones tbody").append(content)
            })

            $(".tabla-comisiones").paginationTdA({ elemPerPage: 4 })
        }else{
            $(".tabla-comisiones").hide()
            $(".mensaje").show()
            
        }
    })
}


/*

DESCRIPCION : 

Acción que vincula a un docente de la tabla TDocente con una comisión de la tabla TComisiones a través de la tabla "TComDoc"

*/
function vincularDocCom(codCom,cedDoc){

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'?controlador=comisiones&actividad=agregar-docente',
        data:{ "codCom":codCom,
               "cedDoc" : cedDoc 
             }
    }) 
        
    .done(function(respuesta){
          if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                
                                   
            }else{

                Materialize.toast('Error...',997)
            }  
    })

}

/*

DESCRIPCION : 

Desvincular a un docente de una determinada Comisión

*/
function eliminarDocComision( codCom,cedDoc ){
     $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=comisiones&actividad=desvincular-docente' ,
        data:{ "codCom" : codCom,
               "cedDoc":cedDoc 
             }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarDocComision').modal('close')
            Materialize.toast('Listo...',997)         
                                    
        }else{

            Materialize.toast('Error...',997)
        }
    }) 
}

/*

DESCRIPCION : 

Acción que sirve para carga todos los docentes que no estén presentes en la comisión actual

*/

function cargarComboDocentes(codCom,cedDoc){

    var combo = false

        combo = $('.formAsignarDocente select#add-ced-doc')

    combo.html("")
    $.ajax({

        url:'?controlador=comisiones&actividad=add-doc-com',
        type:'POST',
        dataType:'json',
        data:{"codCom":codCom,
              "cedDoc":cedDoc}
    })

    .done(function(respuesta){
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.cedDoc}">
                                ${item.nombre}
                            </option>`

            
        })
        combo.html(contenidoHTML)
        combo.material_select()
       
    })

}

/*

DESCRIPCION : 

Acción que sirve para listar a los docentes de una comisión con la finalidad de 
bien cambiar su coordinador o eliminar un docente en especifico dentro de esa comisión

*/

function cargarDocCom(opcion,codCom){

    var combo = false
    if ( opcion == 'coordinador' ) {

        combo = $('.formCambiarCoordinador select#cambiar-coor-doc')
    }if ( opcion == 'desvincular-docente' ) {

        combo = $('.formEliminarDocenteComision select#desv-ced-doc')
    }
    combo.html("")
    $.ajax({

        url:'?controlador=comisiones&actividad=listar-docentes-por-comision',
        type:'POST',
        dataType:'json',
        data:{"codCom":codCom}
    })

    .done(function(respuesta){
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.cedDoc}">
                                ${item.nombre}
                            </option>`

            
        })
        combo.html(contenidoHTML)
    })

}

/*

DESCRIPCION : 

Acción que sirve para listar a los docentes de una comisión con la finalidad de 
bien cambiar su coordinador o eliminar un docente en especifico dentro de esa comisión

*/

function asignarCoordinador(cedDoc,codCom){
    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'?controlador=comisiones&actividad=asignar-coordinador',
        data:{ 
               "cedDoc" : cedDoc,
               "codCom":codCom 
             }
    }) 
        
    .done(function(respuesta){
          if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                
                                   
            }else{

                Materialize.toast('Error...',997)
            }  
    })
}

/*

DESCRIPCION : 

Acción que sirve para listar a los docentes de una comisión En una tabla con el id tabla-docentes
encontrada en app/vista/comisiones/index.php

*/

function listarDocCom(codCom){
     $.ajax({
        url:'?controlador=comisiones&actividad=listar-docentes-por-comision',
        
        type:'post',
        dataType:'json',
        data: {
            "codCom" : codCom
        }
    })

    .done(function(respuesta){

        $("#tabla-docentes tbody").html('')

        var content = $("")

        var docente = false
        $.each(respuesta.data, function(i, item) {
            if( item.coordinador ){
                docente = item.nombre + ' (Coordinador)' 
            }else{
                docente = item.nombre 
            }
            content = `<tr data-id="${item.cedDoc }">
                        <td width="25%">${ item.cedDoc }</td>
                        <td width="25%">${ docente }</td>
                        <td width="25%">${ item.apellido }</td>
                       </tr>`

            $("#tabla-docentes tbody").append(content)
          })

        $("#tabla-docentes").paginationTdA({ elemPerPage: 4 })
    })
}

/*

Fin de las funciones

*/
//---------------------------.............2018............-------------------------------------------------
/*

DESCRIPCION : 
Evento on-click que abre un modal con el id crearComisión encontrado en vista/comisiones/__dialogos.php
*/

$(".crear-Comision").on("click",function(){ $('#crearComision').modal("open")  })

/*

DESCRIPCION : 
Evento on-submit que antes de crear la comisión valida los campos y luego si todo está ok registra
*/

$('.formCrearComision').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( $(this) )
})

/*

DESCRIPCION : 
Evento on-click que oculta la vista principal del módulo comisiones y muestra la vista de edición, este
botón es llamado desde vista/comisiones/__dialogos.php
*/
$("body").on( "click", ".editar-comision", function(){ 

    var codCom = $("#modal_operaciones input[name=item_seleccionado]").val( )

    $("#tarjetaComisiones").hide() 

    $("#tarjetaDocentes").show()

    $("#modal_operaciones").modal("close") 

    $(".crear-Comision").hide()

    $(".regresar").show()

   
    listarDocCom(codCom)
    editar( codCom ) 
})

/*

DESCRIPCION : 
Evento on-submit que antes de modificar la comisión valida los campos y luego si todo está ok actualiza
*/

$('.formEditarComision').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})

/*

DESCRIPCION : 
Evento on-click que elimina una comisión, botón llamado desde cambiarCoordinador
*/

$("body").on("click", ".eliminar-comision", function(){
    var codCom = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarComision #codCom").val( codCom )
    $("#modal_operaciones").modal("close")
    $("#eliminarComision").modal("open")
})

/*

DESCRIPCION : 
Evento on-submit que elimina una comisión
*/

$('.formEliminarComision').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codCom = $(".formEliminarComision input[name=codCom]").val()
    eliminar( codCom )
})

/*

DESCRIPCION : 
Evento on-click que carga a los docentes pertenencientes a una comisión
*/

$("body").on( "click", ".add-doc", function(){ 
var cedDoc=$('.formCambiarCoordinador #cambiar-coor-doc').val()
var codCom=$('.formEditarComision #editar_codCom').val()
cargarComboDocentes(codCom,cedDoc)
$("#agregarDocente").modal("open")
})

/*

DESCRIPCION : 
Evento on-submit que vincula a un docente con una comisión y luego recarga la tabla
*/

$('.formAsignarDocente').on("submit",function(evento){
//Obteniendo el código de la dependencia y la cedula del docente
    var cedDoc=$('.formAsignarDocente select#add-ced-doc').val();
    var codCom=$('.formEditarComision #editar_codCom').val()
    evento.preventDefault() 
    vincularDocCom(codCom,cedDoc)
    $("#agregarDocente").modal("close")
    listarDocCom(codCom)

})

/*

DESCRIPCION : 
Evento on-click que llama al modal de id cambiarCoordinador encontrado en vista/comisiones/__dialogos.php
*/

$("body").on( "click", ".cambiar-coordinador", function(){  

    var codCom=$('.formEditarComision #editar_codCom').val()
    cargarDocCom('coordinador',codCom)
$("#cambiarCoordinador").modal("open")
 
  })

/*

DESCRIPCION : 
Evento on-click que llama a un modal para eliminar a un docente de una comisión en expecifico, este botón
se encuentra en vista/comisiones/index.php
*/

$("body").on("click", ".eliminar-doc-com", function(){
    var codCom = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarDocenteComision #codCom").val( codCom )
    $("#eliminarDocComision").modal("open")

cargarDocCom('desvincular-docente',codCom)
})

/*

DESCRIPCION : 
Evento on-submit que cambia al coordinador de una comisión y luego actualiza la tabla
*/

$('.formCambiarCoordinador').on("submit",function(evento){  

    var cedDoc=$('.formCambiarCoordinador select#cambiar-coor-doc').val();
    console.log(cedDoc)
    var codCom=$('.formEditarComision #editar_codCom').val()
    console.log(codCom)
    evento.preventDefault()
    asignarCoordinador(cedDoc, codCom)
    $("#cambiarCoordinador").modal("close")
    listarDocCom(codCom)
})

/*

DESCRIPCION : 
Evento on-submit que desvincula a un docente de una comisión y luego recarga la tabla
*/ 

$('.formEliminarDocenteComision').on("submit",function(evento){  
    
    evento.preventDefault()    
    var cedDoc = $(".formEliminarDocenteComision #desv-ced-doc").val()
     console.log(cedDoc)
    var codCom=$('.formEditarComision #editar_codCom').val()
    console.log(codCom)
    eliminarDocComision( codCom,cedDoc )
    listarDocCom(codCom)
})

/*

DESCRIPCION : 
Evento on-click que
*/

$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 
Evento on-keyuo que llama a la función buscar y realiza una consulta con el operador like
*/

$("body").on( "keyup", "input[name=filtro]", function(){ 

    var filtro = $(this).val( )
    
    buscar( filtro ) 
})

/*

DESCRIPCION : 
Evento on-click que mustra un modal con 2 tipos de operaciones editar e liminar una comisión
el botón que dispara esta acción se encuentra en este mismo archivo es decir en la función listar()
*/ 

$(".tabla-comisiones").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})



