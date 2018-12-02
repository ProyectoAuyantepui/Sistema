
<?php $titulo = "HORARIOS DE SECCIONES";?>
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
        <section class="row" >
         <div class="col s12 m3">
            <div class="card ">
              
              <div class="center-align green  tarjeta" >
                <img src="public/img/section.png" alt="" class="responsive-img " width="90">
                <p class="titulo-tarjeta" >HORARIOS DE SECCIONES</p>
              </div>
              <div class="card-content row">
                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                    <i class="material-icons left">settings</i>
                  Este módulo corresponde a la gestion de Horarios de Secciones en el sistema 
                </p>

                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                  

                    <i class="material-icons left">add</i>
                  Atraves de este modulo de Horarios de Secciones puede asignar actividades en al horario de la seccion
                </p>

                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                  

                    <i class="material-icons left">delete</i> 


                    <i class="material-icons left">edit</i>

                  Así como también modificar los datos de actividades o eliminar las actividades existentes en el horario de la seccion
                </p>

              </div>
            </div>
          </div>


          <div class="col m9">
            <div class="card ">

              <div class=" white-text" style="padding: 0px; margin:0px;">

                <nav class="primario">
                  <div class="nav-wrapper">
                    <form>
                      <div class="input-field">
                        <input id="search" type="search" name="filtro" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                      </div>
                    </form>
                  </div>
                </nav>

              </div>

              <div class="card-content" >


                
                 <table id="tabla_seccion" class="bordered highlight ">
                  <thead id="thead">
                    <tr id="thead">
                      <th >
                        <p ><strong>Codigo</strong></p>
                      </th>
                      <th >
                        <p><strong>Trayecto</strong></p>
                      </th>
                      <th >
                        <p><strong>Turno</strong></p>
                      </th>

                      <th ></th>
                      <th ></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table> 

                <div class="mensaje valign-wrapper grey-text">
                  <i class="material-icons left">close</i>
                  <h5 >No se encuentran resultados..</h5>
                </div>

              </div>
            </div>
          </div>
          
        </section>

        <div class="fixed-action-btn">

          <a href="?controlador=horarios&actividad=index" 
             class="btn-floating btn-large waves-effect waves-light  deep-orange  "  
          >
            <i class="material-icons ">arrow_back</i>
          </a>
        </div>
</main>

<div id="modal_operaciones" class="modal_fases_secciones modal bottom-sheet">

  <div class="modal-header secundario">
    <span class="white-text">Operaciones:<i class="modal-action modal-close material-icons right">close</i></span>
  </div>

  <div class="modal-content">

      <ul class="collection">
          <li class="collection-item avatar  opcion-para-no-asignadas">
            <i class="material-icons circle blue darken-3">looks_one</i>
            <a href="#" class="teal-text" onclick="consultarPorFase( 1 )"> Fase I</a>
          </li>

          <li class="collection-item avatar  opcion-para-asignadas">
            <i class="material-icons circle blue darken-3">looks_two</i>
            <a href="#" class="blue-text" onclick="consultarPorFase( 2 )"> Fase II</a>
          </li>          
      </ul>
  </div>

</div>

<?php require_once "app/vista/plantilla/__scripts.php";  ?> 
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script type="text/javascript">

  $(function(){ listar() })

  $('body').on('click','a.ver-horario',function(){

    var codigo_item_seleccionado = $(this).parents("tr").data("id")

    $.ajax({ 

      dataType : 'json' ,
      type:'POST' , 
      url:'index.php?controlador=secciones&actividad=consultar',
      data:{ "codSec" : codigo_item_seleccionado } 
    }) 
    .done(function(respuesta){
      localStorage.setItem( 'seccion_seleccionada' , JSON.stringify( respuesta.data ) )
      var seccion_seleccionada = JSON.parse( localStorage.getItem('seccion_seleccionada') )
      seccion_seleccionada["operacion_horario"] = 'consulta_de_horario'

      localStorage.setItem('seccion_seleccionada' , JSON.stringify(seccion_seleccionada) )
      $(".modal_fases_secciones").modal("open")
    })        
  })  

  $('body').on('click','a.ver-horario-pdf',function(e){
    e.preventDefault()
    var codigo_item_seleccionado = $(this).parents("tr").data("id")

    $.ajax({ 

      dataType : 'json' ,
      type:'POST' , 
      url:'index.php?controlador=secciones&actividad=consultar',
      data:{ "codSec" : codigo_item_seleccionado } 
    }) 
    .done(function(respuesta){
      localStorage.setItem( 'seccion_seleccionada' , JSON.stringify( respuesta.data ) )

      var seccion_seleccionada = JSON.parse( localStorage.getItem('seccion_seleccionada') )
      seccion_seleccionada["operacion_horario"] = 'reporte_en_pdf' 


      localStorage.setItem('seccion_seleccionada' , JSON.stringify(seccion_seleccionada) )
      $(".modal_fases_secciones").modal("open")
    })        
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
          if ( item.trayecto ==  0 ) { trayecto = "inicial" }
          else{ trayecto =  item.trayecto }

          content = `<tr data-id="${item.codSec }">
                      <td >${ item.codSec }</td>
                      <td >${ trayecto }</td>
                      <td >${ turno }</td>  
                      <td  >
                        <a href="#" class="ver-horario btn cyan" onclick=''>VER HORARIO</a>
                      </td> 
                      <td  >
                        <a href="#" 
                        target="__blank" class="ver-horario-pdf btn red">VER PDF</a>
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

  $("body").on( "keyup", "input[name=filtro]", function(){ 

    var filtro = $(this).val( )  
  })

  function consultarPorFase( fase_seleccionada ) {
    var seccion_seleccionada = JSON.parse( localStorage.getItem('seccion_seleccionada') )

    if ( seccion_seleccionada.operacion_horario == 'reporte_en_pdf' ) {

      window.document.location = '?controlador=reportes&actividad=reporte-horario-seccion&codSec=' + seccion_seleccionada.codSec + '&fase_seleccionada='+fase_seleccionada

    }else if ( seccion_seleccionada.operacion_horario == 'consulta_de_horario' ) {


      seccion_seleccionada["fase_seleccionada"] = fase_seleccionada 

      localStorage.setItem('seccion_seleccionada' , JSON.stringify(seccion_seleccionada) )
      $(location).attr('href', '?controlador=horariosSecciones&actividad=mostrar')
      
    }
    
  }
</script>
</body>
</html>