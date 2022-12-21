<?php


class AddContr extends Add {

    private $title;
    private $ingredients;

    public function __construct($title, $ingredients) {
        $this->title = $title;
        $this->ingredients = $ingredients;
    }

    public function addPizza() {
        if($this->emptyInput() == false) {
            header("location: ../add.php?error=emptyinput");
            exit();
        }
        $this->setPizza($this->title, $this->ingredients);
    }

    private function emptyInput() {
        $result = '';
        if(empty($this->title) || empty($this->ingredients)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}