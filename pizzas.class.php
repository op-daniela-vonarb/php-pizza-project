<?php


class Pizzas extends Repository
{

	protected $table = 'pizzas';


	public function insert($title, $ingredients) {
		return Dbh::inst()->add("INSERT INTO $this->table(title, ingredients) VALUES(?,?)", [$title, $ingredients]);
	}

}