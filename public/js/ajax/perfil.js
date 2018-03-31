$(function(){
  
  var OUser = JSON.parse( localStorage.getItem( 'user' ) )
 
  $.getJSON('?controlador=categorias&actividad=listar',function(respuesta){

    $.each( respuesta.data, function( i , item ){

      $(".input-field select#codCatDoc").append(`<option value="${item.codCatDoc}">${item.nombre}</option>`)
    })

    $('select#codCatDoc').val( OUser.categoria.codCatDoc )
  })
  
  $("input[name=nombre]").val( OUser.nombre )
  $("input[name=apellido]").val( OUser.apellido )
  $("input[name=fecNac]").val( OUser.fecNac )
  $("input[name=telefono]").val( OUser.telefono )
  $("input[name=direccion]").val( OUser.direccion )
  $("input[name=fecIng]").val( OUser.fecIng )
  $("input[name=fecCon]").val( OUser.fecCon )
  $("input[name=correo]").val( OUser.correo )
  $("input[name=usuario]").val( OUser.usuario )
  $('select#dedicacion').val( OUser.dedicacion )
  $('select#condicion').val( OUser.condicion )

  var contentComisiones = $("")
  $.each( OUser.comisiones ,function( i , item ){
      contentComisiones = `<li class="collection-item">
                    <span class="title">${item.nombre}</span>
                    <a href="#!" class="right">
                      <i class="material-icons">close</i>
                    </a>
                  </li>`
      $("ul.comisiones").append( contentComisiones )
  })

  var contentDependencias = $("")
  $.each( OUser.comisiones ,function( i , item ){
      contentDependencias = `<li class="collection-item">
                    <span class="title">${item.nombre}</span>
                    <a href="#!" class="right">
                      <i class="material-icons">close</i>
                    </a>
                  </li>`
      $("ul.dependencias").append( contentDependencias )
  })
})


