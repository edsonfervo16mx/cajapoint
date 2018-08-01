<?php
	class CuentaCompra
	{
		public function test(){
			echo 'id,apertura,cierre,monto,proveedor,estado_pago,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_compra';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_compra where cuenta_compra_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_compra where cuenta_compra_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_cuenta_compra where cuenta_compra_status = "active" and cuenta_compra_id ="'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO cuenta_compra (apertura,cierre,monto,proveedor,estado_pago) VALUES (upper('.$atr['apertura'].'),upper('.$atr['cierre'].'),upper('.$atr['monto'].'),upper('.$atr['proveedor'].'),upper('.$atr['estado_pago'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cuenta_compra SET id = upper("'.$atr['id'].'"),apertura = upper("'.$atr['apertura'].'"),cierre = upper("'.$atr['cierre'].'"),monto = upper("'.$atr['monto'].'"),proveedor = upper("'.$atr['proveedor'].'"),estado_pago = upper("'.$atr['estado_pago'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cuenta_compra SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE cuenta_compra SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>