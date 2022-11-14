<?php

class StdInfo extends Dbh {

    //Insert student admission informations
    protected function setStdInfo($usrId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone){
        $sql = "INSERT into stdinfo(usrID, stdName, stdClass, stdSection, stdGroup, stdVersion, stdGender, stdSession, stdDob, stdReligion, stdInstitute, fathersName, mothersName, fathersOccupation, mothersOccupation, presentAddress, permanentAddress, localGuardian, localGuardiansPhone, fathersPhone, mothersPhone, stdPhone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$usrId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=stdAdmissionForm&error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    //Edit student details informations
    protected function editStdInfo($stdId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone){
        $sql = "UPDATE stdInfo SET stdName = ?, stdClass = ?, stdSection = ?, stdGroup = ?, stdVersion = ?, stdGender = ?, stdSession = ?, stdDob = ?, stdReligion = ?, stdInstitute = ?, fathersName = ?, mothersName = ?, fathersOccupation = ?, mothersOccupation = ?, presentAddress = ?, permanentAddress = ?, localGuardian = ?, localGuardiansPhone = ?, fathersPhone = ?, mothersPhone = ?, stdPhone = ? WHERE ID = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone, $stdId])) {
            
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=editDetailsInfo&error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    //Deactive student Id by user ID
    protected function deactiveStd($stdUsrId){
        $sql = "UPDATE stdInfo SET stdStatus = 'Deactive' WHERE usrID = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdUsrId])) {
            
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=editDetailsInfo&error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    //Student admission checking function
    protected function stdAdmissionCheck($usrId){
       
        $sql = "SELECT * FROM stdInfo WHERE usrID = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$usrId])) {
            $stmt = null;
            header("location: ../index.php?request=profile&error=stmtFailed");
            exit();
        }else{
            if($stmt->rowCount() > 0){
                return false;
            }else {
                return true;
            }
            $stmt = null;
        }       
    }

     //Student info getting function by class, section, version and group
     protected function getShortStdInfo($stdStatus, $stdClass, $stdSection, $stdVersion, $stdGroup){
       
        $sql = "SELECT * FROM stdInfo WHERE stdStatus = ? AND stdClass= ? AND stdSection = ? AND stdVersion = ? AND stdGroup = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdStatus, $stdClass, $stdSection, $stdVersion, $stdGroup])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=stdInfoView&error=stmtFailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }       
    }

    //Student Detail info getting function
    protected function getStdDetailInfo($stdId){
       
        $sql = "SELECT * FROM stdInfo WHERE ID = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$stdId])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=viewStdDetails&error=stmtFailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }       
    }

    //Student detail info by user ID
    protected function stdDetailByUsrId($usrId){
       
        $sql = "SELECT * FROM stdInfo WHERE usrID = ? AND stdStatus='Active';";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$usrId])) {
            $stmt = null;
            header("location: ../index.php?request=profile&profileMain&requestProfileMain=viewStdDetails&error=stmtFailed");
            exit();
        }else{
            return $stmt->fetchAll();
            $stmt = null;
        }       
    }
    


}