<?php 
	include_once 'key.php';
	
	class Connection{

		public function abrir($key){
			$host = $key['host'];
			$user = $key['user'];
			$pass = $key['pass'];
			$db = $key['db'];
			$connection = new mysqli($host,$user,$pass,$db) or die ('Error');
			return($connection);
		}

		public function consultaDatos($key,$sql){
			$conn = $this->abrir($key);
			$result = $conn->query($sql);
			$i = 0;
			$line = null;
			while ($row = mysqli_fetch_assoc($result)) {
				$line[$i] = array_map('utf8_encode', $row) ;
				$i++;
			}
			$data = json_encode($line);
			$data = json_decode($data);
			return ($data);
			$conn->close();
		}

		public function disparadorSimple($key,$sql){
			$conn = $this->abrir($key);
			$result = $conn->query($sql);
			$conn->close();
			return($result);
		}
		
		public function disparadorRetornoId($key,$sql){
			$conn = $this->abrir($key);
			$result = $conn->query($sql);
			$id = $conn->insert_id;
			$conn->close();
			return($id);
		}

	}

?>