<?php
class HomeModel extends Model{
	public function Index(){
		if(isset($_SESSION['is_logged_in'])){
			return;
		}else{
			header('Location: '.ROOT_URL.'users/login');
		}
	}

	public function automation(){
		return;
	}
}