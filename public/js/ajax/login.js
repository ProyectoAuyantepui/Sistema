$(".form-login").on("submit",function(event){
    event.preventDefault()
    if ( !$(this).valid() ) { return false; }

    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=login&actividad=iniciar-sesion',
        data:{
          "clave" : $(".form-login input[name=clave]").val( ),
          "usuario" : $(".form-login input[name=usuario]").val( )
        } 
    })                      
    .done(function(respuesta){

        if (respuesta.operacion == true) {

            $("form input").val( "" )

            localStorage.setItem( 'user' , JSON.stringify( respuesta.data ) )
            //var o = JSON.parse( localStorage.getItem( 'user' ) )
            //console.log('objetoObtenido: ', o.rol[0].nombre )
            //console.log(  respuesta.data.rol.nombre )
            //console.log(  respuesta )
            
            
            Materialize.toast('Bienvenido '+ respuesta.data.nombre +'...',1700,'',function(){ location.href = '?controlador=home&actividad=index' });
                                 
        }else{
          $("form input").addClass( "invalid" )
          Materialize.toast('Error...',1997);
            
        }
    })
})