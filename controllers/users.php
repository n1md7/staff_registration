<?php
class Users extends Controller{
	protected function register(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		if(isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}


	protected function show(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->show(), true);
	}

	protected function logout(){
		if(isset($_SESSION['is_admin']))
			unset($_SESSION['is_admin']);
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}
	
} 
