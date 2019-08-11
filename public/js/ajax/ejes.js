$(function(){ 
          
    listar() 
})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}


function listar(){

    var url = 'index.php?controlador=ejes&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            var content = $("")
            $(".mensaje").hide()
            $("#tabla_ejes").show()
            $("#tabla_ejes tbody").html('')

              $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.codEje }">>
                                        <td >${ item.nombre }</td>
                                        <td >${ item.descripcion }</td>
                                        <td  >
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                $("#tabla_ejes tbody").append(content)
              })

            $("#tabla_ejes").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_ejes").hide()
            $(".mensaje").show()
            
        }
    })
}

function editar( codEje ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=ejes&actividad=consultar',
            data:{ "codEje" : codEje} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")

        $(".formEditarEje #editar_codEje").val( respuesta.data.codEje )
                
        $(".formEditarEje #editar_nombre").val( respuesta.data.nombre );

        $(".formEditarEje #editar_descripcion").val( respuesta.data.descripcion )

        
        $("#editarEje").modal("open") 
    }) 
}

function crear(formulario){

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'index.php?controlador=ejes&actividad=crear',
            data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){

            if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                limpiarCasillas()
                $("#crearEje").modal("close")
                listar()
                                   
            }else{

                Materialize.toast('Error...',997)
            }
    })
}

function eliminar( codEje ){ 

    $.ajax({ 
                dataType : 'json', 
                type:'POST' ,
                url:'index.php?controlador=ejes&actividad=eliminar' ,
                data:{ "codEje" : codEje }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarEje').modal('close')
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
                url:'index.php?controlador=ejes&actividad=modificar' ,
                data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarEje').modal('close')
            limpiarCasillas()
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=ejes&actividad=buscar'
    
        
    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.operacion == true) {
            $("#tabla_ejes tbody").html('')
            var content = $('')
            $(".mensaje").hide()
            $("#tabla_ejes").show()      
              
            

            $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.codEje }">>
                                        <td >${ item.nombre }</td>
                                        <td >${ item.descripcion }</td>
                                        <td  >
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                $("#tabla_ejes tbody").append(content)
            })

            $("#tabla_ejes").paginationTdA({ elemPerPage: 8 })
        }else{

            $(".mensaje").show()
           $("#tabla_ejes").hide() 
        }
    })
}

/*

DESCRIPCION : 



*/
$(".crear-eje").on("click",function(){ $('#crearEje').modal("open")  })

/*

DESCRIPCION : 

*/
$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

r

*/
$("#tabla_ejes").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

/*

DESCRIPCION : 



*/
$("body").on( "click", ".editar-eje", function(){ 

    var codEje = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( codEje ) 
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
$("body").on("click", ".eliminar-eje", function(){
    var codEje = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarEje #codEje").val( codEje )
    $("#modal_operaciones").modal("close")
    $("#eliminarEje").modal("open")
})

/*

DESCRIPCION : 



*/

$('.formCrearEje').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( $(this) )
})

/*

DESCRIPCION : 


*/
    
$('.formEliminarEje').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codEje = $(".formEliminarEje input[name=codEje]").val()
    eliminar( codEje )
})


/*

DESCRIPCION : 


*/
    
$('.formEditarEje').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})







