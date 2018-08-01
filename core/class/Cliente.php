<?php 
	class Cliente{
		public function test(){
			echo 'id,nombre,descripcion,rfc,direccion,correo,telefono,sitioweb,negocio,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cliente';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cliente where cliente_status ="active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cliente where cliente_status ="inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cliente where cliente_status ="inactive" and cliente_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO cliente (nombre,descripcion,rfc,direccion,correo,telefono,sitioweb,negocio) VALUES (upper('.$atr['nombre'].'),upper('.$atr['descripcion'].'),upper('.$atr['rfc'].'),upper('.$atr['direccion'].'),upper('.$atr['correo'].'),upper('.$atr['telefono'].'),upper('.$atr['sitioweb'].'),upper('.$atr['negocio'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cliente SET nombre = upper("'.$atr['nombre'].'"),descripcion = upper("'.$atr['descripcion'].'"),rfc = upper("'.$atr['rfc'].'"),direccion = upper("'.$atr['direccion'].'"),correo = upper("'.$atr['correo'].'"),telefono = upper("'.$atr['telefono'].'"),sitioweb = upper("'.$atr['sitioweb'].'"),negocio = upper("'.$atr['negocio'].'") where id = "'.$atr['id'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cliente SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cliente SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
	}
?>



