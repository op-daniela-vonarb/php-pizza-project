
<?php

require_once("contr.interface.php");

class Contr {

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