<?php
	session_start();
	if(empty($_SESSION['usr'])){
		echo "Debe auteniticarse";
		exit();
	}

	include_once '../bd/conexion.php';

	$opcion = mysqli_real_escape_string($link, $_POST['txtOpc']);

	switch ($opcion) {
		//opcion grabar
		case 'add':
			// consultar el query para insertar en la tabla de la bd...
			$clave = mysqli_real_escape_string($link, $_POST['txtClave']);
			$nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
			$especialidad = mysqli_real_escape_string($link, $_POST['txtEspecialidad']);
			$semestre = mysqli_real_escape_string($link, $_POST['txtSemestre']);
			
			$strQry = "INSERT INTO curso VALUES ('$clave', '$clave', '$nombre', '$especialidad', '$semestre');";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de captura de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCursos.php'
			</script>";

			break;

		//opcion modificar...
		case 'upd':

			// consultar el query para actualizar en la tabla de la bd...
			$clave = mysqli_real_escape_string($link, $_POST['txtClave']);
			$nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
			$especialidad = mysqli_real_escape_string($link, $_POST['txtEspecialidad']);
			$semestre = mysqli_real_escape_string($link, $_POST['txtSemestre']);
			$strQry = "UPDATE curso  SET nombre='$nombre', especialidad='$especialidad', semestre='$semestre' WHERE clave='$clave';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de actualizacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCursos.php'
			</script>";
			
			break;

		// eliminar...
		case 'del':
			// consultar el query para eliminar en la tabla de la bd...
			$clave = mysqli_real_escape_string($link, $_POST['txtClave']);
			$strQry = "DELETE FROM curso WHERE clave ='$clave';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de eliminacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCursos.php'
			</script>";

			break;
	}

?>
