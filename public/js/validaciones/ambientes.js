$(".formCrearAmbiente").validate({

  messages: {
    
    codAmb:{
      required:"Introduzca un código",
      rangelength:"El rango debe estar entre 3 a 4 caracteres"
    },
    
    ubicacion:{
      required:"Por favor, especifique una ubicación",
      rangelength:"Indique una observación de entre 5 a 60 caracteres"
    },

    observaciones:{
      required:"Por favor, escriba una observación",
      rangelength:"Indique una observación de entre 10 a 150 caracteres"
    }
  }        
})

$(".formEditarAmbiente").validate({

  messages: {
    
    codAmb:{
      required:"Introduzca un código",
      rangelength:"El rango debe estar entre 3 a 4 caracteres"
    },
    
    ubicacion:{
      required:"Por favor, especifique una ubicación",
      rangelength:"Indique una observación de entre 5 a 60 caracteres"
    },

    observaciones:{
      required:"Por favor, escriba una observación",
      rangelength:"Indique una observación de entre 10 a 150 caracteres"
    }
  }        
})