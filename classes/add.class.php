<?php


class Add extends Dbh {
    
    protected function setPizza($title, $ingredients) {
        $sql = "INSERT INTO pizzas(title, ingredients) VALUES(?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($title, $ingredients));
    }
}
