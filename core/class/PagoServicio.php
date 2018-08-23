<?php
	class PagoServicio{
		public function test(){
			echo 'id,folio,apertura,vigencia,fecha_inicio,fecha_fin,monto,usuario,estado_pago,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_pago_servicio';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_pago_servicio where pago_servicio_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_pago_servicio where pago_servicio_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_pago_servicio where pago_servicio_status = "active" and pago_servicio_id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO pago_servicio (folio,apertura,vigencia,fecha_inicio,fecha_fin,monto,usuario,estado_pago) VALUES (upper('.$atr['folio'].'),upper('.$atr['apertura'].'),upper('.$atr['vigencia'].'),upper('.$atr['fecha_inicio'].'),upper('.$atr['fecha_fin'].'),upper('.$atr['monto'].'),upper('.$atr['usuario'].'),upper('.$atr['estado_pago'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE pago_servicio SET id = upper("'.$atr['id'].'"),folio = upper("'.$atr['folio'].'"),apertura = upper("'.$atr['apertura'].'"),vigencia = upper("'.$atr['vigencia'].'"),fecha_inicio = upper("'.$atr['fecha_inicio'].'"),fecha_fin = upper("'.$atr['fecha_fin'].'"),monto = upper("'.$atr['monto'].'"),usuario = upper("'.$atr['usuario'].'"),estado_pago = upper("'.$atr['estado_pago'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE pago_servicio SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE pago_servicio SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>