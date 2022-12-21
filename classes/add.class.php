<?php


class Add extends Dbh {
    
    protected function addPizza($title, $ingredients) {
        $sql = "INSERT INTO pizzas(title, ingredients) VALUES('$title', '$ingredients')";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($title, $ingredients))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;  
    }
}
