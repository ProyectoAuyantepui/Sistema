
<?php $titulo = "CREACION DE COMISIONES DE DOCENTES";?>
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
  <section class="caja_formulario row" >
    
    <div class="col s12 m3">
       <div class="card ">
         
         <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
           <img src="public/img/section.png" alt="" class="responsive-img " width="90">
           <p class="titulo-tarjeta"  >MODIFICAR COMISION DE DOCENTE</p>
         </div>
         <div class="card-content row">
           <p class="col s12" style="padding: 10px 1px 1px 1px;">
             <a class="btn-floating btn pulse  waves-effect  primario">
               <i class="material-icons left">settings</i>
             </a>
             Este módulo corresponde a la gestion de Comisiones de dcentes en el sistema 
           </p>

           <p class="col s12" style="padding: 10px 1px 1px 1px;">
             
             <a class="btn-floating btn waves-effect deep-orange darken-1">
               <i class="material-icons left">edit</i>
             </a>
             Atraves de este modulo puede modificar la informacion de una comision.
           </p>

         </div>
       </div>
     </div>


   <div class="col s12 m9">
        

      <div class="card ">
        
        

        <div class="card-content"  >

          <form class="formEditarComision" >
            <input type="hidden" name="codCom" value="<?= $comision->codCom ?>" />
            <div class="row">
              <div class="col s12 valign-wrapper">
                <p class="flow-text">DATOS DE LA COMISION</p>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <i class="material-icons prefix">call_split</i>
                <input type="text" id="editar_nombre" name="nombre" class="validate"  value="<?= $comision->nombre ?>" required />
                <label for="editar_nombre"  >Nombre</label>
              </div>
           
              <div class="input-field col s12 m4">
                <select required  id="editar_dependencia" name="editar_dependencia">
                  <option value="" selected disabled>Seleccione una opcion...</option>
                  <?php foreach ($listado_dependencias["data"] as $dependencia): ?>
                    <option selected value="<?=  $dependencia->codDep ?>"> <?php echo $dependencia->nombre; ?> </option>
                  <?php endforeach ?>
                </select>
                <label for="editar_dependencia" >Dependencia</label>
              </div>

            <div class="row">
              <div class="input-field col s12 m12">
                <i class="material-icons prefix">remove_red_eye</i>
                <textarea id="editar_descripcion" name="descripcion" class="materialize-textarea validate"  maxlength="150" rangelength=[10,150] required><?php echo $comision->descripcion ?></textarea>
                <label data-success="Correcto..."  for="editar_descripcion" >Descripcion</label>
              </div>
            </div>
            <div class="row"> 
              <div class="col s12 m12 right">
                <button type="reset" class="modal-action modal-close btn btn-large btn-flat waves-effect" >CANCELAR</button>
                <button 
                  type="button" 
                  class="btn btn-large waves-effect waves-light teal" 
                  onclick='

                    listarDocentesComision( $(".formEditarComision input[name=codCom]").val() )
                    $(".caja_docentes").show()
                    $(".caja_formulario").hide()
                  '>
                    GESTIONAR DOCENTES DE LA COMISION
                  </button>
                <button type="submit" class="btnCrearComision btn btn-large waves-effect waves-light primario" >GUARDAR TODO</button>
              </div>
            </div>
          </form>
                  
        </div>

      </div>
    </div>

    <div class="fixed-action-btn ">

      <a 
        href="?controlador=comisiones&actividad=index" 
        class="btn-floating btn-large waves-effect waves-light  deep-orange " 
      >
        <i class="material-icons " >arrow_back</i>
      </a>
    </div>
  </section>

  <section class="row caja_docentes oculto">

    <div class="col s12 m3">
       <div class="card ">
         
         <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
           <img src="public/img/section.png" alt="" class="responsive-img " width="90">
           <p class="titulo-tarjeta"  >GESTIONAR DOCENTES DE LA COMISION</p>
         </div>
         <div class="card-content row">
           <p class="col s12" style="padding: 10px 1px 1px 1px;">
             <a class="btn-floating btn pulse  waves-effect  primario">
               <i class="material-icons left">settings</i>
             </a>
             Este módulo corresponde a la gestion de Comisiones de docentes en el sistema 
           </p>

           <p class="col s12" style="padding: 10px 1px 1px 1px;">
             
             <a class="btn-floating btn waves-effect  cyan">
               <i class="material-icons left">add</i>
             </a>
             Atraves de este modulo puede gestionar los docentes que pertenecen a esta comision.
           </p>

         </div>
       </div>
     </div>


    <div class="col s12 m9">
       <div class="card ">
         
         <div class="row">
           <div class="col s12 m9 ">
             <p class="flow-text">Docentes actuales en la comision (<?php echo count($docentes_comision); ?>)</p>
           </div>

           <div class="col s12 m3 ">
            <br>
             <a 
              href="#" 
              class="right btn-large teal darken-1 add-doc  tooltipped" 
              data-position="left"  
              data-delay="50" 
              data-tooltip="Añadir un Docente a esta Comision"
              onclick='
                $.ajax({ 

                    dataType : "json" ,
                    type:"POST" ,
                    url:"index.php?controlador=comisiones&actividad=docentes-disponibles",
                    data:{
                      "codCom" : $(".formEditarComision input[name=codCom]").val()
                    }
                }) 

                .done(function( respuesta ){


                  var contenidoHTML = $("")        
                  $.each( respuesta.data, function(i,item){

                      contenidoHTML += `<option value="${item.cedDoc}">
                                          ${item.nombre}
                                      </option>`

                      
                  })
                  $("select#docentes").html(contenidoHTML)
                  $("select#docentes").material_select()
                })

                $("#agregarDocente").modal("open")
              ' 
            >
              <i class="material-icons">add</i>
            </a>
           </div>
         </div>
         
         <div class="card-content"  >
          

           <table id="tabla_docentes" class="bordered highlight ss">
             <thead id="thead">
               <tr id="thead">
                 <th >
                   CEDULA
                 </th>
                 <th >
                   NOMBRE
                 </th>
                 <th >
                   APELLIDO
                 </th>

                 <th >COORDINADOR</th>
                 <th >DESVINCULAR</th>
               </tr>
             </thead>
             <tbody>
             </tbody>
           </table>
                   
         </div>

       </div>

       <div class="fixed-action-btn ">

         <button 
            type="button" 
            class="btn-floating btn-large waves-effect waves-light  deep-orange " 
            onclick='
              $(".caja_docentes").hide()
              $(".caja_formulario").show()
            '  
         >
           <i class="material-icons " >arrow_back</i>
         </button>
       </div>

  </section>
</main>


<!-- AGREGAR Docente  -->

    <div id="agregarDocente" class="modal ">

      <div class="modal-header secundario">
        <span class="white-text">
          Agregar docente a la comisión
          <i class="modal-action modal-close material-icons right">close</i>
        </span>
      </div>
      <div class="modal-content" style="padding-bottom: 200px">
        <form class="formAsignarDocente" >
          <div class="row">
                  
            <div class="col s12 m9">
              
              <select class="center" name="cedDoc" id="docentes" ></select>
              <label>Docentes</label>
            </div>

            <div class="col s12 m3">
              <button type="submit" class="btn btn-large waves-effect waves-light primario" >GUARDAR</button>
            </div>

          </div>

          
        </form>
      </div>
    </div>

<?php require_once "app/vista/plantilla/__scripts.php";  ?> 

<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script src="public/js/validaciones/comisiones.js"></script>
<script src="public/js/ajax/comisiones.js"></script>


</body>
</html>