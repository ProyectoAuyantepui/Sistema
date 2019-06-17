$(function(){ 
          
    listar() 
})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}


function listar(){

    var url = 'index.php?controlador=pnf&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            var content = $("")
            $(".mensaje").hide()
            $("#tabla_pnf").show()
            $("#tabla_pnf tbody").html('')

              $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.codPnf }">>
                                        <td >${ item.codPnf }</td>
                                        <td >${ item.descripcion }</td>
                                        <td  >
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                $("#tabla_pnf tbody").append(content)
              })

            $("#tabla_pnf").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_pnf").hide()
            $(".mensaje").show()
            
        }
    })
}

function editar( codPnf ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=pnf&actividad=consultar',
            data:{ "codPnf" : codPnf} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")

        $(".formEditarPnf #editar_codPnf").val( respuesta.data.codPnf )

        $(".formEditarPnf #editar_descripcion").val( respuesta.data.descripcion )

        
        $("#editarPnf").modal("open") 
    }) 
}

function crear(){
    var datos = {
        "codPnf" : $('.formCrearPnf #crear_codPnf').val(),
        "descripcion" : $('.formCrearPnf #crear_descripcion').val()
    }

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'index.php?controlador=pnf&actividad=crear',
            data:datos 
    }) 
        
    .done(function(respuesta){
console.log(respuesta)
            if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                limpiarCasillas()
                $("#crearPnf").modal("close")
                listar()
                                   
            }else{

                Materialize.toast('Error...',997)
            }
    })
}

function eliminar( codPnf ){ 

    $.ajax({ 
                dataType : 'json', 
                type:'POST' ,
                url:'index.php?controlador=pnf&actividad=eliminar' ,
                data:{ "codPnf" : codPnf }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarPnf').modal('close')
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
                url:'index.php?controlador=pnf&actividad=modificar' ,
                data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarPnf').modal('close')
            limpiarCasillas()
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=pnf&actividad=buscar'
    
    
    
    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.operacion == true) {
            var content = $('')
            $("#tabla_pnf tbody").html('')
            $(".mensaje").hide()
            $("#tabla_pnf").show()      
              
            

            $.each(respuesta.data, function(i, item) {

              content = `<tr data-id="${item.codPnf }">
                                        <td >${ item.codPnf }</td>
                                        <td >${ item.descripcion }</td>
                                        <td  >
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

              $("#tabla_pnf tbody").append(content)
            })
            
            $("#tabla_pnf").paginationTdA({ elemPerPage: 8 })
        }else{

            $(".mensaje").show()
           $("#tabla_pnf").hide() 
        }
    })
}

/*

DESCRIPCION : 



*/
$(".crear-pnf").on("click",function(){ $('#crearPnf').modal("open")  })

/*

DESCRIPCION : 

*/
$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

r

*/
$("#tabla_pnf").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

/*

DESCRIPCION : 



*/
$("body").on( "click", ".editar-pnf", function(){ 

    var codPnf = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( codPnf ) 
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
$("body").on("click", ".eliminar-pnf", function(){
    var codPnf = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarPnf #codPnf").val( codPnf )
    $("#modal_operaciones").modal("close")
    $("#eliminarPnf").modal("open")
})

/*

DESCRIPCION : 



*/

$('.formCrearPnf').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;
    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=pnf&actividad=consultar',
        data:{
          "codPnf" : $('#crearPnf input[name=codPnf]').val()
        } 
    })                      
    .done(function(respuesta_codPnf){
        if (respuesta_codPnf.operacion == true) {
            Materialize.toast('Ya existe un usuario usando ese numero de codPnf...',997,'rounded');
            $('#crearPnf input[name=codPnf]').addClass("invalid")  

                              
        }else{
                    crear( $(this) )
        }
                     
    })
})

/*

DESCRIPCION : 


*/
    
$('.formEliminarPnf').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codPnf = $(".formEliminarPnf input[name=codPnf]").val()
    eliminar( codPnf )
})


/*

DESCRIPCION : 


*/
    
$('.formEditarPnf').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})






