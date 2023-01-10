<?php

require_once("contr.interface.php");

// class DeleteContr extends Delete {

//     public function removePizza($id) {
//         $this->deletePizza($id);
//     }
// }



class DeleteContr extends Contr implements Controller {

    private $pizzaRepo;
    private $currentPizza = null;

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

	// public function removePizza() {
    //     return $this->currentPizza;
    // }
}