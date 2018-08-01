<?php
	class AbonoVenta{
		public function test(){
			echo 'id,fecha,deposito,cuenta_venta,metodo_pago,descripcion,cajero,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_venta';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_venta where abono_venta_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_venta where abono_venta_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_venta where abono_venta_status = "active" and abono_venta_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO abono_venta (id,fecha,deposito,cuenta_venta,metodo_pago,descripcion,cajero) VALUES (upper('.$atr['id'].'),upper('.$atr['fecha'].'),upper('.$atr['deposito'].'),upper('.$atr['cuenta_venta'].'),upper('.$atr['metodo_pago'].'),upper('.$atr['descripcion'].'),upper('.$atr['cajero'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE abono_venta SET id = upper("'.$atr['id'].'"),fecha = upper("'.$atr['fecha'].'"),deposito = upper("'.$atr['deposito'].'"),cuenta_venta = upper("'.$atr['cuenta_venta'].'"),metodo_pago = upper("'.$atr['metodo_pago'].'"),descripcion = upper("'.$atr['descripcion'].'"),cajero = upper("'.$atr['cajero'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE abono_venta SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE abono_venta SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>