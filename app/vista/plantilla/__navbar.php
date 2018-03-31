<?php 

$dias = [
    "Domingo",
    "Lunes",
    "Martes",
    "Miercoles",
    "Jueves",
    "Viernes",
    "Sábado"
];

$meses = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
];

if ($_SESSION)
      require_once "app/vista/plantilla/__menu.php";
?>
<header>
  <nav class="nav-extended">
      <div class="nav-wrapper primario">
          
          <a href="#" data-activates="slide-out" class="button-collapse show-on-large tooltipped" data-position="bottom"  data-tooltip="Menú">
            <i class="material-icons">menu</i>
          </a>
          
          <a href="#" class="brand-logo">Auyantepui</a>

          <ul class="right hide-on-med-and-down">
            <li>
              <?php 
              
                echo $dias[ date('w') ] . " , " . date('d') . " de " . $meses[ date('n')-1 ] . " del " . date('Y') . " - " . date('h:i A');
              ?>
            </li>
            <li>
              <a class="waves-effect waves-light" href="#!" >
                <i class="material-icons ">refresh</i>
              </a>
            </li>
            <li>
              <a class="waves-effect waves-light" href="#!" >
                <i class="material-icons ">help</i>
              </a>
            </li>
            <!-- Dropdown Trigger -->
            <li>
              <a class="dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown1">
                <i class="material-icons ">more_vert</i>
              </a>
            </li>
            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
              <li>
                <a href="#!" class="blue-text text-darken-1">
                  Perfil
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#" class="btn-salir blue-text text-darken-1">
                  Logout
                </a>
              </li>
            </ul>

          </ul>
      </div>
      <div class="nav-content primario">
        <span class="nav-title" style="margin-left: 20px; ">

          <?= $titulo ?>
        </span>
      </div>
  </nav>
</header>

