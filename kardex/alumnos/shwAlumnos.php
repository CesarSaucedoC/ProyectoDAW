<?php
session_start();

	if(empty($_SESSION['usr'])){
    echo "Debe auteniticarse";
    exit();
  }

  include '../bd/conexion.php';
  $qry = 'SELECT alumno.matricula, alumno.nombre, alumno.materno,alumno.paterno,especialidad.nombre AS \'especialidad\',alumno.fingreso FROM alumno,especialidad  WHERE especialidad.clave=alumno.especialidad ORDER BY alumno.matricula;';

  $tablaBD = mysqli_query($link, $qry);

  //si existen registros crear table
  if( mysqli_num_rows($tablaBD)>0){
  	//crear el encabezado de la tabla
  	?>
  	<!DOCTYPE html>
  	<html>
  	<head>
      <script type='text/javascript' src='../js/jquery-3.3.1.js'></script>
      <link rel='stylesheet' type='text/css' href='../css/jquery.dataTables.min.css'/>
      <script type='text/javascript' src='../js/jquery.dataTables.min.js'></script>
  		<title>shw Alumnos</title>
  	</head>
  	<body>
  		<table align='center' width='400' border='0'>
  			<tr>
  				<td colspan='2' align='center'>
  					<input type='hidden' name='txtOpc' id='txtOpc'>
  					<input type='button' name='btnAgregar' id='btnAgregar' value='Agregar'
  					onClick='enviar()'>

  					<input type='button' name='btnRegresar' id='btnRegresar' value='Regresar'
  					style='width: 100px';
  					onClick="javascript: window.location.href='../inicio/nada.html'">
  				</td>
  			</tr>
  		</table>
  		<table id='grid' class='display' align='center' border='1' width='900'>
  			<thead>
  				<tr style='background-color: #BAB7B7'>
  					<th width='80' height='20'>Matricula</th>
  					<th>Nombre(s)</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Especialidad</th>
            <th>Fecha de Ingreso</th>
  				</tr>
  			</thead>
  			<tbody style="overflow: auto;">
  				<?php
  				//desplegar los registros de la tabla especialidades de la bd
  				while ( $registro = mysqli_fetch_array($tablaBD)) {
  					$matricula = $registro['matricula'];
  					$nombre = $registro['nombre'];
            $paterno = $registro['paterno'];
            $materno = $registro['materno'];
            $especialidad = $registro['especialidad'];
            $fingreso = $registro['fingreso'];
  					echo "<tr
  							onMouseOver='javascript:this.bgColor=\"#bcf5a9\";
  							this.style.cursor=\"pointer\";'

  							onMouseOut='javascript:this.bgColor=\"#ffffff\";
							this.style.cursor=\"default\";'

  							onclick='javascript:window.location.href=\"./updAlumnos.php?matricula=$matricula\";'>

								<td width='50'>$matricula</td>
								<td>$nombre</td>
                <td>$paterno</td>
                <td>$materno</td>
                <td>$especialidad</td>
                <td>$fingreso</td>
							</tr>";
  				}
  			echo "	</table>
  					</tbody>
          </body>";
  			}
  			else{
  				//notificar que no existe registros en la tabla especialidades
  				echo "
  				<table border='0' align='center' bordercolor='#ff3333'>
  					<tr>
  						<td></td>
  					</tr>
  					<tr align='center'>
  						<td align='center'><font color='#ff3333'>No existen registros en la tabla de Alumnos!!</font></td>
  					</tr>
  				</table>
  			</body>
  			";
  		}
	//cerrar la conexion a la bd
	mysqli_free_result($link, $tablaBD);// libera los registros de la tabla
	mysqli_close($link);
				?>
  			
<script type='text/javascript'>
	$(document).ready(function() {
    $('#grid').DataTable();
  } );

  function enviar(){
		document.getElementById('txtOpc').value='add';
		window.location.href = 'addAlumnos.php';
	}
</script>
</html>