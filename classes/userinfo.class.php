<?php

class UserInfo extends Dbh {

    //Get user informations function
    protected function getUserInfo($usrId, $usrEmail){
        $sql = "SELECT * FROM signup WHERE ID = ? AND usrEmail = ?;";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute([$usrId, $usrEmail])) {
            $stmt = null;
            header("location: ../index.php?request=signup&error=stmtfailed");
            exit();
        } else {

            $user = $stmt->fetchAll();
            return $user;

            $stmt = null;
        }      
    }

    //User password changing function
    protected function pwdChange($usrId, $usrEmail, $pwdOld, $pwdNew){
        $user =  $this->getUserInfo($usrId, $usrEmail);

        $checkPwd = password_verify($pwdOld, $user[0]["pwd"]);

        if ($checkPwd == false) {
            header("location: ../index.php?request=profile&requestProfile=pwdChange&error=wrongPwd");
            exit();
        }elseif($checkPwd == true){
            $sql = "UPDATE signup SET pwd= ? WHERE ID= ? AND usrEmail= ?;";
            $stmt = $this->connect()->prepare($sql);

            $hashedpwd= password_hash($pwdNew, PASSWORD_DEFAULT);

            if (!$stmt->execute([$hashedpwd, $usrId, $usrEmail])) {
                $stmt = null;
                header("location: ../index.php?request=profile&requestProfile=pwdChange&error=stmtfailed");
                exit();
            }else {
                $stmt = null;
            }
        }
    }

    //Update user display picture name function
    protected function usrDp($usrId, $usrEmail,$fileNameNew){

        $sql = "UPDATE signup SET usrDp= ? WHERE ID= ? AND usrEmail= ?;";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$fileNameNew, $usrId, $usrEmail])) {
            $stmt = null;
            header("location: ../index.php?request=profile&requestProfile=uploadDp&error=stmtfailed");
            exit();
        } else {
            $stmt = null;
        }      
    }

    //Edit user informations function
    protected function editUserInfo($usrId, $usrEmail, $firstName, $lastName, $mobile){
        
        $user =  $this->getUserInfo($usrId, $usrEmail);


        if ($mobile == $user[0]["usrMobile"]) {
            $sql = "UPDATE signup SET firstName= ?, lastName= ? WHERE ID= ? AND usrEmail= ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute([$firstName, $lastName, $usrId, $usrEmail])) {
                $stmt = null;
                header("location: ../index.php?request=profile&requestProfile=usrEdit&error=stmtfailed");
                exit();
            }else {
                $stmt = null;
            }
    
        }elseif($mobile !== $user[0]["usrMobile"]){

            $sql = "SELECT * FROM signup WHERE usrMobile = ?;";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute([$mobile])) {
                $stmt = null;
                header("location: ../index.php?request=profile&requestProfile=usrEdit&error=stmtfailed");
                exit();
            }elseif ($stmt->rowCount() > 0) {
                $stmt = null;
                header("location: ../index.php?request=profile&requestProfile=usrEdit&error=mobileTaken");
                exit();
            }else {
                $stmt = null;
                $sql = "UPDATE signup SET firstName= ?, lastName= ?, usrMobile= ? WHERE ID= ? AND usrEmail= ?;";
                $stmt = $this->connect()->prepare($sql);
                if (!$stmt->execute([$firstName, $lastName, $mobile, $usrId, $usrEmail])) {
                    $stmt = null;
                    header("location: ../index.php?request=profile&requestProfile=usrEdit&error=stmtfailed");
                    exit();
                }else {
                    $stmt = null;
                }
            }
        }
    }

    //Updating privilage function
    protected function setPrivilage($targetUsrId, $privilageType){
        $sql = "UPDATE signup SET usrPrivilage= ? WHERE ID= ?;";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$privilageType, $targetUsrId])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=usrPrivilage&error=stmtfailed");
            exit();
        }else {
            $stmt = null;
        }
    }

    //Getting users by privilage type
    protected function getUsersByPrivilage($privilageType){

        $sql = "SELECT * FROM signup WHERE usrPrivilage = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute([$privilageType])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=usrPrivilage&error=stmtfailed");
            exit();
        } else {

            return $stmt->fetchAll();
            $stmt = null;
        }      
    }

    //Delete signup request function
    protected function requestDelete($targetId){

        $sql = "DELETE FROM signup WHERE ID=?;";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute([$targetId])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=usrPrivilage&error=stmtfailed");
            exit();
        } else {
            $stmt = null;
        }      
    }

}