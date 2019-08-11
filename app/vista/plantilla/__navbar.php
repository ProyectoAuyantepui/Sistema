<?php if ( $_SESSION ): ?>
  <ul id="slide-out" class="side-nav">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="public/img/cascada.jpg">
        </div>
        <a href="#!user"><img class="circle" src="public/img/logo.png" ></a>
        <a href="#!name"><span class="white-text name"><?= $_SESSION["user"]["usuario"]  ?></span></a>
        <a href="#!email"><span class="white-text email"><?= $_SESSION["user"]["correo"]  ?></span></a>
      </div>
    </li>

    <li class="oculto" id="Perfil" codPer="P-02">
      <a href="?controlador=perfil&actividad=index"><i class="material-icons">edit</i>Mi perfil</a>
    </li>
    <li id="miHorario" codPer="P-71" >
      <a 
      href="?controlador=reportes&actividad=reporte-horario-docente&cedDoc=<?php echo $_SESSION["user"]["cedDoc"]; ?>" 
      target="__blank"
      >
      <i class="material-icons">cloud</i>
      Mi horario
    </a>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <li  id="Inicio" >
    <a href="?controlador=home&actividad=index"><i class="material-icons">home</i>Inicio</a>
  </li>
  <li class="oculto" id="Horarios" codPer="P-04" >
    <a href="index.php?controlador=horarios&actividad=index"><i class="material-icons">cloud</i>Gestión de Horarios</a>
  </li>

  <li class="oculto"  id="Docentes" codPer="P-09">
    <a  href="index.php?controlador=docentes&actividad=index" class="waves-effect waves-light "><i class="material-icons">person</i>Docentes</a>
  </li>
  <li class="oculto"  id="Secciones" codPer="P-19">
    <a  href="index.php?controlador=secciones&actividad=index" class="waves-effect waves-light"><i class="material-icons">list</i>Secciones</a>
  </li>
  <li class="oculto"  id="Ambientes" codPer="P-14">
    <a  href="index.php?controlador=ambientes&actividad=index" class="waves-effect waves-light"><i class="material-icons">home</i>Ambientes</a>
  </li>

  <li class="oculto"  id="gestionBasica" codPer="P-24">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a  class="collapsible-header" ><i class="material-icons">settings</i> Gestión basica </a>
        <div class="collapsible-body">
          <ul>

            <li class="oculto"  id="Ejes" codPer="P-35">
              <a  href="index.php?controlador=ejes&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Ejes de Formacion</a>
            </li>

            <li class="oculto"  id="Dedicaciones" codPer="P-72">
              <a  href="index.php?controlador=dedicaciones&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Dedicaciones de docentes</a>
            </li>
            <li class="oculto"  id="Pnf" codPer="P-30">
              <a  href="index.php?controlador=pnf&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> PNF</a>
            </li>
            <li class="oculto"  id="CatDoc" codPer="P-25">
              <a  href="index.php?controlador=catDoc&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Categorias de Docentes</a>
            </li>
            <li class="oculto"  id="Dependencias" codPer="P-55">
              <a  href="index.php?controlador=dependencias&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Dependencias de Docentes</a>
            </li>
            <li class="oculto"  id="AA" codPer="P-45">
              <a  href="index.php?controlador=actiAdmi&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i>  Actividades Administrativas</a>
            </li>
            <li class="oculto"  id="Comisiones" codPer="P-50">
              <a  href="index.php?controlador=comisiones&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Comisiones de Docentes</a>
            </li>
            <li class="oculto"  id="UnidCurr" codPer="P-40">
              <a  href="index.php?controlador=unidCurr&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Unidades Curriculares</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li class="oculto"  id="Reportes" codPer="P-60">
    <a  href="index.php?controlador=reportes&actividad=index" class="waves-effect waves-light"><i class="material-icons">print</i>Reportes</a>
  </li>
  <li class="oculto"  id="seguridad" codPer="P-61"> 
    <ul class="collapsible collapsible-accordion">
      <li >
        <a  class="collapsible-header" ><i class="material-icons">settings</i> Seguridad </a>
        <div class="collapsible-body">
          <ul class="miClase">
            <li class="oculto"  id="Roles" codPer="P-62">
              <a  href="index.php?controlador=roles&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Roles de Usuario</a>
            </li>       
            <li class="oculto"  id="Bitacora" codPer="P-67">
              <a  href="index.php?controlador=bitacora&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Bitacora</a>
            </li>

            <li class="oculto"  id="Mantenimiento" codPer="P-68" > 
              <ul class="collapsible collapsible-accordion">
                <li >
                  <a  href="index.php?controlador=mantenimiento&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Mantenimiento </a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <li><a href="#" class="btn-salir"><i class="material-icons">cloud</i>Salir</a></li>
</ul>  
<?php endif ?>


<header>
  <nav class="nav-extended">
    <div class="nav-wrapper primario">

      <a href="#" data-activates="slide-out" class="button-collapse show-on-large tooltipped" data-position="bottom"  data-tooltip="Menú">
        <i class="material-icons">menu</i>
      </a>

      <a href="#" class="brand-logo">Auyantepui</a>

      <ul class="right hide-on-med-and-down">
        <li>
          <?= $config["fecha_completa"] ?>
        </li>
        <li>
          <a class="waves-effect waves-light" href="public/pdf/manual.php" >
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

