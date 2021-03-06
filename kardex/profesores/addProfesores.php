<?php
	session_start();
	if(empty($_SESSION['usr']))	{
		echo "Debe autentificarse!";
		exit();
	}

	include '../bd/conexion.php';

?>
<html>
<head>
	<title>Agrega Profesores</title>
</head>
<body>
<form id='frmAddProfesores' action='./qryProfesores.php' method='POST'>
	<table align='center' border='0'>
		<tr height='50'>
			<td colspan='2' align='center'>
			<b>Agregando Profesores</b>
			<input type='hidden' id='txtOpc' name='txtOpc' value='add'>
			</td>
		</tr>
		<tr>
			<td>Clave</td>
			<td><input type='text' id='txtClave' name='txtClave' maxlength="3" autofocus></td>
		</tr>
		<tr>
			<td>Nombre</td>
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
	</table>
	<table align='center'>
	<tr height='50px'>
		<td align='center'>
			<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick="javascript: grabar('profesores');">
		</td>
		<td colspan='2' align='center'>
			<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick="javascript: window.location.href = './shwProfesores.php';">
		</td>
	</tr>
</table>
</form>

</body>
<script type='text/javascript' src='../js/funciones.js'></script>
</html>
