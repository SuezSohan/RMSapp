<?php

class Exam extends Dbh {

    //Set Exam data input function
    protected function setExam($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmMonth, $exmDate){
        $sql = "INSERT INTO exams(exmSubject, exmClass, exmGroup, exmSection, exmVersion, exmMonth, exmDate) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmMonth, $exmDate])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=setExam&error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    
    //Getting exams by month
    protected function getExam($exmMonth){
        $sql = "SELECT * FROM exams WHERE exmMonth = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$exmMonth])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=setExam&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

     //Delete Exam Month
     protected function deleteExm($exmId){
       
        $sql = "DELETE FROM exams WHERE ID=?;";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute([$exmId])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=setExam&error=stmtfailed");
            exit();
        } else {
            $stmt = null;
        }      
    }

     //Getting exam dates for ajax
     protected function getExamDate($exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion){
        $sql = "SELECT DISTINCT exmDate FROM exams WHERE exmMonth = ? AND exmClass = ? AND exmGroup = ? AND exmSection = ? AND exmVersion = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

     //Getting exam subjects for ajax
     protected function getExamSubject($exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate){
        $sql = "SELECT DISTINCT exmSubject FROM exams WHERE exmMonth = ? AND exmClass = ? AND exmGroup = ? AND exmSection = ? AND exmVersion = ? AND exmDate = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

    //Getting Student informations for input marks
    protected function getStdForInputMarks($exmClass, $exmGroup, $exmSection, $exmVersion){

        $sql = "SELECT * FROM stdInfo WHERE stdStatus = 'Active' AND stdClass = ? AND stdSection = ? AND stdGroup = ? AND stdVersion = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$exmClass, $exmSection, $exmGroup, $exmVersion])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

    //Insert student marks 
    protected function insertStdMarks($stdId, $exmSubject, $totalMarks, $obtainedMarks, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate, $exmMonth){
        $sql = "SELECT * FROM stdmarks WHERE stdId = ? AND exmSubject = ? AND exmDate = ? AND exmMonth = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdId, $exmSubject, $exmDate, $exmMonth])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=stmtfailed");
            exit();
        }else{
            $rows = $stmt->rowCount();
            $stmt = null;
        }

        if($rows > 0){
            $sql = "UPDATE stdmarks SET totalMarks = ?, obtainedMarks = ? WHERE stdId = ? AND exmSubject = ? AND exmDate = ? AND exmMonth = ?;";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute([$totalMarks, $obtainedMarks, $stdId, $exmSubject, $exmDate, $exmMonth])) {
                $stmt = null;
                header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=stmtfailed");
                exit();
            }else{
                $stmt = null;
            }

        }else{
            $sql = "INSERT INTO stdmarks(stdId, exmSubject, totalMarks, obtainedMarks, exmClass, exmGroup, exmSection, exmVersion, exmDate, exmMonth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute([$stdId, $exmSubject, $totalMarks, $obtainedMarks, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate, $exmMonth])) {
                $stmt = null;
                header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=stmtfailed");
                exit();
            }else{
                $stmt = null;
            }
        }
    }

    
    //Getting marks data
    protected function getStdMarks($stdId, $exmSubject, $exmDate, $exmMonth){
        $sql = "SELECT * FROM stdmarks WHERE stdId = ? AND exmSubject = ? AND exmDate = ? AND exmMonth = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdId, $exmSubject, $exmDate, $exmMonth])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=stmtfailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
            
        }
    }
    
}