<?php

class ExamResult extends Dbh {

    //Student Detail info getting function
    protected function getStdInfo($usrId){
       
        $sql = "SELECT * FROM stdInfo WHERE stdStatus='Active' AND usrID = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$usrId])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=exmResult&error=stmtFailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }       
    }

    //Getting exam dates by month and std ID
    protected function getExamDate($stdId, $exmMonth){
        $sql = "SELECT DISTINCT exmDate FROM stdmarks WHERE stdID = ? AND exmMonth = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdId, $exmMonth])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=exmResult&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

    //Getting date wise marks informations
    protected function getMarksInfo($stdId, $exmDate){
        $sql = "SELECT * FROM stdmarks WHERE stdID= ? AND exmDate = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdId, $exmDate])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=exmResult&error=stmtFailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }       
    }

    //Getting highest marks 
    protected function getHighestMark($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate){
        $sql = "SELECT MAX(obtainedMarks) AS highest FROM stdmarks WHERE exmSubject= ? AND exmClass = ? AND exmGroup = ? AND exmSection = ? AND exmVersion = ? AND exmDate = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=exmResult&error=stmtFailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }       
    }

    //Getting distinct std id for calculate merit position
    protected function getDistinctStdId($exmClass, $exmGroup, $exmSection, $exmVersion, $exmMonth){
        $sql = "SELECT DISTINCT stdID FROM stdmarks WHERE  exmClass = ? AND exmGroup = ? AND exmSection = ? AND exmVersion = ? AND exmMonth = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$exmClass, $exmGroup, $exmSection, $exmVersion, $exmMonth])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=exmResult&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

    //Get total monthly obtained marks 
    protected function getMonthlyObtained($stdId, $exmMonth){
        $sql = "SELECT SUM(obtainedMarks) AS monthlyObtained FROM stdmarks WHERE stdID = ? AND exmMonth = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdId, $exmMonth])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=exmResult&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

     //Get total monthly total marks 
     protected function getMonthlyTotalMarks($stdId, $exmMonth){
        $sql = "SELECT SUM(totalMarks) AS monthlyTotalMarks FROM stdmarks WHERE stdID = ? AND exmMonth = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdId, $exmMonth])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=exmResult&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

    

}    