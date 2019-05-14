<!DOCTYPE html>
<html lang="sp">
<head>
  <title>ITS.mx</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.4.1/css/bootstrap.min.css">
      <script type='text/javascript' src='../js/jquery-3.3.1.js'></script>
      <link rel='stylesheet' type='text/css' href='../css/jquery.dataTables.min.css'>
      <link rel='stylesheet' type='text/css' href='../css/jquery.buttons.dataTables-1.5.6.min.css'>
      <script src="../bootstrap-3.4.1/js/bootstrap.min.js"></script>
      <script type='text/javascript' src='../js/jquery.dataTables.min.js'></script>
      <script type='text/javascript' src='../js/jquery.dataTables-1.5.6.buttons.min.js'></script>

  <script type="text/javascript">

  	$(document).ready(function(){

      $('#alumnos').on('click', function(){
        $('#tabKardex').load("../alumnos/shwAlumnos.php");
        $('#tabKardex').css('display','block');
    	});

    	$('#cursos').on('click', function(){
        $('#tabKardex').load("../cursos/shwCursos.php");
        $('#tabKardex').css('display','block');
    	});

    	$('#profesores').on('click', function(){
        $('#tabKardex').load("../profesores/shwProfesores.php");
        $('#tabKardex').css('display','block');
    	});

    	$('#calificaciones').on('click', function(){
        $('#tabKardex').load("../calificaciones/shwCalificaciones.php");
        $('#tabKardex').css('display','block');
    	});

    	$('#especialidades').on('click', function(){
        $('#tabKardex').load("../especialidades/shwEspecialidades.php");
        $('#tabKardex').css('display','block');
    	});
   });
  </script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Instituto Tecnologico de Saltillo</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Nosotros<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Mision</a></li>
          <li><a href="#">Vision</a></li>
          <li><a href="#">Acerca De</a></li>
        </ul>
      </li>
      <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kardex<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li id="alumnos">
            <a href="#Alumnos">Alumnos</a></li>
          <li id="cursos">
            <a href="#Cursos">Cursos</a></li>
          <li id="calificaciones">
            <a href="#Calificaciones">Calificaciones</a></li>
          <li id="especialidades">
            <a href="#Especialidades">Especialidades</a></li>
          <li id="profesores">
            <a href="#Profesores">Profesores</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#Login" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>

<div class="container">
	<div id="banner" align="center"><img src="../images/bannerITS.jpg" width='1003 px' height="102 px">
  	</div>

  <!-- Modal de login-->
  <div id="login" class="modal fade" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
 		<div class="modal-content">
    	<form action="./qryAutentica.php" method="POST">
	      <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h1 class="modal-title">Kardex</h1>
	      </div>
	      <div class="modal-body" >
	        <h4>Capture usuario y contraseña para autenticarse.</h4>
	        <div class="form-group">
	  		    <label for="txtUsuario"><p>Usuario</p></label>
	          <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" autofocus>
	        </div>
	        <div class="form-group">
	          <label for="txtPwd"><p>Contraseña</p></label>
	          <input type="password" class="form-control" name="txtPwd" id="txtPwd" autofocus>
	        </div>
		      <div class="modal-footer">
		        <div class="form-group">
		      	  <button type="submit" class="btn btn-primary"  id="btnEnviar" name="btnEnviar">Aceptar</button>
		         	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        </div>
		      </div>
     		</div>
     	</form>
   	</div>
	</div>
</div>
  

  <div><br><br></div>
  <div id="login"></div>
  <div id="tabKardex"></div>
  <div id="editCROD"></div>

</div>

</body>


</html>
