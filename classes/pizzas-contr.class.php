
<?php

class PizzasContr extends Pizzas {

    public function showPizza() {
        $results = $this->getPizza();
        return $results;
    }
}