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
			if($result) {
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
				$data['errors'] = array(array("Email and Password do not match, Please try again"));
				
					header("Location: " . URL);
					die();
			}
		}
		return $data;
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
		$data['ep_title'] = "Forgot Password"; //setting title name
		$data['view_page'] = "users/forgot.php"; //controller view page
		$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
		$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
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
