<?php

$host = "localhost";
$dbuser = "pawbd";
$dbpass = "pawbd";
$db = "pyrsa";

$link = mysqli_connect($host,$dbuser,$dbpass,$db);

if(mysqli_connect_error()){
	echo "<script>alert('No se pudo conectar con la base de datos!!!');</script>";
	//echo "<script>window.location.href = '../inicio/login.php';</script>";
	exit();
}
mysqli_select_db($link, 'pyrsa') or die('No se puede abrir la estructua de B.D.'.mysqli_connect_error());
?>