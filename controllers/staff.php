<?php
class Staff extends Controller{
	protected function register(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function showStaff(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->showStaff(), true);
	}

	protected function showOneStaff(){
		if(!isset($_SESSION["is_logged_in"])){
				header('Location: '.ROOT_URL);
				return;
			}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->showOneStaff(), true);
	}

	protected function staffRegistration(){
		if(!isset($_SESSION["is_logged_in"])){
				header('Location: '.ROOT_URL);
				return;
			}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->staffRegistration(), true);
	}

	protected function editStaff(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
			return;
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->editStaff(), true);
	}

	protected function category(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
			return;
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->category(), true);
	}
	

	protected function checkout(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
			return;
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->checkout(), true);
	}

	protected function dept(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
			return;
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->dept(), true);
	}

	protected function bonus(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
			return;
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->bonus(), true);
	}

	protected function detailed(){
		if(!isset($_SESSION["is_logged_in"])){
			header('Location: '.ROOT_URL);
			return;
		}
		if($_SESSION['is_admin'] == false){
			header("Location:".ROOT_URL);
			return;
		}
		$viewmodel = new StaffModel();
		$this->returnView($viewmodel->detailed(), true);
	}
	

	 
} 

