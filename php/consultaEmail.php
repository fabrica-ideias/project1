<?php
	include("conexao.php");
	require_once("fachada.php");
	$email = $_POST['email'];
	$fachada =  new Fachada();
	$fachada->getUsuarioEmail($email);
?>