<?php
	session_start();
	if(empty($_SESSION['usr'])){
		echo "<script type='text/javascript'>
			alert('Debe autentificarse');
		</script>";
		exit();
	}

	include_once '../bd/conexion.php';

	$opcion = mysqli_real_escape_string($link, $_POST['pyOpc']);

	switch ($opcion) {
		//opcion grabar
		case 'add':
			// consultar el query para insertar en la tabla de la bd...
			$r3 = mysqli_real_escape_string($link, $_POST['pyR3']);
			$ubicacion = mysqli_real_escape_string($link, $_POST['pyUbicacion']);
  		$equipo = mysqli_real_escape_string($link, $_POST['pyEquipo']);
      $contrasena = mysqli_real_escape_string($link, $_POST['pyContrasena']);
      $usuario = mysqli_real_escape_string($link, $_POST['pyUsuario']);
      $acceso = mysqli_real_escape_string($link, $_POST['pyAcceso']);
      $marca = mysqli_real_escape_string($link, $_POST['pyMarca']);
      $modelo = mysqli_real_escape_string($link, $_POST['pyModelo']);
      $nSerie = mysqli_real_escape_string($link, $_POST['pynSerie']);

			$strQry = "INSERT INTO inventario VALUES ('$r3', '$ubicacion', '$equipo','$contrasena', '$usuario', '$acceso','$marca', '$modelo', '$nSerie');";

			$result = mysqli_query($link, $strQry) or die("<script>
				alert('Error al ejecutar el query!');
				</script>".mysqli_error());

			//redirigie el programa al script html de captura de datos
			echo "<script>
				$('#mdlAddEq').modal('hide');
				$('#VerMenu').load('../inventario/inventario.php');
				</script>";

			break;

		//opcion modificar...
		case 'upd':

			// consultar el query para actualizar en la tabla de la bd...
			$r3 = mysqli_real_escape_string($link, $_POST['pyR3']);
			$ubicacion = mysqli_real_escape_string($link, $_POST['pyUbicacion']);
  			$equipo = mysqli_real_escape_string($link, $_POST['pyEquipo']);
            $contrasena = mysqli_real_escape_string($link, $_POST['pyContrasena']);
            $usuario = mysqli_real_escape_string($link, $_POST['pyUsuario']);
            $acceso = mysqli_real_escape_string($link, $_POST['pyAcceso']);
            $marca = mysqli_real_escape_string($link, $_POST['pyMarca']);
            $modelo = mysqli_real_escape_string($link, $_POST['pyModelo']);
            $nSerie = mysqli_real_escape_string($link, $_POST['pynSerie']);

			$strQry = "UPDATE inventario  SET ubicacion = '$ubicacion', equipo = '$equipo', contrasena ='$contrasena', usuario ='$usuario', acceso ='$acceso', marca ='$marca', modelo ='$modelo', nSerie ='$nSerie' WHERE r3='$r3';";

			$result = mysqli_query($link, $strQry) or die("<script type='text/javascript'>
				alert ('Error al ejecutar el query upd');
				</script>".mysqli_error());

			//redirigie el programa al script html de actualizacion de datos
			echo "<script type='text/javascript'>
				$('#mdlUpdEq').modal('hide');
				$('#VerMenu').load('../inventario/inventario.php');
			</script>";
			break;

		// eliminar...
		case 'del':
			// consultar el query para eliminar en la tabla de la bd...
			$r3 = mysqli_real_escape_string($link, $_POST['pyR3']);
			$strQry = "DELETE FROM inventario WHERE r3 ='$r3';";

			$result = mysqli_query($link, $strQry) or die("<script type='text/javascript'>
				alert ('Error al ejecutar el query upd');
				</script>".mysqli_error());

			//redirigie el programa al script html de eliminacion de datos
			echo "<script type='text/javascript'>
				$('#VerMenu').load('../inventario/inventario.php');
			</script>";

			break;
	}

?>
