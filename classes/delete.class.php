<?php


class Delete extends Dbh {
    
    protected function deletePizza($id) {
        $sql = "DELETE FROM pizzas(title, ingredients) VALUES(?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($id));
    }
}