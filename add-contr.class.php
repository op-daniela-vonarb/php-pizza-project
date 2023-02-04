<?php

require_once("contr.interface.php");


class AddContr extends Contr implements Controller {

    private $pizzaRepo;
    private $errors = [];

    public function __construct($requestParams = [])
	{
		parent::__construct($requestParams);
		$this->pizzaRepo = new Pizzas();
	}

    public function handleRequest()
    {
        if($this->requestParams && array_key_exists("submit", $this->requestParams)) {
            $this->validateForm();
            if(!$this->errors){
                $this->pizzaRepo->insert($this->requestParams['title'], $this->requestParams['ingredients']);
                header("location: index.php?error=none");
            }
        }
    }


    public function validateForm() {
        $this->validateTitle();
        $this->validateIng();
        return $this->errors;
    }

    private function validateTitle() {
        $val = trim($this->requestParams['title']);

        if(empty($val)) {
            $this->addError('title', 'A title is required');
        } else {
            if(!preg_match('/^[a-zA-Z\s]+$/', $val)){
                $this->addError('title', 'Title must be letters and spaces only');
            }
        }
    }

    private function validateIng() {
        $val = trim($this->requestParams['ingredients']);

        if(empty($val)) {
            $this->addError('ingredients', 'At least one ingredient is required');
        } else {
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $val)){
                $this->addError('ingredients', 'Ingredients must be a comma separated list');
            }
        }
    }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getTitle(){
        if(array_key_exists("title", $this->requestParams)){
            return $this->requestParams['title'];
        }
    }

    public function getIngredients(){
        if(array_key_exists("ingredients", $this->requestParams)){
            return $this->requestParams['ingredients'];
        }
    }


}