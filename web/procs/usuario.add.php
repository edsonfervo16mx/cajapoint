<?php 
	require_once '../../core/config/Connection.php';
	require_once '../../core/class/Autoload.php';
	/*
	$usuario = new Usuario;
	$datos_usuario = $usuario->listarActivos($key);
	print_r($datos_usuario);
	/**/

	/**/
	$negocio = new Negocio;
	$datos_negocio = $negocio->listarActivos($key);
	print_r($datos_negocio);
	/**/
?>