<?php

class StdInfoContr extends StdInfo {

   private $usrId;
   private $usrEmail;
   
   public function __construct($usrId, $usrEmail){

      $this->usrId = $usrId;
      $this->usrEmail = $usrEmail;

   }

   //Student admission information input controller function
   public function setStdInfoContr($stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone){
      $this->setStdInfo($this->usrId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone);
   }

   //Student detail info editing function controller
   public function editStdInfoContr($stdId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone){
      return $this->editStdInfo($stdId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone);
   }
   //Set as new admission controller
   public function setStdAsNewContr($stdUsrId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone){

      $this->deactiveStd($stdUsrId);
      $this->setStdInfo($stdUsrId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone);

   }

   //Student admission checking function controller
   public function stdAdmissionCheckContr(){
      return $this->stdAdmissionCheck($this->usrId);
   }

   //Student info getting function by class, section, version and group controller
   public function getShortStdInfoContr($stdStatus, $stdClass, $stdSection, $stdVersion, $stdGroup){
      return $this->getShortStdInfo($stdStatus, $stdClass, $stdSection, $stdVersion, $stdGroup);
   }

   //Student detail info getting function controller
   public function getStdDetailInfoContr($stdId){
      return $this->getStdDetailInfo($stdId);
   }

   //student detail info by user ID
   public function stdDetailByUsrIdContr(){
      return $this->stdDetailByUsrId($this->usrId);

      
   }

}