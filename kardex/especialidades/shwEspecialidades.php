<?php
session_start();

	if(empty($_SESSION['usr'])){
    echo "<script type='text/javascript'>
      alert('Debe autentificarse');
    </script>";
    exit();
  }

  include '../bd/conexion.php';
  $qry = 'SELECT * FROM especialidad ORDER BY especialidad.clave;';

  $tablaBD = mysqli_query($link, $qry);

  //si existen registros crear table
  if( mysqli_num_rows($tablaBD)>0){
  	//crear el encabezado de la tabla
  	?>
  	<!DOCTYPE html>
  	<html>
  	<head>
      <title>shw Especialidades</title>
      <link rel="stylesheet" href="../bootstrap-3.4.1/css/bootstrap.min.css">
      <script type='text/javascript' src='../js/jquery-3.3.1.js'></script>
      <link rel='stylesheet' type='text/css' href='../css/jquery.dataTables.min.css'>
      <link rel='stylesheet' type='text/css' href='../css/jquery.buttons.dataTables-1.5.6.min.css'>
      <script src="../bootstrap-3.4.1/js/bootstrap.min.js"></script>
      <script type='text/javascript' src='../js/jquery.dataTables.min.js'></script>
      <script type='text/javascript' src='../js/jquery.dataTables-1.5.6.buttons.min.js'></script>
  		

      <script type='text/javascript'>
        $(document).ready(function() {
          $("#editar").load("../especialidades/mdlModEsp.php");

          $("#agregar").load("../especialidades/mdlAddEsp.php");

          $("#grid").DataTable({
            dom: 'Bfrtip',
            buttons: [
              {
                text: "Agregar",
                action: function ( e, dt, node, config ) {
                  $("#mdlAddEsp").modal('show');
                  $("#btnGrabar").on('click', function(){
                    if($("#txtClave").val()=="" || $("#txtNombre").val()==""){
                      alert("Campos faltantes, llenelos por favor.");
                    }
                    else{
                      $.ajax({
                        async: true,
                        type: "POST", data: $("#frmAddEspecialidades").serialize(),
                        url: "../especialidades/qryEspecialidades.php",
                        success: function(response) {$("#msg").html(response);}
                      });
                    }
                  });
                }
              },
              {
                text: "Regresar",
                  action: function ( e, dt, node, config ) {
                    $("#tabKardex").css("display","none");
                  }
              }
            ]
          });
        });

  
      </script>
  	</head>
  	<body>
      <div name="contentSHW">
        <div id="msg"></div>
        <div id="agregar"></div>
        <div id="editar"></div>
      </div>
  		<table id='grid' class='display' align='center' border='1' width='400'>
  			<thead>
  				<tr style='background-color: #BAB7B7'>
  					<th width='50' height='20'>Calve</th>
  					<th height='20'>Nombre</th>
  				</tr>
  			</thead>
  			<tbody style="overflow: auto;" >
  				<?php
  				//desplegar los registros de la tabla especialidades de la bd
  				while ( $registro = mysqli_fetch_array($tablaBD)) {
  					$id = $registro['id'];
  					$clave = $registro['clave'];
  					$nombre = $registro['nombre'];
  					echo "<tr id='upd' 
  							

                onClick='javascript: 
                $(\"#mdlUpdEsp #txtNombre\").text(\"$nombre\").val(\"$nombre\");
                $(\"#mdlUpdEsp #txtClave\").text(\"$clave\").val(\"$clave\");
                $(\"#mdlUpdEsp\").modal();'
  							>

								<td width='50'>$clave</td>
								<td>$nombre</td>
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
  						<td align='center'><font color='#ff3333'>No existen registros en la tabla de Especialidades!!</font></td>
  					</tr>
  				</table>
  			</body>
  			";
  		}
	//cerrar la conexion a la bd
	mysqli_free_result($link, $tablaBD);// libera los registros de la tabla
	mysqli_close($link);
				?>


</html>