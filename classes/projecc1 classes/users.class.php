<?php

class Users extends Dbh {
    
    protected function getUser($version){
        $sql = "SELECT * FROM test1 WHERE stdVersion = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$version]);
        return $stmt->fetchAll();
    }

    protected function setUser($stdName, $stdClass, $stdVersion){
        $sql = "INSERT into test1(stdName, stdClass, stdVersion) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$stdName, $stdClass, $stdVersion]);
    }
}