$(function(){ 
          
    listar() 
})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}


function listar(){

    var url = 'index.php?controlador=catDoc&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            var content = $("")
            $(".mensaje").hide()
            $("table").show()
            $("table tbody").html('')

              $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.codCatDoc }">>
                                        <td width="20%">${ item.nombre }</td>
                                        <td width="20%">${ item.descripcion }</td>
                                        <td width="5%" >
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                $("table tbody").append(content)
              })

            $("table").paginationTdA({ elemPerPage: 4 })
        }else{
            $("table").hide()
            $(".mensaje").show()
            
        }
    })
}

function editar( codCatDoc ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=catDoc&actividad=consultar',
            data:{ "codCatDoc" : codCatDoc} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")

        $(".formEditarCatDoc #editar_codCatDoc").val( respuesta.data.codCatDoc )
                
        $(".formEditarCatDoc #editar_nombre").val( respuesta.data.nombre );

        $(".formEditarCatDoc #editar_descripcion").val( respuesta.data.descripcion )

        
        $("#editarCatDoc").modal("open") 
    }) 
}

function crear(formulario){

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'index.php?controlador=catDoc&actividad=crear',
            data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){

            if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                limpiarCasillas()
                $("#crearCatDoc").modal("close")
                listar()
                                   
            }else{

                Materialize.toast('Error...',997)
            }
    })
}

function eliminar( codCatDoc ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=catDoc&actividad=eliminar' ,
        data:{ "codCatDoc" : codCatDoc }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarCatDoc').modal('close')
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
        url:'index.php?controlador=catDoc&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarCatDoc').modal('close')
            limpiarCasillas()
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=catDoc&actividad=buscar'
    
        
    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.operacion == true) {
           var content = $('')
            $("table tbody").html('')
            $(".mensaje").hide()
            $("table").show()      
              
            

            $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.codCatDoc }">>
                                        <td width="20%">${ item.nombre }</td>
                                        <td width="20%">${ item.descripcion }</td>
                                        <td width="5%" >
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                $("table tbody").append(content)
            })

            $("table").paginationTdA({ elemPerPage: 4 })
        }else{

            $(".mensaje").show()
           $("table").hide() 
        }
    })
}

/*

DESCRIPCION : 



*/
$(".crear-cat-doc").on("click",function(){ $('#crearCatDoc').modal("open")  })

/*

DESCRIPCION : 

*/
$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

r

*/
$("table").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

/*

DESCRIPCION : 



*/
$("body").on( "click", ".editar-cat-doc", function(){ 

    var codCatDoc = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( codCatDoc ) 
})

/*

DESCRIPCION : 

r 

*/
$("body").on( "keyup", "input[name=filtro]", function(){ 

    var filtro = $(this).val( )
    
    buscar( filtro ) 
})

/*

DESCRIPCION : 


*/
$("body").on("click", ".eliminar-cat-doc", function(){
    var codCatDoc = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarCatDoc #codCatDoc").val( codCatDoc )
    $("#modal_operaciones").modal("close")
    $("#eliminarCatDoc").modal("open")
})

/*

DESCRIPCION : 



*/

$('.formCrearCatDoc').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( $(this) )
})

/*

DESCRIPCION : 


*/
    
$('.formEliminarCatDoc').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codCatDoc = $(".formEliminarCatDoc input[name=codCatDoc]").val()
    eliminar( codCatDoc )
})


/*

DESCRIPCION : 


*/
    
$('.formEditarCatDoc').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})







