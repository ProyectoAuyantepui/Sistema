$(".formCrearDependencia").validate({

  messages: {
    
    nombre:{
      required:"Por favor, especifique un nombre",
      rangelength:"Indique un nombre de 2 a 50 carácteres"
    },

    descripcion:{
      required:"Por favor, describa una descripción",
      rangelength:"Indique una observación de entre 10 a 120 caracteres"
    }
  }        
})

$(".formEditarDependencia").validate({

  messages: {
    
    nombre:{
      required:"Por favor, especifique un nombre",
      rangelength:"Indique un nombre de 2 a 50 carácteres"
    },

    descripcion:{
      required:"Por favor, describa una descripción",
      rangelength:"Indique una observación de entre 10 a 120 caracteres"
    }
  }        
})