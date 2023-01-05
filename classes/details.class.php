<?php


class Details extends Dbh {
    
    protected function getDetails($id) {
        $sql = "SELECT * FROM pizzas WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array());
        // print_r($stmt);

        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($results);
        return $results;
    }
}

