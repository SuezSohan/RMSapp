<?php

include 'class-autoload.inc.php';

$resultContr = new ExamResultContr();

if (isset($_POST["setExam"])) {

    //Grabbing data
    $exmSubject = $_POST["exmSubject"];
    $exmClass = $_POST["exmClass"];
    $exmGroup = $_POST["exmGroup"];
    $exmSection = $_POST["exmSection"];
    $exmVersion = $_POST["exmVersion"];
    $exmDate = $_POST["exmDate"];

    $exmContr->setExamContr($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate);

    //Going back to front page
    header("location: ../index.php?request=profile&profileMain&requestProfileMain=setExam&setExam=success");
}