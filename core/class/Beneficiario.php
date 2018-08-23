<?php
	class Beneficiario{
		public function ver($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_beneficiario';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>