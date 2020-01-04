$(function(){ listar() })

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}


function listar(){

    var url = 'index.php?controlador=comisiones&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            
            $(".mensaje").hide()
            $("#tabla_comisiones").show()
            $("#tabla_comisiones tbody").html('')

            var content = $("")
            $.each(respuesta.data, function(i, item) {

                content = `<tr data-id="${item.codCom }">
                                <td >${ item.nombre }</td>
                                <td>${ item.dependencia }</td>                                        <td width="5%" >
                                    <a href="#" class="mostrarOperaciones disabled_for_temp_database">
                                        <i class="material-icons black-text">more_vert</i>
                                    </a>   
                            </tr>`

                $("#tabla_comisiones tbody").append(content)
              })

            $("#tabla_comisiones").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_comisiones").hide()
            $(".mensaje").show()
            
        }
    })
}

function crear(formulario){

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=comisiones&actividad=crear',
        data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){

        if (respuesta.operacion == true) {
            limpiarCasillas()
            Materialize.toast('Listo...',997,'',function(){ location.href = '?controlador=comisiones&actividad=index' })
            

                                   
        }else{

            Materialize.toast('Error...',997)
        }
    })
}

function editar( codCom ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=comisiones&actividad=consultar',
            data:{ "codCom" : codCom} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")
        $(".formEditarComision #editar_codCom").val( respuesta.data.codCom )
        $(".formEditarComision #editar_nuevoCodCom").val( respuesta.data.codCom )
        $(".formEditarComision #editar_nombre").val( respuesta.data.nombre )
        $(".formEditarComision #editar_dependencia").val( respuesta.data.dependencia )
        $(".formEditarComision #editar_descripcion").val( respuesta.data.descripcion )

    if ( respuesta.data.estado == true ) {  
            $(".formEditarComision input[name=estado]").val( "1" ).click()
        }

    }) 
}


function eliminar( codCom ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=comisiones&actividad=eliminar' ,
        data:{ "codCom" : codCom }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarComision').modal('close')
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
        url:'index.php?controlador=comisiones&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997,'',function(){ location.href = '?controlador=comisiones&actividad=index' })

            $('#editarComision').modal('close')
            
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=comisiones&actividad=buscar'

    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        if (respuesta.operacion == true) {
            var content = $('')
            $("#tabla_comisiones tbody").html('')
            $(".mensaje").hide()
            $("#tabla_comisiones").show()      
              
            var switche 
            var tipo

            $.each(respuesta.data, function(i, item) {

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else {
                  switche = '<input type="checkbox" name="switch">'
                }


                content = `<tr data-id="${item.codCom }">
                            <td >${ item.nombre }</td>
                            <td >${ item.dependencia }</td>
                            <td >
                                <div class="switch">
                                    <label>
                                        ${switche}
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </td>
                            <td >
                                <a href="#" class="mostrarOperaciones">
                                    <i class="material-icons black-text">more_vert</i>
                                </a>
                            </td>   
                                    </tr>`

                $("#tabla_comisiones tbody").append(content)
            })

            $("#tabla_comisiones").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_comisiones").hide()
            $(".mensaje").show()
            
        }
    })
}


function vincularDocCom(codCom,cedDoc){

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'?controlador=comisiones&actividad=agregar-docente',
        data:{ "codCom":codCom,
               "cedDoc" : cedDoc 
             }
    }) 
        
    .done(function(respuesta){
          if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                
                listarDocentesComision( codCom )  
                $("#agregarDocente").modal("close")           
            }else{

                Materialize.toast('Error...',997)
            }  
    })

}

/*

DESCRIPCION : 

Desvincular a un docente de una determinada Comisión

*/
function eliminarDocComision( codCom,cedDoc ){
     $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=comisiones&actividad=desvincular-docente' ,
        data:{ 
            "codCom" : codCom,
            "cedDoc":cedDoc 
        }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {
            listarDocentesComision(codCom)
            Materialize.toast('Listo...',997)         
                                      
        }else{

            Materialize.toast('Error...',997)
        }
    }) 
}







function cambiarCoordinador(codCom,cedDoc){
    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'?controlador=comisiones&actividad=cambiar-coordinador',
        data:{ 
               "cedDoc" : cedDoc,
               "codCom":codCom 
             }
    }) 
        
    .done(function(respuesta){
          if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                listarDocentesComision( codCom )
                                   
            }else{

                Materialize.toast('Error...',997)
            }  
    })
}



function listarDocentesComision(codCom){
     $.ajax({
        url:'?controlador=comisiones&actividad=docentes-comision',
        
        type:'post',
        dataType:'json',
        data: {
            "codCom" : codCom
        }
    })

    .done(function(respuesta){

        $("#tabla_docentes tbody").html('')

        var content = $("")
        var coordinador = false
        var desvincular = false

        $.each(respuesta.docentes, function(i, item) {

            if ( respuesta.coordinador.cedDoc == item.cedDoc ) { 

                coordinador = `<strong>COORDINADOR</strong>`
                desvincular = `
                    <a 
                      href="#" 
                      class="btn red darken-1 disabled waves-effect " 
                      codCom="${codCom}" 
                      cedDoc="${item.cedDoc}"
                    >
                      <i class="material-icons">close</i>
                    </a>
                ` 
            }else{

                coordinador = `<a 
                                href="#" 
                                class="btn btn-cambiar-coo waves-effect green darken-3"
                                codCom="${codCom}" 
                                cedDoc="${item.cedDoc}"
                                >
                                Convertir en coordinador
                            </a>`
                
                desvincular = `
                    <a 
                      href="#" 
                      class="btn waves-effect red darken-1 btn-desvincular" 
                      codCom="${codCom}" 
                      cedDoc="${item.cedDoc}"
                    >
                      <i class="material-icons">close</i>
                    </a>
                `
            }

            content = `<tr cedDoc="${item.cedDoc }" codCom="${codCom}">
                        <td >${ item.cedDoc }</td>
                        <td>${ item.nombre }</td>
                        <td >${ item.apellido }</td>
                        <td >${ coordinador }</td>
                        <td >${ desvincular }</td>
                       </tr>`

            $("#tabla_docentes tbody").append(content)
          })

        $("#tabla_docentes").paginationTdA({ elemPerPage: 8 })
    })
}




$('.formCrearComision').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( $(this) )
})


$("body").on( "click", ".editar-comision", function(){ 

    var codCom = $("#modal_operaciones input[name=item_seleccionado]").val( )

    $("#modal_operaciones").modal("close") 
    location.href = "?controlador=comisiones&actividad=vista-editar&codCom=" + codCom
})



$('.formEditarComision').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})



$("body").on("click", ".eliminar-comision", function(){
    var codCom = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarComision #codCom").val( codCom )
    $("#modal_operaciones").modal("close")
    $("#eliminarComision").modal("open")
})



$('.formEliminarComision').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codCom = $(".formEliminarComision input[name=codCom]").val()
    eliminar( codCom )
})



$('.formAsignarDocente').on("submit",function(evento){
//Obteniendo el código de la dependencia y la cedula del docente
    var cedDoc=$('.formAsignarDocente select#docentes').val();
    var codCom=$('.formEditarComision input[name=codCom]').val()
    evento.preventDefault() 
    vincularDocCom(codCom,cedDoc)
})


$("body").on( "keyup", "input[name=filtro]", function(){ 

    var filtro = $(this).val( )
    
    buscar( filtro ) 
})



$("#tabla_comisiones").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})



$("body").on("click","a.btn-desvincular",function(){


  eliminarDocComision( $(this).attr("codCom") , $(this).attr("cedDoc") )
})

$("body").on("click","a.btn-cambiar-coo",function(){


  cambiarCoordinador( $(this).attr("codCom") , $(this).attr("cedDoc") )
})