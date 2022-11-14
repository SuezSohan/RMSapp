<?php

class UserInfoContr extends UserInfo {

   private $usrId;
   private $usrEmail;
 
   public function __construct($usrId, $usrEmail){

    $this->usrId = $usrId;
    $this->usrEmail = $usrEmail;
       
   }

   //View user informations function
   public function viewGetUsrInfo(){
      $user = $this->getUserInfo($this->usrId, $this->usrEmail);
      return $user;
   }

   //Edit user informations controller function
   public function editUsrInfoContr($firstName, $lastName, $mobile){
      $user = $this->editUserInfo($this->usrId, $this->usrEmail,$firstName, $lastName, $mobile);
   }

   //Change user password controller function
   public function pwdChangeContr($pwdOld, $pwdNew, $pwdConfirm){

      if ($pwdNew !==$pwdConfirm) {
         header("location: ../index.php?request=profile&requestProfile=pwdChange&error=pwdNotMatched");
         exit();
      } else {
         $this->pwdChange($this->usrId, $this->usrEmail,$pwdOld, $pwdNew);
      }
   }

   //Upload or change user display picture controller function
   public function usrDpContr($fileName, $fileTmpName, $fileSize, $fileError){

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {
         if ($fileError == 0) {
           if ($fileSize < 2000000) { 
             $fileNameNew = $this->usrId. "." .$fileActualExt;
             $fileDestination = '../assets/medias/uploads/'.$fileNameNew;

             move_uploaded_file($fileTmpName, $fileDestination);

             $this->usrDp($this->usrId, $this->usrEmail, $fileNameNew);

           } else {
            header("location: ../index.php?request=profile&requestProfile=uploadDp&error=bigFile");
            exit();
           }
           
         } else {
            header("location: ../index.php?request=profile&requestProfile=uploadDp&error=uploadingFailed");
            exit();
         }
         
      } else {
         header("location: ../index.php?request=profile&requestProfile=uploadDp&error=fileTypeNotMatched");
         exit();
      } 
   }

   //Updating user privilage controller class
   public function setPrivilageContr($targetUsrId, $privilageType){

      if($targetUsrId !== $this->usrId){
         $this->setPrivilage($targetUsrId, $privilageType);
      }else {
         header("location: ../index.php?request=profile&profileMain&requestProfileMain=usrPrivilage&error=sameUsrId");
         exit();
      }
   }

    //Getting users by privilage controller
    public function getUsersByPrivilageContr($privilageType){
      return $this->getUsersByPrivilage($privilageType);
      
   }

   //Delete signup request controller function
   public function requestDeleteContr($targetId){
      $this->requestDelete($targetId);
      
   }

}