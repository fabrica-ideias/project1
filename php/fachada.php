<?php 
	require_once("model/Usuario.php");
	class Fachada{	
		//Usuario
		function getUsuarioPorId($idusuario){
			include("conexao.php");
			$result = mysqli_query($con,"select * from usuario where idusuario='$idusuario'");
			if( mysqli_num_rows($result) > 0){
				$dados =  mysqli_fetch_array($result);
				$usuario = new Usuario();
				$usuario-> setUsuario($dados);
				return $usuario;
			}
			return null;
		}

		function getUsuarioEmail($email){
			include("conexao.php");
			$result = mysqli_query($con,"select * from usuario where email='$email'");
			if( mysqli_num_rows($result)){
				$dados =  mysqli_fetch_array($result);
				echo json_encode($dados);
			}else{
				echo "0";
			}
		}

		function salvaUsuario($usuario){
			include("conexao.php");
			mysqli_query($con,"insert into usuario (nome,email,senha,perfil) values ('".$usuario->getNome()."','".$usuario->getEmail()."','".$usuario->getSenha()."','".$usuario->getPerfil()."')");
			$fachada = new Fachada();
			$fachada->startSession('false','idusuario',mysqli_insert_id($con));
			echo "0";
		}

		function startSession($manterConectado,$session,$valor){	
			session_start();
			$_SESSION[$session] = $valor;
			if($manterConectado == "true"){
				setcookie($session, $_SESSION[$session], PHP_INT_MAX);
			}
		}
	}
?>