<?php

class Signup extends Dbh {

    protected function setUser($name, $email, $username, $pwd) {
        $stmt = $this->connect()->prepare('INSERT INTO users(usersName, usersEmail, usersUid, usersPwd) VALUES(?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $email, $username, $hashedPwd))) {
            $stmt = null;
            header("location: ../../public/index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;  
    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT usersUid FROM users WHERE usersUid = ? OR usersEmail = ?;');

        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../../public/index.php?error=stmtfailed");
            exit();

        }
        $resultCheck = null;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}