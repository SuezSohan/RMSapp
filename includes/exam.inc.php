<?php

include 'class-autoload.inc.php';

$exmContr = new ExamContr();

if (isset($_POST["setExam"])) {

    //Grabbing data
    $exmSubject = $_POST["exmSubject"];
    $exmClass = $_POST["exmClass"];
    $exmGroup = $_POST["exmGroup"];
    $exmSection = $_POST["exmSection"];
    $exmVersion = $_POST["exmVersion"];
    $exmDate = $_POST["exmDate"];

    //Running error handlers and user signup
    $exmContr->setExamContr($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate);

    //Going back to front page
    header("location: ../index.php?request=profile&profileMain&requestProfileMain=setExam&setExam=success");
}

if (isset($_POST["exmDelete"])) {

    //Grabbing data
    $exmId = $_POST["exmId"];
    
    //Running error handlers and user signup
    $exmContr->deleteExmContr($exmId);
    
    //Giving signal to ajax response
    echo "true";
}