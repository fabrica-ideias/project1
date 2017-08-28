<?php session_start(); ?>
<!DOCTYPE html>
<html >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8"/>
	<title>Login</title>
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="materialize/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<link rel="stylesheet" href="css/style.css" />
  	<link href="css/icon.css" rel="stylesheet">
  	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  	<script src="materialize/js/materialize.min.js"></script>
	<script src="js/function.js" type="text/javascript"></script>
</head>
<body onload="verificaLogin()">
	<div class="row" id="containerLogin">
	 <div class="col s12 m4 l4"></div>
		<div class="col s12 m12 l4" id="form">
		    <form method="POST" class="col s12 m12 l12" id="fLogin">
			    <div class="row">
					<div class="col s4 m5 l4"></div>
					<div class="col s4 m2 l4 z-depth-4" id="imgUser"></div>
					<div class="col s4 m5 l4"></div>
				</div>	
			 	<div id="nameLogin"></div>
			 	<div class="progress" id="progress">
			    	<div class="indeterminate"></div>
			  	</div>
			    <div class="row" id="fieldEmail">
			        <div class="input-field col s12">
			          	<input id="email" type="email" onkeydown="javascript: if(event.keyCode == 13) login();"  class="validate" required="" />
			          	<label for="email">E-mail</label>
			        </div>
			    </div>
			    <div class="row" id="fieldPassword">
			        <div class="input-field col s12">
			       		<input id="password" onkeydown="javascript: if(event.keyCode == 13) login();" type="password" class="validate"/>
			       	   	<label for="password">Senha</label>
			        </div>
			    </div>
			    <div class="row">
				    <div class="col s5"><a onclick="cadastro()" href="#cadastro">Cadastre-se</a>   
	      			</div>
			    	<div id="checkConect">   
	      			</div>
			        
			    </div>
			    <dir class="row">
				    <div class="col s12">
				       		<a onclick="login()" class="btn">PRÓXIMO</a>
				    </div>
			    </dir>
		    </form>
		    <?php require_once("cadastro.php");?>
		</div>
		<div class="col s12 m4 l4"></div>
	</div>
	<div class="container" id="container"></div>		
	<div class="container" id="produtos"></div>
</body> 
</html>