<?php
	class AbonoCompra{
		public function test(){
			echo 'id,fecha,deposito,cuenta_compra,metodo_pago,descripcion,cajero,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_compra';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_compra where abono_compra_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_compra where abono_compra_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		//abono_compra_cuenta_compra -> cuenta -> para mostrar los abonos de la cuenta
		//abono_compra_id -> id -> para mostrar un abono 
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_abono_compra where abono_compra_status = "active" and abono_compra_id ="'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO abono_compra (fecha,deposito,cuenta_compra,metodo_pago,descripcion,cajero) VALUES (upper('.$atr['fecha'].'),upper('.$atr['deposito'].'),upper('.$atr['cuenta_compra'].'),upper('.$atr['metodo_pago'].'),upper('.$atr['descripcion'].'),upper('.$atr['cajero'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE abono_compra SET id = upper("'.$atr['id'].'"),fecha = upper("'.$atr['fecha'].'"),deposito = upper("'.$atr['deposito'].'"),cuenta_compra = upper("'.$atr['cuenta_compra'].'"),metodo_pago = upper("'.$atr['metodo_pago'].'"),descripcion = upper("'.$atr['descripcion'].'"),cajero = upper("'.$atr['cajero'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE abono_compra SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE abono_compra SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>