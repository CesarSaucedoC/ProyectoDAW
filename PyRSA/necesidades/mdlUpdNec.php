<!-- Modal Actualizar Equipos-->
	<script>
		$("#frmAddNec").on("submit",function(e){
			e.preventDefault();
	        $.ajax({
	          	async: true,
          		type: "POST", 
          		data: $(this).serialize(),
          		url: "../necesidades/qryNec.php",
          		success: function(response) 
	        	{
	            	$("#mensaje").html(response);
	          	}
	        })
	    })

	    $("#btnEliminar").on("click",function(){
	    	var id = $("#pyNecesidad").val();
	        $.ajax({
	          	async: true,
          		type: "POST", 
          		data: {pyOpc:"del",pyNecesidad:id},
          		url: "../necesidades/qryNec.php",
          		success: function(response) 
	        	{
	            	$("#mensaje").html(response);
	          	}
	        })
	    })

	</script>
   <div id="mdlAddNec" class="modal" role="dialog">
      <div class="modal-dialog">
      
      <!-- Modal content-->
 		<div class="modal-content">
      	<form id="frmAddNec" >
		      <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
		         <h1 class="modal-title">Actualizar datos de la necesidad</h1>
		      </div>
		      <div class="modal-body" >
		        <h4>Modifique los campos necesarios.</h4>
		        <input type='hidden' id='pyOpc' name='pyOpc' value='upd'>
		        <table style="width: 100%">
		        	<tr>
				        <td><div class="form-group">
				  		    <label ><p>Necesidad</p></label>
				            <input type="text" required class="form-control" name="pyNecesidad" id="pyNecesidad" autofocus maxlength="5" readonly>
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>OT</p></label>
				            <input type="text" required class="form-control" name="pyOT" id="pyOT" autofocus maxlength="12" readonly>
				        </div></td>
				    </tr>
				    <tr>
				        <td><div class="form-group">
				            <label ><p>Tipo</p></label>
				            <input type="text" required class="form-control" name="pyTipo" id="pyTipo" autofocus maxlength="15">
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>Disponible</p></label>
				            <select type="text" class="form-control" name="pyDisponible" id="pyDisponible" autofocus>
				            	<option id="pyDisponible1"></option>
				            	<option value="si">si</option>
				            	<option value="no">no</option>
				            </select>
				        </div></td>
				    </tr>
				    <tr>
				        <td><div class="form-group">
				            <label ><p>Fecha de Solicitud</p></label>
				            <input type="date" class="form-control" name="pyFechaS" id="pyFechaS" autofocus max="31-12-2030"
				            min="01-01-2017">
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>Estado</p></label>
				            <input type="text" class="form-control" name="pyEstado" id="pyEstado" autofocus maxlength="20">
				        </div></td>
				    </tr>
				    <tr>
				        <td colspan="2"><div class="form-group">
				            <label ><p>Comentario</p></label>
				            <textarea rows="5" class="form-control" name="pyComentario" id="pyComentario" autofocus maxlength="100" style="overflow-y: scroll;"></textarea>
				        </div></td>
				    </tr>
				    <tr>
					    <td><div class="modal-footer form-group">
					    	<button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#confirmNec">Eliminar</button>
					    </div></td>
					    <td><div class="modal-footer form-group">
					    	<input type="submit" class="btn btn-primary" id="btnGrabar" name="btnGrabar" value="Grabar">
					        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					    </div></td>
					</tr>
					</table>
	     		</div>
	     	</form>
   	</div>
</div>
</div>
<!-- Modal Eliminar-->
<div class="modal" id="confirmNec" role="dialog">
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
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelar" data-toggle="modal" data-target="#mdlAddNec">Cancelar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnEliminar">Eliminar</button>
        </div>
      </div>
      
    </div>
  </div>