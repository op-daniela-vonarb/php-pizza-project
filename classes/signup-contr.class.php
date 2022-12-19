<?php


class SignupContr extends Signup {

    // private $name;
    // private $email;
    // private $username;
    // private $pwd;
    // private $pwdRepeat;

    protected $name;
    protected $email;
    protected $username;
    protected $pwd;
    protected $pwdRepeat;

    public function __construct($name, $email, $username, $pwd, $pwdRepeat) {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    public function signupUser() {


        // if($this->emptyInput() == false) {
        //     // echo "Empty input!";
        //     header("location: ../signup.php?error=emptyinput");
        //     exit();
        // }
        // if($this->invalidUid() == false) {
        //     // echo "Invalid username!";
        //     header("location: ../signup.php?error=username");
        //     exit();
        // }
        // if($this->invalidEmail() == false) {
        //     // echo "invalid email!";
        //     header("location: ../signup.php?error=email");
        //     exit();
        // }
        // if($this->pwdMatch() == false) {
        //     // echo "passwords don't match!";
        //     header("location: ../signup.php?error=passwordmatch");
        //     exit();
        // }
        if($this->uidTakenCheck() == false) {
            echo "username or email taken";
            header("location: signup.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->name, $this->email, $this->username, $this->pwd);

    }

    // private function emptyInput() {
    //     $result = '';
    //     if(empty($this->name) || empty($this->email) || empty($this->username) || empty($this->pwd) || empty($this->pwdRepeat)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }

    // private function invalidUid() {
    //     $result = '';
    //     if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }

    // private function invalidEmail() {
    //     $result = '';
    //     if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }
   
    // private function pwdMatch() {
    //     $result = '';
    //     if($this->pwd !== $this->pwdRepeat) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }

    private function uidTakenCheck() {
        $result = '';
        if(!$this->checkUser($this->username, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}