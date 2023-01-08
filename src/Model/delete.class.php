<?php


class Delete extends Dbh {
    
    protected function deletePizza($id) {
        $sql = "DELETE FROM pizzas WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($id));
    }
}