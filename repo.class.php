<?php

class Repository {

	protected $table = '';

	public function getById($id)
	{
		return Dbh::inst()->fetchById($this->table, $id); // why do we have access to Dbh?
	}

	public function all() {
		return Dbh::inst()
			->fetchAll("SELECT * FROM {$this->table}");
	}
}