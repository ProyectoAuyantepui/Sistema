$(".formCrearUnidadCurricular").validate({

  messages: {
    
    codUniCur:{
      required:"Introduzca un código",
      rangelength:"El código debe ser de 3 o 10 caracteres"
    },
    nombre:{
      required:"Introduzca un Nombre",
      rangelength:"El código debe ser de 3 o 10 caracteres"
    },
    trayecto:{
      required:"Introduzca un trayecto"
    },
    uniCre:{
      required:"Introduzca un número de Unidades de Crédito"
    },
    htas:{
      required:"Introduzca un número de horas administrativas"
    },
    htis:{
      required:"Introduzca un número de horas académicas"
    },

    observaciones:{
      required:"Por favor, escriba una observación",
      rangelength:"Indique una observación de entre 10 a 150 caracteres"
    }
  }        
})

$(".formEditarUnidadCurricular").validate({

  messages: {
    nombre:{
      required:"Introduzca un Nombre",
      rangelength:"El código debe ser de 3 o 10 caracteres"
    },
    trayecto:{
      required:"Introduzca un trayecto"
    },
    uniCre:{
      required:"Introduzca un número de Unidades de Crédito"
    },
    htas:{
      required:"Introduzca un número de horas administrativas"
    },
    htis:{
      required:"Introduzca un número de horas académicas"
    },

    observaciones:{
      required:"Por favor, escriba una observación",
      rangelength:"Indique una observación de entre 10 a 150 caracteres"
    }
  }        
})