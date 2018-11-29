$(".formCrearEje").validate({

  messages: {
    
    nombre:{
      required:"Introduzca un Nombre",
      rangelength:"El nombre debe ser de entre 3 a 60 caracteres"
    },

    descripcion:{
      required:"Por favor, escriba una descripción",
      rangelength:"Indique una observación de entre 10 a 150 caracteres"
    }
  }        
})

$(".formEditarEje").validate({

  messages: {
    
    nombre:{
      required:"Introduzca un Nombre",
      rangelength:"El nombre debe ser de entre 3 a 60 caracteres"
    },

    descripcion:{
      required:"Por favor, escriba una descripción",
      rangelength:"Indique una observación de entre 10 a 150 caracteres"
    }
  }        
})