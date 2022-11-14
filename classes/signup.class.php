<?php

class Signup extends Dbh {

    protected function checkUser($usrEmail, $usrMobile){
        $sql = "SELECT * FROM signup WHERE usrEmail = ? OR usrMobile = ?;";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute([$usrEmail, $usrMobile])) {
            $stmt = null;
            header("location: ../index.php?request=signup&error=stmtfailed");
            exit();
        } else {
            return $stmt;
        }
        
    }

    protected function setSignup($firstName, $lastName, $email,$mobile, $pwd){
        $sql = "INSERT into signup(firstName, lastName, usrEmail, usrMobile, pwd) VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        
        $hashedpwd= password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute([$firstName, $lastName, $email,$mobile, $hashedpwd])) {
            $stmt = null;
            header("location: ../index.php?request=signup&error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    
}