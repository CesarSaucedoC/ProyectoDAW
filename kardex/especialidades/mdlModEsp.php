<!-- Modal Agregar Especialidades-->
   <div id="mdlUpdEsp" class="modal fade" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
 		<div class="modal-content">
      	<form id="frmUpdEspecialidades" >
		      <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
		         <h1 class="modal-title">Agregar Especialidad</h1>
		      </div>
		      <div class="modal-body" >
		        <h4>Modifique los datos para completar el formulario o elimeine la especialidad.</h4>
		        <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
		        <div class="form-group">
		  		    <label ><p>Clave</p></label>
		            <input type="text" required class="form-control" name="txtClave" id="txtClave" autofocus maxlength="3" disabled>
		        </div>
		        <div class="form-group">
		            <label ><p>Nombre</p></label>
		            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" autofocus maxlength="30">
		        </div>
		        
			    <div class="modal-footer">
			        <div class="form-group">
			      	   <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnGrabar" name="btnGrabar" >Grabar</button>
			         	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			        </div>
			      </div>
	     		</div>
	     	</form>
   	</div>
</div>
</div>