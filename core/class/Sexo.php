<?php 
	class Sexo{
		public function test(){
			echo 'id,status';
		}

		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT id,status from sexo where status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT id,status from sexo where status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT id,status from sexo where status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function ver($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT id,status from sexo where status = "active" and id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO sexo (id) VALUES (upper('.$atr['id'].'))';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE sexo SET id = upper("'.$atr['id'].'") where id = "'.$atr['id_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function darBaja($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE sexo SET status = "inactive" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

		public function darAlta($key,$id){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE sexo SET status = "active" where id = "'.$id.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}

	}
?>