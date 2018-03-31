
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

<li class="oculto" id="Perfil" codMod="M-04">
    <a href="?controlador=docentes&actividad=perfil"><i class="material-icons">edit</i>Mi perfil</a>
</li>
<li id="miHorario" codMod="M-" >
    <a href="#!"><i class="material-icons">cloud</i>Mi horario</a>
</li>
<li>
    <div class="divider"></div>
</li>
<li  id="Inicio" >
    <a href="?controlador=home&actividad=index"><i class="material-icons">home</i>Inicio</a>
</li>
<li class="oculto" id="Horarios" codMod="M-11" >
    <a href="index.php?controlador=horarios&actividad=index"><i class="material-icons">cloud</i>Gestion de Horarios</a>
</li>

<li class="oculto"  id="Docentes" codMod="M-15">
    <a  href="index.php?controlador=docentes&actividad=index" class="waves-effect waves-light "><i class="material-icons">person</i>Docentes</a>
</li>
<li class="oculto"  id="Secciones" codMod="M-27">
    <a  href="index.php?controlador=secciones&actividad=index" class="waves-effect waves-light"><i class="material-icons">list</i>Secciones</a>
</li>
<li class="oculto"  id="Ambientes" codMod="M-23">
    <a  href="index.php?controlador=ambientes&actividad=index" class="waves-effect waves-light"><i class="material-icons">home</i>Ambientes</a>
</li>

<li class="oculto"  id="gestionBasica" codMod="M-05">
    <ul class="collapsible collapsible-accordion">
        <li>
            <a  class="collapsible-header" ><i class="material-icons">settings</i> Gestion basica </a>
            <div class="collapsible-body">
              <ul>
                
                <li class="oculto"  id="Ejes" codMod="M-35">
                    <a  href="index.php?controlador=ejes&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> ejes</a>
                </li>
                <li class="oculto"  id="Pnf" codMod="M-31">
                    <a  href="index.php?controlador=pnf&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> pnf</a>
                </li>
                <li class="oculto"  id="CatDoc" codMod="M-19">
                    <a  href="index.php?controlador=catDoc&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Categorias de Docentes</a>
                </li>
                <li class="oculto"  id="Dependencias" codMod="M-51">
                    <a  href="index.php?controlador=dependencias&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Dependencias</a>
                </li>
                <li class="oculto"  id="AA" codMod="M-43">
                    <a  href="index.php?controlador=actiAdmi&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i>  Actividades Administrativas</a>
                </li>
                <li class="oculto"  id="Comisiones" codMod="M-47">
                    <a  href="index.php?controlador=comisiones&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Comisiones</a>
                </li>
                <li class="oculto"  id="UnidCurr" codMod="M-39">
                    <a  href="index.php?controlador=unidCurr&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Unidades Curriculares</a>
                </li>
              </ul>
            </div>
        </li>
    </ul>
</li>
<li class="oculto"  id="Reportes" codMod="M-03">
    <a  href="index.php?controlador=reportes&actividad=index" class="waves-effect waves-light"><i class="material-icons">print</i>Reportes</a>
</li>
<li class="oculto"  id="seguridad" codMod="M-06"> 
    <ul class="collapsible collapsible-accordion">
        <li >
                <a  class="collapsible-header" ><i class="material-icons">settings</i> Seguridad </a>
                <div class="collapsible-body">
                  <ul class="miClase">
                    <li class="oculto"  id="Roles" codMod="M-55">
                        <a  href="index.php?controlador=roles&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> roles</a>
                    </li>
                    <li class="oculto"  id="Permisos" codMod="M-59">
                        <a  href="index.php?controlador=permisologia&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> permisologia</a>
                    </li>
                    <li class="oculto"  id="Bitacora" codMod="M-02">
                        <a  href="index.php?controlador=bitacora&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> bitacora</a>
                    </li>
                  </ul>
                </div>
        </li>
    </ul>
</li>

<li class="oculto"  id="Mantenimiento" codMod="M-62" > 
    <ul class="collapsible collapsible-accordion">
        <li >
                <a  class="collapsible-header" ><i class="material-icons">settings</i> Mantenimiento </a>
                <div class="collapsible-body">
                  <ul class="miClase">
                    <li class="oculto"  id="respaldarDb" codMod="M-60">
                        <a  href="index.php?controlador=respaldarDb&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Respaldar Base de Datos</a>
                    </li>
                    <li class="oculto"  id="reestablecerDb" codMod="M-61">
                        <a  href="index.php?controlador=reestablecerDb&actividad=index" class="waves-effect waves-light" ><i class="material-icons">settings</i> Reestablecer Base de Datos</a>
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

