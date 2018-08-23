<?php 
	require_once '../../core/config/Connection.php';
	require_once '../../core/class/Autoload.php';
	/*
	$usuario = new Usuario;
	$datos_usuario = $usuario->listarActivos($key);
	
	if ($_POST['usuario'] && $_POST['email'] && $_POST['password']) {
		foreach ($datos_usuario as $col) {
			if ($_POST['email'] == $col->usuario_correo) {
				print '<meta http-equiv="REFRESH" content="0; url=../../?err=exist">';
			}else{
				#insertar usuario
				$atr = array(
					'correo' => $_POST['email'],
					'nombre' => $_POST['usuario'],
					'password' => md5($_POST['password']),
					'nacimiento' => date('Y-m-d'),
					'sexo_id' => 'M'
				);
				$usuario->registrar($key,$atr);
				//redireccionar a ventana de pago y aviso de confirmacion al correo electronico
			}
		}
	}else{
		#echo 'No tienen valor';
		print '<meta http-equiv="REFRESH" content="0; url=../../?err=null">';
	}
	/**/
?>