<?php


class Pizzas extends Dbh {
    
    protected function getPizza() {
        $sql = "SELECT * FROM pizzas";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}