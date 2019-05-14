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
	<script type='text/javascript' src='../js/jquery-3.3.1.js'></script>
    <link rel='stylesheet' type='text/css' href='../css/jquery.dataTables.min.css'>
    <link rel='stylesheet' type='text/css' href='../css/jquery.buttons.dataTables-1.5.6.min.css'>
    <script type='text/javascript' src='../js/jquery.dataTables.min.js'></script>
    <script type='text/javascript' src='../js/jquery.dataTables-1.5.6.buttons.min.js'></script>
	
	<title>Agrega especialidades</title>
</head>
<body>
<form id='frmAddEspecialidades' action='../especialidades/qryEspecialidades.php' method='POST'>
	<table align='center' border='0'>
		<tr height='50'>
			<td colspan='2' align='center'>
			<b>Agregando especialidades</b>
			<input type='hidden' id='txtOpc' name='txtOpc' value='add'>
			</td>
		</tr>
		<tr>
			<td>Clave</td>
			<td><input type='text' id='txtClave' name='txtClave' maxlength="2" autofocus></td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td><input type='text' id='txtNombre' name='txtNombre' maxlength="20" autofocus=""></td>
		</tr>
	</table>
	<table align='center'>
	<tr height='50px'>
		<td align='center'>
			<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick="javascript: grabar('especialidades');">
		</td>
		<td colspan='2' align='center'>
			<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick="'./shwEspecialidades.php';">
		</td>
	</tr>
</table>
</form>

</body>
<script type='text/javascript' src='../js/funciones.js'></script>
</html>
