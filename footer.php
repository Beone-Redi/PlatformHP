<?php
// Inicio la variables de sesion.
if (!isset($_SESSION)) 
{
    session_start();
}

if (isset($_SESSION['ACTIVO']) <> "2019") 
{
    header("Location: login");
}


?>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-right">
                    <ul>
                        <li>
                            <a href="politics" title="Politicas de información">
                                Politicas de informacion
                            </a>
                        </li>
                        <li>
                            <a href="terminos_condiciones" title="Terminos y condiciones">
                                Terminos y condiciones
                            </a>
                        </li>
                        <li>
                            <a href="politicas_privacidad" title="Políticas de privacidad">
                                Políticas de privacidad
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Home">
                                <i class="pe-7s-up-arrow" style="font-size:28px;"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-left">
                    Hotpay
                </p>
            </div>
        </footer>

    </div>
</div>

</body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    
    <!-- Light Bootstrap Table Core javascript and methods -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Fancybox -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

	<!-- Light Bootstrap -->
	<!-- <script src="assets/js/demo.js"></script> -->
    <script type='text/javascript' src="assets/js/demo.js?filever=<?=filesize('assets/js/demo.js')?>"></script>

    
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();
            /*
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "<b>Dashboard</b>"

            },{
                type: 'info',
                timer: 4000
            });
            */
        });
        
        $(document).ready(function() {
            $('#tablesearch').DataTable();
        } );
	</script>
    
    <script  src="assets/js/index.js"></script>

    <!-- Need to use datatables.net -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script>
    $(document).ready(function(){
    


    $('#TableMovs').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        "ordering": false,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    //Apply the datatables plugin to your table
    $('#myTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ordering": false,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

    //Datatable para Compañias
    $('#Companys').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ordering": false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                filename: 'Empresas'
            },
            {
                extend: 'excelHtml5',
                filename: 'Empresas'
            }
            ,
            {
                extend: 'csvHtml5',
                filename: 'Empresas'
            }
            ,
            {
                extend: 'pdfHtml5',
                filename: 'Empresas'
            }
        ]
    });

    //Datatable para Usuarios
    $('#Users').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ordering": false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                filename: 'Usuarios'
            },
            {
                extend: 'excelHtml5',
                filename: 'Usuarios'
            }
            ,
            {
                extend: 'csvHtml5',
                filename: 'Usuarios'
            }
            ,
            {
                extend: 'pdfHtml5',
                filename: 'Usuarios'
            }
        ]
    });

    //Datatable para Fondeos
    $('#Founds').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                filename: 'Fondeos'
            },
            {
                extend: 'excelHtml5',
                filename: 'Fondeos'
            }
            ,
            {
                extend: 'csvHtml5',
                filename: 'Fondeos'
            }
            ,
            {
                extend: 'pdfHtml5',
                filename: 'Fondeos'
            }
        ]
    });

    //Datatable para tarjeta habientes
    $('#CH').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                filename: 'Tarjeta Habientes'
            },
            {
                extend: 'excelHtml5',
                filename: 'Tarjeta Habientes'
            }
            ,
            {
                extend: 'csvHtml5',
                filename: 'Tarjeta Habientes'
            }
            ,
            {
                extend: 'pdfHtml5',
                filename: 'Tarjeta Habientes'
            }
        ]
    });

    //Datatable para Tarjetas
    $('#CardsMovements').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                filename: 'Movimientos tarjetas'
            },
            {
                extend: 'excelHtml5',
                filename: 'Movimientos tarjetas'
            }
            ,
            {
                extend: 'csvHtml5',
                filename: 'Movimientos tarjetas'
            }
            ,
            {
                extend: 'pdfHtml5',
                filename: 'Movimientos tarjetas'
            }
        ]
    });


    });

    $(document).ready(function(){
        $(".dropdown-toggle").dropdown();
    });
</script>
</html>
