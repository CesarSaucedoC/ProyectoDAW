<?php
session_start();

	if(empty($_SESSION['usr'])){
		echo "Debe auteniticarse";
		exit();
	}
?>
<!DOCTYPE html
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript">
	 	function opcion(opc) {
		switch (opc) {
			case'Especialidades':
				top.frames[2].location.href="../especialidades/shwEspecialidades.php"
				break;
			case 'Profesores':
				top.frames[2].location.href="../profesores/shwProfesores.php"
				break;
			case'Cursos':
				top.frames[2].location.href="../cursos/shwCursos.php";
				break;
			case'Alumnos':
				top.frames[2].location.href="../alumnos/shwAlumnos.php";
				break;
			case'Calificaciones':
				top.frames[2].location.href="../calificaciones/shwCalificaciones.php";
				break;
			case'Terminar':
				window.top.location.href="http://www.google.com";
				break;
		}
	}
	</script>
	<style type = "text/css">
		.tamanoBoton{
			width: 150px;
			height: 40px;
	 }
	</style>
</head>
<body>
	<table>
		<tr>
			<td>
				<input type="button" value="Especialidades" class="tamanoBoton" onclick="opcion('Especialidades');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Profesores" class="tamanoBoton" onclick="opcion('Profesores');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Cursos" class="tamanoBoton" onclick="opcion('Cursos');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Alumnos" class="tamanoBoton" onclick="opcion('Alumnos');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Calificaciones" class="tamanoBoton" onclick="opcion('Calificaciones');">
			</td>
		</tr>
		<tr style="height: 200px">
			<td>
				<input type="button" value="Terminar" class="tamanoBoton" onclick="opcion('Terminar');">
			</td>
		</tr>
	</table>
</body>
</html>
