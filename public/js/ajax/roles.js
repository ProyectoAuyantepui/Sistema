
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
        $("#tabla_roles").show()
        $("#tabla_roles tbody").html('')

        var tabla_roles = $("#tabla_roles")
        var tbody = $("#tabla_roles tbody")
            var content = $('')

        $.each(respuesta.data, function(i, item) {
                  
          content = `<tr data-id="${item.codRol }">
                                          <td  >${ item.nombre }</td>
                                          <td  >${ item.observaciones }</td>
                                          <td class="disabled_for_temp_database">
                                              <a href="#" class="mostrarOperaciones">
                                                  <i class="material-icons black-text">more_vert</i>
                                              </a>
                                          </td>   
                                      </tr>`

          $("#tabla_roles tbody").append(content)

              })



 $("#tabla_roles").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_roles").hide()
            $(".mensaje").show()
            
        }
    })
}



function crear(data){

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=roles&actividad=crear',
        data:data 
    }) 
    .done(function(respuesta){

        if (respuesta.operacion == true) {

            Materialize.toast('Listo...',997,'',function(){
                limpiarCasillas()
                location.href = '?controlador=roles&actividad=index'
            })
            
              
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

        if (respuesta.operacion == false && respuesta.error == "1") {

            Materialize.toast(

               'No se puede eliminar el Rol porque posee permisos asignados', 4000, 'rounded'
            );

            $("#eliminarRol").modal("close")
            listar()       
            
        }   
        else if ( respuesta.operacion == true ){
          Materialize.toast(

                'Rol eliminado con éxito!',
                
                3000
            );

            $("#eliminarRol").modal("close")
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
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}


/*

DESCRIPCION : 

*/


/*



DESCRIPCION : 

*/
$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

*/
$("#tabla_roles").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

$("body").on( "click", ".editar-roles", function(){ 

    var codRol = $("#modal_operaciones input[name=item_seleccionado]").val( )

    $.ajax({ dataType : 'json' , 
             type:'POST' , 
             url:'index.php?controlador=roles&actividad=consultar' ,
            data:{ "codRol" : codRol} 
    }) 
    .done(function(respuesta){

        sessionStorage.setItem( "rol_seleccionado" , JSON.stringify( respuesta.data ) ) 

        location.href = '?controlador=roles&actividad=vista-editar'
    })
    
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

    

    var permisos = new Array()

    $("input[name=permiso]:checked").each(function(i,item){
        permisos.push($(this).parents("tr").attr("codPer"))
    })

    var data = {

        "nombre" : $("input[name=nombre]").val(),
        "observaciones" : $("textarea[name=observaciones]").val(),
        "permisos" : permisos
    }
    
    crear( data )
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