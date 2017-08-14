<?php
/**
* genereta sha1 userpassword
*/
class sha1Generate{
	public static function sha1($sha1){
		$string = "GJFDJHG679gjhglwqep[cm&^0e@!#]";
		// $string = "";
		return sha1($string.$sha1.$string);
	}
}
 
