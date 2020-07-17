<?php 

	require_once ('dbModel.php');

	class user extends database{

		private $idUsuario;
		private $Nombre;
		private $Apellido;
		private $Clave;
		private $Correo;
		private $Cargo;

		function __construct(){}

		// ACCIONES CRUD

		public function setUser($id) {

			$sql = "CALL getUser('$id')";
			$query = parent::executeQuery($sql);

			$array=$query->fetch_array();

			$this->idUsuario = $array['idUsuario'];
			$this->Nombre = $array['Nombre'];
			$this->Apellido = $array['Apellido'];
			$this->Correo = $array['Correo'];
			$this->Clave = $array['Clave'];
			$this->Cargo = $array['Cargo'];
		}

		public function validate($email,$pass) {
			$queryResult=array();
			$otherSql="CALL validateUser('$email')";
			$sql= "CALL `validateUserPass`('$email', '$pass');";
			$query=parent::executeQuery($sql);
			$otherQuery=parent::executeQuery($otherSql);

			$result=NULL;

			if ($otherQuery->num_rows==1) {
				if ($query->num_rows==1) {
					$result=2;
				}else{
					$result=1;
				}
			}else{
				$result=0;
			}
			
			return $result;
		}

		public function getData($data)	{

			$sql="CALL getUser('$this->idUsuario')";
			$query = parent::executeQuery($sql);
			$array = $query ->fetch_array();

			switch ($data) {
				case 'id':
					return $array['idUsuario'];
				break;

				case 'nombre':
					return $array['Nombre'];;
				break;

				case 'apellido':
					return $array['Apellido'];;
				break;

				case 'correo':
					return $array['Correo'];;
				break;

				case 'clave':
					return $array['Clave'];;
				break;

				case 'cargo':
					return $array['Cargo'];;
				break;

				case 'all':
					return $array;
				break;

				default:
					$advise='Este dato no existe';
					return $advise;
				break;
			}
			
		}

		public function updateData($id,$name,$second,$email,$pass,$position){
			$sql = "SET @p0='$id'; SET @p1='$name'; SET @p2='$second'; SET @p3='$email'; SET @p4='$pass'; SET @p5='$position'; 
					CALL `updateUser`(@p0, @p1, @p2, @p3, @p4, @p5);";
			$_SESSION['user'] = $email;
			return parent::executeMultiQuery($sql);
		}

		// SESIONES

		public function setSession()
		{
			session_start();
		}

		public function setCurrentUser($user)
		{
			$_SESSION['user'] = $user;
		}

		public function getCurrentUser()
		{
			return $_SESSION['user'];
		}

		public function closeSession()
		{
			session_unset();
			session_destroy();
		}
	}



?>