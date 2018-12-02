$(function(){

    localStorage.clear();

    cargarComboCategorias()
    
    cargarComboDedicaciones()

})
  $("#clave").on("focusout", function (e) {
    if ($(this).val() != $("#cclave").val()) {
        $("#cclave").removeClass("valid").addClass("invalid");
    } else {
        $("#cclave").removeClass("invalid").addClass("valid");
    }
});

$("#cclave").on("keyup", function (e) {
    if ($("#clave").val() != $(this).val()) {
        $(this).removeClass("valid").addClass("invalid");
    } else {
        $(this).removeClass("invalid").addClass("valid");
    }
});


$('#form-registro-1').on("submit",function(evento) {  

    evento.preventDefault();                    
                      
    if(! $(this).valid()) return false;
    
    
    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=docentes&actividad=consultar',
        data:{
          "cedDoc" : $('#form-registro-1 input[name=cedDoc]').val()
        } 
    })                      
    .done(function(respuesta_cedula){

        if (respuesta_cedula.operacion == true) {

           Materialize.toast('Ya existe un usuario usando ese numero de cedula...',997,'rounded');
            $('#form-registro-1 input[name=cedDoc]').addClass("invalid")                      
        }else{


            localStorage.nacionalidad = $("#form-registro-1 select#nacionalidad option:selected").val()
            localStorage.cedDoc = $('#form-registro-1 input[name=cedDoc]').val()
            localStorage.nombre = $('#form-registro-1 input[name=nombre]').val()
            localStorage.apellido = $('#form-registro-1 input[name=apellido]').val()
            localStorage.sexo = $('#form-registro-1 input[name=sexo]').val()
            localStorage.fecNac = $('#form-registro-1 input[name=fecNac]').val()
            localStorage.direccion = $('#form-registro-1 input[name=direccion]').val()
            localStorage.telefono = $('#form-registro-1 input[name=telefono]').val()

            $('#form-registro-1').addClass('oculto')
            $('#form-registro-2').removeClass('oculto')   
        }              
        
    })
})

$('#form-registro-2').on("submit",function(evento) {  

    evento.preventDefault();                    
                      
    if(! $(this).valid()) return false;

    localStorage.dedicacion = $('select#codDed').find("option:selected").val() 
    localStorage.condicion = $('select#condicion').find("option:selected").val() 
   
    localStorage.codCatDoc = $('select#codCatDoc').find("option:selected").val() 

    localStorage.fecIng = $('input[name=fecIng]').val()
    localStorage.fecCon = $('input[name=fecCon]').val()

    $('#form-registro-2').addClass('oculto')
    $('#form-registro-3').removeClass('oculto')                 
    
})

$('#form-registro-3').on("submit",function(evento) {  

    evento.preventDefault();                    
                      
    if(! $(this).valid()) return false;

    localStorage.correo = $('#form-registro-3 input[name=correo]').val()
    localStorage.usuario = $('#form-registro-3 input[name=usuario]').val()
    localStorage.clave = $('#form-registro-3 input[name=clave]').val()
    localStorage.avatar = $('select#avatar').find("option:selected").val() 

    
            $.ajax({ 
                dataType : 'json',
                type:'POST', 
                url:'index.php?controlador=login&actividad=post-registro', 
                data:{

                  "nacionalidad" : localStorage.nacionalidad,
                  "cedDoc" : localStorage.cedDoc,
                  "nombre" : localStorage.nombre,
                  "apellido" : localStorage.apellido,
                  "sexo" : localStorage.sexo,
                  "fecNac" : localStorage.fecNac,
                  "direccion" : localStorage.direccion,
                  "telefono" : localStorage.telefono,
                  "codDed" : localStorage.dedicacion,
                  "condicion" : localStorage.condicion,
                  "codCatDoc" : localStorage.codCatDoc,
                  "fecIng" : localStorage.fecIng,
                  "fecCon" : localStorage.fecCon,
                  "correo" : localStorage.correo,
                  "usuario" : localStorage.usuario,
                  "avatar" : localStorage.avatar,
                  "clave" : localStorage.clave
                } 
            })
            .done(function(respuesta){
  
                if (respuesta.operacion == true) {
                    
                    localStorage.clear();
                    
                    $("form").append('<input type="reset" class="limpiarCasillas"/>')
                    $(".limpiarCasillas").hide().click()

                    $("#form-registro-1").removeClass("oculto")
                    $("#form-registro-3").addClass("oculto")

                    localStorage.setItem( 'user' , JSON.stringify( respuesta.data ) )

                    Materialize.toast('Registrado con exito... ',1000,'',function(){ location.href = '?controlador=home&actividad=index' });


                }else{
                                                                                                            
                    Materialize.toast('Error al registrar usuario...',1400,'',function(){ location.href = '?controlador=login&actividad=registro' });
                }
                
            })  

})


function cargarComboCategorias(){

  var elemento = $('#form-registro-2 select#codCatDoc')


  elemento.html("")
  
  $.ajax({

      url:'?controlador=catDoc&actividad=listar',
      type:'POST',
      dataType:'json'
  })

  .done(function(respuesta){

      elemento.html("")

      $.each( respuesta.data, function( i,item ){
        elemento.append(`
          <option 
            value="${item.codCatDoc}" 
          > ${item.nombre} </option>
        `)
      })

      elemento.material_select()
  })
}

function cargarComboDedicaciones(){
  var combo_dedicacion = $('#form-registro-2 select#codDed')

  $.ajax({

      url:'?controlador=dedicaciones&actividad=listar',
      type:'POST',
      dataType:'json'
  })

  .done(function(respuesta){

      combo_dedicacion.html("")

      $.each( respuesta.data, function( i,item ){
        combo_dedicacion.append(`
          <option 
            value="${item.codDed}" 
          > ${item.nombre} </option>
        `)
      })

      combo_dedicacion.material_select()
  })
}