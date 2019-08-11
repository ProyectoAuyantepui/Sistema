$(function(){

    sessionStorage.clear();

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


            sessionStorage.cedDoc = $('#form-registro-1 input[name=cedDoc]').val()
            sessionStorage.nombre = $('#form-registro-1 input[name=nombre]').val()
            sessionStorage.apellido = $('#form-registro-1 input[name=apellido]').val()
            sessionStorage.sexo = $('#form-registro-1 input[name=sexo]').val()
            sessionStorage.fecNac = $('#form-registro-1 input[name=fecNac]').val()
            sessionStorage.direccion = $('#form-registro-1 input[name=direccion]').val()
            sessionStorage.telefono = $('#form-registro-1 input[name=telefono]').val()

            $('#form-registro-1').addClass('oculto')
            $('#form-registro-2').removeClass('oculto')   
        }              
        
    })
})

$('#form-registro-2').on("submit",function(evento) {  

    evento.preventDefault();                    
                      
    if(! $(this).valid()) return false;

    sessionStorage.dedicacion = $('select#codDed').find("option:selected").val() 
    sessionStorage.condicion = $('select#condicion').find("option:selected").val() 
   
    sessionStorage.codCatDoc = $('select#codCatDoc').find("option:selected").val() 

    sessionStorage.fecIng = $('input[name=fecIng]').val()
    sessionStorage.fecCon = $('input[name=fecCon]').val()

    $('#form-registro-2').addClass('oculto')
    $('#form-registro-3').removeClass('oculto')                 
    
})

$('#form-registro-3').on("submit",function(evento) {  

    evento.preventDefault();                    
                      
    if(! $(this).valid()) return false;

    sessionStorage.correo = $('#form-registro-3 input[name=correo]').val()
    sessionStorage.usuario = $('#form-registro-3 input[name=usuario]').val()
    sessionStorage.clave = $('#form-registro-3 input[name=clave]').val()
    sessionStorage.avatar = $('select#avatar').find("option:selected").val() 

    
            $.ajax({ 
                dataType : 'json',
                type:'POST', 
                url:'index.php?controlador=login&actividad=post-registro', 
                data:{

                  "cedDoc" : sessionStorage.cedDoc,
                  "nombre" : sessionStorage.nombre,
                  "apellido" : sessionStorage.apellido,
                  "sexo" : sessionStorage.sexo,
                  "fecNac" : sessionStorage.fecNac,
                  "direccion" : sessionStorage.direccion,
                  "telefono" : sessionStorage.telefono,
                  "codDed" : sessionStorage.dedicacion,
                  "condicion" : sessionStorage.condicion,
                  "codCatDoc" : sessionStorage.codCatDoc,
                  "fecIng" : sessionStorage.fecIng,
                  "fecCon" : sessionStorage.fecCon,
                  "correo" : sessionStorage.correo,
                  "usuario" : sessionStorage.usuario,
                  "avatar" : sessionStorage.avatar,
                  "clave" : sessionStorage.clave
                } 
            })
            .done(function(respuesta){
  
                if (respuesta.operacion == true) {
                    
                    sessionStorage.clear();
                    
                    $("form").append('<input type="reset" class="limpiarCasillas"/>')
                    $(".limpiarCasillas").hide().click()

                    $("#form-registro-1").removeClass("oculto")
                    $("#form-registro-3").addClass("oculto")

                    sessionStorage.setItem( 'user' , JSON.stringify( respuesta.data ) )

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