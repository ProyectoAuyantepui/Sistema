<!-- MODAL DE OPERACIONES AL DAR CLICK A UNA UNIDAD CURRICULAR-->

<div id="modal_operaciones" class="modal bottom-sheet">

  <div class="modal-header secundario">
    <span class="white-text">Operaciones:<i class="modal-action modal-close material-icons right">close</i></span>
  </div>

  <div class="modal-content">

      <ul class="collection">
          <li class="collection-item avatar">
            <i class="material-icons circle teal">add</i>
            <a href="#" class="asignar-actividad-horario teal-text" onclick="clickAsignarActividades()"> Asignar actividad</a>
          </li>

          <li class="collection-item avatar oculto opcion-para-asignadas">
            <i class="material-icons circle blue darken-3">edit</i>
            <a href="#" class="editar-actividad-horario blue-text" onclick="clickEditarActividades(  )"> Editar actividad </a>
          </li>
          
          <li class="collection-item avatar oculto opcion-para-asignadas">
            <i class="material-icons circle deep-orange">delete</i>
            <a href="#" class="eliminar-actividad-horario  deep-orange-text" onclick="clickEliminarActividades(  )"> Remover actvidad </a>
          </li>
          
      </ul>
  </div>

</div>

