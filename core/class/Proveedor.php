<?php 
	class Producto{
		public function test(){
			echo 'id,nombre,descripcion,rfc,direccion,correo,telefono,sitioweb,negocio,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_proveedor';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_proveedor where proveedor_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_proveedor where proveedor_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_proveedor where proveedor_status = "active" and proveedor_id ="'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO proveedor (nombre,descripcion,rfc,direccion,correo,telefono,sitioweb,negocio) VALUES (upper('.$atr['nombre'].'),upper('.$atr['descripcion'].'),upper('.$atr['rfc'].'),upper('.$atr['direccion'].'),upper('.$atr['correo'].'),upper('.$atr['telefono'].'),upper('.$atr['sitioweb'].'),upper('.$atr['negocio'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE proveedor SET id = upper("'.$atr['id'].'"),nombre = upper("'.$atr['nombre'].'"),descripcion = upper("'.$atr['descripcion'].'"),rfc = upper("'.$atr['rfc'].'"),direccion = upper("'.$atr['direccion'].'"),correo = upper("'.$atr['correo'].'"),telefono = upper("'.$atr['telefono'].'"),sitioweb = upper("'.$atr['sitioweb'].'"),negocio = upper("'.$atr['negocio'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE proveedor SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE proveedor SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>