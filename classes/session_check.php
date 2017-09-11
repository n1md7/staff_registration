<?php
	session_start();
	if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
		$exPtime = $_SESSION['SES_TIME'];  
		$expire = $exPtime - (time() - $_SESSION['CREATED']);
		// $min = intval($expire / 60);
		// $sec = $expire % 60;
		// echo ($min < 10 ? '0'.(strval($min)): $min).':'.($sec < 10 ? '0'.(strval($sec)): $sec);
		echo $expire;
	else:
		return;
	endif;
?>