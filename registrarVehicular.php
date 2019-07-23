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
    <!-- Bootstrap  CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> 


    <!-- script -->
    <script src="js/jquery.js"></script>  
    <script src="js/sweetalert2/sweetalert2.js"></script>
    <link href="css/sweetalert2/sweetalert2.css" rel="stylesheet">

    <script>
        $( document ).ready(function() {
            
           $('#placaVehiculo').change(function(){
               var placa = $('#placaVehiculo').val();
                $ . ajax( {
                type: "POST",
                url: "acciones/consultaVehiculo.php",
                data: 'placa='+ placa,
                success: function ( resultado ) {

                    if(resultado==1){
                         Swal.fire({
                              type: 'error',
                              title: 'Oops...',
                              text: 'El vehiculo ya esta regisrtado!',

                            })
                         $('#placaVehiculo').val('');
                       }
                    }
                 });     
           });
            
          $('#nDocumentoPropietario').change(function(){
               var nDocumento = $('#nDocumentoPropietario').val();
              $.ajax( {
                type: "POST",
                url: "acciones/consultaPropietario.php",
                data: 'nDocumento='+ nDocumento,
                success: function ( resultado ) {

                    
                        if(resultado==0){

                           }
                        else{
                            variable = resultado.split('*');
                            Swal.fire({
                                  type: 'success',
                                  title: 'Propietario Encontrado',

                            });
                            
                            $('#primerNombrePropietario').val(variable[0]);
                            $('#segundoNombrePropietario').val(variable[1]);
                            $('#apellidoPropietario').val(variable[2]);
                            $('#direccionPropietario').val(variable[3]);
                            $('#telefonoPropietario').val(variable[4]);
                            $( "select[id=ciudadPropietario]" ).val(variable[5]);
                        }
                    }
                });  
          });
            
          $('#nDocumentoConductor').change(function(){
               var nDocumento = $('#nDocumentoConductor').val();
              $.ajax( {
                type: "POST",
                url: "acciones/consultaConductor.php",
                data: 'nDocumento='+ nDocumento,
                success: function ( resultado ) {

                    
                        if(resultado==0){

                           }
                        else{
                           variable = resultado.split('*');
                            Swal.fire({
                                  type: 'success',
                                  title: 'Conductor Encontrado',

                            });
                            
                            $('#primerNombreConductor').val(variable[0]);
                            $('#segundoNombreConductoro').val(variable[1]);
                            $('#apellidoConductor').val(variable[2]);
                            $('#direccionConductor').val(variable[3]);
                            $('#telefonoConductor').val(variable[4]);
                            $( "select[id=ciudadConductor]" ).val(variable[5]);
                        }
                    }
                });  
          });
            
        });
        
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">ACME</a>
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
        <div class="card">
            <div class="card-header bg-dark text-light">
                Registro de vehiculos
            </div>
            <div class="card-body">
                <form action="guardarRegistro.php" method="post" name="formRegVehiculo"  id="formRegVehiculo">
                    <h4>Datos del vehículo</h4>
                    <hr>
                    <div class="form-row">
                        
                        <div class="form-group col-md-2">
                            <label for="placaVehiculo">Placa*:</label>
                            <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo" placeholder="AAA222" required autofocus autocomplete="off">
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="color">Color*:</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="Azul" autocomplete="off" required>
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="marca">Marca*:</label>
                            <select class="form-control" name="marca" id="marca" required>
                                <?php   
                                    $query = $con -> query ("SELECT * FROM marcas");
                                        echo '<option value="">Seleccione</option>';
                                        while ($valores = mysqli_fetch_array($query)) {                       
                                        echo '<option value="'.$valores['marca_id'].'"> '.$valores['marca'].'</option>';                     
                                      }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-2">
                           <label for="tipoVehiculo">Tipo Vehiculo*:</label>
                             <select class="form-control" name="tipoVehiculo" id="tipoVehiculo" required>
                                <?php   
                                        $query = $con -> query ("SELECT * FROM tipos_vehiculos");
                                            echo '<option value="">Seleccione</option>';
                                            while ($valores = mysqli_fetch_array($query)) {                       
                                            echo '<option value="'.$valores['tipo_vehiculo_id'].'"> '.$valores['tipo_vehiculo'].'</option>';                     
                                          }
                                    ?>    
                             </select>
                        </div>
                        
                    </div>
                    <br>
                    <h4>Datos del Propietario</h4>
                    <hr>
                  
                    <div class="form-row">
                                             
                        <div class="form-group col-md-2">
                          <label for="nDocumentoPropietario">N° Documento*:</label>
                          <input type="number" class="form-control" id="nDocumentoPropietario" name="nDocumentoPropietario" placeholder="0000000"  autocomplete="off" required>
                        </div>  
                    
                                             
                        <div class="form-group col-md-2">
                          <label for="primerNombrePropietario">Primer Nombre*:</label>
                          <input type="text" class="form-control" id="primerNombrePropietario" name="primerNombrePropietario" placeholder="Juan"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-2">
                          <label for="segundoNombrePropietario">Segundo Nombre:</label>
                          <input type="text" class="form-control" id="segundoNombrePropietario" name="segundoNombrePropietario" placeholder="Carlos"  autocomplete="off" required>
                        </div> 
                                             
                        <div class="form-group col-md-3">
                          <label for="apellidoPropietario">Apellidos*:</label>
                          <input type="text" class="form-control" id="apellidoPropietario" name="apellidoPropietario" placeholder="Patiño"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-6">
                          <label for="direccionPropietario">Dirección*:</label>
                          <input type="text" class="form-control" id="direccionPropietario" name="direccionPropietario" placeholder="Calle, carrera, número, departamento"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-3">
                          <label for="telefononPropietario">Teléfono*:</label>
                          <input type="number" class="form-control" id="telefonoPropietario" name="telefonoPropietario" placeholder="000000000"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-3">
                          <label for="ciudadPropietario">Ciudad*:</label>
                          <select class="form-control" name="ciudadPropietario" id="ciudadPropietario" required>
                                <?php   
                                        $query = $con -> query ("SELECT * FROM ciudades");
                                            echo '<option value="">Seleccione</option>';
                                            while ($valores = mysqli_fetch_array($query)) {                       
                                            echo '<option value="'.$valores['ciudad_id'].'"> '.$valores['ciudad'].'</option>';                     
                                          }
                                    ?>    
                          </select>
                        </div>  
                                             
                       
                    </div>
                    <br>
                    <h4>Datos del Conductor</h4>
                    <hr>
                  
                    <div class="form-row">
                                             
                        <div class="form-group col-md-2">
                          <label for="nDocumentoConductor">N° Documento*:</label>
                          <input type="number" class="form-control" id="nDocumentoConductor" name="nDocumentoConductor" placeholder="0000000"  autocomplete="off" required>
                        </div>  
                    
                                             
                        <div class="form-group col-md-2">
                          <label for="primerNombreConductor">Primer Nombre*:</label>
                          <input type="text" class="form-control" id="primerNombreConductor" name="primerNombreConductor" placeholder="Juan"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-2">
                          <label for="segundoNombreConductor">Segundo Nombre:</label>
                          <input type="text" class="form-control" id="segundoNombreConductor" name="segundoNombreConductor" placeholder="Carlos"  autocomplete="off" required>
                        </div> 
                                             
                        <div class="form-group col-md-3">
                          <label for="apellidoConductor">Apellidos*:</label>
                          <input type="text" class="form-control" id="apellidoConductor" name="apellidoConductor" placeholder="Patiño"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-6">
                          <label for="direccionConductor">Dirección*:</label>
                          <input type="text" class="form-control" id="direccionConductor" name="direccionConductor" placeholder="Calle, carrera, número, departamento"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-3">
                          <label for="telefononConductor">Teléfono*:</label>
                          <input type="number" class="form-control" id="telefonoConductor" name="telefonoConductor" placeholder="000000000"  autocomplete="off" required>
                        </div>  
                                             
                        <div class="form-group col-md-3">
                          <label for="ciudadConductor">Ciudad*:</label>
                          <select class="form-control" name="ciudadConductor" id="ciudadConductor" required>
                                <?php   
                                        $query = $con -> query ("SELECT * FROM ciudades");
                                            echo '<option value="">Seleccione</option>';
                                            while ($valores = mysqli_fetch_array($query)) {                       
                                            echo '<option value="'.$valores['ciudad_id'].'"> '.$valores['ciudad'].'</option>';                     
                                          }
                                    ?>    
                          </select>
                        </div>  
                                             
                       
                    </div>
                    
                    <p></p>
                    <center><button type="submit" class="btn btn-success">Guardar</button></center>
                </form>
            </div>
        </div>
    </div>
    <p></p>
    <br>
    <p></p>
    <br>
</body>
</html>