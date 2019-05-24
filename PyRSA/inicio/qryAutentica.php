<?php
session_start();

include_once '../bd/conexion.php';

//cuando se presiona el boto enviar valida al usuario
if(!isset($_POST['log'])) {exit;}

$usr = $_POST['pyUsr'];
$pwd = md5($_POST['pyPass']);
$strQry = "select * from usuario where rpe = '".$usr."' and pwd='$pwd';";

//ejecutar query
$result = mysqli_query($link,$strQry);

//evalua resultado del query
if(mysqli_num_rows($result)>0){
	//asignar valores del registro inmediato al vector llamado registro
	//$registro = mysqli_fetch_array($result);
	
	//asigna valores de usuario
	$_SESSION['usr'] = $usr;
	//$_SESSION['cat'] = $registro['cat'];
	//header("Location: menuComs.php");
	echo "
	<script>
		window.location.href = './menuComs.php';
	</script>
	";
}
else{
	echo "
	<script>
		//window.location.href = './login.php';
		alert('Usuario y/o contraseña incorrectos');
	</script>
	";
}
?>
