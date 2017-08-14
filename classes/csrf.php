<?php 
/**
* For CSRF security 
*/
class CSRF{
	public function __construct($return = False, $len=20){
		//CSRF avoiding
		$this->string = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890_";
		$this->returnToken = "";
		for($k = 0; $k <$len; $k ++){
			$this->returnToken .= $this->string[rand(0,strlen($this->string)-1)];
		}
		$_SESSION['csrf'] = $this->returnToken;
		if(!$return)
			echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf']."\">";
	}
	public function getToken(){
		return $this->returnToken;
	}
}

 
