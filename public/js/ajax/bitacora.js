$(function(){

    listar()
})

$('.filtrar').on("click",function(evento){
	evento.preventDefault()
	$('#vistaFiltro').show()
	$('#movimientos').text("Filtrar Búsqueda")
	$('.filtrar').hide()
	$('.cancelar').removeClass('oculto')
})	

$('.cancelar').on("click",function(evento){
	evento.preventDefault()
	$('#vistaFiltro').hide()
	$('#movimientos').text("Moviminetos")
	$('.filtrar').show()
	$('.cancelar').addClass('oculto')
})	




$("#general").keyup(function(){
    if( $(this).val() != "")
    {
        $("#tabla_bitacora tbody>tr").hide()
        $("#tabla_bitacora td:buscar('" + $(this).val() + "')").parent("tr").show()
    }
    else
    {
        $("#tabla_bitacora tbody>tr").show()
    }
})


$.extend($.expr[":"], 
{
    "buscar": function(elem, i, match, array) 
	{
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
})

function listar(){

    var url = 'index.php?controlador=bitacora&actividad=listar'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){

        if (respuesta.length > 0) {
            
            $(".mensaje").hide()
            $("#tabla_bitacora").show()
            $("#tabla_bitacora tbody").html('')

            var content = $("")
            $.each(respuesta, function(i, item) {

                content = `<tr data-id="${item.codBit }">
                                
                                <td >${ item.cedula_usuario }</td>
                                <td >${ item.nombre_usuario }</td>
                                <td >${ item.rol_usuario }</td>
                                <td >${ item.accion }</td>
                                <td >${ item.fecha }</td>
                                <td >${ item.hora }</td>  
                            </tr>`

                $("#tabla_bitacora tbody").append(content)
              })

            $("#tabla_bitacora").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tabla_bitacora").hide()
            $(".mensaje").show()
            
        }
    })
}

