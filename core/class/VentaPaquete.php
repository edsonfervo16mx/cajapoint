<?php
	class VentaPaquete{
		public function test(){
			echo 'id,paquete,precio,cantidad,monto,cuenta_venta,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_paquete';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_paquete where venta_paquete_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_paquete where venta_paquete_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_venta_paquete where venta_paquete_status = "active" and venta_paquete_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO venta_paquete (paquete,precio,cantidad,monto,cuenta_venta) VALUES (upper('.$atr['paquete'].'),upper('.$atr['precio'].'),upper('.$atr['cantidad'].'),upper('.$atr['monto'].'),upper('.$atr['cuenta_venta'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE venta_paquete SET id = upper("'.$atr['id'].'"),paquete = upper("'.$atr['paquete'].'"),precio = upper("'.$atr['precio'].'"),cantidad = upper("'.$atr['cantidad'].'"),monto = upper("'.$atr['monto'].'"),cuenta_venta = upper("'.$atr['cuenta_venta'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE venta_paquete SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE venta_paquete SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>