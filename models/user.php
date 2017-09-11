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
				/* 1 admin 2 basic user 3 super admin*/
				$_SESSION['is_admin'] = ($row['is_admin'] == 1 || ($row['is_admin'] == 3)) ? true : false;
				$_SESSION['is_super_admin'] = ($row['is_admin'] == 3) ? true : false;
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"email"	=> $row['email'],
					"lang"	=> $row['lang']
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
			if($_SESSION['is_admin'] == false && $_SESSION['is_super_admin'] == false){
				Messages::setMsg('Nothing DELETED... You have no RIGHTS to performe this action', 'error');
			}elseif($_SESSION['is_admin'] == true && $_SESSION['is_super_admin'] == false) {
				$this->query('DELETE FROM users WHERE id = :id AND is_admin = 2');
				$this->bind(':id', $post['id']);
				$rowCount =  $this->rowCount();
				if($rowCount == 0){
					Messages::setMsg('Nothing DELETED, You cannot delete Admins', 'error');
				}else{
					Messages::setMsg('User Successfully DELETED', 'success');
				}
			}else{
				/* 3 is super admin and 2 is basic user 1 is admin
					admin can delete e
				*/
				$this->query('DELETE FROM users WHERE id = :id AND (is_admin = 2 OR is_admin = 1)');
				$this->bind(':id', $post['id']);
				$rowCount =  $this->rowCount();
				if($rowCount == 0){
					Messages::setMsg('Nothing DELETED, You cannot delete Super Admins', 'error');
				}else{
					Messages::setMsg('User Successfully DELETED by Super Admin', 'success');
				}
			}
		}

		$this->query('SELECT * FROM users');
		return $this->resultSet();
	}



	public function language(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['lang'])):
			$this->query("UPDATE users SET lang = :lang_id WHERE id = :user_id");
			$this->bind(':lang_id', $post['lang']);
			$this->bind(':user_id', $_SESSION['user_data']['id']);
			$this->execute();
				$_SESSION['user_data']['lang'] = $post['lang'];
				Messages::setMsg('Language has been changed successfully', '');
		endif;

		$this->query("SELECT * FROM langs");
		return $this->resultSet();

	}
		 



}
