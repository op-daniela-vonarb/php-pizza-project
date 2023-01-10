
<?php

require_once("contr.interface.php"); // why do we need to require this in here?

class Contr { // I don't understand why we need this class

	protected $requestParams;

	public function __construct($requestParams = [])
	{
		$this->requestParams = $requestParams;
	}

	public function clearCurrentUser() // why is this in Contr class? Function not used. There is another clearCurrentUser() in auth-helper.class
	{
		$_SESSION["userid"] = null;
		$_SESSION["useruid"] = null;
		session_reset();
		return true;
	}

}