<?php

require_once("interface/contr.interface.php");

class LogoutContr extends Contr implements Controller {

	public function handleRequest()
	{
		AuthHelper::inst()->clearCurrentUser();
		header("location: index.php");
		exit();
	}

}