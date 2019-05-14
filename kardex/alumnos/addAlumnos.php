<?php
	session_start();
	if(empty($_SESSION['usr']))	{
		echo "Debe autentificarse!";
		exit();
	}

	include '../bd/conexion.php';
	
	$qryEspecialidad = 'SELECT nombre,clave FROM especialidad GROUP BY clave;';
	
  	$listaEspecialidad = mysqli_query($link, $qryEspecialidad);

?>
<html>
<head>
	<title>Agrega alumnos</title>
</head>
<body>
<form id='frmAddAlumnos' action='./qryAlumnos.php' method='POST'>
	<table align='center' border='0'>
		<tr height='50'>
			<td colspan='2' align='center'>
			<b>Agregando alumnos</b>
			<input type='hidden' id='txtOpc' name='txtOpc' value='add'>
			</td>
		</tr>
		<tr>
			<td>Matricula</td>
			<td><input type='text' id='txtMatricula' name='txtMatricula' maxlength="2" autofocus></td>
		</tr>
		<tr>
			<td>Nombre(s)</td>
			<td><input type='text' id='txtNombre' name='txtNombre' maxlength="20" autofocus=""></td>
		</tr>
		<tr>
			<td>Apellido Paterno</td>
			<td><input type='text' id='txtPaterno' name='txtPaterno' maxlength="20" autofocus=""></td>
		</tr>
        <tr>
			<td>Apellido Materno</td>
			<td><input type='text' id='txtMaterno' name='txtMaterno' maxlength="20" autofocus=""></td>
		</tr>
		<tr>
			<td>Especialidad</td>
			<td>
				<select id='txtEspecialidad' name='txtEspecialidad' autofocus>
					<option value=''>-- Seleccione una opcion --</option>
				<?php
					while($registro = mysqli_fetch_array($listaEspecialidad)){
					$nombre = $registro['nombre'];
					$clave = $registro['clave'];

					echo "<option value='$clave'>$nombre</option>";
				}
				mysqli_free_result($link, $tablaBD);
				mysqli_close($link);
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Fecha de ingreso</td>
			<td><input type='date' id='txtfIngreso' name='txtfIngreso' autofocus=""></td>
		</tr>
	</table>
	<table align='center'>
	<tr height='50px'>
		<td align='center'>
			<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick="javascript: grabar('alumnos');">
		</td>
		<td colspan='2' align='center'>
			<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick="javascript: window.location.href = './shwAlumnos.php';">
		</td>
	</tr>
</table>
</form>

</body>
<script type='text/javascript' src='../js/funciones.js'></script>
</html>
