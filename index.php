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
	 <div class="col s12 m4 l3"></div>
		<div class="col s12 m12 l6" id="formLogin">	
		 	<div id="nameLogin"></div>
		 	<div class="progress" id="progress">
		    	<div class="indeterminate"></div>
		  	</div>
		    <form method="POST" class="col s12 m12 l12" >
			    <div class="row" id="fieldEmail">
			        <div class="input-field col s12">
			          	<input id="email" type="email" onkeydown="javascript: if(event.keyCode == 13) login();"  class="validate" autofocus/>
			          	<label for="email">E-mail</label>
			        </div>
			    </div>
			    <div class="row" id="fieldPassword">
			        <div class="input-field col s12">
			       		<input id="password" onkeydown="javascript: if(event.keyCode == 13) login();" type="password" class="validate"/>
			       	   	<label for="password">Password</label>
			        </div>
			    </div>
			    <div class="row">
			    	<div class="col s6" id="checkConect">   
	      			</div>
			        <div class="input-field col s4">
			       		<a onclick="login()"class="btn">PRÓXIMO</a>
			       	</div>
			    </div>
		    </form>
		</div>
		<div class="col s12 m4 l3"></div>
	</div>
	<div class="container" id="container"></div>		
	<div class="container" id="produtos"></div>
</body> 
</html>