$(function(){ 
          
    listar() 
})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}


function listar(){

    var url = 'index.php?controlador=dependencias&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            
            $(".mensaje").hide()
            $("#tabla_dependencias").show()
            $("#tabla_dependencias tbody").html('')

            var content = $('')
            var switche 

            $.each(respuesta.data, function(i, item) {

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else {
                  switche = '<input type="checkbox" name="switch">'
                }


                content = `<tr data-id="${item.codDep }">
                            <td >${ item.nombre }</td>
                            <td >${ item.descripcion }</td>
                            <td >
                    </td>
                                        <td class="disabled_for_temp_database">
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                $("#tabla_dependencias tbody").append(content)
              })

            $("#tabla_dependencias").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_dependencias").hide()
            $(".mensaje").show()
            
        }
    })
}

function editar( codDep ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=dependencias&actividad=consultar',
            data:{ "codDep" : codDep} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")
        $(".formEditarDependencia #editar_codDep").val( respuesta.data.codDep );
                
        $(".formEditarDependencia #editar_nombre").val( respuesta.data.nombre );

        $(".formEditarDependencia #editar_descripcion").val( respuesta.data.descripcion );

        if ( respuesta.data.estado == true ) {  
            $(".formEditarDependencia input[name=estado]").val( "1" ).click()
        }

        $("#editarDependencia").modal("open")
    }) 
}

function crear(formulario){

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=dependencias&actividad=crear',
        data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){

        if (respuesta.operacion == true) {

            Materialize.toast('Listo...',997)
            limpiarCasillas()
            $("#crearDependencia").modal("close")
            listar()
                                   
        }else{

            Materialize.toast('Error...',997)
        }
    })
}

function eliminar( codDep ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=dependencias&actividad=eliminar' ,
        data:{ "codDep" : codDep }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarDependencia').modal('close')
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
        url:'index.php?controlador=dependencias&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarDependencia').modal('close')
            limpiarCasillas()
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=dependencias&actividad=buscar'
    


    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        if (respuesta.operacion == true) {
            var content = $('')
            $("#tabla_dependencias tbody").html('')
            $(".mensaje").hide()
            $("#tabla_dependencias").show()      
              
            var switche 
            var tipo

            $.each(respuesta.data, function(i, item) {

               

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else {
                  switche = '<input type="checkbox" name="switch">'
                }


                content = `<tr data-id="${item.codDep }">
                            <td >${ item.nombre }</td>
                            <td >${ item.descripcion }</td>
                            <td  >
                                <a href="#" class="mostrarOperaciones">
                                    <i class="material-icons black-text">more_vert</i>
                                </a>
                            </td>   
                                    </tr>`

                $("#tabla_dependencias tbody").append(content)
            })

            $("#tabla_dependencias").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_dependencias").hide()
            $(".mensaje").show()
            
        }
    })
}

/*

DESCRIPCION : 



*/
$(".crear-Dependencia").on("click",function(){ $('#crearDependencia').modal("open")  })

/*

DESCRIPCION : 

*/
$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

r

*/
$("#tabla_dependencias").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

/*

DESCRIPCION : 



*/
$("body").on( "click", ".editar-dependencia", function(){ 

    var codDep = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( codDep ) 
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
$("body").on("click", ".eliminar-dependencia", function(){
    var codDep = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarDependencia #codDep").val( codDep )
    $("#modal_operaciones").modal("close")
    $("#eliminarDependencia").modal("open")
})

/*

DESCRIPCION : 



*/

$('.formCrearDependencia').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( $(this) )
})

/*

DESCRIPCION : 


*/
    
$('.formEliminarDependencia').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codDep = $(".formEliminarDependencia input[name=codDep]").val()
    eliminar( codDep )
})


/*

DESCRIPCION : 


*/
    
$('.formEditarDependencia').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})








