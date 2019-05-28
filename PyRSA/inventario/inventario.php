<?php
session_start();

  if(empty($_SESSION['usr'])){
    echo "<script>
      alert('Debe auteniticarse');
      window.location.href = './login.php';
    </script>";
    exit();
  }

  include '../bd/conexion.php';
  $qry = 'SELECT * FROM inventario,ubicacion where ubicacion = idUbicacion ORDER BY r3;';

  $tablaBD = mysqli_query($link, $qry);

  //si existen registros crear table
  //if( mysqli_num_rows($tablaBD)>0){
  	//crear el encabezado de la tabla
  	?>
  	<!DOCTYPE html>
  	<html>
  	<head>
      <title>Inventario</title>
       		
      <style type="text/css">
        div.container{
          width: 90%;
        }
      </style>

      <script type="text/javascript">
        $(document).ready(function(){
        
          $("#editar").load("../inventario/mdlUpdEq.php")
          $("#agregar").load("../inventario/mdlAddEq.php")
          $("#grid").DataTable({

            "language": {
              "decimal":        "",
              "emptyTable":     "Sin informacion disponible en la tabla",
              "info":           "Mostrando pagina _START_ de _TOTAL_",
              "infoEmpty":      "Mostrando pagina 0 de 0 ",
              "infoFiltered":   "(filtrado de _MAX_ paginas totales)",
              "infoPostFix":    "",
              "thousands":      ",",
              "lengthMenu":     "Mostrar _MENU_ registros por pagina",
              "loadingRecords": "Cargando...",
              "processing":     "Procesando...",
              "search":         "Buscar:",
              "zeroRecords":    "No se encontraron coincidencias con los registros",
              "paginate": {
                  "first":      "Primero",
                  "last":       "Ultimo",
                  "next":       "Siguiente",
                  "previous":   "Anterior"
                }
            },

            dom: 'Bfrtip',
            buttons: [
              {
                text: "Agregar",
                action: function ( e, dt, node, config ) {
                  $("#mdlAddEq").modal();
                }
              },
              {
                text: "Regresar",
                  action: function ( e, dt, node, config ) {
                    $("#VerMenu").css("display","none");
                    $("#texto").css("display","block");
                  }
              }
            ]
          })//Fin DataTable


      })    
          
        

       </script>
  	</head>
  	<body>
      <div class="container">
        <div id="editar"></div>
        <div id="agregar"></div>
        <div id="msj"></div>
      <h1 align="center">Inventario de Equipos</h1><br/>
  		<table id='grid' class='display' align='center' border='1' style="width: 100%">
        <thead>
  				<tr style='background-color: #BAB7B7'>
  					<th width='50' height='20'>R3</th>
  					<th>Ubicacion</th>
            <th>Equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>No. Serie</th>
            <th>Contraseña</th>
            <th>Usuario</th>
            <th>Acceso</th>
  				</tr>
  			</thead>
  			<tbody style="overflow: auto;" >
  				<?php
  				//desplegar los registros de la tabla especialidades de la bd
  				while ( $registro = mysqli_fetch_array($tablaBD)) {
  					$r3 = $registro['r3'];
  					$ubicacion = $registro['ubicacion'];
  					$equipo = $registro['equipo'];
            $contrasena = $registro['contrasena'];
            $usuario = $registro['usuario'];
            $acceso = $registro['acceso'];
            $marca = $registro['marca'];
            $modelo = $registro['modelo'];
            $nSerie = $registro['nSerie'];
            $idUbicacion = $registro['idUbicacion'];
            $subestacion = $registro['subestacion'];
            $voltSist = $registro['voltSist'];
            $sitio = $registro['sitio'];
  					echo "<tr onClick=\"javascript: 
                $('#frmUpdEq #pyR3').text('$r3').attr('value','$r3');
                $('#frmUpdEq #pyUbicacion1').text('$subestacion $voltSist $sitio').attr('value','$idUbicacion');
                $('#frmUpdEq #pyEquipo').text('$equipo').attr('value','$equipo');
                $('#frmUpdEq #pyContrasena').text('$contrasena').attr('value','$contrasena');
                $('#frmUpdEq #pyUsuario').text('$usuario').attr('value','$usuario');
                $('#frmUpdEq #pyAcceso').text('$acceso').attr('value','$acceso');
                $('#frmUpdEq #pyMarca').text('$marcat').attr('value','$marca');
                $('#frmUpdEq #pyModelo').text('$modelo').attr('value','$modelo');
                $('#frmUpdEq #pynSerie').text('$nSerie').attr('value','$nSerie');
                $('#mdlUpdEq').modal();\">

								<td height='20'>$r3</td>
								<td>$subestacion $voltSist $sitio</td>
                <td>$equipo</td>
                <td>$marca</td>
                <td>$modelo</td>
                <td>$nSerie</td>
                <td>$usuario</td>
                <td>$contrasena</td>
                <td>$acceso</td>
							</tr>";
  				}
  			echo "	</table>
  					</tbody>
            </div>
          </body>";
  			/*}
  			else{
  				//notificar que no existe registros en la tabla especialidades
  				echo "
  				<table border='0' align='center' bordercolor='#ff3333'>
  					<tr>
  						<td></td>
  					</tr>
  					<tr align='center'>
  						<td align='center'><font color='#ff3333'>No existen registros en la tabla de Especialidades!!</font></td>
  					</tr>
  				</table>
  			</body>
  			";
  		}*/
	//cerrar la conexion a la bd
	mysqli_free_result($link, $tablaBD);// libera los registros de la tabla
	mysqli_close($link);
				?>
      
</html>