<?php


class AddContr extends Add {

    private $title;
    private $ingredients;
    private $errors = []; // static?

    public function __construct($title, $ingredients) {
        $this->title = $title;
        $this->ingredients = $ingredients;
    }

    public function addPizza() {
        $this->setPizza($this->title, $this->ingredients);
        // $this->getPizza();
    }

    // public function getPizza() {
    //     return array('title' => $this->title, 'ingredients' => $this->ingredients);
    // }

    public function validateForm() {
        $this->validateTitle();
        $this->validateIng();
        return $this->errors;
    }

    private function validateTitle() {
        $val = trim($this->title);

        if(empty($val)) {
            $this->addError('title', 'A title is required');
        } else {
            if(!preg_match('/^[a-zA-Z\s]+$/', $val)){
                $this->addError('title', 'Title must be letters and spaces only');
            }
        }
    }

    private function validateIng() {
        $val = trim($this->ingredients);

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

}