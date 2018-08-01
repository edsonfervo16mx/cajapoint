<?php
	class Paquete{
		public function test(){
			echo 'id,nombre,descripcion,precio_venta,puntos,status,categoria_paquete';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_paquete';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_paquete where paquete_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_paquete where paquete_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_paquete where paquete_status = "active" and paquete_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		//id se debe generar con un numero aleatorio
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO paquete (id,nombre,descripcion,precio_venta,puntos,categoria_paquete) VALUES (upper('.$atr['id'].'),upper('.$atr['nombre'].'),upper('.$atr['descripcion'].'),upper('.$atr['precio_venta'].'),upper('.$atr['puntos'].'),upper('.$atr['categoria_paquete'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE paquete SET id = upper("'.$atr['id'].'"),nombre = upper("'.$atr['nombre'].'"),descripcion = upper("'.$atr['descripcion'].'"),precio_venta = upper("'.$atr['precio_venta'].'"),puntos = upper("'.$atr['puntos'].'"),categoria_paquete = upper("'.$atr['categoria_paquete'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE paquete SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE paquete SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>