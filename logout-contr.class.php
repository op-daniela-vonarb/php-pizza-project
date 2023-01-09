<?php

require_once("contr.interface.php");

class LogoutContr extends Contr implements Controller {

	public function handleRequest()
	{
		AuthHelper::inst()->clearCurrentUser();
		header("location: index.php");
		exit();
	}

}