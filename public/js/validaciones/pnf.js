$(".formCrearPnf").validate({

  messages: {
    
    codPnf:{
      required:"Introduzca un código",
      maxlength:"introduzca un valor valido entre 4 y 6 caracteres"
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