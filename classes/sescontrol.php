<?php 
if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (isset($_SESSION['CREATED']) && time() - $_SESSION['CREATED'] > 300) { //5 minutes for auto expire
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();
}else{
    $_SESSION['CREATED'] = time();  // update creation time
}