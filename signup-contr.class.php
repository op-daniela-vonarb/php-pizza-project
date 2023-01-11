<?php

require_once("contr.interface.php");

class SignupContr extends Contr implements Controller {

    private $userRepo;

    public function __construct($requestParams = []) {

        parent::__construct($requestParams);
		$this->userRepo = new Users();
    }

    public function handleRequest() {
        if($this->requestParams && array_key_exists("submit", $this->requestParams)){
        $this->userRepo->insert($this->requestParams['name'], $this->requestParams['email'], $this->requestParams['uid'], $this->requestParams['pwd']);
        }
        
    }
}