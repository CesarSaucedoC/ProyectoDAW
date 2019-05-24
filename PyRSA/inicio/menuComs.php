<?php
session_start();

	if(empty($_SESSION['usr'])){
		echo "<script>alert('Debe auteniticarse')</script>";
		exit();
	}
	$usr = $_SESSION['usr'];
	include '../bd/conexion.php';
  	$qry = "SELECT * FROM usuario WHERE rpe = '$usr';";

  	$result = mysqli_query($link, $qry);
  	$registro = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Menu PyRSA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../bootstrap/bootstrap-3.4.1/css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.js"></script>
  <link rel='stylesheet' href='../css/jquery.dataTables.min.css'>
  <link rel='stylesheet' href='../css/jquery.buttons.dataTables-1.5.6.min.css'>
  <script src="../bootstrap/bootstrap-3.4.1/js/bootstrap.min.js"></script>
  <script src='../js/jquery.dataTables.min.js'></script>
  <script src='../js/jquery.dataTables-1.5.6.buttons.min.js'></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$(".menuC").on("click", function(e){
  			e.preventDefault();
  			$("#texto").css("display","none");
  			$("#VerMenu").load($(this).attr("href"));
  		});
  	});

  </script>
</head>
<body>
<div id="mensajes"></div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Comunicaciones</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Inicio</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Programa <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../actividades/verAct.php" class="menuC">Actividades programadas</a></li>
            <li><a href="../inventario/verInv.php" class="menuC">Inventario de equipos</a></li>
          </ul>
        </li>
        <li><a href="../mantenimiento/verMtto.php" class="menuC">Mantenimiento</a></li>
        <li><a href="../necesidades/verNec.php" class="menuC">Necesidades</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php
        echo "$registro[2] $registro[3]";
        ?></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <div id="texto">
  	<h3>Menu principal</h3>
  	<p>En esta aplicaccion web llevaras el registro de mantenimiento dia a dia, ademas de servir como herrminenta para facilitar el mismo y llevar control de los equipos de la especialidad.</p>
  </div>
  <div id="VerMenu"></div>
</div>


</body>
</html>
