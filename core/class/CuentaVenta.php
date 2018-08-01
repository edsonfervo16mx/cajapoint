<?php
	class CuentaVenta{
		public function test(){
			echo 'id,apertura,cierre,monto,cliente,estado_pago,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_venta';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_venta where cuenta_venta_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_venta where cuenta_venta_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_venta where ingreso_status = "active" and cuenta_venta_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO cuenta_venta (apertura,cierre,monto,cliente,estado_pago) VALUES (upper('.$atr['apertura'].'),upper('.$atr['cierre'].'),upper('.$atr['monto'].'),upper('.$atr['cliente'].'),upper('.$atr['estado_pago'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cuenta_venta SET id = upper("'.$atr['id'].'"),apertura = upper("'.$atr['apertura'].'"),cierre = upper("'.$atr['cierre'].'"),monto = upper("'.$atr['monto'].'"),cliente = upper("'.$atr['cliente'].'"),estado_pago = upper("'.$atr['estado_pago'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cuenta_venta SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cuenta_venta SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>