<!doctype html>
<?php
include('conexiones/conexion.php');
$con = conectar();
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Juan Carlos Patiño">
    <title>ACME</title>

    <link href="css/4/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="css/datetable/dataTables.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="css/datetable/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/all.css"/>

    <script src="js/dateTable/jquery.dataTables.js"></script>
    <script src="js/dateTable/dataTables.bootstrap4.js"></script>

    <script src="js/dateTable/dataTables.buttons.min.js"></script>
    <script src="js/dateTable/buttons.bootstrap4.min.js"></script>
    <script src="js/dateTable/jszip.min.js"></script>
    <script src="js/dateTable/pdfmake.min.js"></script>
    <script src="js/dateTable/vfs_fonts.js"></script>
    <script src="js/dateTable/buttons.html5.min.js"></script>
    <script src="js/dateTable/buttons.print.min.js"></script>
    <script src="js/dateTable/buttons.colVis.min.js"></script>
    <script src="js/dateTable/dataTables.responsive.min.js"></script>
    <script src="vehiculos/consultaVehiculos.js"></script>

    <!-- Custom styles for this template -->
    <script>
        $( document ).ready( function () {

            $( '[data-toggle="tooltip"]' ).tooltip();

            var table = $( '#tablaBusqueda' ).DataTable();


            table.buttons().container()
                .appendTo( '#tablaBusqueda_wrapper .col-md-4:eq(0)' );

            // busamos por placa
            $( '#placa' ).on( 'keyup', function () {
                table
                    .columns( 0 )
                    .search( this.value )
                    .draw();
            } );

            /////buscar por color
            $( '#color' ).on( 'keyup', function () {
                table
                    .columns( 1 )
                    .search( this.value )
                    .draw();
            } );

            /////buscar por estado
            $( '#marca' ).on( 'change', function () {
                table
                    .columns( 2 )
                    .search( this.value )
                    .draw();
            } );





        } );
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">ACME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">


                <li class="nav-item">
                    <a class="nav-link" href="vehiculos.php">Vehiculos</a>
                </li>

                
            </ul>

        </div>
    </nav>
    <P></P>
    <br>
    <br>
    <br>

    <div class="container">

        <!-- CARD PRINCIPAL-->
        <div class="card ">
            <!-- CARD encabezado-->
            <div class="card-header bg-dark text-light"><b>Vehiculos</b>
            </div>
            <!-- fin CARD encabezado-->

            <div class="card-body bg-light">
                <form method='POST' id='myform' name='form_agorden' class='cssform' target="frame_rejilla">
                    <div class="form-row">

                        <div class='form-group col-sm-2'>
                            <b>Placa:</b> <input class='form-control' id='placa' type='text' name='placa' value='' autocomplete='off' placeholder=''/>
                        </div>


                        <div class='form-group col-sm-2'>
                            <b>Color:</b> <input class='form-control' id='color' type='text' name='color' value='' autocomplete='off' placeholder=''/>
                        </div>


                        <div class="form-group col-sm-2">
                            <b>Marca:</B>
                            <select class="form-control" name="marca" id="marca" required>
                                <?php   
                                    $query = $con -> query ("SELECT * FROM marcas");
                                        echo '<option value="">Seleccione</option>';
                                        while ($valores = mysqli_fetch_array($query)) {                       
                                        echo '<option value="'.$valores['marca'].'"> '.$valores['marca'].'</option>';                     
                                      }
                                ?>
                            </select>
                        </div>






                    </div>

                </form>

            </div>
        </div>
        <!--Fin CARD PRINCIPAL-->

        <p></p>
        <table id="tablaBusqueda" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 12px;">
            <thead class="thead-dark">
                <tr>
                    
                    <th data-priority="1">Placa</th>
                    <th data-priority="3">Color</th>
                    <th data-priority="4">Marca</th>
                    <th>Propietario</th>
                    <th>Conductor</th>
                    <th data-priority="5">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</body>
</html>