<?php $titulo = "HORARIOS DE DOCENTES";?>
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
              
              <div class="center-align cyan tarjeta" >
                <img src="public/img/avatar/user05.png" alt="" class="responsive-img " width="90">
                <p class="titulo-tarjeta" >HORARIOS DE DOCENTES</p>
              </div>
              <div class="card-content row" >
                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                  <a class="btn-floating   primario">
                    <i class="material-icons left">settings</i>
                  </a>
                  Este módulo corresponde a la gestion de Horarios de Docentes en el sistema. 
                </p>

                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                          
                  <a class="btn-floating cyan">
                    <i class="material-icons left">add</i>
                  </a>
                  Atraves de este modulo de Horarios de Docentes puede asignar actividades administrativas en al horario del docente.
                </p>

                <p class="col s12" style="padding: 10px 1px 1px 1px;">
                          
                  <a class="btn-floating red">
                    <i class="material-icons left">delete</i> 
                  </a>

                  <a class="btn-floating green">
                    <i class="material-icons left">edit</i>
                  </a>

                  Así como también modificar los datos de actividades o eliminar las actividades administrativas existentes en el horario del docente.
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


                
                 <table id="tabla_docentes" class="bordered highlight ">
                  <thead id="thead">
                    <th >
                      <p><strong>Cedula</strong></p>
                    </th>
                    <th >
                      <p><strong>Nombre</strong></p>
                    </th>
                    <th >
                      <p><strong>Apellido</strong></p>
                    </th>

                    <th ></th>
                    <th ></th>
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

          <a href="?controlador=horarios&actividad=index" class="btn-floating btn-large waves-effect waves-light  deep-orange  " >
            <i class="material-icons ">arrow_back</i>
          </a>
        </div>
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?> 
<script src="public/vendor/paginacion.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script type="text/javascript">                    

  $(function(){  listar()  })
                    
  $('body').on('click','a.ver-horario',function(){

    var codigo_item_seleccionado = $(this).parents("tr").data("id")

    $.ajax({ 

      dataType : 'json' ,
      type:'POST' , 
      url:'index.php?controlador=docentes&actividad=consultar',
      data:{ "cedDoc" : codigo_item_seleccionado } 
    }) 
    .done(function(respuesta){

      sessionStorage.setItem( 'docente_seleccionado' , JSON.stringify( respuesta.data ) )
      $(location).attr('href', '?controlador=horariosDocentes&actividad=mostrar')
    })                    
  })
  
  function listar(){

    var url = 'index.php?controlador=docentes&actividad=listar'
                                
    $.ajax({  url : url, type : 'POST', dataType : 'json' })

    .done(function(respuesta){
                                    
      if (respuesta.data.length > 0) {

          var content = $("")
          $(".mensaje").hide()
          $("#tabla_docentes").show()
          $("#tabla_docentes tbody").html('')
          var switche

          $.each(respuesta.data, function(i, item) {


            content = `<tr data-id="${item.cedDoc }">
                        <td >${ item.cedDoc }</td>
                        <td >${ item.nombre }</td>
                        <td >${ item.apellido }</td>
                        <td  >
                          <a href="#" class="ver-horario btn cyan">VER HORARIO</a>
                        </td>
                        <td  >
                          <a href="?controlador=reportes&actividad=reporte-horario-docente&cedDoc=${item.cedDoc}" 
                          target="__blank" class=" btn red">VER PDF</a>
                        </td>   
                      </tr>`

            $("#tabla_docentes tbody").append(content)
          })

          $("#tabla_docentes").paginationTdA({ elemPerPage: 4 })
      }else{
        $("#tabla_docentes").hide()
        $(".mensaje").show()                                        
      }
    })
  }
</script>

</body>
</html>