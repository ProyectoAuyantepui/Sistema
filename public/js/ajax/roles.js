
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
function listar(){
    var url='index.php?controlador=roles&actividad=listar'

    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){

      if (respuesta.data.length > 0) {

        $(".mensaje").hide()
        $("table").show()
        $("table tbody").html('')

        var tabla_roles = $("#tabla_roles")
        var tbody = $("#tabla_roles tbody")
            var content = $('')

        $.each(respuesta.data, function(i, item) {
                  
          content = `<tr data-id="${item.codRol }">
                                          <td width="15%" >${ item.nombre }</td>
                                          <td width="75%" >${ item.observaciones }</td>
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

function editar( codRol ){ 

    $.ajax({ dataType : 'json' , 
             type:'POST' , 
             url:'index.php?controlador=roles&actividad=modificar' ,
            data:{ "codRol" : codRol} 
    }) 
    .done(function(respuesta){

     $("#modal_operaciones").modal("close")

                $(".formEditarRol #editar_codRol").val( respuesta.data.codRol)
                $(".formEditarRol #editar_nombre").val( respuesta.data.nombre )
                $(".formEditarRol #editar_observaciones").val( respuesta.data.observaciones )

        if ( respuesta.data.estado == true ) {  
            $(".formEditarRoles input[name=estado]").val( "1" ).click()
        }

                $("#editarRol").modal("open") 
    }) 
}

function crear(formulario){

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=roles&actividad=crear',
        data:formulario.serialize() 
    }) 
.done(function(respuesta){

        if (respuesta.operacion == true) {

            Materialize.toast('Listo...',997)
            limpiarCasillas()
            $("#crearRol").modal("close")
            listar()
                                   
        }else{

            Materialize.toast('Error...',997)
        }
    })
}

function eliminar( codRol ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=roles&actividad=eliminar' ,
        data:{ "codRol" : codRol }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarRol').modal('close')
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
        url:'index.php?controlador=roles&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarRol').modal('close')
            limpiarCasillas()
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

/*

DESCRIPCION : 

*/
$(".crear-rol").on("click",function(){ $('#crearRol').modal("open")  })

/*



DESCRIPCION : 

*/
$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

*/
$("table").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

$("body").on( "click", ".editar-roles", function(){ 

    var codRol = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( codRol ) 
})

$("body").on("click", ".eliminar-rol", function(){
    var codRol = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarRol #codRol").val( codRol )
    $("#modal_operaciones").modal("close")
    $("#eliminarRol").modal("open")
})

$('.formCrearRol').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( $(this) )
})

$('.formEliminarRol').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codRol = $(".formEliminarRol input[name=codRol]").val()
    eliminar( codRol )
})

$('.formEditarRol').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})