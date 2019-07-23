<?php
include '../conexiones/conexion.php';
$con=conectar();


$placa= $_POST['placa'];

$qVehiculo = "SELECT * FROM  vehiculos where  placa LIKE '%$placa%'";									
$rVehiculo= mysqli_query($con,$qVehiculo) or die(mysqli_error());	
$rowVehiculo = mysqli_fetch_assoc($rVehiculo);
$rowCantidadFilas = $rVehiculo ->num_rows;

////existe la placa o el vehiculo en la base de datos
if($rowCantidadFilas>0){
    echo 1;
}
////no hay ninguna  placa o el vehiculo en la base de datos
else{
    echo 0;
}

?>