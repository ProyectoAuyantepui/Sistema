<?php $titulo = "Gestión de Horas";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <title>Auyantepui - <?= $titulo ?></title>
</head>
<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>
<main>
  <section class="row" id="tarjetaDedicaciones">
   <div class="col s12 m3">
      <div class="card ">
        
        <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/dedicated.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >Gestión de Horas</p>
        </div>
        <div class="card-content row">
          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating primario">
              <i class="material-icons left">settings</i>
            </a>
            Este módulo corresponde a la gestion y configuracion de Horas en el sistema 
          </p>

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating green">
              <i class="material-icons left">access_time</i>
            </a>

            A traves de este modulo puede modificar el rango de cada hora Académica.
          </p>
          <p>
            <span style="color:red">Noticia:</span> Tenga en cuenta que esto modificará cada Horario registrado.</p>
        </div>
      </div>
    </div>


    <div class="col m9">
      <div class="card ">

        <div class="card-content" >
          <table class=" bordered highlight" id="tabla_dedicaciones">
            <thead id="thead">
              <tr id="thead">
                <th >
                  HORA INICIAL
                </th>
                <th >
                  HORA FINAL
                </th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td>
                  	<span>Bloque: 1</span>
                  	<input type="text" class="timepicker hour" id="H-01-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 1</span>
                  	<input type="text" class="timepicker hour" id="H-01-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 2</span>
                  	<input type="text" class="timepicker hour" id="H-02-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 2</span>
                  	<input type="text" class="timepicker hour" id="H-02-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 3</span>
                  	<input type="text" class="timepicker hour" id="H-03-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 3</span>
                  	<input type="text" class="timepicker hour" id="H-03-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 4</span>
                  	<input type="text" class="timepicker hour" id="H-04-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 4</span>
                  	<input type="text" class="timepicker hour" id="H-04-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 5</span>
                  	<input type="text" class="timepicker hour" id="H-05-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 5</span>
                  	<input type="text" class="timepicker hour" id="H-05-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 6</span>
                  	<input type="text" class="timepicker hour" id="H-06-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 6</span>
                  	<input type="text" class="timepicker hour" id="H-06-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 7</span>
                  	<input type="text" class="timepicker hour" id="H-07-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 7</span>
                  	<input type="text" class="timepicker hour" id="H-07-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 8</span>
                  	<input type="text" class="timepicker hour" id="H-08-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 8</span>
                  	<input type="text" class="timepicker hour" id="H-08-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 9</span>
                  	<input type="text" class="timepicker hour" id="H-09-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 9</span>
                  	<input type="text" class="timepicker hour" id="H-09-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 10</span>
                  	<input type="text" class="timepicker hour" id="H-10-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 10</span>
                  	<input type="text" class="timepicker hour" id="H-10-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 11</span>
                  	<input type="text" class="timepicker hour" id="H-11-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 11</span>
                  	<input type="text" class="timepicker hour" id="H-11-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 12</span>
                  	<input type="text" class="timepicker hour" id="H-12-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 12</span>
                  	<input type="text" class="timepicker hour" id="H-12-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 13</span>
                  	<input type="text" class="timepicker hour" id="H-13-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 13</span>
                  	<input type="text" class="timepicker hour" id="H-13-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 14</span>
                  	<input type="text" class="timepicker hour" id="H-14-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 14</span>
                  	<input type="text" class="timepicker hour" id="H-14-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 15</span>
                  	<input type="text" class="timepicker hour" id="H-15-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 15</span>
                  	<input type="text" class="timepicker hour" id="H-15-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 16</span>
                  	<input type="text" class="timepicker hour" id="H-16-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 16</span>
                  	<input type="text" class="timepicker hour" id="H-16-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 17</span>
                  	<input type="text" class="timepicker hour" id="H-17-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 17</span>
                  	<input type="text" class="timepicker hour" id="H-17-out"> 
                  </td>
                </tr>
                <tr>
                  <td>
                  	<span>Bloque: 18</span>
                  	<input type="text" class="timepicker hour" id="H-18-int"> 
                  </td>
                  <td>
                  	<span>Bloque: 18</span>
                  	<input type="text" class="timepicker hour" id="H-18-out"> 
                  </td>
                </tr>
            </tbody>
          </table> 
          
          <div class="row disabled_for_temp_database">
            <div class="col s12 input-field">
              <button type="button" class="btn btn-large waves-effect waves-light primario"> Guardar configuracion
                <i class="material-icons right">check</i>
              </button>
            </div>
          </div>

        </div>
      </div>
    </div>
    
  </section>

</main>


<?php require_once "app/vista/plantilla/__scripts.php";  ?> 
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script type="text/javascript">
  
$(function(){ 
    listarHoras() 
})

function listarHoras() {
        $.ajax({ 
            dataType : 'json' ,
            type:'POST' , 
            url:'index.php?controlador=horas&actividad=obtenerHoras'
        }) 
        .done(function(respuesta){
        	$.each(respuesta.data, function(i, item) {
        		$("#"+item.codHor+'-int').val(item.horEnt)
        		$("#"+item.codHor+'-out').val(item.horSal)
        	})
        })
}
</script>
</body>
</html>