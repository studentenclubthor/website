<?php

class Auth extends Controller{
	
	public function __construct(){
		//Calling your Model class for page
		parent::__construct();
		
		
		if(isset($_COOKIE['thorsessionid'])){
			$ifSessionExists = $this->model->checksession($_COOKIE['thorsessionid']);
			if(! $ifSessionExists) {
				unset($_COOKIE['thorsessionid']);
				echo "no cookie";
				//header("Location: ". URL . "login");
			}
		}
		else {
			echo "else cookie";
			//header("Location: ". URL . "login");
		}
	} 
}
?>