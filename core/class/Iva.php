<?php 
	class Iva{
		public function test(){
			echo 'clave,monto,status';
		}

		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,monto,status from metodo_pago where status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,monto,status from metodo_pago where status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,monto,status from metodo_pago where status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,monto,status from metodo_pago where status = "active" and clave = "'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO metodo_pago (clave,monto) VALUES (upper('.$atr['clave'].'),upper('.$atr['monto'].'))';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE metodo_pago SET clave = upper("'.$atr['clave'].'"),monto = upper("'.$atr['monto'].'") where clave = "'.$atr['clave_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE metodo_pago SET status = "inactive" where clave = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE metodo_pago SET status = "active" where clave = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

	}
?>