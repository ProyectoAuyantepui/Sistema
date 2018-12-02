$(function(){ 

    listar() 
    $("#crear_grupo").change(function(){
        if($(this).val() == "-A")
        {
            var str = $("#crear_codSec").val();
            var res = str.replace("-B","").replace("-A","");
            var grupo = $("#crear_grupo").val();
            var seleccion=$("#crear_codSec").val(res+grupo)
        }else if($(this).val() == "-B"){
           var str = $("#crear_codSec").val();
           var res = str.replace("-A","").replace("-B","");
           var grupo = $("#crear_grupo").val();
           var seleccion=$("#crear_codSec").val(res+grupo)
       }else{
        var str = $("#crear_codSec").val();
        var res = str.replace("-A","").replace("-B","");
        var seleccion=$("#crear_codSec").val(res)
    }
});

})

function limpiarCasillas(){
    $("form").append('<input type="reset" class="limpiarCasillas"/>')
    $(".limpiarCasillas").hide().click()
    
}


function listar(){

    var url = 'index.php?controlador=secciones&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){

        if (respuesta.data.length > 0) {

            $(".mensaje").hide()
            $("#tabla_secciones").show()
            $("#tabla_secciones tbody").html('')

            var content = $('')
            var switche 
            var turno
            var trayecto
            var tipo

            $.each(respuesta.data, function(i, item) {

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
              }else{
                  switche = '<input type="checkbox" name="switch">'
              }

              if ( item.turno == 1 ) { turno = "mañana" }
                if ( item.turno == 2 ) { turno = "tarde" }
                    if ( item.turno == 3 ) { turno = "noche" }

                        if ( item.trayecto ==  5 ) { 

                          trayecto = "inicial" 
                      }else{

                          trayecto =  item.trayecto
                      }

                      content = `<tr data-id="${item.codSec }">
                      <td >${ item.codSec }</td>
                      <td >${ trayecto }</td>
                      <td >${ turno }</td>
                      <td >
                      <div class="switch">
                      <label>
                      ${switche}
                      <span class="lever"></span>
                      </label>
                      </div>
                      </td>
                      <td  >
                      <a href="#" class="mostrarOperaciones">
                      <i class="material-icons black-text">more_vert</i>
                      </a>
                      </td>   
                      </tr>`

                      $("#tabla_secciones tbody").append(content)
                  })

            $("#tabla_secciones").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_secciones").hide()
            $(".mensaje").show()
            
        }
    })
}

function editar( codSec ){ 

    $.ajax({ 

        dataType : 'json' ,
        type:'POST' , 
        url:'index.php?controlador=secciones&actividad=consultar',
        data:{ "codSec" : codSec} 
    }) 
    .done(function(respuesta){

        $("#modal_operaciones").modal("close")

        $(".formEditarSeccion #editar_codSec").val( respuesta.data.codSec )

        $(".formEditarSeccion #editar_trayecto").val( respuesta.data.trayecto );

        $(".formEditarSeccion select#editar_pnf").val( respuesta.data.pnf );

        $(".formEditarSeccion #editar_matricula").val( respuesta.data.matricula )
        $(".formEditarSeccion #editar_turno").val( respuesta.data.turno )

        if ( respuesta.data.estado == true ) {  

            $(".formEditarSeccion input[name=estado]").val( "1" ).click() 
        }

        if ( respuesta.data.tipo == 1 ) { $(".formEditarSeccion #editar_tipo1").attr("checked",true) }
            if ( respuesta.data.tipo == 2 ) { $(".formEditarSeccion #editar_tipo2").attr("checked",true) }

                $(".formEditarSeccion #editar_observaciones").val( respuesta.data.observaciones )
            $('select').material_select()
            $("#editarSeccion").modal("open") 
        }) 
}

function crear(){


    $.ajax({ 

        dataType : 'json' ,
        type:'POST' ,
        url:'index.php?controlador=secciones&actividad=crear',
        data:$('.formCrearSeccion').serialize()
    }) 

    .done(function(respuesta){

if (respuesta.operacion == true) {

            Materialize.toast('Listo...',997)
            limpiarCasillas()
            $("#crearSeccion").modal("close")
            listar()
                                   
        }else{

            Materialize.toast('Error, Ya Existe una Sección con ese Código',1500)
        }


    })
}

function eliminar( codSec ){ 

    $.ajax({ 
        dataType : 'json', 
        type:'POST' ,
        url:'index.php?controlador=secciones&actividad=eliminar' ,
        data:{ "codSec" : codSec }
    })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $('#eliminarSeccion').modal('close')
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
        url:'index.php?controlador=secciones&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == true) {


            Materialize.toast('Listo...',997)

            $('#editarSeccion').modal('close')
            limpiarCasillas()
            listar()

        }else{

            Materialize.toast('Error...',997)
        }
    })
}

function buscar( filtro ){

    var url = 'index.php?controlador=secciones&actividad=buscar'
    
    $("#tabla_secciones tbody").html('')
    var content = $('')
    
    $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $(".mensaje").hide()
            $("#tabla_secciones").show()      

            var switche 
            var turno
            var trayecto
            var tipo

            $.each(respuesta.data, function(i, item) {

                if ( item.estado == true ) {
                  switche = '<input type="checkbox" name="switch" checked="checked">'
              }else{
                  switche = '<input type="checkbox" name="switch">'
              }

              if ( item.turno == 1 ) { turno = "mañana" }
                if ( item.turno == 2 ) { turno = "tarde" }
                    if ( item.turno == 3 ) { turno = "noche" }

                        if ( item.trayecto ==  0 ) { 

                          trayecto = "inicial" 
                      }else{

                          trayecto =  item.trayecto
                      }

                      content += `<tr data-id="${item.codSec }">>
                      <td >${ item.codSec }</td>
                      <td >${ trayecto }</td>
                      <td >${ turno }</td>
                      <td >
                      <div class="switch">
                      <label>
                      ${switche}
                      <span class="lever"></span>
                      </label>
                      </div>
                      </td>
                      <td  >
                      <a href="#" class="mostrarOperaciones">
                      <i class="material-icons black-text">more_vert</i>
                      </a>
                      </td>   
                      </tr>`

                      $("#tabla_secciones tbody").html( content )
                  })

            $("#tabla_secciones").paginationTdA({ elemPerPage: 8 })
        }else{

            $(".mensaje").show()
            $("#tabla_secciones").hide() 
        }
    })
}

function cambiarEstado( estado , codSec ){
  $.ajax({    
    dataType : 'json' , 
    type:'POST' , 
    url:'index.php?controlador=secciones&actividad=cambiar-estado' ,
    data: {
      "codSec" : codSec,
      "estado" : estado
  } 
})

  .done(function(respuesta){

      if (respuesta.operacion == true) {


        Materialize.toast('Listo...',997)


    }else{

        Materialize.toast('Error...',997)

    }
})
}

function cargarComboPrefijo(){

    var elemento = $('.formCrearUnidadCurricular select#prefijo_codigo')


    elemento.html("")
    
    $.ajax({

        url:'?controlador=pnf&actividad=listar',
        type:'POST',
        dataType:'json'
    })

    .done(function(respuesta){

        elemento.html("")

        $.each( respuesta.data, function( i,item ){
          elemento.append(`
            <option class="left"
            value="${item.codPnf}" 
            > ${item.alias} </option>
            `)
      })

        elemento.material_select()
    })
    
}

/*

DESCRIPCION : 

Evento que se dispara la darle click 
al boton de crear , muestra un dialogo 
con el formulario de creacion.

*/
$(".crear-Seccion").on("click",function(){ 

    $(".formCrearSeccion select#crear_pnf").html("") 
    $.ajax({
        dataType : 'json' , 
        type:'POST' , 
        url:'index.php?controlador=pnf&actividad=listar' 
    })

    .done(function(respuesta){

        var contenidoHTML = $("")       
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codPnf}">
            ${item.codPnf}
            </option>`
        }) 
        
        $(".formCrearSeccion select#crear_pnf").html(contenidoHTML)  
        $('select').material_select()      
    })

    $('#crearSeccion').modal("open")

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
$("#tabla_secciones").on("click","a.mostrarOperaciones",function(){

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
$("body").on( "click", ".editar-Seccion", function(){ 

    var codSec = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEditarSeccion select#editar_pnf").html("") 
    $.ajax({
        dataType : 'json' , 
        type:'POST' , 
        url:'index.php?controlador=pnf&actividad=listar' 
    })

    .done(function(respuesta){

        var contenidoHTML = $("")       
        $.each( respuesta.data, function(i,item){

            contenidoHTML += `<option value="${item.codPnf}">
            ${item.codPnf}
            </option>`
        }) 
        
        $(".formEditarSeccion select#editar_pnf").html(contenidoHTML)  
        $('select').material_select()      
    })
    editar( codSec ) 
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
$("#tabla_secciones").on("change","input[name=switch]",function() {
    var codSec = $(this).parents("tr").data("id")
    var estado = false
    if($(this).is(":checked")) {
      estado = '1'
      //console.log("Is checked");
  }else {
      estado = '2'
      //console.log("Is Not checked");
  }

  cambiarEstado( estado , codSec )
})
/*

DESCRIPCION : 

Evento que se dispara al dar click en 
eliminar un item esto lo que hace es 
mostrar un dialogo donde se le pregunta 
al usuario si realmente desea eliminar ese item

*/
$("body").on("click", ".eliminar-Seccion", function(){
    var codSec = $("#modal_operaciones input[name=item_seleccionado]").val( )
    $(".formEliminarSeccion #codSec").val( codSec )
    $("#modal_operaciones").modal("close")
    $("#eliminarSeccion").modal("open")
})

/*

DESCRIPCION : 

Evento que lo quehace es verificar 
si el formulario de creacion esta 
realmente validado y si ya esta validado 
correctamente procede a hacer 
el envio de los datos al controlador

*/

$('.formCrearSeccion').on("submit",function(evento){  

    evento.preventDefault()

    if( !$(this).valid() ) return false;

    crear( )
})

/*

DESCRIPCION : 

Evento que realiza el envio de
la consulta de eliminar item 
cuando el usuario presiona aceptar

*/

$('.formEliminarSeccion').on("submit",function(evento){  

    evento.preventDefault()    
    var codSec = $(".formEliminarSeccion input[name=codSec]").val()
    eliminar( codSec )
})


/*

DESCRIPCION : 

Evento que se dispara al dar click 
al boton de enviar los datos actualizados 
de un item al servidor pero antes de eso 
verifica que el formulario 
de edicion este perfectamente validado 

*/

$('.formEditarSeccion').on("submit",function(evento){  

    evento.preventDefault() 

    if( !$(this).valid() ) return false;       

    modificar( $(this) )
})







