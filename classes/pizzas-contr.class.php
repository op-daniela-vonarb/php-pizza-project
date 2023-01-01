
<?php

require_once("interface/contr.interface.php");

class PizzasContr extends Contr implements Controller {

	private $pizzaRepo;

	public function __construct($requestParams = [])
	{
		parent::__construct($requestParams);
		$this->pizzaRepo = new Pizzas();
	}

	public function handleRequest()
	{
	}

	public function Pizzas() {
        return $this->pizzaRepo->all();
    }
}