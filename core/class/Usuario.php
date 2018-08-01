<?php 
	class Usuario{
		public function test(){
			echo 'correo,nombre,password,nacimiento,sexo_id,status,created';
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
			$sql = 'INSERT INTO usuario (correo,nombre,password,nacimiento,sexo_id) VALUES (upper('.$atr['correo'].'),upper('.$atr['nombre'].'),upper('.$atr['password'].'),upper('.$atr['nacimiento'].'),upper('.$atr['sexo_id'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE usuario SET correo = upper("'.$atr['correo'].'"),nombre = upper("'.$atr['nombre'].'"),nacimiento = upper("'.$atr['nacimiento'].'"),sexo_id = upper("'.$atr['sexo_id'].'") where correo = "'.$atr['correo_old'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function cambiarPassword($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE usuario SET password = upper("'.$atr['password'].'") where correo = "'.$atr['correo'].'"';
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