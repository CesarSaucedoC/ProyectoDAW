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
			$idNecesidad = mysqli_real_escape_string($link, $_POST['pyNecesidad']);
  			$ot = mysqli_real_escape_string($link, $_POST['pyOT']);
  			$tipo = mysqli_real_escape_string($link, $_POST['pyTipo']);
            $disponible = mysqli_real_escape_string($link, $_POST['pyDisponible']);
            $fechaSolicitud = mysqli_real_escape_string($link, $_POST['pyFechaS']);
            $estado = mysqli_real_escape_string($link, $_POST['pyEstado']);
            $comentario = mysqli_real_escape_string($link, $_POST['pyComentario']);

           	$strQry = "INSERT INTO necesidad VALUES ('$idNecesidad', '$ot', '$tipo', '$disponible', '$fechaSolicitud','$estado', '$comentario');";

			$result = mysqli_query($link, $strQry) or
			die("<script> 
				alert('Error al ejecutar el query!');
				</script>".mysqli_error());

			//redirigie el programa al script html de captura de datos
			echo "<script> 
				$('#mdlAddNec').modal('hide');
				$('#VerMenu').load('../necesidades/nrcesidad.php');
				</script>";

			break;

		//opcion modificar...
		case 'upd':

			// consultar el query para actualizar en la tabla de la bd...
			$idNecesidad = mysqli_real_escape_string	($link, $_POST['pyNecesidad']);
  			$ot = mysqli_real_escape_string				($link, $_POST['pyOT']);
  			$tipo = mysqli_real_escape_string			($link, $_POST['pyTipo']);
            $disponible = mysqli_real_escape_string		($link, $_POST['pyDisponible']);
            $fechaSolicitud = mysqli_real_escape_string	($link, $_POST['pyFechaS']);
            $estado = mysqli_real_escape_string			($link, $_POST['pyEstado']);
            $comentario = mysqli_real_escape_string		($link, $_POST['pyComentario']);

			$strQry = "UPDATE necesidad  SET ordenTrabajo = '$ot' , tipo = '$tipo', disponible = '$disponible', fechaSolicitud ='$fechaSolicitud', estado ='$estado', comentario ='$comentario' WHERE idNecesidad ='$idNecesidad';";

			$result = mysqli_query($link, $strQry) or
			die("<script> 
				alert ('Error al ejecutar el query upd');
				</script>".mysqli_error());

			//redirigie el programa al script html de actualizacion de datos
			echo "<script  >
				$('#mdlUpdNec').modal('hide');
				$('#VerMenu').load('../necesidades/necesidad.php');
			</script>";
			break;

		// eliminar...
		case 'del':
			// consultar el query para eliminar en la tabla de la bd...
			$idNecesidad = mysqli_real_escape_string($link, $_POST['pyNecesidad']);
			$strQry = "DELETE FROM necesidad WHERE idNecesidad ='$idNecesidad';";

			$result = mysqli_query($link, $strQry) or
			die("<script> 
				alert ('Error al ejecutar el query upd');
				</script>".mysqli_error());

			//redirigie el programa al script html de eliminacion de datos
			echo "<script >
				$('#VerMenu').load('../necesidades/necesidad.php');
			</script>";

			break;
	}

?>
