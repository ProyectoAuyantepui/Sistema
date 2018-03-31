$(function(){ 
                  
            listar() 
        })

        function listar(){

            var url = 'index.php?controlador=secciones&actividad=listar'
            
            $.ajax({  url : url, type : 'POST', dataType : 'json' })

            .done(function(respuesta){
                
                if (respuesta.data.length > 0) {

                    $(".mensaje").hide()
                    $("table").show()
                    $("table tbody").html('')
                      
                      var content = $('')
                      var turno
                      var trayecto
                      var tipo

                      $.each(respuesta.data, function(i, item) {

                        if ( item.turno == 1 ) { turno = "mañana" }
                        if ( item.turno == 2 ) { turno = "tarde" }
                        if ( item.turno == 3 ) { turno = "noche" }

                        if ( item.trayecto ==  0 ) { 

                          trayecto = "inicial" 
                        }else{

                          trayecto =  item.trayecto
                        }

                        content = `<tr data-id="${item.codSec }">
                                                <td width="30%">${ item.codSec }</td>
                                                <td width="30%">${ trayecto }</td>
                                                <td width="30%">${ turno }</td>  
                                                <td width="5%" >
                                                    <a href="#" class="mostrarOperaciones">
                                                        <i class="material-icons black-text">more_vert</i>
                                                    </a>
                                                </td> 
                                            </tr>`

                        $("table tbody").append(content)
                      })

                    $("table").paginationTdA({ elemPerPage: 4 })
                }else{
                    $("table").hide()
                    $(".mensaje").show()
                    
                }
            })
        }

        function buscar( filtro ){

            var url = 'index.php?controlador=secciones&actividad=buscar'
            
            $("table tbody").html('')
            var content = $('')
            
            $.ajax({  url : url, type : 'POST', data : { "filtro" : filtro }, dataType : 'json' })

            .done(function(respuesta){
                
                if (respuesta.operacion == true) {

                    $(".mensaje").hide()
                    $("table").show()      
                      
                    var turno
                    var trayecto
                    var tipo

                    $.each(respuesta.data, function(i, item) {

                        if ( item.turno == 1 ) { turno = "mañana" }
                        if ( item.turno == 2 ) { turno = "tarde" }
                        if ( item.turno == 3 ) { turno = "noche" }

                        if ( item.trayecto ==  0 ) { 

                          trayecto = "inicial" 
                        }else{

                          trayecto =  item.trayecto
                        }

                        content += `<tr data-id="${item.codSec }">>
                                                <td width="20%">${ item.codSec }</td>
                                                <td width="20%">${ trayecto }</td>
                                                <td width="20%">${ turno }</td>
                                                <td width="10%" >
                                                    <a href="#" class="mostrarOperaciones">
                                                        <i class="material-icons black-text">more_vert</i>
                                                    </a>
                                                </td>   
                                            </tr>`

                        $("table tbody").html( content )
                    })

                    $("table").paginationTdA({ elemPerPage: 4 })
                }else{

                    $(".mensaje").show()
                   $("table").hide() 
                }
            })
        }

        $("body").on( "keyup", "input[name=filtro]", function(){ 

            var filtro = $(this).val( )
            
            buscar( filtro ) 
        })