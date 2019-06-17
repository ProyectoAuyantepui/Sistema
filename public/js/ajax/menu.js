

/*

DESCRIPCION : 

*/
$(function(){
    
    var OUser = JSON.parse( localStorage.getItem( 'user' ) )

    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=roles&actividad=consultar-permisos',
        data:{
          "codRol" : OUser.rol.codRol
        }
    }) 

    .done(function(respuesta){
        
        $.each( respuesta.data , function (i,item) {

            $("ul li[codPer="+item.codPer+"]").removeClass("oculto")
            
        })
     })
})






