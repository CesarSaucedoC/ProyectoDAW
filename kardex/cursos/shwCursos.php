<?php
session_start();

	if(empty($_SESSION['usr'])){
    echo "Debe auteniticarse";
    exit();
  }

  include '../bd/conexion.php';
  $qry = 'SELECT curso.clave, curso.nombre, especialidad.nombre AS \'especialidad\', curso.semestre FROM curso, especialidad WHERE curso.especialidad=especialidad.clave ORDER BY curso.clave;';
  $tablaBD = mysqli_query($link, $qry);

  //si existen registros crear table
  if( mysqli_num_rows($tablaBD)>0){
  	//crear el encabezado de la tabla
  	?>
  	<!DOCTYPE html>
  	<html>
  	<head>
      <script type='text/javascript' src='../js/jquery-3.3.1.js'></script>
      <link rel='stylesheet' type='text/css' href='../css/jquery.dataTables.min.css'>
      <script type='text/javascript' src='../js/jquery.dataTables.min.js'></script>
  		<title>shw Cursos</title>
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
  		<table id='grid' class='display' align='center' border='1' width='700'>
  			<thead>
  				<tr style='background-color: #BAB7B7'>
  					<th width='50' height='20'>Calve</th>
  					<th height='20'>Nombre</th>
            <th height='20'>Especialidad</th>
            <th height='20'>Semestre</th>
  				</tr>
  			</thead>
  			<tbody style="overflow: auto;">
  				<?php
  				//desplegar los registros de la tabla especialidades de la bd
  				while ( $registro = mysqli_fetch_array($tablaBD)) {
  					$clave = $registro['clave'];
  					$nombre = $registro['nombre'];
            $especialidad = $registro['especialidad'];
            $semestre = $registro['semestre'];
  					echo "<tr
  							onMouseOver='javascript:this.bgColor=\"#bcf5a9\";
  							this.style.cursor=\"pointer\";'

  							onMouseOut='javascript:this.bgColor=\"#ffffff\";
							this.style.cursor=\"default\";'

  							onclick='javascript:window.location.href=\"./updCursos.php?clave=$clave\";'>

								<td width='50'>$clave</td>
								<td>$nombre</td>
                <td>$especialidad</td>
                <td>$semestre</td>
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
  						<td align='center'><font color='#ff3333'>No existen registros en la tabla de Cursos!!</font></td>
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
		window.location.href = 'addCursos.php';
	}
</script>
</html>