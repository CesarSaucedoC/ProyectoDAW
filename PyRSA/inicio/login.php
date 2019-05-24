<!DOCTYPE html>
<html>
<head>
	<title>PyRSA Comunicaciones</title>
	<link src="../bootstrap/bootstrap-3.4.1/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="../js/jquery-3.3.1.js"></script>
	<script src="../bootstrap/bootstrap-3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../bootstrap/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/login-style.css">

	<script type="text/javascript">
		$(document).ready(function(){
			$("#autenticarUsr").submit(function(){
				$.ajax({
	                async: true,
	                type: "POST", 
	                data: $("#autenticarUsr").serialize(),
	                url: "./qryAutentica.php",
	                success: function(response) 
	                	{
	                		$("#response").html(response);
	                	}
              });
			})
		});
	</script>
</head>
<body>
	<div id="response"></div>
	<div class="main">    
		<div class="container">
			<center>
				<div class="middle">
      				<div id="login">
						<form id="autenticarUsr">
							<fieldset class="clearfix">
					            <p ><div class="form-group">
					            	<span class="fa fa-user"></span>
					            	<input type="text"  Placeholder="Usuario" required id="pyUsr" name="pyUsr">
					            </div></p> <!-- JS because of IE support; better: placeholder="Username" -->
					            <p><div class="form-group">
					            	<span class="fa fa-lock"></span>
					            	<input type="password"  Placeholder="Contraseña" required id="pyPass" name="pyPass">
					            </div></p> <!-- JS because of IE support; better: placeholder="Password" -->
					            <div class="form-group">
					            	<!--<span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#"></a></span>-->
					                <span style="width:100%; text-align:right;  display: inline-block;"><input type="submit" value="Acceder"></span>
					                <input type="hidden" id="log" name="log" value="Acceder">
					            </div>
          					</fieldset>
							<div class="clearfix"></div>
        				</form>
        				<div class="clearfix"></div>
      				</div> <!-- end login -->
      				<div class="logo">
      					COMUNICACIONES
        				<div class="clearfix"></div>
      				</div>
      			</div>
			</center>
    	</div>
	</div>
</body>
</html>