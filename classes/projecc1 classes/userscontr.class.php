<?php

class Userscontr extends Users {
    
    public function stdInput($stdName, $stdClass, $stdVersion){
        $dataInput = $this->setUser($stdName, $stdClass, $stdVersion);
        return "data updated";
    }
}