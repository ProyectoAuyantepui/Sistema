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
            $("table").show()
            $("table tbody").html('')

              $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.alias }">>
                                        <td width="20%">${ item.alias }</td>
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

function editar( alias ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=pnf&actividad=consultar',
            data:{ "alias" : alias} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")

        $(".formEditarPnf #editar_alias").val( respuesta.data.alias )

        $(".formEditarPnf #editar_descripcion").val( respuesta.data.descripcion )

        
        $("#editarPnf").modal("open") 
    }) 
}

function crear(){
    var datos = {
        "alias" : $('.formCrearPnf #crear_alias').val(),
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

function eliminar( alias ){ 

    $.ajax({ 
                dataType : 'json', 
                type:'POST' ,
                url:'index.php?controlador=pnf&actividad=eliminar' ,
                data:{ "alias" : alias }
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
            $("table tbody").html('')
            $(".mensaje").hide()
            $("table").show()      
              
            

            $.each(respuesta.data, function(i, item) {

              content = `<tr data-id="${item.alias }">
                                        <td width="20%">${ item.alias }</td>
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
$(".crear-pnf").on("click",function(){ $('#crearPnf').modal("open")  })

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
$("body").on( "click", ".editar-pnf", function(){ 

    var alias = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( alias ) 
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
    var alias = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarPnf #alias").val( alias )
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
          "alias" : $('#crearPnf input[name=alias]').val()
        } 
    })                      
    .done(function(respuesta_alias){
        if (respuesta_alias.operacion == true) {
            Materialize.toast('Ya existe un usuario usando ese numero de alias...',997,'rounded');
            $('#crearPnf input[name=alias]').addClass("invalid")  

                              
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
    var alias = $(".formEliminarPnf input[name=alias]").val()
    eliminar( alias )
})


/*

DESCRIPCION : 


*/
    
$('.formEditarPnf').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})






