<?php
	class VentaProducto{
		public function test(){
			echo 'id,producto,precio,cantidad,monto,cuenta_venta,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_producto';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_producto where venta_producto_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_producto where venta_producto_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_producto where venta_producto_status = "active" and venta_producto_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO venta_producto (producto,precio,cantidad,monto,cuenta_venta) VALUES (upper('.$atr['producto'].'),upper('.$atr['precio'].'),upper('.$atr['cantidad'].'),upper('.$atr['monto'].'),upper('.$atr['cuenta_venta'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE venta_producto SET id = upper("'.$atr['id'].'"),producto = upper("'.$atr['producto'].'"),precio = upper("'.$atr['precio'].'"),cantidad = upper("'.$atr['cantidad'].'"),monto = upper("'.$atr['monto'].'"),cuenta_venta = upper("'.$atr['cuenta_venta'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE venta_producto SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE venta_producto SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>