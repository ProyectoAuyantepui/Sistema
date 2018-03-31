$(".formCrearPnf").validate({

  messages: {
    
    codPnf:{
      required:"Introduzca un código"
    },
    
    alias:{
      required:"Por favor, especifique un alias"
    },

    descripcion:{
      required:"Por favor, describa una descripción"
    }
  }        
})

$(".formEditarPnf").validate({

  messages: {
    
    alias:{
      required:"Por favor, especifique un alias"
    },

    descripcion:{
      required:"Por favor, describa una descripción"
    }
  }        
})