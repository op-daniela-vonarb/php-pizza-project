<?php

class UserValidator extends SignupContr {

    private $data = [];
    private $errors = [];
    private static $fields = ['name', 'email', 'uid', 'pwd', 'pwdrepeat'];

    public function __construct($name, $email, $username, $pwd, $pwdRepeat) {
        // $this->data = [$this->name, $this->email, $this->username, $this->pwd, $this->pwdRepeat];
        $this->data = [$name, $email, $username, $pwd, $pwdRepeat];

    }

    public function validateForm() {
        foreach(self::$fields as $field) {
            if(!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateName();
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePwd();
        $this->validatePwdRepeat();
        return $this->errors;

    }

    private function validateName() {
        $val = trim($this->data['name']);

        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
        } else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
                $this->addError('name', 'name must be 6-12 chars & alphanumeric');
            }
        }
    }

    private function validateUsername() {
        $val = trim($this->data['uid']);

        if(empty($val)) {
            $this->addError('uid', 'username cannot be empty');
        } else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
                $this->addError('uid', 'username must be 6-12 chars & alphanumeric');
            }
        }
    }

    private function validateEmail() {
        $val = trim($this->data['email']);

        if(empty($val)) {
            $this->addError('email', 'email cannot be empty');
        } else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'email must be a valid email');
            }
        }
    }

    private function validatePwd() {
        $val = trim($this->data['pwd']);

        if(empty($val)) {
            $this->addError('pwd', 'password cannot be empty');
        } 
    }

    private function validatePwdRepeat() {
        $val = trim($this->data['pwdrepeat']);

        if(empty($val)) {
            $this->addError('pwdrepeat', 'password cannot be empty');
        } 
    }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }
}