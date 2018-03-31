

/*

DESCRIPCION : 

*/
$(function(){
    
    var OUser = JSON.parse( localStorage.getItem( 'user' ) )

    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=permisologia&actividad=consultar',
        data:{
          "codRol" : OUser.rol.codRol
        }
    }) 

    .done(function(respuesta){
        
        $.each( respuesta.data , function (i,item) {

            $("ul li[codMod="+item.codMod+"]").removeClass("oculto")
            
        })
     })
})






