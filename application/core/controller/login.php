<?php

class Login extends Controller{
	
	function __construct(){
		parent::__construct();
    }
	
    function index(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	function test(){
		$this->model->isPraesidium();
	}
	
	function login(){
		$data = null;
		if(isset($_GET['redirecturl'])) {
			$_SESSION['redirecturl'] = $_GET['redirecturl'];
		}
		if (!empty($_POST)) {
			$data['post'] = $_POST; 
			$email = $_POST['email'];
			$password = $_POST['password'];
			$remember = $_POST['remember'];
			$email = strip_tags($email);
			$password = strip_tags($password);
			$remember = strip_tags($remember);
			$password = md5($password);
			$result = $this->model->login($email, $password, $remember);
			// var_dump($result);
			// exit;
			if($result) {
				// echo 'result';
				if(isset($_SESSION['redirecturl'])) {
					header("Location: ".$_SESSION['redirecturl']);
					die();
				}
				else {
					header("Location: " . URL);
					die();
				}
			}
			else {
				// echo 'no result';
				$data['errors'] = array(array("Email and Password do not match, Please try again"));
				
					header("Location: " . URL);
					die();
			}
		}
		echo('no post');
		return $data;
	}
	
	public function create(){
		var_dump($_POST);
		if (!empty($_POST)) {
			$data['post'] = $_POST; 
			$voornaam = $_POST['voornaam'];
			$naam = $_POST['naam'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password = md5($password);
			if($result = $this->model->getPersoon($voornaam . ' ' . $naam)){
				if($result['0']->paswoord){
					// echo 'already exists';
				}
				else{	
					$this->model->editPersoon($result['0']->id,$voornaam,$naam,$email,$password,0);
					$this->model->login($email, $password, 0);
				}
			}
		}
		header('Location: ' . URL . "home");
	}
	
	public function forgot() {
		if (!empty($_POST)) {
			$data['post'] = $_POST; 
			//including validation
			$v = new Valitron\Validator($_POST); // Input array
			$v->rule('required', 'email');
			$v->rule('email', 'email');
			if($v->validate()) {
				$value = strip_tags($_POST['email']);
				$value = trim($value);
				$data['result'] = $this->model->updateForgotPassword($value);
			} else {
				// Errors
				$data['errors'] = $v->errors();
			}
		} 
		return $data;		
	}
	
	public function passwordreset($tempid) {
			if (!empty($_POST)) {
			//including validation
			$v = new Valitron\Validator($_POST); // Input array
			$v->rule('required', 'password');
			$v->rule('lengthMin', 'password', 6);
			$v->rule('regex', 'password', '/[^a-z_\-0-9]/i')->message('Password should be alpha numeric and should contain atleat 1 special character');
			$v->rule('equals', 'password', 'passwordverify')->message('Please re-enter the password again');
			if($v->validate()) {
				$final_array = array();
				$keys = array_keys($_POST);
				foreach($keys as $key) {
					$value = strip_tags($_POST[$key]);
					$value = trim($value);
					if($key != "passwordverify") {
						$final_array[$key] = $value;
					}
					if($key == "password") {
						$final_array[$key] = md5($value);
					}
				}
				$data['result'] = $this->model->passwordreset($final_array['password'], $tempid);
			} else {
				// Errors
				$data['errors'] = $v->errors();
			}
		}
		$data['tempid'] = $tempid;
		$data['ep_title'] = "Change Password"; //setting title name
		$data['view_page'] = "users/changepassword.php"; //controller view page
		$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
		$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
		return $data;		
	}
}
