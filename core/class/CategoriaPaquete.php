<?php
	class CategoriaPaquete{
		public function test(){
			echo 'clave,negocio_id,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_paquete';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_paquete where categoria_paquete_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_paquete where categoria_paquete_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_categoria_paquete where categoria_paquete_status = "active" and categoria_paquete_clave ="'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO categoria_paquete (clave,negocio_id) VALUES (upper('.$atr['clave'].'),upper('.$atr['negocio_id'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE categoria_paquete SET clave = upper("'.$atr['clave'].'"),negocio_id = upper("'.$atr['negocio_id'].'") where clave = "'.$atr['clave_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE categoria_paquete SET status = "inactive" where clave = "'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE categoria_paquete SET status = "active" where clave = "'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>