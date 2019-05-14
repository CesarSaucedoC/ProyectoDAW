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
	<title>Agrega cursos</title>
</head>
<body>
<form id='frmAddCursos' action='./qryCursos.php' method='POST'>
	<table align='center' border='0'>
		<tr height='60'>
			<td colspan='2' align='center' width='300'>
			<b>Agregando cursos</b>
			<input type='hidden' id='txtOpc' name='txtOpc' value='add'>
			</td>
		</tr>
		<tr>
			<td>Clave</td>
			<td><input type='text' id='txtClave' name='txtClave' maxlength="2" autofocus></td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td><input type='text' id='txtNombre' name='txtNombre' maxlength="30" autofocus></td>
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
			<td>Semestre</td>
			<td><input type='text' id='txtSemestre' name='txtSemestre' maxlength="2" autofocus></td>
		</tr>
		
	</table>
	<table align='center'>
	<tr height='50px'>
		<td align='center'>
			<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick="javascript: grabar('cursos');">
		</td>
		<td colspan='2' align='center'>
			<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick="javascript: window.location.href = './shwCursos.php';">
		</td>
	</tr>
</table>
</form>

</body>
<script type='text/javascript' src='../js/funciones.js'></script>
</html>
