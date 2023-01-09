<?php

require_once("contr.interface.php");

class PizzasContr extends Contr implements Controller {

	private $pizzaRepo;

	public function __construct($requestParams = [])
	{
		parent::__construct($requestParams); // parent Contr?
		$this->pizzaRepo = new Pizzas(); // why do we have access to the Pizzas class?
	}

	public function handleRequest() // what does this function do?
	{
	}

	public function Pizzas() {
        return $this->pizzaRepo->all();
    }
}