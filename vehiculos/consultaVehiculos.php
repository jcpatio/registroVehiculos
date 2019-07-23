<?php
header('Access-Control-Allow-Origin: *');
include '../conexiones/conexion.php';
$con = conectar();


	$query1="SELECT * FROM vehiculos  ";
	$busccarEmpresa=$con->query($query1);
		
	$tabla = "";

	
while($fila= $busccarEmpresa->fetch_assoc()){		

		$vehiculoId= $fila['vehiculo_id'];
		$placa= $fila['placa'];
		$marcaId= $fila['marca_id'];
		$tipoVehiculoId= $fila['tipo_vehiculo_id'];
		$propietarioId= $fila['propietario_id'];
		$conductorId= $fila['conductor_id'];
	
        $qConductor = "SELECT * FROM  conductores where  conductor_id = '$conductorId'";									
        $rConductor= mysqli_query($con,$qConductor) or die(mysqli_error());	
        $rowConductor = mysqli_fetch_assoc($rConductor);
    
        $primerNombre = $rowConductor['primer_nombre'];
        $segundoNombre = $rowConductor['segundo_nombre'];
        $apellidos = $rowConductor['apellidos'];
			
        $nombreConductor = $primerNombre.' '.$apellidos;
    
        $qPropietario = "SELECT * FROM  propietarios where  propietario_id = '$propietarioId'";									
        $rPropietario= mysqli_query($con,$qPropietario) or die(mysqli_error());	
        $rowPropietario = mysqli_fetch_assoc($rPropietario);
    
        $primerNombreP = $rowPropietario['primer_nombre'];
        $segundoNombreP = $rowPropietario['segundo_nombre'];
        $apellidosP = $rowPropietario['apellidos'];
			
        $nombrePropietario = $primerNombreP.' '.$apellidosP;
    
    
        $qMarca = "SELECT * FROM  marcas where  marca_id = '$marcaId'";									
        $rMarca= mysqli_query($con,$qMarca) or die(mysqli_error());	
        $rowMarca = mysqli_fetch_assoc($rMarca);
		
        $marca = $rowMarca['marca'];
    
		$ver = '<a href=\"verTodoVehiculo.php?vehiculoId='.$fila['vehiculo_id'].'\" ><i class=\"fas fa-search\"></i></a>';
		
		$tabla.='{
				  
				  "placa":"'."<center>".$placa."</center>".'",
				  "color":"'."<center>".trim($fila['color'])."</center>".'",				  
				  "marca":"'."<center>".trim($marca)."</center>".'",		
				  "propietario":"'."<center>".trim($nombrePropietario)."</center>".'",
				  "conductor":"'."<center>".trim($nombreConductor)."</center>".'",
				  "acciones":"'."<center>".$ver."</center>".'"
				},';
	
}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	


?>