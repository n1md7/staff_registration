<?php
class StaffModel extends Model{
	public function register(){

		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){

			if(empty($post['firstName'])      ||
			 	empty($post['personalNumber'])||
			 	empty($post['dateOfBirth'])   ||
			 	empty($post['phoneNumber'])   ||
			 	empty($post['residence'])     ||
			 	empty($post['lastName'])      ||
			 	empty($post['gender'])        ||
			 	empty($post['jobPost'])){
					Messages::setMsg('გთხოვთ შეავსოთ ყველა სავალდებულო ველი', 'error');
					return;
			}
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
				// restrict logging from another site
				Messages::setMsg("Referer Error","error");
				return;
			}
			// Insert into MySQL

			$this->query('INSERT INTO staff (firstName,
											lastName,
											fathersName,
											personalNumber,
											dateOfBirth,
											phoneNumber,
											email,
											contactNumber,
											residence,
											jobPost,
											comment,
											gender)
									VALUES(:firstName,
											 :lastName,
											 :fathersName,
											 :personalNumber,
											 :dateOfBirth,
											 :phoneNumber,
											 :email,
											 :contactNumber,
											 :residence,
											 :jobPost,
											 :comment,
											 :gender)');

			$this->bind(':personalNumber', $post['personalNumber']);
			$this->bind(':contactNumber', $post['contactNumber']);
			$this->bind(':fathersName', $post['fathersName']);
			$this->bind(':dateOfBirth', $post['dateOfBirth']);
			$this->bind(':phoneNumber', $post['phoneNumber']);
			$this->bind(':firstName', $post['firstName']);
			$this->bind(':residence', $post['residence']);
			$this->bind(':lastName', $post['lastName']);
			$this->bind(':jobPost', $post['jobPost']);
			$this->bind(':comment', $post['comment']);
			$this->bind(':email', $post['email']);
			$this->bind(':gender', $post['gender']);
			$this->execute();
			// Verify

			if($this->lastInsertId()){
				Messages::setMsg('პერსონალი წარმატებით დაემატა', '');
			}

		}

		$this->query("SELECT * FROM job_cat ORDER BY name ASC");
		return $this->resultSet();
	}



	public function showStaff(){
		$id = 0;
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		/*staff activate/deactivate*/
		if(isset($post['deactivateID'])){
			if($_SESSION['is_admin'] == true){
				// if(!empty($post['csrf']) && $post['csrf'] == $_SESSION['csrf']){
					$this->query("UPDATE staff SET active = Case
												When active = 2 Then 1
												When active = 1 Then 2
												End WHERE id = :id");
					$this->bind(":id", $post['deactivateID']);
					if($this->rowCount() != 0){
						Messages::setMsg('Action performed successfully', 'success');
					}else{
						Messages::setMsg('Nothing heppend', 'error');
					}
				// }else{
				// 	Messages::setMsg('Referer Error', 'error');
				// }
			}else{
				Messages::setMsg('You have no RIGHTS to perform this action', 'error');
			}
		}

		$this->query("SELECT * FROM job_cat ORDER BY name ASC");
		$rows1 =  $this->resultSet();
		/*search in staff*/
		if(isset($post['search']) && isset($post['searchvalue'])){
			$this->query("SELECT * FROM staff WHERE firstName LIKE :s or lastName LIKE :s LIMIT 50");
			$this->bind(":s", "%".$post['searchvalue']."%");
			$rows0 = $this->resultSet();
			return [$rows0, $rows1];
		}

		if(!empty($get['id'])){
			$id = $get['id'];
		}
		$this->query('SELECT * FROM staff WHERE id > :id ORDER BY registration_date DESC LIMIT 50');
		$this->bind(":id",$id);
		$rows0 = $this->resultSet();


		return [$rows0, $rows1];
	}

	public function getRowQuantity(){
		$this->query('SELECT count(*) rows FROM staff');
		$rows = $this->single();
		return $rows;
	}


	public function showOneStaff(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		// droebit vauqmeb dacvas
		/*if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
				// restrict logging from another site
				header('Location: '.ROOT_URL.'staff/showStaff/');
				return;
		}*/
		/*
		*for Ajax update
		* I should bind refere or CSRF token in ajax data also...
		* if I update any data and then try to activate user there will be referer error
		* because when request has been sent it generates new key
		* and activating user form has old referer key for that
		*********************************************************
		* thats error I should solve it 
		*/
		if(/*!empty($post['ajaxId']) &&*/ !empty($post['name']) && !empty($post['data'])){
			switch($post['name']){
				case "firstName":
					 $this->query("UPDATE staff SET firstName = :data WHERE id = :id");
					 break;
				case "lastName":
					 $this->query("UPDATE staff SET lastName = :data WHERE id = :id");
					 break;
				case "fathersName":
					 $this->query("UPDATE staff SET fathersName = :data WHERE id = :id");
					 break;
				case "personalNumber":
					 $this->query("UPDATE staff SET personalNumber = :data WHERE id = :id");
					 break;
				case "dateOfBirth":
					 $this->query("UPDATE staff SET dateOfBirth = :data WHERE id = :id");
					 break;
				case "phoneNumber":
					 $this->query("UPDATE staff SET phoneNumber = :data WHERE id = :id");
					 break;
				case "email":
					 $this->query("UPDATE staff SET email = :data WHERE id = :id");
					 break;
				case "contactNumber":
					 $this->query("UPDATE staff SET contactNumber = :data WHERE id = :id");
					 break;
				case "residence":
					 $this->query("UPDATE staff SET residence = :data WHERE id = :id");
					 break;
				case "jobPost":
					 $this->query("UPDATE staff SET jobPost = :data WHERE id = :id");
					 break;
				case "gender":
					 $this->query("UPDATE staff SET gender = :data WHERE id = :id");
					 break;
				case "comment":
					 $this->query("UPDATE staff SET comment = :data WHERE id = :id");
					 break;
			}
			// $this->query("UPDATE staff SET :name = :data WHERE id = :id");
			$this->bind(":data", $post['data']);
			$this->bind(":id", $post['ajaxId']);
			$this->execute();
			// return "ok";
		// $this->lastInsertId();
		}
		/*
		* end of ajax update
		*/
		if(isset($post["id"]) && !empty($post["id"])){
			$this->query('SELECT * FROM staff where id = :id ');
			$this->bind(":id",$post["id"]);
			$row0 = $this->single();

			$this->query('SELECT * FROM job_cat where id = :jbid ');
			$this->bind(":jbid",$row0['jobPost']);
			$row1 = $this->single();

			$this->query('SELECT * FROM job_cat WHERE NOT id = :catid ');
			$this->bind(":catid",empty($row1['id'])?'__NOTSET__':$row1['id']);
			$row2 = $this->resultSet();
			return [$row0, $row1, $row2];
		}else{
			header('Location: '.ROOT_URL.'staff/showStaff/');
			return;
		}
	}










	public function staffRegistration(){
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			/*experimantal*/
			$this->query('SELECT * FROM registration ORDER BY date_time DESC');
			$temp = $this->single();
			$current_time = date_parse(date("d-m-Y H:i"));
			$last_updated = date_parse($temp['date_time']);
		

			if($current_time['year'] == $last_updated['year'] && 
				$current_time['month'] == $last_updated['month'] && 
				$current_time['day'] == $last_updated['day']):
				/*someone already done registration*/

				Messages::setMsg('მომხმარებელმა სახელით <b>'.$temp['admin'].'</b> უკვე გააკეთა აღრიცხვა <br><code>'.$temp['date_time'].'</code>' , 'warn');
				$_SESSION['regDone'] = true;
				$this->query('SELECT staff.firstName, staff.lastName,staff.id, 
					staff.fathersName, registration.isnot_absent, 
					registration.date_time, registration.comment, staff.jobPost
						FROM staff
						INNER JOIN 
						registration
					ON staff.id = registration.user_id 
					WHERE staff.active = 1 AND 
					YEAR(registration.date_time) = :year AND
					MONTH(registration.date_time) = :month AND
					DAY(registration.date_time) = :day
					ORDER BY staff.jobPost ASC; 
					');
				// date udris today unda chavamato gamotanashi
				$this->bind(":year", $current_time['year']);
				$this->bind(":month", $current_time['month']);
				$this->bind(":day", $current_time['day']);
				$result0 = $this->resultSet();

				$this->query('SELECT text FROM comments WHERE
					YEAR(comments.date_time) = :year AND
					MONTH(comments.date_time) = :month AND
					DAY(comments.date_time) = :day ');
				$this->bind(":year", $current_time['year']);
				$this->bind(":month", $current_time['month']);
				$this->bind(":day", $current_time['day']);
				$result1 = $this->single();

				$this->query('SELECT id, name FROM job_cat');
				$result2 = $this->resultSet();
				return [$result0, $result1, $result2];
			else:
				if(isset($post['register'])){
					if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
							// restrict logging from another site
						header('Location: '.ROOT_URL.'staff/showStaff/');
						return;
					}

/*aq mere is freg done is true mashin update gaaketos touarada rac dablaa*/


					if(isset($post['data'])):
					  foreach ($_POST['data'] as $key => $value):
						$this->query('INSERT INTO registration (user_id, isnot_absent, admin, comment) VALUES(:userId, :absnt, :admn, :cm)');
						$this->bind(":userId", (isset($value['yes'])?$value['yes']:$value['no']));
						$this->bind(":absnt", (isset($value['yes'])?1:0));
						$this->bind(":admn", $_SESSION['user_data']['name']);
						$this->bind(":cm", $value['comment']);
						$this->execute();	
					  endforeach;	
					  /*add a comment of each day */
					  if(isset($post['dailyComment'])){
					  	$this->query('INSERT INTO comments (admin, text) VALUES(:adminNam, :comment)');
						$this->bind(":adminNam", $_SESSION['user_data']['name']);
						$this->bind(":comment", $post['dailyComment']);
						$this->execute();
					  }
					endif;
					Messages::setMsg('აღრიცხვა წარმატებით შესრულდა', '');
					$_SESSION['regDone'] = true;
					$this->query('SELECT staff.firstName, staff.lastName,staff.id, 
						staff.fathersName, registration.isnot_absent, 
						registration.date_time, registration.comment, staff.jobPost
							FROM staff
							INNER JOIN 
							registration
						ON staff.id = registration.user_id 
						WHERE staff.active = 1 AND 
						YEAR(registration.date_time) = :year AND
						MONTH(registration.date_time) = :month AND
						DAY(registration.date_time) = :day
						ORDER BY staff.jobPost ASC; 
						');
					// date udris today unda chavamato gamotanashi
					$this->bind(":year", $current_time['year']);
					$this->bind(":month", $current_time['month']);
					$this->bind(":day", $current_time['day']);
					$result0 = $this->resultSet();

					$this->query('SELECT text FROM comments WHERE
						YEAR(comments.date_time) = :year AND
						MONTH(comments.date_time) = :month AND
						DAY(comments.date_time) = :day ');
					$this->bind(":year", $current_time['year']);
					$this->bind(":month", $current_time['month']);
					$this->bind(":day", $current_time['day']);
					$result1 = $this->single();

					$this->query('SELECT id, name FROM job_cat');
					$result2 = $this->resultSet();
					return [$result0, $result1, $result2];
				}else{
					$this->query('SELECT * FROM staff WHERE active = 1');
					$result0 = $this->resultSet(); 
					$result1 = ""; 
					$this->query('SELECT id, name FROM job_cat');
					$result2 = $this->resultSet();	
					return [$result0, $result1, $result2];
				}
			endif;


	}

	/*სტაფის ბაზა უნდა შეივალო კომენტარის ველი და გაცემულია ტანხა უნდა დაემატოს შემდეგი პროცესინგისტვისდ ა ტანხის ველი ცალკე*/





	public function editStaff(){
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			/*experimantal*/
			$this->query('SELECT * FROM registration ORDER BY date_time DESC');
			$temp = $this->single();
			$current_time = date_parse(date("d-m-Y H:i"));
			$last_updated = date_parse($temp['date_time']);
		

			if($current_time['year'] == $last_updated['year'] && 
				$current_time['month'] == $last_updated['month'] && 
				$current_time['day'] == $last_updated['day']):
				/*someone already done registration*/

				Messages::setMsg($temp['admin'].'-მ(ა) უკვე გააკეთა აღრიცხვა '.$temp['date_time'] , 'warn');
				$_SESSION['regDone'] = true;
				$this->query('SELECT staff.firstName, staff.lastName,staff.id, 
					staff.fathersName, registration.isnot_absent, 
					registration.date_time, registration.comment
						FROM staff
						INNER JOIN 
						registration
					ON staff.id = registration.user_id 
					 
					WHERE staff.active = 1 AND 
					YEAR(registration.date_time) = :year AND
					MONTH(registration.date_time) = :month AND
					DAY(registration.date_time) = :day 
					');
				// date udris today unda chavamato gamotanashi
				$this->bind(":year", $current_time['year']);
				$this->bind(":month", $current_time['month']);
				$this->bind(":day", $current_time['day']);
				$result = $this->resultSet();

				$this->query('SELECT text FROM comments WHERE
					YEAR(comments.date_time) = :year AND
					MONTH(comments.date_time) = :month AND
					DAY(comments.date_time) = :day ');
				$this->bind(":year", $current_time['year']);
				$this->bind(":month", $current_time['month']);
				$this->bind(":day", $current_time['day']);

				return [$result, $this->single()];
			endif;
				 

	}




	public function category(){
		
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		 
		if(isset($post['addCategory'])){
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
					// restrict logging from another site
				header('Location: '.ROOT_URL.'staff/showStaff/');
				return;
			}
			$this->query('INSERT INTO job_cat (name, description, salary, monthly) VALUES(:name, :descr, :salary, :monthly)');
			$this->bind(":name", $post['name']);
			$this->bind(":descr", $post['description']);
			$this->bind(":salary", $post['salary']);
			$this->bind(":monthly", $post['monthly']);
			$this->execute();

			Messages::setMsg('კატეგორია '.$post['name'].' წარმატებით დაემატა', '');

		}

		if(isset($post['delete'])){
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
					// restrict logging from another site
				header('Location: '.ROOT_URL.'staff/category/');
				return;
			}
			$this->query('DELETE FROM job_cat WHERE id = :id');
			$this->bind(":id", $post['id']);
			$this->execute();

			Messages::setMsg('კატეგორია "'.$post['name'].'" წარმატებით წაიშალა', 'warn');

		}

		if(isset($post['updateCategory'])){
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
					// restrict logging from another site
				header('Location: '.ROOT_URL.'staff/category/');
				return;
			}
			$this->query('UPDATE job_cat SET name = :name, description = :description, salary = :salary, monthly = :monthly WHERE id = :id');
			$this->bind(":name", $post['name']);
			$this->bind(":description", $post['description']);
			$this->bind(":salary", $post['salary']);
			$this->bind(":monthly", $post['monthly']);
			$this->bind(":id", $post['id']);
			$this->execute();

			Messages::setMsg('კატეგორია "'.$post['name'].'" წარმატებით შეიცვალა', '');

		}

		

		$this->query('SELECT * FROM job_cat ORDER BY name DESC');
		return $this->resultSet();
	}




	public function checkout(){
		
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		 
		 
		$this->query('SELECT COUNT(*) days, staff.firstName, staff.lastName,staff.id, 
					staff.fathersName, staff.jobPost, registration.isnot_absent, 
					registration.date_time, registration.comment
						FROM staff
							INNER JOIN registration
						ON staff.id = registration.user_id  
					WHERE staff.active = 1 
					AND registration.isnot_absent = 1
					GROUP BY staff.id
					ORDER BY firstName DESC');
		$result0 =  $this->resultSet();

		$this->query('SELECT * FROM job_cat ORDER BY name DESC');
		$result1 =  $this->resultSet();
		
		$this->query('SELECT * FROM dept');
		$result2 =  $this->resultSet();

		$this->query('SELECT * FROM bonus');
		$result3 =  $this->resultSet();
		
		return [$result0, $result1, $result2, $result3];
	}

 
	public function dept(){
		
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if(isset($post['addDept'])){
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
					header('Location: '.ROOT_URL.'staff/dept/');
					Messages::setMsg('Referer Error', 'error');
					return;
			}
			$this->query('INSERT INTO dept (user_id, value, comment) VALUES(:id, :val, :cm)');
			$this->bind(":id", $post['name']);
			$this->bind(":val", $post['dept']);
			$this->bind(":cm", $post['description']);
			$this->execute();
			if($this->lastInsertId()){
				Messages::setMsg('ვალი წარმატებით დაემატა', '');
			}else{
				Messages::setMsg('რაღაც მოხდა, ჩანაწერი არ დამატებულა', 'error');
			}
		}
		$this->query('SELECT * FROM staff WHERE active = 1 ORDER BY firstName DESC');
		$result0 = $this->resultSet();

		$this->query('SELECT staff.firstName, staff.lastName, staff.id, dept.value, dept.comment, dept.paid
		 	FROM staff 
			INNER JOIN dept
			ON staff.id = dept.user_id
			ORDER BY dept.date_time DESC');
		$result1 = $this->resultSet();

		return [$result0, $result1];
	}


	public function bonus(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['addBonus'])){
			if(empty($post['csrf']) || ($post['csrf'] != $_SESSION['csrf'])){
					header('Location: '.ROOT_URL.'staff/bonus/');
					Messages::setMsg('Referer Error', 'error');
					return;
			}
			$this->query('INSERT INTO bonus (user_id, value, comment) VALUES(:id, :val, :cm)');
			$this->bind(":id", $post['name']);
			$this->bind(":val", $post['bonus']);
			$this->bind(":cm", $post['description']);
			$this->execute();
			if($this->lastInsertId()){
				Messages::setMsg('ბონუსი/დანამატი/პრემია წარმატებით დაემატა', '');
			}else{
				Messages::setMsg('რაღაც მოხდა, ჩანაწერი არ დამატებულა', 'error');
			}
		}

		if(isset($post['delete'])){
			$this->query('DELETE FROM bonus WHERE id = :id');
			$this->bind(":id", $post['id']);
			$this->execute();
				Messages::setMsg('ბონუსი/დანამატი/პრემია წარმატებით გაუქმდა', 'warn');

		}

		$this->query('SELECT * FROM staff WHERE active = 1 ORDER BY firstName DESC');
		$result0 = $this->resultSet();

		$this->query('SELECT bonus.value, bonus.comment, 
			bonus.user_id, bonus.date_time,
			staff.firstName, staff.lastName, bonus.id as bonID
			FROM bonus
			INNER JOIN staff
			ON staff.id = bonus.user_id
			ORDER BY date_time DESC');
		$result1 = $this->resultSet();

		return [$result0, $result1];
		 
	}









}
