<?php

class Logout extends Controller{
	
	function __construct(){
		parent::__construct();
		if(isset($_SESSION["DBSesionId"])) {
			session_destroy();
			echo 'destroy sess';
		}
		if(isset($_COOKIE['thorsessionid'])) {
			var_dump($_COOKIE);
			unset($_COOKIE['thorsessionid']);
			unset($_COOKIE['PHPSESSID']);
			var_dump($_COOKIE);
			echo 'unset cook';
			setcookie("thorsessionid", "", time(), "/");
		}
		
		if(isset($_COOKIE['PHPSESSID'])) {
			unset($_COOKIE['PHPSESSID']);
		}
		
		// var_dump($_SESSION);
		// var_dump($_COOKIE);
		// die();
		
		header("Location: " . URL . "login");
		// if(isset($redirect)){
			// header("Location: " . URL . $redirect);
		// }
		
		// $redirect = "logout";
    }
	
	function index(){
		
	}
}
