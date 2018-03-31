$(".formCrearComision").validate({

  messages: {
    
    nombre:{
      required:"Introduzca un Nombre",
      rangelength:"El nombre debe ser de entre 3 a 60 caracteres"
    },

    dependencia:{
      required:"Por favor, escriba una dependencia"
    },

    descripcion:{
      required:"Por favor, escriba una descripción"
    }
  }        
})

$(".formEditarComision").validate({

  messages: {
    
    nombre:{
      required:"Introduzca un Nombre",
      rangelength:"El nombre debe ser de entre 3 a 60 caracteres"
    },

    dependencia:{
      required:"Por favor, escriba una dependencia"
    },

    descripcion:{
      required:"Por favor, escriba una descripción"
    }
  }        
})