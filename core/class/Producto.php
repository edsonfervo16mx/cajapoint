<?php 
	class Producto{
		public function test(){
			echo 'codigo_barra,nombre,descripcion,imagen,precio_compra,precio_venta,categoria_producto,existencia,puntos,status';
		}
		public function listarTodos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_producto';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarActivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_producto where producto_status = "active"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function listarInactivos($key){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_producto where producto_status = "inactive"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function ver($key,$clave){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'SELECT * from view_datos_producto where producto_status = "active" and producto_codigo ="'.$clave.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function registrar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'INSERT INTO producto (codigo_barra,nombre,descripcion,imagen,precio_compra,precio_venta,categoria_producto,existencia,puntos) VALUES (upper('.$atr['codigo_barra'].'),upper('.$atr['nombre'].'),upper('.$atr['descripcion'].'),upper('.$atr['imagen'].'),upper('.$atr['precio_compra'].'),upper('.$atr['precio_venta'].'),upper('.$atr['categoria_producto'].'),upper('.$atr['existencia'].'),upper('.$atr['puntos'].'))';
			$res = $stringConnection->disparadorSimple($key,$sql);
			return ($res);
		}
		public function modificar($key,$atr){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE producto SET codigo_barra = upper("'.$atr['codigo_barra'].'"),nombre = upper("'.$atr['nombre'].'"),descripcion = upper("'.$atr['descripcion'].'"),imagen = upper("'.$atr['imagen'].'"),precio_compra = upper("'.$atr['precio_compra'].'"),precio_venta = upper("'.$atr['precio_venta'].'"),categoria_producto = upper("'.$atr['categoria_producto'].'"),existencia = upper("'.$atr['existencia'].'"),puntos = upper("'.$atr['puntos'].'") where codigo_barra = "'.$atr['codigo_barra_old'].'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darBaja($key,$codigo_barra){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE producto SET status = "inactive" where codigo_barra = "'.$codigo_barra.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
		public function darAlta($key,$codigo_barra){
			$stringConnection = new Connection;
			$stringConnection->abrir($key);
			$sql = 'UPDATE producto SET status = "active" where codigo_barra = "'.$codigo_barra.'"';
			$res = $stringConnection->consultaDatos($key,$sql);
			return ($res);
		}
	}
?>