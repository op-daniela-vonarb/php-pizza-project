<?php

class Repository {

	protected $table = '';

	public function getById($id)
	{
		return Dbh::inst()->fetchById($this->table, $id);
	}

	public function all() {
		return Dbh::inst()
			->fetchAll("SELECT * FROM {$this->table}");
	}

	public function removeById($id) {
		return Dbh::inst()->deleteById($this->table, $id);
	}

	public function insert($paramTitle, $paramName) {
		return Dbh::inst()->add($this->table, $paramTitle, $paramName);
	}
}