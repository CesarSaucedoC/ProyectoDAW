<!-- Modal Agregar Necesidad-->
	<script type="text/javascript">
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
	</script>
   <div id="frmAddNec" class="modal" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
 		<div class="modal-content">
      	<form id="frmAddNec" >
		      <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
		         <h1 class="modal-title">Agregar necesidad</h1>
		      </div>
		      <div class="modal-body" >
		        <h4>Ingrese los datos para completar el formulario.</h4>
		        <input type='hidden' id='pyOpc' name='pyOpc' value='add'>
		        <table style="width: 100%">
		        	<tr>
				        <td><div class="form-group">
				  		    <label ><p>Necesidad</p></label>
				            <input type="text" required class="form-control" name="pyNecesidad" id="pyNecesidad" autofocus maxlength="5">
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>OT</p></label>
				            <input type="text" required class="form-control" name="pyOT" id="pyOT" autofocus maxlength="12">
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
				            	<option value="si">si</option>
				            	<option value="no">no</option>
				            </select>
				        </div></td>
				    </tr>
				    <tr>
				        <td><div class="form-group">
				            <label ><p>Fecha de Solicitud</p></label>
				            <input type="date" class="form-control" name="pyFechaS" id="pyFechaS" autofocus min="01-01-2018" max="31-12-2030">
				        </div></td>
				        <td><div class="form-group">
				            <label ><p>Estado</p></label>
				            <input type="text" class="form-control" name="pyEstado" id="pyEstado" autofocus maxlength="20">
				        </div></td>
				    </tr>
				    <tr>
				        <td colspan="2"><div class="form-group">
				            <label ><p>Comentario</p></label>
				            <textarea rows="7" class="form-control" name="pyComentario" id="pyComentario" autofocus maxlength="100" style="overflow-y: scroll;"></textarea>
				        </div></td>
				    </tr>
				    <tr>
					    <td colspan="2"><div class="modal-footer">
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