<?php
// Start Session
ob_start();//amisgamo ar mushaobda ragac heeader problemas migdebda da exa mushaobs 
session_start();


/*check session last activity*/
require('classes/sescontrol.php');


// Include Config
require('config.php');

require('classes/csrf.php');
require('classes/calendar.php');
require('classes/generatesha1.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/users.php');
require('controllers/home.php');
require('controllers/staff.php');

require('models/user.php');
require('models/home.php');
require('models/staff.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}






 