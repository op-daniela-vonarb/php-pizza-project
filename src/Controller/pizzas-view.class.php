
<?php

class PizzasView extends Pizzas {

    public function showPizza() {
        $results = $this->getPizza();
        return $results;
    }
}