$(function(){ 
    listar()
        $("#search").keyup(function(){
        if( $(this).val() != "")
        {
            $("#tabla-docentes tbody>tr").hide();
            $("#tabla-docentes td:buscar('" + $(this).val() + "')").parent("tr").show();
        }
        else
        {
            $("#tabla-docentes tbody>tr").show();
        }
    });
});
$.extend($.expr[":"], 
{
    "buscar": function(elem, i, match, array) 
    {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}

function listar(){

    var url = 'index.php?controlador=docentes&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            var content = $("")
            $(".mensaje").hide()
            $("#tabla-docentes").show()
            $("#tabla-docentes tbody").html('')
            var switche

              $.each(respuesta.data, function(i, item) {

                if ( item.estado == true ) {
                    switche = '<input type="checkbox" name="switch" checked="checked">'
                }else{
                    switche = '<input type="checkbox" name="switch">'
                }

                content = `<tr data-id="${item.cedDoc }">
                                    <td >${ item.cedDoc }</td>
                                    <td >${ item.nombre }</td>
                                    <td >${ item.apellido }</td>
                                    <td >
                                        <div class="switch">
                                            <label>
                                                ${switche}
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td  >
                                        <a href="#" class="mostrarOperaciones">
                                            <i class="material-icons black-text">more_vert</i>
                                        </a>
                                    </td>   
                                </tr>`

                $("#tabla-docentes tbody").append(content)
              })

            $("#tabla-docentes").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla-docentes").hide()
            $(".mensaje").show()
            
        }
    })
}

function cambiarEstado( estado , cedDoc ){
  $.ajax({    
    dataType : 'json' , 
    type:'POST' , 
    url:'index.php?controlador=docentes&actividad=cambiar-estado' ,
    data: {
      "cedDoc" : cedDoc,
      "estado" : estado
    } 
  })
  .done(function(respuesta){
//console.log(respuesta)
      if (respuesta.operacion == true) {


        Materialize.toast('Listo...',997)

                                      
      }else{
                  
        Materialize.toast('Error...',997)

      }
  })

}

function vistaCrear( ){ 


    $("#tarjetaDocentes").hide() 
    
    $("#registrarDocente").removeClass('oculto')

    $("#editarDocentes").addClass('oculto')

    $("#modal_operaciones").modal("close") 

    $(".crear-docente").hide()
}

function cargarComboCategoria(opcion){

    var combo = false
    
    if ( opcion == 'crear' ) {
        combo = $('select#crear_codCatDoc')
    }

    if ( opcion == 'editar' ) {
        combo = $('.form-datos-perfil select#editar_codCatDoc')
    }
    combo.html("")
    $.ajax({

        url:'?controlador=catDoc&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codCatDoc}">
                                ${item.nombre}
                            </option>`

            
        })
        combo.html(contenidoHTML)
       
    })

}



function cargarComboRol(opcion){

    var combo = false
    
    if ( opcion == 'crear' ) {
        combo = $('select#crear_rol')
    }

    if ( opcion == 'editar' ) {
        combo = $('.form-datos-perfil select#editar_codRol')
    }
    combo.html("")
    $.ajax({

        url:'?controlador=roles&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codRol}">
                                ${item.nombre}
                            </option>`

            
        })
        combo.html(contenidoHTML)
       
    })

}

function crear(formulario){

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'index.php?controlador=docentes&actividad=crear',
            data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){
            if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                listar()
                $("#registrarDocente").addClass('oculto')
                $(".crear-docente").show()
                $("#tarjetaDocentes").show()
                                   
            }else{

                Materialize.toast('Error...',997)
            }
    })


}

function editar( cedDoc ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=docentes&actividad=consultar',
            data:{ "cedDoc" : cedDoc} 
    }) 
    .done(function(respuesta){

    $("#tarjetaDocentes").hide() 
    
    $("#registrarDocente").addClass('oculto')

    $("#editarDocentes").removeClass('oculto')

    $("#modal_operaciones").modal("close") 

    $(".crear-docente").hide()

    $(".form-datos-perfil #editar_cedDoc").val( respuesta.data.cedDoc );

    $(".form-datos-perfil #editar_codCatDoc").val( respuesta.data.codCatDoc )

    $(".form-datos-perfil #editar_codRol").val( respuesta.data.codRol )
                
    $(".form-datos-perfil #editar_nombre").val( respuesta.data.nombre )

    $(".form-datos-perfil #editar_apellido").val( respuesta.data.apellido )

    $(".form-datos-perfil #editar_fecNac").val( respuesta.data.fecNac )

    if ( respuesta.data.sexo == 1 ) { $(".form-datos-perfi #editar_sexo1").attr( "checked" , true ) }
    if ( respuesta.data.sexo == 2 ) { $(".form-datos-perfi #editar_sexo2").attr( "checked" , true ) }

    $(".form-datos-perfil #editar_telefono").val( respuesta.data.telefono )

    $(".form-datos-perfil #editar_correo").val( respuesta.data.correo )

    $(".form-datos-perfil #editar_direccion").val( respuesta.data.direccion )

    $(".form-datos-perfil #editar_condicion").val( respuesta.data.condicion )

    $(".form-datos-perfil #editar_dedicacion").val( respuesta.data.dedicacion )

    $(".form-datos-perfil #editar_fecCon").val( respuesta.data.fecCon )

    $(".form-datos-perfil #editar_fecIng").val( respuesta.data.fecIng )

    $(".form-datos-perfil #editar_usuario").val( respuesta.data.usuario )

    $(".form-datos-perfil #editar_observaciones").val( respuesta.data.observaciones )

    }) 
}

function modificar( formulario ){

    $.ajax({    
        dataType : 'json' , 
        type:'POST' , 
        url:'index.php?controlador=docentes&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

                $(".crear-docente").show()
                $("#tarjetaDocentes").show()
                $("#editarDocentes").addClass('oculto')
                limpiarCasillas()
                listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function eliminar( cedDoc ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=docentes&actividad=eliminar' ,
        data:{ "cedDoc" : cedDoc }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#modal_eliminarDocente').modal('close')
            Materialize.toast('Listo...',997)
                    
            listar()                   
                                    
        }else{

            Materialize.toast('Error...',997)
                    
            listar()
        }
    }) 
}


function cambiarRol(cedDoc){
    $.ajax({

        url:'?controlador=docentes&actividad=cambiarRol',
        type:'POST',
        dataType:'json',
        data:{ "cedDoc" : cedDoc }
    })

    .done(function(respuesta){
        //console.log(respuesta)
}
)}

function cargarDependencias(cedDoc){
    var dependencias = false
    var url='?controlador=docentes&actividad=dependencias'
    $.ajax({url:url,type:'POST',dataType:'json',data:{ "cedDoc" : cedDoc }})

    .done(function(respuesta){
      if (respuesta.data.length > 0) {
            var content = $("")
            
            $("#dependencias tbody").html('')

              $.each(respuesta.data, function(i, item) {

                content = `
                <tr data-id="${item.cedDoc }">
                                    <td >${ item.nombre }</td>
                                </tr>`

                $("#dependencias tbody").append(content)
              })
        }else{
            $("#dependencias").hide()
            $('#TarjetaDependencias').addClass('oculto')
            
        }
    })
}

function cargarComisiones(cedDoc){
    var comisiones = false
    var url='?controlador=docentes&actividad=comisiones'
    $.ajax({url:url,type:'POST',dataType:'json',data:{ "cedDoc" : cedDoc  }})

    .done(function(respuesta){
      if (respuesta.data.length > 0) {
        var content = $("")

            $("#comisiones tbody").html('')

            $.each(respuesta.data, function(i, item) {
                content = `<tr data-id="${item.cedDoc }">
                                    <td >${ item.nombre }</td>
                                </tr>`

                $("#comisiones tbody").append(content)
              })
        }else{
            $("#comisiones").hide()
            $('#TarjetaComisiones').addClass('oculto')
            
        }
    })
}


function listarDocDep(cedDoc){

    

    var  combo = $('.formEliminarDocenteDependencia select#desv-doc-dep')
    
    combo.html("")
    $.ajax({

        url:'?controlador=dependencias&actividad=listar-docentes-por-dependencias',
        type:'POST',
        dataType:'json',
        data:{"cedDoc":cedDoc}
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

function añadirDependencia(){

    var addDep = false
    
        addDep = $('select#add_dep')
    
    addDep.html("")
    $.ajax({

        url:'?controlador=dependencias&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
        //console.log(respuesta.data)
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codDep}">
                                ${item.nombre}
                            </option>`

            
        })
        addDep.html(contenidoHTML)
       
    })

}

function vincularDependencia(cedDoc){

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'index.php?controlador=docentes&actividad=asignar-dependencia',
    data: {
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


function desvincularDependencia( cedDoc,codDep ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=docentes&actividad=desvincular-doc-dep' ,
        data:{ "cedDoc" : cedDoc,
               "codDep" : codDep
             }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#modal_desvincularDependencia').modal('close')
            Materialize.toast('Listo...',997)
                    
            listar()                   
                                    
        }else{

            Materialize.toast('Error...',997)
                    
            listar()
        }
    }) 
}

function eliminarDocDep( codDep,cedDoc ){
     $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=dependencias&actividad=desvincular-doc-dep' ,
        data:{ "codDep" : codDep,
               "cedDoc":cedDoc 
             }
    })

    .done(function(respuesta){
        if (respuesta.operacion == true) {

            $('#eliminarDocDependencia').modal('close')
            Materialize.toast('Listo...',997)         
                                    
        }else{

            Materialize.toast('Error...',997)
        }
    }) 
}


$("body").on( "click", "#cambiarRol", function(){ 
//cambiarRol(cedDoc)
    $("#modal_rol").modal("open")
})

$("body").on( "click", ".crear-docente", function(){ 
    vistaCrear()
    cargarComboCategoria( 'crear' )
})

$("body").on( "click", ".editar-docente", function(){ 
    var cedDoc = $("#modal_operaciones input[name=item_seleccionado]").val( )
        
    cargarComboCategoria( 'editar' )
        cargarComboRol( 'editar' )
    editar( cedDoc ) 
    cargarDependencias(cedDoc)
    cargarComisiones(cedDoc)
    //cambiarRol()
})

$('.form-datos-perfil').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})

$('.form-registrar-docentes').on("submit",function(evento){  
    
    evento.preventDefault()

    if( !$(this).valid() ) return false;

                   
    
                crear( $(this) )
    


})

$('.formCrearDependencia').on("submit",function(evento){
//Obteniendo el código de la dependencia y la cedula del docente
    var cedDoc=$(".form-datos-perfil #editar_cedDoc").val();

        evento.preventDefault() 

                $("#crearDependencia").modal('close')
                $(".crear-docente").hide()
                $("#tarjetaDocentes").hide()
                $("#editarDocentes").removeClass('oculto')

        vincularDependencia(cedDoc)
    

})

$("body").on("click", ".eliminar-docente", function(){
    var cedDoc = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarDocente #cedDoc").val( cedDoc )
    $("#modal_operaciones").modal("close")
    $("#modal_eliminarDocente").modal("open")
})

$("body").on("click", ".eliminarDependencia", function(evento){
    
    var cedDoc=$(".form-datos-perfil #editar_cedDoc").val();
    //console.log(cedDoc)
    $("#modalDesvincularDependencia").modal("open")
    evento.preventDefault() 
})


$(".agregarDependencia").on("click",function(){ 
    $('#crearDependencia').modal("open")
    añadirDependencia()
      })

$('.formEliminarDocente').on("submit",function(evento){  
    
    evento.preventDefault()    
    var cedDoc = $(".formEliminarDocente input[name=cedDoc]").val()
    eliminar( cedDoc )
})

$("#tabla-docentes").on("change","input[name=switch]",function() {
    var cedDoc = $(this).parents("tr").data("id")
    var estado = false
    if($(this).is(":checked")) {
      estado = '1'
      ////console.log("Is checked");
    }else {
      estado = '2'
      ////console.log("Is Not checked");
    }

    cambiarEstado( estado , cedDoc )
})

$("body").on("click", ".eliminar-doc-dep", function(){
    var cedDoc=$(".form-datos-perfil #editar_cedDoc").val();
    $("#eliminarDocDependencia").modal("open")

listarDocDep(cedDoc)
})

$('.formEliminarDocenteDependencia').on("submit",function(evento){  
    
    evento.preventDefault()    
    var cedDoc=$(".form-datos-perfil #editar_cedDoc").val();
    //console.log(cedDoc)

    var codDep=true//No se que Colocar;
    //console.log(codDep)
    eliminarDocDep( codDep,cedDoc )
})

$("#tabla-docentes").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

