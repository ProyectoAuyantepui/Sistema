$(function(){ 
          
    listar() 
})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}

function generarPdfGeneral(){
    var url = 'index.php?controlador=ambientes&actividad=reporte-general'    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })
    .done(function(respuesta){
        console.log("Hola")        
    })
}

$(".generar-pdf").on("click",function(){ generarPdfGeneral() })

function listar(){

    var url = 'index.php?controlador=ambientes&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            
            var content = $("")
            $(".mensaje").hide()
            $("table").show()
            $("table tbody").html('')

            var content = $("")
            var switche 
            var tipo

            $.each(respuesta.data, function(i, item) {

                if ( item.tipo == 1 ) { tipo = "salon" }
                if ( item.tipo == 2 ) { tipo = "cancha" }
                if ( item.tipo == 3 ) { tipo = "sala de reunion" }
                if ( item.tipo == 4 ) { tipo = "otros" }

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else{
                  switche = '<input type="checkbox" name="switch">'
                }


                content = `<tr data-id="${item.codAmb }">
                            <td width="20%">${ item.codAmb }</td>
                            <td width="30%">${ item.ubicacion }</td>
                            <td width="20%">${ tipo }</td>
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

                $("table tbody").append(content)
            })

            $("table").paginationTdA({ elemPerPage: 4 })
        }else{
            $("table").hide()
            $(".mensaje").show()
            
        }
    })
}

function editar( codAmb ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=ambientes&actividad=consultar',
            data:{ "codAmb" : codAmb} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")
        $(".formEditarAmbiente #editar_codAmb").val( respuesta.data.codAmb )
        $(".formEditarAmbiente #editar_nuevoCodAmb").val( respuesta.data.codAmb )
        $(".formEditarAmbiente #editar_ubicacion").val( respuesta.data.ubicacion )
        $(".formEditarAmbiente #editar_observaciones").val( respuesta.data.observaciones )
                        
        if ( respuesta.data.tipo == 1 ) { $(".formEditarAmbiente #editar_tipo1").attr( "checked" , true ) }
        if ( respuesta.data.tipo == 2 ) { $(".formEditarAmbiente #editar_tipo2").attr( "checked" , true ) }
        if ( respuesta.data.tipo == 3 ) { $(".formEditarAmbiente #editar_tipo3").attr( "checked" , true ) }
        if ( respuesta.data.tipo == 4 ) { $(".formEditarAmbiente #editar_tipo4").attr( "checked" , true ) }

        if ( respuesta.data.estado == true ) {  
            $(".formEditarAmbiente input[name=estado]").val( "1" ).click()
        }

        $("#editarAmbiente").modal("open")
    }) 
}

function crear(formulario){

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=ambientes&actividad=crear',
        data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){

        if (respuesta.operacion == true) {

            Materialize.toast('Listo...',997)
            limpiarCasillas()
            $("#crearAmbiente").modal("close")
            listar()
                                   
        }else{

            Materialize.toast('Error...',997)
        }
    })
}

function eliminar( codAmb ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=ambientes&actividad=eliminar' ,
        data:{ "codAmb" : codAmb }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarAmbiente').modal('close')
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
        url:'index.php?controlador=ambientes&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarAmbiente').modal('close')
            limpiarCasillas()
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=ambientes&actividad=buscar'
    


    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        if (respuesta.operacion == true) {
            var content = $('')
            $("table tbody").html('')
            $(".mensaje").hide()
            $("table").show()      
              
            var switche 
            var tipo

            $.each(respuesta.data, function(i, item) {

                if ( item.tipo == 1 ) { tipo = "salon" }
                if ( item.tipo == 2 ) { tipo = "cancha" }
                if ( item.tipo == 3 ) { tipo = "sala de reunion" }
                if ( item.tipo == 4 ) { tipo = "otros" }

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else {
                  switche = '<input type="checkbox" name="switch">'
                }


                content = `<tr data-id="${item.codAmb }">
                            <td width="20%">${ item.codAmb }</td>
                            <td width="30%">${ item.ubicacion }</td>
                            <td width="20%">${ tipo }</td>
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

                $("table tbody").append(content)
            })

            $("table").paginationTdA({ elemPerPage: 4 })
        }else{
            $("table").hide()
            $(".mensaje").show()
            
        }
    })
}

function cambiarEstado( estado , codAmb ){
  $.ajax({    
    dataType : 'json' , 
    type:'POST' , 
    url:'index.php?controlador=ambientes&actividad=cambiar-estado' ,
    data: {
      "codAmb" : codAmb,
      "estado" : estado
    } 
  })
  .done(function(respuesta){

      if (respuesta.operacion == true) {


        Materialize.toast('Listo...',997)
        listar()
                                      
      }else{
                  
        Materialize.toast('Error...',997)

      }
  })

}

/*

DESCRIPCION : 



*/
$(".crear-ambiente").on("click",function(){ $('#crearAmbiente').modal("open")  })

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
$("body").on( "click", ".editar-ambiente", function(){ 

    var codAmb = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( codAmb ) 
})

/*

DESCRIPCION : 

r 

*/
$("body").on( "keyup", "input[name=filtro]", function(){ 

    var filtro = $(this).val( )
    
    buscar( filtro ) 
})

$("table").on("change","input[name=switch]",function() {
    var codAmb = $(this).parents("tr").data("id")
    var estado = false
    if($(this).is(":checked")) {
      estado = '1'
      //console.log("Is checked");
    }else {
      estado = '2'
      //console.log("Is Not checked");
    }

    cambiarEstado( estado , codAmb )
})

/*

DESCRIPCION : 


*/
$("body").on("click", ".eliminar-ambiente", function(){
    var codAmb = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarAmbiente #codAmb").val( codAmb )
    $("#modal_operaciones").modal("close")
    $("#eliminarAmbiente").modal("open")
})

/*

DESCRIPCION : 



*/


$('.formCrearAmbiente').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

$.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=ambientes&actividad=validarAmbiente',
        data:{
          "codAmb" : $('#crearAmbiente input[name=codAmb]').val()
        } 
    })    
    .done(function(respuesta){
console.log(respuesta)
if (respuesta.operacion==true) {
    Materialize.toast('Ya existe ambiente con el mismo código...',2000,'rounded');
            $('#crearAmbiente input[name=codAmb]').addClass("invalid")
        }else{
            console.log("hola1")
                    crear( $(this) )
        }
})
})

/*

DESCRIPCION : 


*/
    
$('.formEliminarAmbiente').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codAmb = $(".formEliminarAmbiente input[name=codAmb]").val()
    eliminar( codAmb )
})


/*

DESCRIPCION : 


*/
    
$('.formEditarAmbiente').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})








