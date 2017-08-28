var verificarEmail = false;
var data = null;
var validaEmail = false;
function login(){
	if(verificarEmail == false){
		var email = document.getElementById("email").value;
		if(email.indexOf("@") >= 0 && email.indexOf(".com") >= 0 ){
			verificaEmail(email);
		}
	}else{
		verificaSenha(document.getElementById("password").value);
	}
}
//Verifica o E-mail 
function verificaEmail(email){
	request = $.ajax({
	        url: "php/consultaEmail.php",
	        type: "post",
	        data: "email="+email
	});
	// Callback handler that will be called on success
	request.done(function (response, textStatus, jqXHR){
		document.getElementById("progress").style.display = "block";
		if(response != "0"){
			data = JSON.parse(response);
			document.getElementById("checkConect").innerHTML = "<p><input type='checkbox' id='manterConectado' /><label for='manterConectado'>Manter conectado</label></p>";
			document.getElementById("nameLogin").innerHTML = "<i class='small material-icons iconPerson'>person</i> <label class='namePerson'>"+data.nome+"</label>";
			document.getElementById("progress").style.display = "none";
			document.getElementById("fieldEmail").style.display = "none";
			document.getElementById("fieldPassword").style.display = "block";
			document.getElementById("imgUser").style.backgroundImage = "url('uploads/"+data.perfil+"')";
			document.getElementById("password").focus();
			verificarEmail = true;
		}else{
			document.getElementById("progress").style.display = "none";
			document.getElementById("email").setAttribute("class", "validate invalid");
		}
	    // Log a message to the console
	 	console.log("Ok");
	});
	// Callback handler that will be called on failure
	request.fail(function (jqXHR, textStatus, errorThrown){
	    // Log the error to the console
	    console.error(
	        "The following error occurred: "+
	        textStatus, errorThrown
	    );
	});
}
function verificaEmailCadastro(){
	var email = document.getElementById("emailUser").value;
	request = $.ajax({
	        url: "php/consultaEmail.php",
	        type: "post",
	        data: "email="+email
	});
	// Callback handler that will be called on success
	request.done(function (response, textStatus, jqXHR){
		if(response != "0"){
			document.getElementById("emailUser").focus();
			document.getElementById("emailUser").setAttribute("class", "validate invalid");
			validaEmail = false;
		}else{
			validaEmail = true;
			document.getElementById("senhaUser").focus();
		}
	    // Log a message to the console
	 	console.log("Ok");
	});
	// Callback handler that will be called on failure
	request.fail(function (jqXHR, textStatus, errorThrown){
	    // Log the error to the console
	    console.error(
	        "The following error occurred: "+
	        textStatus, errorThrown
	    );
	});
}

//Verifica a Senha 
function verificaSenha(senha){
	document.getElementById("progress").style.display = "block";
	if(data.senha == senha){
		var conexao = document.getElementById("manterConectado").checked;
		document.getElementById("checkConect").innerHTML = "";
		document.getElementById("progress").style.display = "none";
		document.getElementById("password").value = "";
		document.getElementById("containerLogin").style.display = "none";
		startSession(conexao);
	}else{
		document.getElementById("password").value = "";
		document.getElementById("progress").style.display = "none";
		document.getElementById("password").setAttribute("class", "validate invalid");
		document.getElementById("password").focus();
	}
}

//inicia a sessao
function startSession(conectado){
	request = $.ajax({
	        url: "php/startSession.php",
	        type: "get",
	        data: "idusuario="+data.idusuario+"&conexao="+conectado
	});
	// Callback handler that will be called on success
	request.done(function (response, textStatus, jqXHR){
		incluirPainel();
		// Log a message to the console
	 	console.log("Sessao Iniciada");
	});
	// Callback handler that will be called on failure
	request.fail(function (jqXHR, textStatus, errorThrown){
	    // Log the error to the console
	    console.error(
	        "The following error occurred: "+
	        textStatus, errorThrown
	    );
	});
}
//verifica se esta logado
function verificaLogin(){
	request = $.ajax({
	        url: "php/checkSession.php",
	        type: "post"
	});
	// Callback handler that will be called on success
	request.done(function(response, textStatus, jqXHR){
		var result = JSON.parse(response);
		if(result > 0){
			document.getElementById("containerLogin").style.display = "none";
			incluirPainel();
		}else{
			document.getElementById("checkConect").innerHTML = "";
			document.getElementById("nameLogin").innerHTML = "<h4> Login</h4>";
			document.getElementById("progress").style.display = "none";
			document.getElementById("fieldEmail").style.display = "block";
			document.getElementById("fieldPassword").style.display = "none";
			document.getElementById("fLogin").style.display = "block";
			document.getElementById("fCadastro").style.display = "none";
			document.getElementById("containerLogin").style.display = "block";
			//document.getElementById("email").focus();
			verificarEmail = false;
		}
		// Log a message to the console
	 	console.log("Sessao Verificada");
	});
	// Callback handler that will be called on failure
	request.fail(function (jqXHR, textStatus, errorThrown){
	    // Log the error to the console
	    console.error(
	        "The following error occurred: "+
	        textStatus, errorThrown
	    );
	});
}
//logout
function logout(){
	request = $.ajax({
	        url: "php/logout.php",
	        type: "post"
	});
	// Callback handler that will be called on success
	request.done(function (response, textStatus, jqXHR){
		verificaLogin();
		var menu = document.getElementById("menu");
		if (menu.parentNode) {
			menu.parentNode.removeChild(menu);
		}
		var produtos = document.getElementById("prod");
		if (produtos.parentNode) {
			produtos.parentNode.removeChild(produtos);
		}
		// Log a message to the console
	 	console.log("Verificando Login");
	});
	// Callback handler that will be called on failure
	request.fail(function (jqXHR, textStatus, errorThrown){
	    // Log the error to the console
	    console.error(
	        "The following error occurred: "+
	        textStatus, errorThrown
	    );
	});
}

function incluirPainel(){
	var menu = "<div class='menu' id='menu'><ul><li></li><li></li><li class='logout'>";
	menu +=" <a onclick='logout()'>Sair</a></li></ul></div>";
	document.getElementById("container").innerHTML = menu;

	var produto = "<div class='container' id='prod'><div class='row' style='padding: 20px'><div class='row'>";
	for(var i = 0; i <= 7; i++){
		produto += "<div class='col s12 m6 l3'><div class='card'><div class='card-image'><img src='http://tudosobrecachorros.com.br/wp-content/uploads/cachorro-independente.jpg'>";
		produto += "<a  onclick='addProduto()' class='btn-floating halfway-fab waves-effect waves-light red'><i class='material-icons'>add</i></a>";
		produto += "</div><div class='card-content'><span class='card-title'>Cachorrinho</span><p>Cachorro da raça pé duro. 2 anos, todas vacinas em dias.</p><hr>";
		produto += "<p class='valor'>R$215,00</p></div></div></div>";
	}
	produto += "<div class='col s2 l3'></div></div></div>";
	document.getElementById("produtos").innerHTML = produto;

}
function cadastro(){
	document.getElementById("nameLogin").innerHTML = "<h4>Cadastro</h4>";
	document.getElementById("fLogin").style.display = "none";
	document.getElementById("fCadastro").style.display = "block";
	document.getElementById("nome").focus();
}
var img;
function uploadFoto(input) {
    if (input.files && input.files[0]) {
      	var reader = new FileReader();
      	reader.onload = function (e) {
	        img = new FormData(input);
	        document.getElementById("imgNewUser").style.backgroundImage = "url('"+e.target.result+"')";
	        document.getElementById("nome").focus();
    	}
      	reader.readAsDataURL(input.files[0]);
    } 
};
function EnterTab(InputId,Evento){
	if(Evento.keyCode == 13){		
		document.getElementById(InputId).focus();
	}
}
function salvaUsuario(){
	if(validaEmail == true){
		var x = document.getElementById("file");
		var file_data =x.files[0];
	 	var form_data = new FormData();
	 	form_data.append('file', file_data);
	 	form_data.append('nome',  $('#nome').val()+" "+$('#sobrenome').val());
	 	form_data.append('email', $('#emailUser').val());
	 	form_data.append('senha', $('#senhaUser').val());
		request = $.ajax({
			        type:"POST",
			        url:"php/salvaUsuario.php",
					type: "POST",             // Type of request to be send, called as method
					data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data) {
						document.getElementById("containerLogin").style.display = "none";
			        	incluirPainel();
			        }
		});
	}else{
		document.getElementById("emailUser").focus();
		document.getElementById("emailUser").setAttribute("class", "validate invalid");
	}
}