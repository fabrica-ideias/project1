<?php 
	session_start();
	require_once("log.php");
	if(isset($_COOKIE['idusuario']) || isset($_SESSION['idusuario'])){
		if(isset($_COOKIE['idusuario'])){
			$_SESSION['idusuario'] = $_COOKIE['idusuario'];
		}
		echo 1;
		registerLog($_SESSION['idusuario']," - acesando o sistema.");
	}else{
		echo 0;
	}
?>