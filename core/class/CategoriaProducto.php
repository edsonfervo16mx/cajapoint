<?php 
	class CategoriaProducto{
		public function test(){
			echo 'clave,negocio_id,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_producto';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_producto where categoria_producto_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_producto where categoria_producto_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_producto where categoria_producto_status = "active" and categoria_producto_clave ="'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO categoria_producto (clave,negocio_id) VALUES (upper('.$atr['clave'].'),upper('.$atr['negocio_id'].'),upper('.$atr['clave'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE categoria_producto SET clave = upper("'.$atr['clave'].'"),negocio_id = upper("'.$atr['negocio_id'].'") where id = "'.$atr['clave_old'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE categoria_producto SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE categoria_producto SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
	}
?>