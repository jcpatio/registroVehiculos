<?php
include '../conexiones/conexion.php';
$con=conectar();


$nDocumento= $_POST['nDocumento'];

$qConductor = "SELECT * FROM  conductores where  n_documento LIKE '%$nDocumento%'";									
$rConductor= mysqli_query($con,$qConductor) or die(mysqli_error());	
$rowConductor = mysqli_fetch_assoc($rConductor);
$rowCantidadFilas = $rConductor ->num_rows;

////existe la placa o el vehiculo en la base de datos
if($rowCantidadFilas>0){
    echo $rowConductor['primer_nombre'].'*'.$rowConductor['segundo_nombre'].'*'.$rowConductor['apellidos'].'*'.$rowConductor['direccion'].'*'.$rowConductor['telefono'].'*'.$rowConductor['ciudad_id'];
    
}
////no hay ninguna  placa o el vehiculo en la base de datos
else{
    echo 0;
}

?>