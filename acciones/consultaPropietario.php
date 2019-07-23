<?php
include '../conexiones/conexion.php';
$con=conectar();


$nDocumento= $_POST['nDocumento'];

$qPropietario = "SELECT * FROM  propietarios where  n_documento LIKE '%$nDocumento%'";									
$rPropietario= mysqli_query($con,$qPropietario) or die(mysqli_error());	
$rowPropietario = mysqli_fetch_assoc($rPropietario);
$rowCantidadFilas = $rPropietario ->num_rows;

////existe la placa o el vehiculo en la base de datos
if($rowCantidadFilas>0){
    echo $rowPropietario['primer_nombre'].'*'.$rowPropietario['segundo_nombre'].'*'.$rowPropietario['apellidos'].'*'.$rowPropietario['direccion'].'*'.$rowPropietario['telefono'].'*'.$rowPropietario['ciudad_id'];
    
}
////no hay ninguna  placa o el vehiculo en la base de datos
else{
    echo 0;
}

?>