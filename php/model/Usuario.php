<?php
class Usuario
{
    var $idusuario;
    var $nome;
    var $email;
    var $senha;

    function setUsuario($dados){
    	$this->idusuario = $dados['idusuario'];
    	$this->nome = $dados['nome'];
    	$this->email = $dados['email'];
    	$this->senha = $dados['senha'];
    }

    function setIdusuario($idusurio){
    	$this->idusuario = $idusuario;
    }
    function getIdusuario(){
    	return $this->idusuario;
    }

    function setNome($nome){
    	$this->nome = $nome;
    }
    function getNome(){
    	return $this->nome;
    }
    function setEmail($email){
    	$this->email = $email;
    }
    function setSenha($senha){
    	$this->senha = $senha;
    }
}
?>