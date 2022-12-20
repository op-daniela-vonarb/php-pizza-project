<?php

class SignupValidator{ // why can't I extend to SignupContr?

    private $data = [];
    private $errors = [];
    private static $fields = ['name', 'email', 'uid', 'pwd', 'pwdrepeat'];

    public function __construct($post_data) {
        $this->data = $post_data;
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
        $this->pwdMatch();
        // $this->uidTakenCheck();
        return $this->errors;

    }

    private function validateName() {
        $val = trim($this->data['name']);

        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
        } else{
            if(!preg_match("/^[a-z ,.'-]+$/i", $val)) {
                $this->addError('name', 'name must be alphanumeric');
            }
        }
    }

    private function validateUsername() {
        $val = trim($this->data['uid']);

        if(empty($val)) {
            $this->addError('uid', 'username cannot be empty');
        } else{
            if(!preg_match('/^[a-zA-Z0-9]{4,25}$/', $val)) {
                $this->addError('uid', 'username must be 4-25 chars & alphanumeric');
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

        private function pwdMatch() {
            $val = $this->data['pwd'];
            $val2 = $this->data['pwdrepeat'];

            if($val !== $val2) {
                $this->addError('pwd', 'passwords do not match');
            }
        }

 
    // private function uidTakenCheck() {
    //     $val = ($this->data['uid']);
    //     $val2 = ($this->data['email']);

    //     if($this->checkUser($this->val, $this->val2) == false) {
    //         $this->addError('email', 'email already taken');
    //     }   
    // }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }
}