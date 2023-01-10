<?php

require_once("contr.interface.php");



class DeleteContr extends Contr implements Controller {

    private $pizzaRepo;
    

    public function __construct($requestParams = [])
	{
		parent::__construct($requestParams);
		$this->pizzaRepo = new Pizzas();
	}

	public function handleRequest()
	{
		if (array_key_exists('delete', $this->requestParams )) {
			$this->pizzaRepo->removeById($this->requestParams['id']);
			header("location: index.php");
		}

	}

}