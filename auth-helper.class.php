<?php

class AuthHelper
{
	private static $_inst;

	public function setCurrentUser($user)
	{
		$_SESSION["useruid"] = $user["usersUid"];
		return $this->isLoggedIn();
	}

	public function clearCurrentUser()
	{
		$_SESSION["useruid"] = null;
		session_destroy();
		return !$this->isLoggedIn();
	}

	public function getCurrentUserId()
	{
		return array_key_exists("useruid", $_SESSION) ? $_SESSION["useruid"]  : null;
	}

	public function isLoggedIn()
	{
		return array_key_exists("useruid", $_SESSION)
			&& $_SESSION["useruid"]
			&& !empty($_SESSION["useruid"]);
	}

	public static function inst()
	{
		if (!self::$_inst) {
			self::$_inst = new self();
		}
		return self::$_inst;
	}
}