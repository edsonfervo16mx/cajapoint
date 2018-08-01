<?php
	class Egreso{
		public function test(){
			echo 'id,nombre,descripcion,fecha,deposito,metodo_pago,estado_pago,cajero,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_egreso';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_egreso where egreso_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_egreso where egreso_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_egreso where egreso_status = "active" and egreso_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO egreso (id,nombre,descripcion,fecha,deposito,metodo_pago,estado_pago,cajero) VALUES (upper('.$atr['id'].'),upper('.$atr['nombre'].'),upper('.$atr['descripcion'].'),upper('.$atr['fecha'].'),upper('.$atr['deposito'].'),upper('.$atr['metodo_pago'].'),upper('.$atr['estado_pago'].'),upper('.$atr['cajero'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE egreso SET id = upper("'.$atr['id'].'"),nombre = upper("'.$atr['nombre'].'"),descripcion = upper("'.$atr['descripcion'].'"),fecha = upper("'.$atr['fecha'].'"),deposito = upper("'.$atr['deposito'].'"),metodo_pago = upper("'.$atr['metodo_pago'].'"),estado_pago = upper("'.$atr['estado_pago'].'"),cajero = upper("'.$atr['cajero'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE egreso SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE egreso SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>