<?php

require_once("contr.interface.php");

class LoginContr extends Contr implements Controller {

    private $userRepo;
	private $errors = [];
	
	public function __construct($requestParams = [])
	{
		parent::__construct($requestParams);
		$this->userRepo = new Users();
	}

	public function handleRequest()
    {
        if($this->requestParams && array_key_exists("submit", $this->requestParams)) {
            $this->validateForm();
            if(!$this->errors){
                $this->loginUser();
            }
        }
    }

    public function loginUser() {

        $this->validateUser($this->requestParams['uid'], $this->requestParams['pwd']);
	    }

	public function validateForm(){
		$this->validateUid();
		$this->validatePwd();
		return $this->errors;
	}

	private function validateUid() {
		$val = $this->requestParams['uid'];

		if(empty($val)) {
			$this->addError('uid', 'A username/email is required');
		}
	}

	private function validatePwd() {
		$val = $this->requestParams['pwd'];

		if(empty($val)) {
			$this->addError('pwd', 'A password is required');
		}
	}
	
	protected function validateUser($username, $pwd) {
		$user = $this->userRepo->getUser($username);
		if (!$user) {
			$this->addError('uid', 'User not found');
		
		}
		if (password_verify($pwd, $user['usersPwd'])) {
			return AuthHelper::inst()->setCurrentUser($user);
			header("location: index.php?error=none");
		}
		else {
			$this->addError('pwd', 'Wrong password');
		}
		return $this->errors;
	}


	private function addError($key, $val) {
		$this->errors[$key] = $val;
	}

	public function getErrors() {
        return $this->errors;
    }

	public function getUid() {
		// check if it's empty
		if(array_key_exists("uid", $this->requestParams)) {
			return $this->requestParams['uid'];
		}
	}

	public function getPwd() {
		// check if it's empty
		if(array_key_exists("pwd", $this->requestParams)) {
			return $this->requestParams['pwd'];
		}
	}

}