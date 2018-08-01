<?php 
	class EstadoPago{
		public function test(){
			echo 'clave,status';
		}

		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,status from estado_pago where status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,status from estado_pago where status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,status from estado_pago where status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT clave,status from estado_pago where status = "active" and clave = "'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO estado_pago (clave) VALUES (upper('.$atr['clave'].'))';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE estado_pago SET clave = upper("'.$atr['clave'].'") where clave = "'.$atr['clave_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function darBaja($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE estado_pago SET status = "inactive" where clave = "'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function darAlta($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE estado_pago SET status = "active" where clave = "'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

	}
?>