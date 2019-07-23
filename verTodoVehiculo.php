<!doctype html>
<?php
include( 'conexiones/conexion.php' );
$con = conectar();

$vehiculoId = $_GET[ 'vehiculoId' ];

$qVehiculo = "SELECT * FROM  vehiculos where  vehiculo_id = '$vehiculoId'";
$rVehiculo = mysqli_query( $con, $qVehiculo )or die( mysqli_error() );
$rowVehiculo = mysqli_fetch_assoc( $rVehiculo );

$marcaId= $rowVehiculo['marca_id'];
$tipoVehiculoId= $rowVehiculo['tipo_vehiculo_id'];
$propietarioId= $rowVehiculo['propietario_id'];
$conductorId= $rowVehiculo['conductor_id'];

$qMarca = "SELECT * FROM  vehiculos where  vehiculo_id = '$vehiculoId'";
$rVehiculo = mysqli_query( $con, $qVehiculo )or die( mysqli_error() );
$rowVehiculo = mysqli_fetch_assoc( $rVehiculo );


$qConductor = "SELECT * FROM  conductores where  conductor_id = '$conductorId'";
$rConductor = mysqli_query( $con, $qConductor )or die( mysqli_error() );
$rowConductor = mysqli_fetch_assoc( $rConductor );

$primerNombre = $rowConductor[ 'primer_nombre' ];
$segundoNombre = $rowConductor[ 'segundo_nombre' ];
$apellidos = $rowConductor[ 'apellidos' ];

$nombreConductor = $primerNombre . ' '.$segundoNombre.' '.$apellidos;

$qPropietario = "SELECT * FROM  propietarios where  propietario_id = '$propietarioId'";
$rPropietario = mysqli_query( $con, $qPropietario )or die( mysqli_error() );
$rowPropietario = mysqli_fetch_assoc( $rPropietario );

$primerNombreP = $rowPropietario[ 'primer_nombre' ];
$segundoNombreP = $rowPropietario[ 'segundo_nombre' ];
$apellidosP = $rowPropietario[ 'apellidos' ];
$ciudadIdP = $rowPropietario[ 'ciudad_id' ];

$nombrePropietario = $primerNombreP . ' '.$segundoNombreP.' '.$apellidosP;



$qMarca = "SELECT * FROM  marcas where  marca_id = '$marcaId'";
$rMarca = mysqli_query( $con, $qMarca )or die( mysqli_error() );
$rowMarca = mysqli_fetch_assoc( $rMarca );

$qTipoVehiculo = "SELECT * FROM  tipos_vehiculos where  tipo_vehiculo_id = '$tipoVehiculoId'";
$rTipoVehiculo = mysqli_query( $con, $qTipoVehiculo )or die( mysqli_error() );
$rowTipoVehiculo = mysqli_fetch_assoc( $rTipoVehiculo );

function consultarCiudad($ciudadId){
    
    global $con;
    
    $qCiudad = "SELECT * FROM  ciudades where  ciudad_id = '$ciudadId'";
    $rCiudad = mysqli_query( $con, $qCiudad )or die( mysqli_error() );
    $rowCiudad = mysqli_fetch_assoc( $rCiudad );
    
    
    return $rowCiudad['ciudad'];
    
}
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

      
    <!-- Custom styles for this template -->
   
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
      <div class="card">
  <h5 class="card-header bg-dark text-light" text-light><a href="vehiculos.php"><button type="button" class="btn btn-light">Volver</button></a> Vehiculo #<?php echo $vehiculoId;?></h5>
  <div class="card-body">
    <h4>Datos del vehículo</h4>
    <hr>
    <p class="card-text"><b>Placa:</b> <?php echo $rowVehiculo['placa'];?> </p>
    <p class="card-text"><b>Color:</b> <?php echo $rowVehiculo['color'];?> </p>
    <p class="card-text"><b>Marca:</b> <?php echo $rowMarca['marca'];?> </p>
    <p class="card-text"><b>Tipo de Vehiculo:</b> <?php echo $rowTipoVehiculo['tipo_vehiculo'];?> </p>
    <h4>Datos del Propietario</h4>
    <hr>
    <p class="card-text"><b>Primer Nombre:</b> <?php echo $rowPropietario['primer_nombre'];?> </p>
    <p class="card-text"><b>Segundo Nombre:</b> <?php echo $rowPropietario['segundo_nombre'];?> </p>
    <p class="card-text"><b>Apellidos:</b> <?php echo $rowPropietario['apellidos'];?> </p>
    <p class="card-text"><b>Dirección:</b> <?php echo $rowPropietario['direccion'];?> </p>
    <p class="card-text"><b>Teléfono:</b> <?php echo $rowPropietario['telefono'];?> </p>
    <p class="card-text"><b>Ciudad:</b> <?php echo consultarCiudad($ciudadIdP);?> </p>
    <h4>Datos del Conductor</h4>
    <hr>
    <p class="card-text"><b>Primer Nombre:</b> <?php echo $rowConductor['primer_nombre'];?> </p>
    <p class="card-text"><b>Segundo Nombre:</b> <?php echo $rowConductor['segundo_nombre'];?> </p>
    <p class="card-text"><b>Apellidos:</b> <?php echo $rowConductor['apellidos'];?> </p>
    <p class="card-text"><b>Dirección:</b> <?php echo $rowConductor['direccion'];?> </p>
    <p class="card-text"><b>Teléfono:</b> <?php echo $rowConductor['telefono'];?> </p>
    <p class="card-text"><b>Ciudad:</b> <?php echo consultarCiudad($rowConductor['ciudad_id']);?> </p>
    
  </div>
</div>
</div>
      <p></p>
      <br>
</body>
</html>