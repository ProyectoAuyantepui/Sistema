<?php $titulo = "MANTENIMIENTO DEL SISTEMA";?>
<!DOCTYPE html>
<html lang="en">
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
  <section class="row">

    <div class="col s12 m3 card-principal-izquierdo">
       
     	<div class="card panel-backup">
       
       <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
         <img src="public/img/maintenance.png" alt="" class="responsive-img " width="90">
         <p class="titulo-tarjeta">Mantenimiento</p>
       </div>

       <div class="card-content row">
         <p class="col s12" style="padding: 10px 1px 1px 1px;">
           <span class="btn-floating primario">
             <i class="material-icons left">settings</i>
           </span>
           Este módulo corresponde a la gestion de los Backups y Restauración del sistema 
         </p>

         <p class="col s12" style="padding: 10px 1px 1px 1px;">
           
           <a class="btn-floating cyan">
             <i class="material-icons left">search</i>>
           </a>
           Atraves de este modulo puede administrar los diferente Backups dentro del Sistema.
         </p>
       </div>
     	</div>   
 	  </div>

    <div class="col s12 m9 card-principal-derecho">
      

      <div class="card card-principal">

        <div class="card-content">


          <div class="row seleccion-de-rol">
            <div class="col s12 valign-wrapper">
              <h5 id="movimientos"> Crear Backup </h5>
              <span class="waves-effect waves-light btn col s12 m3" id="createBackup"> Crear <i class="material-icons right">control_point</i></span>
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

          <!-- tabla de backup -->
          <div class="row tablaRestore">
                  <div class="col s12 valign-wrapper">
                    <h5>Listado de Backups</h5>
                    <button class="waves-effect waves-light btn col s12 m3 filtrar"><i class="material-icons right">pageview</i>Filtrar</button>
                  </div>
                
                  <div class="col s12">
                    <table id="tablaRestore" class="bordered highlight">
                      <thead id="thead">
                        <tr id="thead">
                          
                          <th >
                            <p><strong>Nombre del Backup</strong></p>
                          </th>
                          <th >
                            <p ><strong>Fecha &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong></p>
                          </th>
                          <th class="disabled_for_temp_database">
                            <p ><strong> Acción</strong></p>
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

  <!-- OPERACIONES -->
  
  <div id="modal_operaciones" class="modal bottom-sheet">

    <div class="modal-header secundario">
      <span class="white-text">Operaciones:<i class="modal-action modal-close material-icons right">close</i></span>
    </div>
  
    <div class="modal-content">
        <input type="hidden" name="item_seleccionado">
        <ul class="collection">
            <li class="collection-item avatar">
              <i class="material-icons circle blue darken-3">sync</i>
              <a href="#" class="reset-backup blue-text"> Restablecer </a>
            </li>
        </ul>
    </div>

  </section>
</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script src="public/js/ajax/mantenimiento.js"></script>

</body>
</html>


