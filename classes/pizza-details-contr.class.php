
<?php

require_once("interface/contr.interface.php");

class PizzaDetailsContr extends Contr implements Controller {

	private $currentPizza = null;

	private $pizzaRepo;

	public function __construct($requestParams = [])
	{
		parent::__construct($requestParams);
		$this->pizzaRepo = new Pizzas();
	}

	public function handleRequest()
	{
		if (array_key_exists('id', $this->requestParams )) {
			$this->currentPizza = $this->pizzaRepo->getById($this->requestParams['id']);
		}

	}

	public function Pizza() {
        return $this->currentPizza;
    }
}