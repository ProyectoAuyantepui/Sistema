/*

DESCRIPCION : 

*/

$(function(){ 
    listar() 
})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}

/*

DESCRIPCION : 

*/

$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

*/

$(".crear-ActAdm").on("click",function(){  $('#crearActAdm').modal("open")  })

/*

DESCRIPCION : 

*/

$("#tabla_ActAdm").on("click","a.mostrarOperaciones",function(){

    var codActAdm= $(this).parents("tr").data("id")

    $("#modal_operaciones").modal("open")

    $(".editar-ActAdm").on("click",function(){ 

        $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=actiAdmi&actividad=consultar',
            data:{ "codActAdm" : codActAdm} 
        }) 
        .done(function(respuesta){

            $(".formEditarActAdm #editar_codActAdm").val( respuesta.data.codActAdm)
            $(".formEditarActAdm #editar_titulo").val( respuesta.data.titulo )
            $(".formEditarActAdm #editar_observaciones").val( respuesta.data.observaciones )
            $(".formEditarActAdm #editar_dependencia").val( respuesta.data.dependencia )
            $(".formEditarActAdm select #editar_tipActAdm").val( respuesta.data.tipActAdm )

            $("#modal_operaciones").modal("close")
            $("#editarActAdm").modal("open") 
        })
    })

    $(".eliminar-ActAdm").on( "click" , function(){ 
                 
        $(".formEliminarActAdm #codActAdm").val( codActAdm )
        $("#modal_operaciones").modal("close")
        $("#eliminarActAdm").modal("open")  
    })
})



/*

DESCRIPCION : 

*/

$('.formCrearActAdm').on("submit",function(evento){  
        
    evento.preventDefault()
        
    var formulario = $(this)

    if( !formulario.valid() ) return false;

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=actiAdmi&actividad=crear',
        data:formulario.serialize() 
    }) 
    .done(function(respuesta){

        if (respuesta.operacion == true) {
                
            Materialize.toast('Listo...',997,'rounded')
            $("#crearActAdm").modal("close")
            listar()
            
                                   
        }else{

            Materialize.toast('Error...',997,'rounded')
        }
    })
})




/*

DESCRIPCION : 

*/

function listar(){

    var tabla_ActAdm = $("#tabla_ActAdm")
    var tbody = $("#tabla_ActAdm tbody")
    var contenidoHTML = $("")

    $.ajax({  url : 'index.php?controlador=actiAdmi&actividad=listar',
             dataType : 'json'
    })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {

            var tipo

            for ( i in respuesta.data ) {



                contenidoHTML += `<tr data-id="${respuesta.data[i].codActAdm }">
                                        
                                        <td >${ respuesta.data[i].titulo }</td>
                                        <td >${ respuesta.data[i].dependencia }</td>
                                        <td >${ respuesta.data[i].tipActAdm }</td>
                                        <td class="disabled_for_temp_database">
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                tbody.html(contenidoHTML)
            }

            tabla_ActAdm.paginationTdA({ elemPerPage: 8 })
        }else{

            tbody.html(`<div class="col s12">
                                                  <p class="grey-text">No se encuentran ActAdms registrados en la base de datos...</p>
                                                </div>`)
        }
    })
}


/*

DESCRIPCION : 

*/

$('.formEliminarActAdm').on("submit",function(evento){  
    
        evento.preventDefault() 
                    
            $.ajax({ dataType : 'json', 
                     type:'POST' ,
                     url:'index.php?controlador=actiAdmi&actividad=eliminar' ,
                     data:$(this).serialize()
            })

            .done(function(respuesta){

                if (respuesta.operacion == true) {

                    $('#eliminarActAdm').modal('close')
                    Materialize.toast('Listo...',997,'rounded')
                    listar()           
                            
                                    
                }else{

                    Materialize.toast('Error...',997,'rounded')
                    listar()
                }
            })
})


/*

DESCRIPCION : 

*/

$('.formEditarActAdm').on("submit",function(evento){  
    
        evento.preventDefault() 
                    
            $.ajax({ dataType : 'json' , 
                     type:'POST' , 
                     url:'index.php?controlador=actiAdmi&actividad=modificar' ,
                     data:$('.formEditarActAdm').serialize() 
            })

            .done(function(respuesta){

                if (respuesta.operacion == true) {


                    Materialize.toast('Listo...',997,'rounded')

                    $('#editarActAdm').modal('close')

                    listar()
                    
                                    
                }else{
                  
                    Materialize.toast('Error...',997,'rounded')
                }
            })
})

