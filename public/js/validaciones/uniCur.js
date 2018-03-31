$(".formCrearUnidadCurricular").validate({

  messages: {
    
    codUniCur:{
      required:"Introduzca un código",
      rangelength:"El código debe ser de 3 o 10 caracteres"
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