<?php 
include ("../kon.php");

function session(){
	$namses	='sessionid';
	session_name($namses);
	$stopjs	=true;
	$http	=true;

	if (ini_set('session.use_only_cookies', 1) === false) {
		header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }

    $cookie 	= session_get_cookie_params();
    session_set_cookie_params(
    	$cookie["lifetime"],
    	$cookie["path"],
    	$cookie["domain"],
    	$stopjs,
    	$http);

    session_start();
    session_regenerate_id(true);
}
?>
