
    <script src="public/vendor/jquery/jquery-3.2.1.js"></script>
    <script src="public/vendor/materialize/js/materialize.min.js"></script>    

    
    <script type="text/javascript">
        $("body").on("click",".btn-salir",function(){
            sessionStorage.clear()
            Materialize.toast('Hasta pronto!',1400,'',function(){ location.href = '?controlador=login&actividad=cerrar-sesion' });
        })
    </script>
    
    <script >
        
        $(function(){
            
            //ventanas modales
            $('.modal').modal();
            //slider o carrusell
            $('.slider').slider();
            //sidenav
            $(".button-collapse").sideNav({menuWidth: 360});
            //drodpdown join navbar
            $(".dropdown-button").dropdown();
            //collapsible
            $('.collapsible').collapsible();
            //tolltips
            $('.tooltipped').tooltip({
                delay : 350,
                html : true
            });
            //tabs
            $('ul.tabs').tabs();
            //selects
            $('select').material_select()
            // datepiker
            $('.datepicker').pickadate({
                selectMonths: true, 
                selectYears: 15,
                closeOnSelect: false, 
                format: 'dd-mm-yyyy',
                labelMonthNext: 'Mes siguiente',
                labelMonthPrev: 'Mes anterior',

                labelMonthSelect: 'Selecciona un mes',
                labelYearSelect: 'Selecciona un año',

                monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
                monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
                weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
                weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],

                weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ],

                today: 'Hoy',
                clear: 'Limpiar',
                close: 'Cerrar',
                firstDay: true,
                    })

                   
        })
    </script>


<!-- Esto coloca una información debajo de los select de cada vista que sean requeridos, esto se realiza porque materialize no trae la 
opción por defecto  -->
    <script>
    $('form').on('submit',function(e){
    var select = $(this).find('select').filter("[required=required]");
    $.each(select , function(index, elm){
        val = $(this).val();    
        target = $(this).closest('.input-field');
        if (typeof target !== "undefined") {
            input_target = target.find('input.select-dropdown');
            if (typeof input_target !== "undefined") {                  
                if(val == '' || val == false || val == 0 || val == null){

                    input_target.css({'border-color':'#F44336 ','box-shadow':'0 1px 0 0 #F44336' });
        /*                 
                    input_target.after('<span class="error_note" style="color: #F44336;font-size: 12px;">Por favor seleccione una opción valida.</span>');
        */

                    $('html,body').animate({ scrollTop: $("body").offset().top},'slow' );
                    e.preventDefault();

                }else{
                    input_target.css({'border-color':'#F44336'});
                }

            }
        }           
    });
});

/*Esto se coloca porque materialize toma el primer valor de un select como null, pero aún así el formulario es enviado a db
entonces hace falta colocar los elementos en forma lineal y así el primero no es tomado en cuenta.
*/
$("select[required]").css({
      display: "inline",
      height: 0,
      padding: 0,
      width: 0
    });
    </script>


