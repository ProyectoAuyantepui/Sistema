
  

$('#form-registro-1').validate({
  messages:{
    cedDoc: {
      required: "Debe introducir una cedula de identidad",
      pattern: "Introduzca 6 u 8 digitos, no use letras ni caracteres especiales"
    },
      
    nombre: {
      required:"Por favor, especifique su Nombre",
      pattern:"Solo se admiten letras",
      rangelength:"Por favor introduzca un nombre de 2 a 20 caracteres"
    },
      
    apellido:{
      required:"Por favor, especifique su Apellido",
      pattern:"Solo se admiten letras",
      rangelength:"Por favor introduzca un apellido de 2 a 20 caracteres"
    },
                    
    telefono:{
      required:"Por favor proporcione un numero de teléfono",
      pattern:"Ingrese un Nro. telefonico valido ej: 02511234567"
    },
                    
      
                    
    direccion:{
      required:"Por favor, especifique su Direccion",
      rangelength:"Por favor introduzca una direccion de 1 a 120 caracteres"
    },
    
    fecNac:{
      required:"seleccione"
    }
  }
})


$('#form-registro-2').validate({
  messages:{
    fecCon:{
      required:"seleccione"
    },
      
    fecIng:{
      required:"seleccione"
    },

    condicion:{
      required:"seleccione"
    },
      
    dedicacion:{
      required:"seleccione"
    },

    dependencia:{
      required:"seleccione"
    },

    codCat:{
      required:"seleccione"
    }
  }
})



$('#form-registro-3').validate({
  messages:{
    clave:{
      required:"Introduzca una clave",
      rangelength:"Por favor introduzca un valor de 6 a 8 caracteres"
    },

    cclave:{
      required:"Por favor, confirme la clave ingresada clave",
      equalTo:"Las contraseñas no coinciden"
    },

    usuario:{
        required:"Ingrese un nombre de usuario",
        rangelength:"Por favor introduzca un valor de 6 a 15 caracteres"
    },
    
    correo: {
        required: "Por favor especifique su correo electronico",
        email: "La sintaxis correcta deberia ser: nombre@dominio.com"
    }
  }
})


