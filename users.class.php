<?php

class Users extends Repository
{
	protected $table = 'users';

	public function getUser($username)
	{
		$users = Dbh::inst()
			->fetchAll(
				"SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;",
				[$username, $username]);
		if (count($users)) {
			return $users[0];
		}
		return null;
	}

	public function insert($name, $email, $username, $pwd) {
		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
		return Dbh::inst()->add("INSERT INTO $this->table(usersName, usersEmail, usersUid, usersPwd) VALUES(?,?,?,?)", [$name, $email, $username, $hashedPwd]);
	}
}

