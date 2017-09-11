<?php

	class Language extends Model{
		public function translate(){
			$this->query('SELECT * FROM translate WHERE lang_id = :lang_id');
			$this->bind(':lang_id', isset($_SESSION['user_data']['lang'])?$_SESSION['user_data']['lang']:2);
			/*2 for default language
			I should save it inside db and super admin should be able to modify this
			it should be changed no static value here
			*/
			// var_dump($this->resultSet());
			return $this->resultSet();
			
		} 
	}


$lang_Obj = new Language();

/* if session language = 1 we need to assign global variables the  correct values

MENU_STAFF = $viewmodel['staff'] it will be displayed as a proper language

*/

$_SESSION['keyWord_array'] = array(
	'MENU_STAFF' =>'',
	'MENU_REGISTRATION' =>'',
	'MENU_REGISTRATION_CHANGE' =>'',
	'MENU_OPTIONS' =>'',
	'MENU_CHECKOUT' =>'',
	'MENU_MAKE_A_LONE' =>'',
	'MENU_BONUS' =>'',
	'MENU_JOB_POSITION' =>'',
	'MENU_ADD_STAFF' =>'',
	'MENU_ADD_USER' =>'',
	'MENU_SHOW_USERS' =>'',
	'MENU_HOME_AUTOMATION' =>'',
	'MENU_CHANGE_LANGUAGE' =>'',
	'MENU_SETTINGS' =>'',
	'MENU_LOG_OUT' =>'',
	'TEXT_SEARCH' =>'',
	'TEXT_SEARCH_HERE' =>'',
	'TEXT_FNAME' =>'',
	'TEXT_LNAME' =>'',
	'TEXT_MOBILE_NUMBER' =>'',
	'TEXT_JOB_POSITION' =>'',
	'TEXT_STATUS' =>'',
	'TEXT_DETILE_INFO' =>'',
	'TEXT_SHOW_INFO' =>'',
	'TEXT_ASC' =>'',
	'TEXT_DESC' =>'',
	'TEXT_SUPER_ADMIN' =>'',
	'TEXT_BASIC_ADMIN' =>'',
	'TEXT_BASIC_USER' =>'',
	'TEXT_SUFIX_S' =>'',
	'TEXT_FATHERS_NAME' =>'',
	'TEXT_PERSONAL_NUMBER' =>'',
	'TEXT_CONTACT_PERSON_NUMBER' =>'',
	'TEXT_NATIONALITY' =>'',
	'TEXT_GENDER' =>'',
	'TEXT_COMMENT' =>'',
	'TEXT_STAFF_DEACTIVATE' =>'',
	'TEXT_EDIT' =>'',
	'TEXT_UPDATE' =>'',
	'TEXT_UPDATED' =>'',
	'TEXT_BACK' =>'',
	'TEXT_DAY' =>'',
	'TEXT_SALARY' =>'',
	'TEXT_GETTING_MONEY' =>'',
	'TEXT_EARNED_MONEY' =>'',
	'TEXT_BLOCKED_MONEY' =>'',
	'TEXT_DEPT' =>'',
	'TEXT_CHECKOUT' =>''
);

foreach ($lang_Obj->translate() as $DBkey => $DBvalue) {
	foreach ($_SESSION['keyWord_array'] as $SESkey => $SESvalue) {
		if($DBvalue['name'] == $SESkey){
			$_SESSION['keyWord_array'][$SESkey] = $DBvalue['text'];
		}
	}	
}


?>