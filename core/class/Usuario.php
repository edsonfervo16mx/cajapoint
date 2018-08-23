<?php 
	class Usuario{
		public function test(){
			echo 'correo,nombre,password,nacimiento,sexo_id,status,created,vencimiento';
		}

		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_usuario';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_usuario where usuario_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_usuario where usuario_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function ver($key,$email){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_usuario where usuario_status = "active" and usuario_correo = "'.$email.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO usuario (correo,nombre,password,nacimiento,sexo_id) VALUES ("'.$atr['correo'].'","'.$atr['nombre'].'","'.$atr['password'].'","'.$atr['nacimiento'].'","'.$atr['sexo_id'].'")';
			$res = $stringConnection->disparadorSimple($key,$sql);
			#echo $sql;
			return ($res);
		}

		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE usuario SET correo = '.$atr['correo'].',nombre = '.$atr['nombre'].',nacimiento = '.$atr['nacimiento'].',sexo_id = '.$atr['sexo_id'].' where correo = "'.$atr['correo_old'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function cambiarPassword($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE usuario SET password = "'.$atr['password'].'" where correo = "'.$atr['correo'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function darBaja($key,$correo){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE usuario SET status = "inactive" where correo = "'.$correo.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function darAlta($key,$correo){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE usuario SET status = "active" where correo = "'.$correo.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

	}
?>