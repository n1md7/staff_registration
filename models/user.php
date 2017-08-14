<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = sha1Generate::sha1($post['password']);
		if($post['submit']){
			if(empty($post['name']) || empty($post['email']) || empty($post['password']) || empty($post['is_admin'])){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			if($post['password'] != $post['passwordre']){
				Messages::setMsg("Passwords didn't match","error");
				return;
			}
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
				// restrict logging from another site
				Messages::setMsg("Referer Error","error");
				return;
			}

			// Insert into MySQL
		    $is_admin = $post['is_admin'];

			$this->query('INSERT INTO users (name, email, password, is_admin) VALUES(:name, :email, :password, :is_admin)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->bind(':is_admin', $is_admin);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				Messages::setMsg('User \"'.$post['name'].'\" added successfully', '');
				// header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(!isset($_SESSION["login_counter"])){
			$_SESSION["login_counter"] = 0;
		}else{
			$_SESSION["login_counter"] ++;
		}
		$password = sha1Generate::sha1($post['password']);
		if($post['submit']){
			if(empty($post['email']) || empty($post['password'])){
				Messages::setMsg('Incorrect Login', 'error');
				return;
			}
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
				// restrict logging from another site
				Messages::setMsg("Referer Error","error");
				return;
			}
			// chack captcha
			if(isset($_SESSION["login_counter"]) && $_SESSION["login_counter"]>4){
				if($post["captcha"] != $_SESSION['captcha']){
					Messages::setMsg("Invalid Captcha","error");
					return;
				}
			}
			// Compare Login
			$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);

			$row = $this->single();
			if($row){
				$_SESSION['is_admin'] = ($row['is_admin'] == 1) ? true : false;
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"email"	=> $row['email']
				);
				$_SESSION["login_counter"] = 0;
				header('Location: '.ROOT_URL.'home');
			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}







	public function show(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(!empty($post['id'])){
			if($_SESSION['is_admin'] == false){
				Messages::setMsg('Nothing DELETED... You have no RIGHTS to performe this action', 'error');
			}else{
				$this->query('DELETE FROM users WHERE id = :id AND is_admin = 2');
				$this->bind(':id', $post['id']);
				$rowCount =  $this->rowCount();
				if($rowCount == 0){
					Messages::setMsg('Nothing DELETED', 'error');
				}else{
					Messages::setMsg('User Successfully DELETED', 'success');
				}
			}
		}

		$this->query('SELECT * FROM users');
		return $this->resultSet();
	}
}
