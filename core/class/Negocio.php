<?php 
	class Negocio{
		#Lista de 
		/*
			test
			listarTodos
			listarActivos
			listarInactivos
			ver
			registrar
			modificar
			darBaja
			darAlta
		*/

		public function test(){
			echo 'id,nombre,logo,descripcion,rfc,direccion,correo,telefono,sitioweb,usuario_correo,tipo_establecimiento,iva_clave,identificador,status';
		}

		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_negocio';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_negocio where negocio_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_negocio where negocio_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_negocio where negocio_status = "active" and negocio_id ="'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO usuario (nombre,logo,descripcion,rfc,direccion,correo,telefono,sitioweb,usuario_correo,tipo_establecimiento,iva_clave,identificador) VALUES (upper('.$atr['nombre'].'),upper('.$atr['logo'].'),upper('.$atr['descripcion'].'),upper('.$atr['rfc'].'),upper('.$atr['direccion'].'),upper('.$atr['correo'].'),upper('.$atr['telefono'].'),upper('.$atr['sitioweb'].'),upper('.$atr['usuario_correo'].'),upper('.$atr['tipo_establecimiento'].'),upper('.$atr['iva_clave'].'),upper('.$atr['identificador'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE usuario SET nombre = upper("'.$atr['nombre'].'"),logo = upper("'.$atr['logo'].'"),descripcion = upper("'.$atr['descripcion'].'"),rfc = upper("'.$atr['rfc'].'"),direccion = upper("'.$atr['direccion'].'"),correo = upper("'.$atr['correo'].'"),telefono = upper("'.$atr['telefono'].'"),sitioweb = upper("'.$atr['sitioweb'].'"),usuario_correo = upper("'.$atr['usuario_correo'].'"),tipo_establecimiento = upper("'.$atr['tipo_establecimiento'].'"),iva_clave = upper("'.$atr['iva_clave'].'"),identificador = upper("'.$atr['identificador'].'") where id = "'.$atr['id'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE negocio SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}

		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE negocio SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
	}
?>
