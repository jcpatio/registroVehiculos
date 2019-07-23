<?php
include 'conexiones/conexion.php';
$con = conectar();



////variables del propietario
$nDocumentoPropietario = $_POST[ 'nDocumentoPropietario' ];
$primerNombrePropietario = strtoupper($_POST[ 'primerNombrePropietario' ]);
$segundoNombrePropietario = strtoupper($_POST[ 'segundoNombrePropietario' ]);
$apellidoPropietario = strtoupper($_POST[ 'apellidoPropietario' ]);
$direccionPropietario = strtoupper($_POST[ 'direccionPropietario' ]);
$telefonoPropietario = $_POST[ 'telefonoPropietario' ];
$ciudadPropietario = $_POST[ 'ciudadPropietario' ];


////variables del conductor
$nDocumentoConductor = $_POST[ 'nDocumentoConductor' ];
$primerNombreConductor = strtoupper($_POST[ 'primerNombreConductor' ]);
$segundoNombreConductor = strtoupper($_POST[ 'segundoNombreConductor' ]);
$apellidoConductor = strtoupper($_POST[ 'apellidoConductor' ]);
$direccionConductor = strtoupper($_POST[ 'direccionConductor' ]);
$telefonoConductor = $_POST[ 'telefonoConductor' ];
$ciudadConductor = $_POST[ 'ciudadConductor' ];


////verificamos si existe el propietario

$qPropietario = "SELECT * FROM  propietarios where  n_documento LIKE '%$nDocumentoPropietario%'";									
$rPropietario= mysqli_query($con,$qPropietario) or die(mysqli_error());	
$rowPropietario = mysqli_fetch_assoc($rPropietario);
$rowCantidadFilas = $rPropietario ->num_rows;

////no  existe el propietario
if($rowCantidadFilas==0){
///ingresamos el propietario
 $qPropietario = "INSERT INTO propietarios (n_documento, primer_nombre, segundo_nombre, apellidos, direccion, telefono, ciudad_id)VALUES('$nDocumentoPropietario', '$primerNombrePropietario', '$segundoNombrePropietario','$apellidoPropietario','$direccionPropietario','$telefonoPropietario','$ciudadPropietario')";						
 mysqli_query( $con, $qPropietario)or die( mysqli_error() );

    $propietarioId = mysqli_insert_id( $con );    
}
////existe el  propietario
else{
    $propietarioId = $rowPropietario['propietario_id'];    
}



////verificamos si existe el conductor

$qConductor = "SELECT * FROM  conductores where  n_documento LIKE '%$nDocumentoConductor%'";									
$rConductor= mysqli_query($con,$qConductor) or die(mysqli_error());	
$rowConductor = mysqli_fetch_assoc($rConductor);
$rowCantidad = $rConductor ->num_rows;

////no  existe el conductor
if($rowCantidad==0){
///ingresamos el conductor
 $qConductor = "INSERT INTO conductores (n_documento, primer_nombre, segundo_nombre, apellidos, direccion, telefono, ciudad_id)VALUES('$nDocumentoConductor', '$primerNombreConductor','$segundoNombreConductor','$apellidoConductor','$direccionConductor','$telefonoConductor','$ciudadConductor')";						
 mysqli_query( $con, $qConductor)or die( mysqli_error() );
    
    $conductorId = mysqli_insert_id( $con );

}
////existe el  propietario
else{
    $conductorId = $rowConductor['conductor_id'];    
}

insertarVehiculo($propietarioId, $conductorId);

function insertarVehiculo($propietarioId, $conductorId){

    global $con;
    ///variables vehiculo

    $placaVehiculo = strtoupper($_POST[ 'placaVehiculo' ]);
    $color = strtoupper($_POST[ 'color' ]);
    $marca = $_POST[ 'marca' ];
    $tipoVehiculo = $_POST[ 'tipoVehiculo' ];
    
    
    $qPropietario = "INSERT INTO vehiculos (placa, color, marca_id, tipo_vehiculo_id, propietario_id, conductor_id)VALUES('$placaVehiculo', '$color', '$marca','$tipoVehiculo','$propietarioId','$conductorId')";						
    mysqli_query( $con, $qPropietario)or die( mysqli_error() );
    
     echo "<script language='Javascript'> window.location='registroExitoso.php';
		  </script>";
}



 



?>