//funciones de js
function grabar(opc){
	switch(opc){
	case 'especialidades':
		document.getElementById("txtOpc").value = 'add';
		if(document.getElementById("txtClave").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtClave").focus();
			return false;
		}
		if (document.getElementById("txtNombre").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtNombre").focus();
			return false;
		}
		//document.getElementById("frmAddEspecialidades").submit();
		break;

	case 'profesores':
		document.getElementById("txtOpc").value = 'add';
		if(document.getElementById("txtClave").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtClave").focus();
			return false;
		}
		if (document.getElementById("txtNombre").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtNombre").focus();
			return false;
		}
		if (document.getElementById("txtPaterno").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtPaterno").focus();
			return false;
		}
		if (document.getElementById("txtMaterno").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtMaterno").focus();
			return false;
		}
		document.getElementById("frmAddProfesores").submit();
		break;

	case 'cursos':
		document.getElementById("txtOpc").value = 'add';
		if(document.getElementById("txtClave").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtClave").focus();
			return false;
		}
		if (document.getElementById("txtNombre").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtNombre").focus();
			return false;
		}
		if (document.getElementById("txtEspecialidad").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtEspecialidad").focus();
			return false;
		}
		if (document.getElementById("txtSemestre").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtSemestre").focus();
			return false;
		}
		
		document.getElementById("frmAddCursos").submit();
		break;		

	case 'calificaciones':
		document.getElementById("txtOpc").value = 'add';
		if(document.getElementById("txtMatricula").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtMatricula").focus();
			return false;
		}
		if (document.getElementById("txtCurso").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtCurso").focus();
			return false;
		}
		if (document.getElementById("txtProfesor").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtProfesor").focus();
			return false;
		}
		if (document.getElementById("txtPeriodo").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtPeriodo").focus();
			return false;
		}
		if (document.getElementById("txtCalif").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtCalif").focus();
			return false;
		}

		document.getElementById("frmAddCalificaciones").submit();
		break;		
	
	case 'alumnos':
		document.getElementById("txtOpc").value = 'add';
		if(document.getElementById("txtMatricula").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtMatricula").focus();
			return false;
		}
		if (document.getElementById("txtNombre").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtNombre").focus();
			return false;
		}
		if (document.getElementById("txtPaterno").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtPaterno").focus();
			return false;
		}
		if (document.getElementById("txtMaterno").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtMaterno").focus();
			return false;
		}
		if (document.getElementById("txtEspecialidad").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtEspecialidad").focus();
			return false;
		}
		if (document.getElementById("txtfIngreso").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtfIngreso").focus();
			return false;
		}

		document.getElementById("frmAddAlumnos").submit();
		break;		
	

	}
	
}