<?php
class Users extends Controller{
	protected function register(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
			return;
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		if(isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}


	protected function show(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->show(), true);
	}

	protected function language(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		/*
			if hide (last 3rd)parameter is in GET array then
			do not return view model and just
			return post language value
			its for ajax request
			p.s toget this result form should be send adding /hide paranmeter data=hide
		*/
			/* 
				I dont need this one its just in case
				I will submit form no AJAX yet
			*/
		if(isset($get['data']) && $get['data'] == 'hide'):
			echo $post['lang'];
		else:
			$viewmodel = new UserModel();
			$this->returnView($viewmodel->language(), true);
		endif;
	}

 

	protected function logout(){
		if(isset($_SESSION['is_admin']))
			unset($_SESSION['is_admin']);
			unset($_SESSION['is_logged_in']);
			unset($_SESSION['user_data']);
			session_destroy();
		// Redirect
			header('Location: '.ROOT_URL);
			return;
	}
	
} 
