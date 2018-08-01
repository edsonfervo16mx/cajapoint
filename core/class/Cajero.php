<?php 
	class Cajero{
		public function test(){
			echo 'id,nombre,usuario,password,negocio,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cajero';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cajero where cajero_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cajero where cajero_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cajero where cajero_status = "active" and cajero_id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO cajero (nombre,usuario,password,negocio) VALUES (upper('.$atr['nombre'].'),upper('.$atr['usuario'].'),upper('.$atr['password'].'),upper('.$atr['negocio'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cajero SET nombre = upper("'.$atr['nombre'].'"),usuario = upper("'.$atr['usuario'].'"),password = upper("'.$atr['password'].'"),negocio = upper("'.$atr['negocio'].'") where id = "'.$atr['id'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cajero SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cajero SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
	}
?>