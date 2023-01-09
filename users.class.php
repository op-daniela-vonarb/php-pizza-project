<?php

class Users extends Repository
{
	protected $table = 'users';

	public function getUser($username)
	{
		$users = Dbh::inst() // why do we have access to Dbh?
			->fetchAll(
				"SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;",
				[$username, $username]);
		if (count($users)) {
			return $users[0];
		}
		return null;
	}
}