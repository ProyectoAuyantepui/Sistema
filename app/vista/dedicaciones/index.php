
<?php $titulo = "DEDICACIONES DE DOCENTES";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
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
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >DEDICACIONES DE DOCENTES</p>
        </div>
        <div class="card-content row">
          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating btn pulse  waves-effect  primario">
              <i class="material-icons left">settings</i>
            </a>
            Este módulo corresponde a la gestion y configuracion de Dedicaciones de Docentes en el sistema 
          </p>

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            <a class="btn-floating btn waves-effect  green">
              <i class="material-icons left">access_time</i>
            </a>

            A traves de este modulo puede modificar el rango de horas de una de dicacion de docente.
          </p>

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
                  NOMBRE
                </th>
                <th >
                  CANTIDAD MINIMA DE HORAS
                </th>
                <th >
                  CANTIDAD MAXIMA DE HORAS
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($dedicaciones["data"] as $dedicacion): ?>
                <tr codDed="<?= $dedicacion->codDed ?>">
                  <td> <?= $dedicacion->nombre ?> </td>

                  <td> 
                    <p class="range-field">
                      <input type="range" id="minHor" name="minHor" min="0" max="100" value='<?= $dedicacion->minHor ?>' />
                    </p> 
                  </td>

                  <td> 
                    <p class="range-field">
                      <input type="range" id="maxHor" name="maxHor" min="0" max="100" value='<?= $dedicacion->maxHor ?>' />
                    </p> 
                  </td>

                </tr>
              <?php endforeach ?>
            </tbody>
          </table> 
          
          <div class="row">
            <div class="col s12 input-field">
              <button 
                type="button" 
                class="btn btn-large waves-effect waves-light primario"
                onclick='
                    var array_dedicaciones = []
                    $("#tabla_dedicaciones tbody tr").each(function(i,item){

                      array_dedicaciones.push({
                        "codDed" : $(this).attr("codDed"),
                        "minHor" : $(this).find("td input[name=minHor]").val(),
                        "maxHor" : $(this).find("td input[name=maxHor]").val()
                      })
                    })

                    $.ajax({ 
                      "dataType"  : "json" ,
                      "type" : "POST" ,
                      "url" : "index.php?controlador=dedicaciones&actividad=cambiar-configuracion",
                      "data" : {
                        "configuracion" : array_dedicaciones
                      }
                    }) 
                    .done(function(respuesta){
                      if (respuesta.operacion == true) {

                        Materialize.toast("Listo...",997)
                                                       
                      }else{

                        Materialize.toast("Error...",997)
                      }
                    })  
                '  
              > Guardar configuracion
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
  
</script>
</body>
</html>