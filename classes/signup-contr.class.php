<?php


class SignupContr extends Signup {

    private $name;
    private $email;
    private $username;
    private $pwd;
    private $pwdRepeat;

    public function __construct($name, $email, $username, $pwd, $pwdRepeat) {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    public function signupUser() {
        $this->setUser($this->name, $this->email, $this->username, $this->pwd);
    }
}