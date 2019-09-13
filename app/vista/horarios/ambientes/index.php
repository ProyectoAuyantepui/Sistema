
<?php $titulo = "HORARIOS DE AMBIENTES";?>
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
        <section class="row" >
         <div class="col s12 m3">
            <div class="card ">
              
              <div class="center-align deep-orange tarjeta" >
                <img src="public/img/institution.png" alt="" class="responsive-img " width="90">
                <p class="titulo-tarjeta" >HORARIOS DE AMBIENTES</p>
              </div>

              <div class="card-content row">
                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                  <a class="btn-floating primario">
                    <i class="material-icons left">settings</i>
                  </a>
                  Este módulo corresponde a la gestion de Horarios de Ambientes en el sistema. 
                </p>

                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                          
                  <a class="btn-floating green">
                    <i class="material-icons left">search</i>
                  </a>
                  Atraves de este modulo de Horarios de Ambientes puede consultar el horario de un ambiente existente en el sistema, siempre y cuando este tenga actividades.
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


                
                 <table id="tabla_ambientes" class="bordered highlight ">
                  <thead id="thead">
                    <tr id="thead">
                      <th >
                        <p ><strong>Codigo</strong></p>
                      </th>
                      <th >
                        <p><strong>Ubicacion</strong></p>
                      </th>
                      <th >
                        <p><strong>Tipo</strong></p>
                      </th>

                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table> 

                <div class="mensaje valign-wrapper grey-text">
                  <i class="material-icons left">close</i>
                  <h5 >No se encuentran resultados..</h5>
                </div>

              </div>
            </div>
          </div>
          
        </section>
</main>
<div class="fixed-action-btn">
  <a href="?controlador=horarios&actividad=index" class="btn-floating btn-large waves-effect waves-light  deep-orange  " >
    <i class="material-icons ">arrow_back</i>
  </a>
</div>
<?php require_once "app/vista/plantilla/__scripts.php";  ?> 
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script type="text/javascript">

  $(function(){  listar() })
              
  $('body').on('click','a.ver-horario',function(){

    var codigo_item_seleccionado = $(this).parents("tr").data("id")
    $.ajax({ 

      dataType : 'json' ,
      type:'POST' , 
      url:'index.php?controlador=ambientes&actividad=consultar',
      data:{ "codAmb" : codigo_item_seleccionado } 
     }) 
    .done(function(respuesta){
      sessionStorage.setItem( 'ambiente_seleccionado' , JSON.stringify( respuesta.data ) )
      $(location).attr('href', '?controlador=horariosAmbientes&actividad=mostrar')
    })             
  })
  
  function listar(){

    var url = 'index.php?controlador=horariosAmbientes&actividad=ambientes-con-horario'
                          
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
                              
      if (respuesta.data.length > 0) {
                                  
        var content = $("")
        $(".mensaje").hide()
        $("table").show()
        $("table tbody").html('')
        var content = $("")
        var switche 
        var tipo

        $.each(respuesta.data, function(i, item) {

          if ( item.tipo == 1 ) { tipo = "salon" }
          if ( item.tipo == 2 ) { tipo = "cancha" }
          if ( item.tipo == 3 ) { tipo = "sala de reunion" }
          if ( item.tipo == 4 ) { tipo = "otros" }

                                     


            content = `<tr data-id="${item.codAmb }">
                          <td >${ item.codAmb }</td>
                          <td >${ item.ubicacion }</td>
                          <td>${ tipo }</td>                                                  
                          <td  >
                            <a href="#" class="ver-horario btn cyan">VER HORARIO</a>
                          </td> 
                          <td  >
                            <a href="?controlador=reportes&actividad=reporte-horario-ambiente&codAmb=${item.codAmb}" 
                            target="__blank" class=" btn red">VER PDF</a>
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
</script>
</body>
</html>