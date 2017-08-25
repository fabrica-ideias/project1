<?php 
	date_default_timezone_set('America/Sao_Paulo');
	require_once("fachada.php");
	function registerLog($idusuario, $info){
		$fachada = new Fachada();
		$usuario = $fachada->getUsuarioPorId($_SESSION['idusuario']);
		$fp = fopen("../logs/".$idusuario."-".$usuario->getNome().".txt", "a"); 
		$escreve = fwrite($fp, date("d/m/Y h:i")." ".$info."\n");
		fclose($fp);
	};
?>