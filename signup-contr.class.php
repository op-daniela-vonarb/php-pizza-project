<?php

require_once("contr.interface.php");

class SignupContr extends Contr implements Controller {

    private $userRepo;
    private $errors = [];

    public function __construct($requestParams = []) {

        parent::__construct($requestParams);
		$this->userRepo = new Users();
    }

    public function handleRequest() {

        if($this->requestParams && array_key_exists("submit", $this->requestParams)){
            $this->validateForm();
            if(!$this->errors){
                $this->userRepo->insert($this->requestParams['name'], $this->requestParams['email'], $this->requestParams['uid'], $this->requestParams['pwd']);
                header("location: index.php?error=none");
            }
        }       
    }

    public function validateForm() {
        $this->validateName();
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePwd();
        $this->validatePwdRepeat();
        $this->pwdMatch();
        // $this->uidTakenCheck();
        return $this->errors;
    }

    private function validateName() {
        $val = trim($this->requestParams['name']);

        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
        } else{
            if(!preg_match("/^[a-z ,.'-]+$/i", $val)) {
                $this->addError('name', 'name must be alphanumeric');
            }
        }
    }

    private function validateUsername() {
        $val = trim($this->requestParams['uid']);

        if(empty($val)) {
            $this->addError('uid', 'username cannot be empty');
        } else{
            if(!preg_match('/^[a-zA-Z0-9]{4,25}$/', $val)) {
                $this->addError('uid', 'username must be 4-25 chars & alphanumeric');
            }
        }
    }

    private function validateEmail() {
        $val = trim($this->requestParams['email']);

        if(empty($val)) {
            $this->addError('email', 'email cannot be empty');
        } else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'email must be a valid email');
            }
        }
    }

    private function validatePwd() {
        $val = trim($this->requestParams['pwd']);

        if(empty($val)) {
            $this->addError('pwd', 'password cannot be empty');
        } 
    }

    private function validatePwdRepeat() {
        $val = trim($this->requestParams['pwdrepeat']);

        if(empty($val)) {
            $this->addError('pwdrepeat', 'password cannot be empty');
        } 
    }

    private function pwdMatch() {
        $val = $this->requestParams['pwd'];
        $val2 = $this->requestParams['pwdrepeat'];

        if($val !== $val2) {
            $this->addError('pwd', 'passwords do not match');
        }
    }

 
    // private function uidTakenCheck() {
    //     if(!$this->checkUser($this->requestParams['uid'], $this->requestParams['email'])) {
    //         $this->addError('email', 'email already taken');
    //     }
    // }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getName(){
        if(array_key_exists("name", $this->requestParams)){
            return $this->requestParams['name'];
        }
    }

    public function getUid(){
        if(array_key_exists("uid", $this->requestParams)){
            return $this->requestParams['uid'];
        }
    }

    public function getEmail(){
        if(array_key_exists("email", $this->requestParams)){
            return $this->requestParams['email'];
        }
    }

    public function getPwd(){
        if(array_key_exists("pwd", $this->requestParams)){
            return $this->requestParams['pwd'];
        }
    }

    public function getPwdRepeat(){
        if(array_key_exists("pwdrepeat", $this->requestParams)){
            return $this->requestParams['pwdrepeat'];
        }
    }


}