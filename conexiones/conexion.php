<?php
header('Access-Control-Allow-Origin: *');
# FileName="Connection_php_mysql.htm"
# JUAN CARLOS PATIÑO 2018 - TODOS LOS DERECHOS RESERVADOS
# Type="MYSQL"


function conectar() {

	$user = "root";
	$pass = "netdova2";
	$server = "localhost";
	$db = "acme";
	$con = mysqli_connect( $server, $user, $pass, $db )or die( 'Ha fallado la conexion: ' . mysqli_error( $con ) );
	mysqli_set_charset( $con, "utf8" );

	//mysqli_query ("SET NAMES 'utf8'");


	return $con;
}



?>