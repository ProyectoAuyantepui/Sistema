$(function(){ 
          
    listar() 

    
})

function cargarComboPnf(opcion){
    
    var combo = false
    
    if ( opcion == 'crear' ) {
        combo = $('.formCrearUnidadCurricular select#crear_pnf')
    }

    if ( opcion == 'editar' ) {
        combo = $('.formEditarUnidadCurricular select#editar_pnf')
    }

    combo.html("")
    
    $.ajax({

        url:'?controlador=pnf&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codPnf}">
                                    ${item.codPnf}
                                </option>`
        }) 
        
        combo.html(contenidoHTML)  
        $('select').material_select()    
    })
    
}

function cargarComboEjes(opcion){

    var combo = false
    
    if ( opcion == 'crear' ) {
        combo = $('.formCrearUnidadCurricular select#crear_eje')
    }

    if ( opcion == 'editar' ) {
        combo = $('.formEditarUnidadCurricular select#editar_eje')
    }
    combo.html("")
    $.ajax({

        url:'?controlador=ejes&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){

console.log(respuesta)
        var contenidoHTML = $("")        
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codEje}">
                                ${item.nombre}
                            </option>`

            
        })
        combo.html(contenidoHTML)
        $('select').material_select()
       
    })

}

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}
/*

DESCRIPCION : 

*/
function listar(){
    var url = 'index.php?controlador=unidCurr&actividad=listar'

    $.ajax({  url : url, type : 'POST', dataType : 'json' })

     .done(function(respuesta){
        
        if (respuesta.data.length > 0) {
            $(".mensaje").hide()
            $("#tabla_unidades_curriculares").show()
            $("#tabla_unidades_curriculares tbody").html('')
              
            var content = $('')
            var switche 
            var fase

            $.each(respuesta.data, function(i, item) {
                 if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else{
                  switche = '<input type="checkbox" name="switch">'
                }

                if ( item.fase == 3 ) {
                    fase = 'anual'
                }else{
                    fase = item.fase
                }

                content =  `<tr data-id="${item.codUniCur }">
                                       
                                        <td >${ item.codUniCur }</td>
                                        <td >${ item.nombre }</td>
                                        <td>${ fase }</td>
                                        <td class="disabled_for_temp_database">
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

               $("#tabla_unidades_curriculares tbody").append(content)
              })

            $("#tabla_unidades_curriculares").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_unidades_curriculares").hide()
            $(".mensaje").show()
            
        }
    })
}


function crear(formulario){

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' ,
            url:'index.php?controlador=unidCurr&actividad=crear',
            data:formulario.serialize() 
    }) 
        
    .done(function(respuesta){

            if (respuesta.operacion == true) {

                Materialize.toast('Listo...',997)
                limpiarCasillas()
                $("#crearUnidadCurricular").modal("close")
                listar()
                                   
            }else{

                Materialize.toast('Error...',997)
            }
    })


}

function editar( codUniCur ){ 

    $.ajax({ 

            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=unidCurr&actividad=consultar',
            data:{ "codUniCur" : codUniCur} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")
                
        $(".formEditarUnidadCurricular #codUniCur").val( respuesta.data.codUniCur )

        $(".formEditarUnidadCurricular #editar_codUniCur").val( respuesta.data.codUniCur )

        $(".formEditarUnidadCurricular #editar_nombre").val( respuesta.data.nombre )

        $(".formEditarUnidadCurricular #editar_uniCre").val( respuesta.data.uniCre )

        $(".formEditarUnidadCurricular #editar_htas").val( respuesta.data.htas )
        
        $(".formEditarUnidadCurricular #editar_htis").val( respuesta.data.htis )

        $(".formEditarUnidadCurricular #editar_trayecto").val( respuesta.data.trayecto )

        $(".formEditarUnidadCurricular #editar_pnf").val(respuesta.data.codPnf)

        $(".formEditarUnidadCurricular #editar_eje").val(respuesta.data.codEje)


        if ( respuesta.data.fase == 1 ) { $(".formEditarUnidadCurricular #editar_fase1").attr("checked",true) }
        if ( respuesta.data.fase == 2 ) { $(".formEditarUnidadCurricular #editar_fase2").attr("checked",true) }
        if ( respuesta.data.fase == 3 ) { $(".formEditarUnidadCurricular #editar_anual").attr("checked",true) }

        $(".formEditarUnidadCurricular #editar_observaciones").val( respuesta.data.observaciones )
            $('select').material_select()
    
        $("#editarUnidadCurricular").modal("open") 
    }) 
}

function modificar( formulario ){

    $.ajax({    
        dataType : 'json' , 
        type:'POST' , 
        url:'index.php?controlador=unidCurr&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarUnidadCurricular').modal('close')
            limpiarCasillas()
            listar()
                                    
        }else{
                
            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=unidCurr&actividad=buscar'
    
     $("#tabla_unidades_curriculares tbody").html('')
    var content = $('')
    
    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){
        
        if (respuesta.operacion == true) {

            $(".mensaje").hide()
            $("#tabla_unidades_curriculares").show()      
              
            var switche 
            var fase

            $.each(respuesta.data, function(i, item) {

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
                }else{
                  switche = '<input type="checkbox" name="switch">'
                }

                if ( item.fase == 3 ) {
                    fase = 'anual'
                }else{
                    fase = item.fase
                }

                content += `<tr data-id="${item.codUniCur }">
                                        <td >${ item.codUniCur }</td>
                                        <td >${ item.nombre }</td>
                                        <td >${ fase }</td>
                                        <td  >
                                            <a href="#" class="mostrarOperaciones">
                                                <i class="material-icons black-text">more_vert</i>
                                            </a>
                                        </td>   
                                    </tr>`

                $("#tabla_unidades_curriculares tbody").html( content )
            })

            $("#tabla_unidades_curriculares").paginationTdA({ elemPerPage: 8 })
        }else{

            $(".mensaje").show()
           $("#tabla_unidades_curriculares").hide() 
        }
    })
}

function eliminar( codUniCur ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=unidCurr&actividad=eliminar' ,
        data:{ "codUniCur" : codUniCur }
    })

    .done(function(respuesta){
        if (respuesta.operacion == true) {

            $('#eliminarUnidadCurricular').modal('close')
            Materialize.toast('Listo...',997)
                    
            listar()                   
                                    
        }else{

            Materialize.toast('Error...',997)
                    
            listar()
        }
    }) 
}

function cambiarEstado( estado , codUniCur ){
  $.ajax({    
    dataType : 'json' , 
    type:'POST' , 
    url:'index.php?controlador=unidCurr&actividad=cambiar-estado' ,
    data: {
      "codUniCur" : codUniCur,
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

Evento que se dispara la darle click 
al boton de crear , muestra un dialogo 
con el formulario de creacion.

*/
$(".crear-unidadcurricular").on("click",function(){

    
    cargarComboPnf('crear')
    
    cargarComboEjes( 'crear' )

    $('#crearUnidadCurricular').modal("open") 
})


$(".editar-UnidadCurricular").on("click",function(){

    
    cargarComboPnf('editar')
    
    cargarComboEjes( 'editar' )

    $('#editarUnidadCurricular').modal("open") 
})

/*

DESCRIPCION : 

Evento que se dispara al darle click 
al boton refrescar , realiza denuavo la funcion listar.

*/
$(".boton-refrescar").on("click",function(){ listar() })

/*

DESCRIPCION : 

Evento que se dispara al darle click 
al boton de motrar operaciones , toma 
el codigo del item seleccionado 
lo coloca en un input oculto para 
saber cual se seleccionop y acontinuacion 
muestra un dialogo con las opciones basicas 
editar y eliminar

*/
$("#tabla_unidades_curriculares").on("click","a.mostrarOperaciones",function(){

    var codigo_item_seleccionado= $(this).parents("tr").data("id")

    $("#modal_operaciones input[name=item_seleccionado]").val( codigo_item_seleccionado )

    $("#modal_operaciones").modal("open")
})

/*

DESCRIPCION : 

Evento que se dispara al darle click
al boton editar y lo que hace es que toma
el codigo del item que se selecciono y 
lo envia al controlador luego el controlador 
le devuelve todos los datos de ese item , 
los datos son colocados en un  
dialogo dentro de un formulario , 
para poder editarlo

*/
$("body").on( "click", ".editar-UnidadCurricular", function(){ 

    var codUniCur = $("#modal_operaciones input[name=item_seleccionado]").val( )
    
    editar( codUniCur ) 
})

/*

DESCRIPCION : 

Este evento se dispara al escribir una letra
en el input que se llama filtro , luego 
se captura ese valor, y se envia en una 
consulta asincrona al controlador y dependiendo 
de lo q este devuelva se mostraran resultados de busqueda , 
esto es un mini buscador 

*/
$("body").on( "keyup", "input[name=filtro]", function(){ 

    var filtro = $(this).val( )
    
    buscar( filtro ) 
})

/*

DESCRIPCION : 

Este evento se dispara al cambiar el swithe de estado de la seccion , luego 
se captura ese valor, y se envia en una 
consulta asincrona al controlador donde se le cambia el valor al estado de la seccion

*/
$("#tabla_unidades_curriculares").on("change","input[name=switch]",function() {
    var codUniCur = $(this).parents("tr").data("id")
    var estado = false
    if($(this).is(":checked")) {
      estado = '1'
      //console.log("Is checked");
    }else {
      estado = '2'
      //console.log("Is Not checked");
    }

    cambiarEstado( estado , codUniCur )
})

/*

DESCRIPCION : 

Evento que se dispara al dar click en 
eliminar un item esto lo que hace es 
mostrar un dialogo donde se le pregunta 
al usuario si realmente desea eliminar ese item

*/
$("body").on("click", ".eliminar-unidadcurricular", function(){
    var codUniCur = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarUnidadCurricular #codUniCur").val( codUniCur )
    $("#modal_operaciones").modal("close")
    $("#eliminarUnidadCurricular").modal("open")
})

/*

DESCRIPCION : 

Evento que lo quehace es verificar 
si el formulario de creacion esta 
realmente validado y si ya esta validado 
correctamente procede a hacer 
el envio de los datos al controlador

*/

$('.formCrearUnidadCurricular').on("submit",function(evento){  
        
    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( $(this) )
})

/*

DESCRIPCION : 

Evento que realiza el envio de
la consulta de eliminar item 
cuando el usuario presiona aceptar

*/
    
$('.formEliminarUnidadCurricular').on("submit",function(evento){  
    
    evento.preventDefault()    
    var codUniCur = $(".formEliminarUnidadCurricular input[name=codUniCur]").val()
    eliminar( codUniCur )
})



/*

DESCRIPCION : 

Evento que se dispara al dar click 
al boton de enviar los datos actualizados 
de un item al servidor pero antes de eso 
verifica que el formulario 
de edicion este perfectamente validado 

*/
    
$('.formEditarUnidadCurricular').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})

