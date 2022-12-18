<?php


class Pizzas extends Dbh {
    
    protected function getPizza() {
        $sql = "SELECT * FROM pizzas";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // protected function setUser($firstname, $lastname, $dob) {
    //     $sql = "INSERT INTO users(users_firstname, users_lastname, users_dateofbirth) VALUES (?, ?, ?)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$firstname, $lastname, $dob]);
    // }
    
}