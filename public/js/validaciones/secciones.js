$(".formCrearSeccion").validate({

  messages: {
    
    codSec:{
      required:"Introduzca un código",
      pattern:"El rango debe estar entre 3 a 4 caracteres"
    },
    matricula:{
      required:"Introduzca una cantidad valida",
      pattern:"Error"
    },
    observaciones:{
      required:"Introduzca una observacion"
    }
  }        
})


$(".formEditarSeccion").validate({

  messages: {
    
    matricula:{
      required:"Introduzca una cantidad valida",
      pattern:"Error"
    },
    observaciones:{
      required:"Introduzca una observacion"
    }
  }        
})
