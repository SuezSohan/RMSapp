<?php

class LoginContr extends Login {

    private $email;
    private $pwd;

    public function __construct($email,$pwd){

        $this->email = $email;
        $this->pwd = $pwd;

    }

    public function loginUser(){

        $this->getUser($this->email, $this->pwd);
    }

}