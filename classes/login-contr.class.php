<?php

require_once("interface/contr.interface.php");

class LoginContr extends Contr implements Controller {

    private $userRepo;


	public function __construct($requestParams = [])
	{
		parent::__construct($requestParams);
		$this->userRepo = new Users();
	}

	public function handleRequest()
	{
		if($this->requestParams && array_key_exists("submit", $this->requestParams)) {
			$this->loginUser();
		}
	}

    public function loginUser() {
        if($this->emptyInput()) {
            header("location: login.php?error=emptyinput");
            exit();
        }
        if ($this->validateUser($this->requestParams['uid'], $this->requestParams['pwd'])) {
			header("location: index.php");
			exit();
		}
    }

	protected function validateUser($username, $pwd) {
		$user = $this->userRepo->getUser($username);
		if (!$user) {
			header("location: login.php?error=usernotfound");
			exit();
		}
		if (password_verify($pwd, $user["usersPwd"])) {
//			$_SESSION["userid"] = $user["usersId"];
//			$_SESSION["useruid"] = $user["usersUid"];
			return AuthHelper::inst()->setCurrentUser($user);
		}
		header("location: login.php?error=wrongpassword");
		exit();
	}

    private function emptyInput() {
        return empty($this->requestParams['uid']) || empty($this->requestParams['pwd']);
    }

}