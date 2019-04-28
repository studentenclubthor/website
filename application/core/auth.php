<?php

class Auth extends Controller{
	
	public function __construct()
	  {
		//Calling your Model class for page
		parent::__construct();
		
		
		if(isset($_SESSION["DBSesionId"])) {
			$ifSessionExists = $this->model->checksession($_SESSION["DBSesionId"]);
			if(! $ifSessionExists) {
				session_destroy();
				header("Location: ". URL . "login");
			}
		}
		else if(isset($_COOKIE['thorsessionid'])) {
			$ifCookieExists = $this->model->checksession($_COOKIE['thorsessionid']);
			if($ifCookieExists) {
				session_start();
				$_SESSION["DBSesionId"] = $_COOKIE['thorsessionid'];
			}
			else{
				setcookie("thorsessionid", '', time() - 10, "/");
				header("Location: ". URL . "login");
			}
		}
		else {
			$_SESSION["DBSesionId"] = "";
			header("Location: ". URL . "login");
		}
	  }
	  
}
?>