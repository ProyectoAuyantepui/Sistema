<?php $titulo = "Consultas rapidas de horarios";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <link rel="stylesheet" type="text/css" href="public/css/estilos_de_horario.css">
    <title>Auyantepui - <?= $titulo ?></title>

</head>
<body>
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>
<main >
           
  <section class="row ">
    <div class="col s12 m10 offset-m1">
      
      <div class="card white">
        

        <div class="teal tarjeta white-text" >
          <div class="row">
            <div class="col s12">

              <span class="card-title">
                <i class="material-icons left">search</i>
                CONSULTA RAPIDA DE HORARIOS
                <a href="#" class="white-text">
                  <i class="material-icons right" >close</i>
                </a>
              </span>          

              <p class="valign">
                
                Atraves de este modulo puede consultar de forma rapida y exacta los horarios o la disponibilidad de ambientes , docentes o secciones en un bloque en especifico.
              </p>
            </div>
          </div>  
        </div>

        <div class="card-content ">
         

          <div class="row formularios">
            
            <div class="col s12">
              <form id="formHorarioSeccion">
                
                <div class="row">
                  <div class="col s12 m8 input-field">
                    <i class="material-icons prefix">search</i>


                    <input id="filtro" name="filtro" type="text"  onkeyup='buscarPorTermino($(filtro))' >
                    <label for="filtro">Escriba una palabra clave...</label>
                  </div>
                  
                  <div class="col s12 m4 ">
                    <br>
                    <p>
                      <input name="tipo_consulta" type="radio" id="tipo_consulta1" checked="checked" value="CD" />
                      <label for="tipo_consulta1">Disponibilidad</label>
                      <input name="tipo_consulta" type="radio" id="tipo_consulta2" value="CHC" />
                      <label for="tipo_consulta2">Horario completo</label>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="row resultados_busqueda oculto" style="padding: 0px;">
            <div class="col s4 resultados_docentes">
              <p class="flow-text ">Docentes <span class="right cantidad_de_encontrados"></span></p>
              <ul class="collection " >
              </ul>
              
            </div>
            <div class="col s4 resultados_secciones">
              <p class="flow-text ">Secciones <span class="right cantidad_de_encontrados"></span></p>
              <ul class="collection " >
              </ul>
              
            </div>
            <div class="col s4 resultados_ambientes">
              <p class="flow-text ">Ambientes <span class="right cantidad_de_encontrados"></span></p>
              <ul class="collection " >
              </ul>
            </div>
          </div>

          <div class="row plantilla oculto">
            <div class="col s6 fase oculto ">
              <button 
                class='btn primario fase' 
                title="Fase 1" onclick="realizarConsultaDisponibilidad(1)"> Fase 1 </button>
              <button 
                class=' btn primario fase' 
                title="Fase 2" onclick="realizarConsultaDisponibilidad(2)"> Fase 2 </button>
            </div>

          <div class="row plantilla oculto">
            <div class="col s6 botones-de-turnos oculto ">
              <button 
                class='btn primario ' 
                title="Turno Mañana" 
                onclick='
                  $("div .turno1").show() 
                  $("div .turno2").hide() 
                  $("div .turno3").hide()
                '> Mañana </button>
              <button 
                class=' btn primario ' 
                title="Turno Tarde"
                onclick='
                  $("div .turno1").hide() 
                  $("div .turno2").show() 
                  $("div .turno3").hide()
                '
              > 
                Tarde </button>
              <button 
                class=' btn primario ' 
                title="Turno Noche"
                onclick='
                  $("div .turno1").hide() 
                  $("div .turno2").hide() 
                  $("div .turno3").show()
                '
                > 
                Noche </button>
            </div>
            <div class="col s6 btn-generar-consulta oculto right-align">
              <button 
                class='btn deep-orange' 
                title="Generar Consulta" 
                onclick='
                  realizarConsultaDisponibilidad(  )
                ' 
                > GENERAR CONSULTA </button>
            </div>

            <div class="col s6 btn-limpiar-consulta oculto right-align">
              <button 
                class='btn deep-orange' 
                title="Limpiar Consulta" 
                onclick='
                  limpiarConsultaSeccion();
                ' 
                > LIMPIAR CONSULTA </button>
            </div>
            <?php require_once "app/vista/horarios/plantilla_de_consulta.php"; ?>
          </div>

          <div class="row resultados-disponibilidad oculto">
            <div class="col s12">
              
              <table class="highlight bordered centered " id="tabla_disponibilidad">  
                
              </table>

            </div>
          </div>
        </div>            
      </div>
    </div>
    
  </section>

  <div class="fixed-action-btn ">
    <a href="?controlador=horarios&actividad=consulta-rapida-horarios" class="oculto btn-atras btn-floating btn-large waves-effect waves-light  deep-orange  left" >
      <i class="material-icons ">arrow_back</i>
    </a>
  </div>

</main>


<?php require_once "app/vista/plantilla/__scripts.php";  ?>

<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/ajax/consultas-rapidas.js"></script>

</body>
</html>