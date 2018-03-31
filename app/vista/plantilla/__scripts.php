
    <script src="public/vendor/jquery/jquery-3.2.1.js"></script>
    <script src="public/vendor/materialize/js/materialize.min.js"></script>
    

    
    <script type="text/javascript">
        $("body").on("click",".btn-salir",function(){
            localStorage.clear()
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
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false, // Close upon selecting a date,
                format: 'dd-mm-yyyy'
            })

                   
        })
    </script>


