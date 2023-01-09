<?php


class Details extends Dbh {
    
    protected function getDetails($id) {
        $sql = "SELECT * FROM pizzas WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($id));
 
        $results = $stmt->fetch(PDO::FETCH_ASSOC); // this step is necessary correct?
 
        return $results;
    }
}

