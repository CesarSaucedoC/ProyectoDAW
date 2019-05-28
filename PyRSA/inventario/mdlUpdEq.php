<!-- Modal Actualizar Equipos-->
	<script>
		$("#frmUpdEq").on("submit",function(e){
			e.preventDefault();
	        $.ajax({
	          	async: true,
          		type: "POST", 
          		data: $(this).serialize(),
          		url: "../inventario/qryInv.php",
          		success: function(response) 
	        	{
	            	$("#mensaje").html(response);
	          	}
	        })
	    })

	    $("#btnEliminar").on("click",function(){
	    	var del = $(this).val();
	    	var id = $("#pyR3").val();
	        $.ajax({
	          	async: true,
          		type: "POST", 
          		data: {pyOpc:del,pyR3:id},
          		url: "../inventario/qryInv.php",
          		success: function(response) 
	        	{
	            	$("#mensaje").html(response);
	          	}
	        })
	    })

	</script>
   <div id="mdlUpdEq" class="modal" role="dialog">
      <div class="modal-dialog">
      	<?php
      		include '../bd/conexion.php';
			$mqry = 'SELECT * FROM ubicacion ORDER BY idUbicacion;';
  			$tabla = mysqli_query($link, $mqry);
    	?>
      <!-- Modal content-->
 		<div class="modal-content">
      	<form id="frmUpdEq" >
		      <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
		         <h1 class="modal-title">Actualizar datos de equipo</h1>
		      </div>
		      <div class="modal-body" >
		        <h4>Modifique los campos necesarios.</h4>
		        <table style="width: 100%">
		        	<tr>
				        <td><div class="form-group">
				        	<label ><p>R3</p></label>
				        	<input type='hidden' id='pyOpc' name='pyOpc' value='upd'>
				            <input type="text" required class="form-control" name="pyR3" id="pyR3" autofocus maxlength="9" readonly>
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>Ubicacion</p></label>
				            <select type="text" required class="form-control" name="pyUbicacion" id="pyUbicacion" autofocus>
				            	<option id="pyUbicacion1"></option>
				            	<?php
					            	//desplegar los registros de la tabla ubicacion en el select
	  								while ( $reg = mysqli_fetch_array($tabla)) {
	  									$id = $reg[0];
	  									$sub = $reg[1];
	  									$volt = $reg[2];
	  									$sitio = $reg[3];
	  									echo "<option value='$id'>$sub, $volt, $sitio</option>";	  	
	  								}
				            	?>
				            </select>
				        </div></td>
				    </tr>
				    <?php
				    	mysqli_free_result($link, $tabla);// libera los registros de la tabla
						mysqli_close($link);
					?>
				    <tr>
				        <td><div class="form-group">
				            <label ><p>Equipo</p></label>
				            <input type="text" required class="form-control" name="pyEquipo" id="pyEquipo" autofocus>
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>Marca</p></label>
				            <input type="text" class="form-control" name="pyMarca" id="pyMarca" autofocus>
				        </div></td>
				    </tr>
				    <tr>
				        <td><div class="form-group">
				            <label ><p>Modelo</p></label>
				            <input type="text" class="form-control" name="pyModelo" id="pyModelo" autofocus>
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>Numero de serie</p></label>
				            <input type="text" class="form-control" name="pynSerie" id="pynSerie" autofocus>
				        </div></td>
				    </tr>
				    <tr>
				        <td><div class="form-group">
				            <label ><p>Contraseña</p></label>
				            <input type="text" class="form-control" name="pyContrasena" id="pyContrasena" autofocus>
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>Usuario</p></label>
				            <input type="text" class="form-control" name="pyUsuario" id="pyUsuario" autofocus>
				        </div></td>
				    </tr>
				    <tr>
				        <td><div class="form-group">
				            <label ><p>Acceso</p></label>
				            <input type="text" required class="form-control" name="pyAcceso" id="pyAcceso" autofocus>
				        </div></td>
				        <td></td>
				    </tr>
				    <tr>
				    	<td><div class="modal-footer">
					    	<input type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#confirmInv" value="Eliminar">
					    </div></td>
					    <td><div class="modal-footer">
					      	<input type="submit" class="btn btn-primary" value="Grabar">
					        <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					    </div></td>
					</tr>
					</table>
	     		</div>
	     	</form>
   	</div>
</div>
</div>
<!-- Modal Eliminar-->
<div class="modal" id="confirmInv" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¡Advertencia!</h4>
        </div>
        <div class="modal-body">
          <p>Esta a punto de eliminar el registro, esta accion no se puede deshacer.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelar" data-toggle="modal" data-target="#mdlUpdEq">Cancelar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnEliminar" value="del">Eliminar</button>
        </div>
      </div>
    </div>
  </div>