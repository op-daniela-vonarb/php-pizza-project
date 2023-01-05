<?php


class Details extends Dbh {
    
    protected function getDetails($id) {
        $sql = "SELECT * FROM pizzas WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array()); // why empty params?
 
        $results = $stmt->fetch(PDO::FETCH_ASSOC); // this step is necessary correct?
 
        return $results;
    }
}

