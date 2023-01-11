
<?php

require_once("contr.interface.php");

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

		if (array_key_exists('delete', $this->requestParams )) {
			$this->pizzaRepo->removeById($this->requestParams['id']);
			header("location: index.php");
		}
	}

	public function Pizza() {
        return $this->currentPizza;
    }
}