<?php

class Login extends Dbh {

    protected function getUser($usrEmail, $pwd){

        $sql = "SELECT pwd FROM signup WHERE usrEmail = ?;";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute([$usrEmail])) {
            $stmt = null;
            header("location: ../index.php?request=usrLogin&error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?request=usrLogin&error=userNotFound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll();
        $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]);

        $stmt = null;
        
        if ($checkPwd == false) {
            header("location: ../index.php?request=usrLogin&error=wrongPwd");
            exit();
        }
        elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM signup WHERE usrEmail = ?;");

            if (!$stmt->execute([$usrEmail])) {
                $stmt = null;
                header("location: ../index.php?request=usrLogin&error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?request=usrLogin&error=userNotFound");
                exit();
            }
            
            $user = $stmt->fetchAll();

            session_start();
            $_SESSION["usrId"] = $user[0]["ID"];
            $_SESSION["usrEmail"] = $user[0]["usrEmail"];

            $stmt = null;
        } 
    } 
}