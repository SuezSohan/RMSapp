<?php

class Usersview extends Users {
    
    public function showUser($version){
        $results = $this->getUser($version);
        return $results;
    }
}