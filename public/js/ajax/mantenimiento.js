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
        $("#tablaRestore tbody>tr").hide()
        $("#tablaRestore td:buscar('" + $(this).val() + "')").parent("tr").show()
    }
    else
    {
        $("#tablaRestore tbody>tr").show()
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

    var url = 'index.php?controlador=mantenimiento&actividad=listarBackups'
    
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
        if (respuesta.length > 0) {
            
            $(".mensaje").hide()
            $("#tablaRestore").show()
            $("#tablaRestore tbody").html('')

            var content = $("")
            $.each(respuesta, function(i, item) {

                content = `<tr data-id="${i }">
                                
                                <td id="title-backup">${ item.substr(15) }</td>
                                <td>${ item.substr(24,10) }</td>
                                <td class="disabled_for_temp_database">
                                    <a href="#" onclick="mostrarOperaciones('${item.substr(15)}')">
                                        <i class="material-icons black-text">more_vert</i>
                                    </a>
                                </td>   
                            </tr>`

                $("#tablaRestore tbody").append(content)
              })

            $("#tablaRestore").paginationTdA({ elemPerPage: 8 })
        }else{
            $("#tablaRestore").hide()
            $(".mensaje").show()
            
        }
    })
}

$("#createBackup").on("click",function(){ 
    var datos = new FormData();
    datos.append("createBackup",'param');
    $.ajax({ 
        dataType : 'json',
        url:'index.php?controlador=mantenimiento&actividad=createBackup',
        method:"POST",
        data:datos,
        cache: false,
        contentType:false,
        processData:false
    })                      
    .done(function(respuesta){
      listar()
      Materialize.toast('Backup Creado Exitosamente',3000)
      $("#modal_operaciones").modal("close")
    })       
})

function mostrarOperaciones(item){
$("#modal_operaciones").modal("open")
$(".reset-backup").on("click",function(){ 
    var datos = new FormData();
    datos.append("backupR",item);
    $.ajax({ 
        dataType : 'json',
        url:'index.php?controlador=mantenimiento&actividad=resetCopyBackup',
        method:"POST",
        data:datos,
        cache: false,
        contentType:false,
        processData:false
    })                      
    .done(function(respuesta){
      Materialize.toast('Operación realizada Exitosamente! Acceda a un módulo...',3000)
      $("#modal_operaciones").modal("close")
    })       
})
}

   

