<?php

	require_once('models/userModel.php');

	$user = new user;
	$user->setSession();

	$message=NULL;
	$pos = NULL;

	
	if (isset($_SESSION['user'])) {
		
		$user->setUser($_SESSION['user']);
		$pos = $user->getData('cargo') == 'Admin' ? TRUE : FALSE;
		include_once 'views/home.php';
		
		if (!isset($_GET['view'])) {
			header('location: ' . URL . 'home');
		}

	}elseif (isset($_POST['email']) && isset($_POST['pass'])) {

		$email = $_POST['email'];
		$pass = $_POST['pass'];

		if ($user->validate($email,$pass)==2) {

			$user->setUser($email);
			$user->setCurrentUser($email);
			$pos = $user->getData('cargo') == 'Admin' ? TRUE : FALSE ;
			header('location: ./');
			

		} else {

			if ($user->validate($email, $pass) == 1) {
				$message = "<div class='alert alert-danger p-1'>Contraseña incorrecta</div>";
			}elseif ($user->validate($email, $pass) == 0) {
				$message = "<div class='alert alert-danger p-1'>Este usuario no existe</div>";
			}

			require_once 'views/login.php';
		}
	}elseif(empty($_GET['view']) || $_GET['view'] <> 'login'){
		header('location: '.URL.'login');	
	}else {
		require_once 'views/login.php';
	}

	if($_GET['view']=='logout'){
		$user->closeSession();
		header('location: ./');
	}

?>