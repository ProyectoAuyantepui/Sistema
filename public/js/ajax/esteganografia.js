//Esteganografía

function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

function preview_image1(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image1');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

$(".esteganografia").on("click",function() {
    $("#modal_solImgSte").modal("open")
})

$("#submitImgSte").on("click",function(){
var OUser = JSON.parse( sessionStorage.getItem( "user" ) )
var cedDoc = OUser.cedDoc
var imgSte= $('#imgSteSubmit').prop('files')[0];
var datos = new FormData();

datos.append("cedDocLinkSte",cedDoc);
datos.append("imgSteUpload",imgSte);
$.ajax({ 
    dataType : 'json',
    url:'index.php?controlador=docentes&actividad=obbImgSte',
    method:"POST",
    data:datos,
    cache: false,
    contentType:false,
    processData:false
})                      
.done(function(respuesta){
  Materialize.toast('Revise la bandeja de su correo y suba la imagen que le fue enviada!',4000)
  $("#modal_solImgSte").modal("close")
  $("#modal_upImgSte").modal("open")
})                 

})

$("#upImgSte").on("click",function(){
var OUser = JSON.parse( sessionStorage.getItem( "user" ) )
var cedDoc = OUser.cedDoc
var confirmPass=$("#confirmPass").val()
var imgSte= $('#imgUpSubmit').prop('files')[0];
var datos = new FormData();

datos.append("cedDocComparedSte",cedDoc);
datos.append("imgSteCompared",imgSte);
datos.append("confirmPass",confirmPass);
$.ajax({ 
    dataType : 'json',
    url:'index.php?controlador=docentes&actividad=compararTextSte',
    method:"POST",
    data:datos,
    cache: false,
    contentType:false,
    processData:false
})                      
.done(function(respuesta){
  if (respuesta.codError==1) {
    Materialize.toast('La imagen seleccionada no coincide con la enviada a su correo!',4000)
    return false;
  }
  else if (respuesta.data==true) {
    postEsteganografia(imgSte['name'])
  }else{
    Materialize.toast('La imagen seleccionada no coincide con la enviada a su correo!',4000)
  }
})                 

})