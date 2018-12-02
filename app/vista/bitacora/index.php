<?php $titulo = "BITACORA DEL SISTEMA";?>
<!DOCTYPE html>
<html lang="en">
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
  <section class="row">

    <div class="col s12 m3 card-principal-izquierdo">
       
     	<div class="card panel-bitacora">
       
       <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
         <img src="public/img/section.png" alt="" class="responsive-img " width="90">
         <p class="titulo-tarjeta"  >BITACORA</p>
       </div>
       <div class="card-content row">
         <p class="col s12" style="padding: 10px 1px 1px 1px;">
             <i class="material-icons left">settings</i>
           Este módulo corresponde a la gestion de la Bitacora del sistema 
         </p>

         <p class="col s12" style="padding: 10px 1px 1px 1px;">
           
             <i class="material-icons left">search</i>
           Atraves de este modulo puede consultar el historial de movimientos delos usuarios dentro del Sistema.
         </p>
       </div>
     	</div>   
 	  </div>

    <div class="col s12 m9 card-principal-derecho">
      

      <div class="card card-principal">

        <div class="card-content">


          <div class="row seleccion-de-rol">
            <div class="col s12 valign-wrapper">
              <h5 id="movimientos"> Movimientos </h5>
            </div>
            <section id="vistaFiltro" class="oculto">    
              <div class="col s12">
                <nav class="primario">
                        <div class="nav-wrapper">
                          <form>
                            <div class="input-field">
                              <input id="general" type="search" name="filtro" required>
                              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                              <i class="material-icons">close</i>
                            </div>
                          </form>
                        </div>
                </nav>
              </div>
            </section> 
          </div>

          <!-- tabla de bitacora -->
          <div class="row tablaBitacora">
                  <div class="col s12 valign-wrapper">
                    <h5>Información</h5>
                    <button class="waves-effect waves-light btn col s12 m3 filtrar"><i class="material-icons right">pageview</i>Filtrar</button>
                    <button class="waves-effect red darken-3 btn col s4 m3 cancelar oculto"><i class="material-icons right">clear</i>Ocultar Filtro</button>
                  </div>
                
                  <div class="col s12">
                    <table id="tabla_bitacora" class="bordered highlight">
                      <thead id="thead">
                        <tr id="thead">
                          
                          <th >
                            <p><strong>Cedula Usuario</strong></p>
                          </th>
                          <th >
                            <p><strong>Nombre Usuario</strong></p>
                          </th>
                          <th >
                            <p><strong>Rol de Usuario</strong></p>
                          </th>
                          <th >
                            <p><strong>Acción</strong></p>
                          </th>
                          <th >
                            <p ><strong>Fecha</strong></p>
                          </th>
                          <th >
                            <p ><strong>Hora</strong></p>
                          </th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table> 
                  </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script src="public/js/ajax/bitacora.js"></script>

</body>
</html>


