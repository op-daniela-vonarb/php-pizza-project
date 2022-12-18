<?php

class Dbh {

    protected function connect() {
        try {
            $username = "daniela";
            $password = "test1234";
            $dbh = new PDO('mysql:host=localhost;dbname=ninja_pizza', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}