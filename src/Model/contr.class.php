
<?php

require_once("../interface/contr.interface.php");

class Contr {

	protected $requestParams;

	public function __construct($requestParams = [])
	{
		$this->requestParams = $requestParams;
	}

	public function clearCurrentUser()
	{
		$_SESSION["userid"] = null;
		$_SESSION["useruid"] = null;
		session_reset();
		return true;
	}

}