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
  $qry = 'SELECT * FROM necesidad ORDER BY idNecesidad;';

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

      <script type='text/javascript'>


        $(document).ready(function() {
          $("#editar").load("../necesidades/mdlActNec.php");
          $("#agregar").load("../necesidades/mdlAgrNec.php");

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
                  $("#mdlAgrNec").modal('show');
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
          });//Fin DataTable

        });

       </script>
  	</head>
  	<body>
      <div class="container">
        <div id="editar"></div>
        <div id="agregar"></div>
      <h1 align="center">Necesidades de material para mantenimiento</h1><br/>
  		<table id='grid' class='display' align='center' border='1' style="width: 100%">
        <thead>
  				<tr style='background-color: #BAB7B7'>
  					<th width='50' height='20'>Necesidad</th>
  					<th>OT</th>
            <th>Tipo</th>
            <th>Disponible</th>
            <th>Solicitao</th>
            <th>Estado</th>
            <th>Comentario</th>
  				</tr>
  			</thead>
  			<tbody style="overflow: auto;" >
  				<?php
  				//desplegar los registros de la tabla especialidades de la bd
  				while ( $registro = mysqli_fetch_array($tablaBD)) {
  					$idNecesidad = $registro['idNecesidad'];
  					$ot = $registro['ordenTrabajo'];
  					$tipo = $registro['tipo'];
            $disponible = $registro['disponible'];
            $fechaSolicitud = $registro['fechaSolicitud'];
            $estado = $registro['estado'];
            $comentario = $registro['comentario'];
  					echo "<tr onClick=\"javascript: 
                $('#frmActNec #pyNecesidad').text('$idNecesidad').attr('value','$idNecesidad');
                $('#frmActNec #pyOT').text('$ot').attr('value','$ot');
                $('#frmActNec #pyTipo').text('$tipo').attr('value','$tipo');
                $('#frmActNec #pyDisponible1').text('$disponible').attr('value','$disponible');
                $('#frmActNec #pyFechaS').text('$fechaSolicitud').attr('value','$fechaSolicitud');
                $('#frmActNec #pyEstado').text('$estado').attr('value','$estado');
                $('#frmActNec #pyComentario').text('$comentario').attr('value','$comentario');
                $('#mdlActNec').modal();\">

								<td height='20'>$idNecesidad</td>
                <td>$ot</td>
                <td>$tipo</td>
                <td>$disponible</td>
                <td>$fechaSolicitud</td>
                <td>$estado</td>
                <td>$comentario</td>
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