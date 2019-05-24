<?php
session_start();

  if(empty($_SESSION['usr'])){
    echo "<script>alert('Debe auteniticarse')</script>";
    exit();
  }

  include '../bd/conexion.php';
  $qry = 'SELECT * FROM inventario ORDER BY r3;';

  $tablaBD = mysqli_query($link, $qry);

  //si existen registros crear table
  //if( mysqli_num_rows($tablaBD)>0){
  	//crear el encabezado de la tabla
  	?>
  	<!DOCTYPE html>
  	<html>
  	<head>
      <title>Inventario</title>
      <!--<link rel="stylesheet" href="../bootstrap/bootstrap-3.4.1/css/bootstrap.min.css">
      <script type='text/javascript' src='../js/jquery-3.3.1.js'></script>
      <link rel='stylesheet' href='../css/jquery.dataTables.min.css'>
      <link rel='stylesheet' href='../css/jquery.buttons.dataTables-1.5.6.min.css'>
      <script src="../bootstrap/bootstrap-3.4.1/js/bootstrap.min.js"></script>
      <script src='../js/jquery.dataTables.min.js'></script>
      <script src='../js/jquery.dataTables-1.5.6.buttons.min.js'></script>-->
  		

      <script type='text/javascript'>
        $(document).ready(function() {
          $("#editar").load("./mdlActEq.php");

          $("#agregar").load("./mdlAgrEq.php");

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
      <h1 align="center">Inventario de Equipos</h1><br/>
  		<table id='grid' class='display' align='center' border='1' width='100%'>
        <thead>
  				<tr style='background-color: #BAB7B7'>
  					<th width='50' height='20'>R3</th>
  					<th>Ubicacion</th>
            <th>Equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>No. Serie</th>
            <th>Coontraseña</th>
            <th>Usuario</th>
            <th>Acceso</th>
  				</tr>
  			</thead>
  			<tbody style="overflow: auto;" >
  				<?php
  				//desplegar los registros de la tabla especialidades de la bd
  				while ( $registro = mysqli_fetch_array($tablaBD)) {
  					$r3 = $registro[1];
  					$ubicacion = $registro[2];
  					$equipo = $registro[3];
            $contrasena = $registro[4];
            $usuario = $registro[5];
            $acceso = $registro[6];
            $marca = $registro[7];
            $modelo = $registro[8];
            $nSerie = $registro[9];
  					echo "<tr id='upd' 
  							onClick='javascript: 
                $(\"#mdlUpdEsp #txtNombre\").text(\"$nombre\").val(\"$nombre\");
                $(\"#mdlUpdEsp #txtClave\").text(\"$clave\").val(\"$clave\");
                $(\"#mdlUpdEsp\").modal();'
  							>

								<td height='20'>$R3</td>
								<td>$ubicacion</td>
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