<?php 

	class database {

		public $conexion;

		private static $servername='localhost';
		private static $user='root';
		private static $password='';
		private static $database='sena';

		public function connect(){

			return $this->conexion= new mysqli(self::$servername,self::$user,self::$password,self::$database);

			$this->conexion->set_charset("utf8");

			if ($this->conexion->connect_errno) {
				echo "No se pudo conectar";
			}
		}

		private function disconnect(){
			$this->conexion->close();
		}

		public function executeQuery($sql) {
			$this->connect();

			return $this->conexion->query($sql);
			
			$this->disconnect();
		}

		public function executeMultiQuery($sql) {
			$this->connect();

			return $this->conexion->multi_query($sql);

			$this->disconnect();
		}

		public function getTableData($table){
			$sql='SELECT*FROM '.$table.'';
			$query = $this->executeQuery($sql);

			if ($query) {

				return $query->fetch_all(MYSQLI_ASSOC);

			}elseif(!$query){

				return false;

			}

		}
	}
?>