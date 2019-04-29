<?php

class Auth extends Controller{
	
	public function __construct(){
		//Calling your Model class for page
		parent::__construct();
		
		
		if(isset($_COOKIE['thorsessionid'])){
			$ifSessionExists = $this->model->checksession($_COOKIE['thorsessionid']);
			if(! $ifSessionExists) {
				setcookie("thorsessionid", '', time() - 10, "/");
				echo "no cookie";
				//header("Location: ". URL . "login");
			}
		}
		else {
			echo "else";
			//header("Location: ". URL . "login");
		}
	} 
}
?>