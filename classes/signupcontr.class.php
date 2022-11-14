<?php

class SignupContr extends Signup {

    private $firstName;
    private $lastName;
    private $email;
    private $mobile;
    private $pwd;
    private $pwdConfirm;

    public function __construct($firstName, $lastName, $email,$mobile, $pwd, $pwdConfirm){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->pwd = $pwd;
        $this->pwdConfirm = $pwdConfirm;
    }

    public function signupUser(){
        if($this->pwdMatch()==false){
            header("location: ../index.php?request=signup&error=pwdnotmatched");
            exit();
        }
        if($this->checkSignedup()==false){
            header("location: ../index.php?request=signup&error=emailormobiletaken");
            exit();
        }
    
        $this->setSignup($this->firstName, $this->lastName, $this->email,$this->mobile ,$this->pwd);
    }

    //Error handlers
    private function pwdMatch(){
        if ($this->pwd !== $this->pwdConfirm) {
            return false;
        } else {
            return true;
        }    
    }

    private function checkSignedup(){
        if ($this->checkUser($this->email, $this->mobile)->rowCount() > 0) {
            return false;
        } else {
            return true;
        }    
    }
    
}