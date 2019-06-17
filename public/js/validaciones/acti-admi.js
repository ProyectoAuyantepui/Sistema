$(".formCrearActAdm").validate({

  messages: {
    
    titulo:{
      required:"Introduzca un título",
      rangelength:"El rango debe estar entre 3 a 60 carácteres"
    },
    
    dependencia:{
      required:"Por favor, especifique una Dependencia",
      rangelength:"Indique una dependencia de 3 a 300 caráteres"
    },

    observaciones:{
      required:"Por favor, escriba una observación",
      rangelength:"Indique una observación de entre 10 a 150 carácteres"
    }
  }        
})

$(".formEditarActAdm").validate({

  messages: {
    
    titulo:{
      required:"Introduzca un título",
      rangelength:"El rango debe estar entre 3 a 60 carácteres"
    },
    
    dependencia:{
      required:"Por favor, especifique una Dependencia",
      rangelength:"Indique una dependencia de 3 a 300 caráteres"
    },

    observaciones:{
      required:"Por favor, escriba una observación",
      rangelength:"Indique una observación de entre 10 a 150 carácteres"
    }
  }        
})