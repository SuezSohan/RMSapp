<?php

include 'class-autoload.inc.php';

$exmContr = new ExamContr();

//Changing date by ajax
if (isset($_POST["exmDateAjax"])) {

    //Grabbing data
    $exmMonth = $_POST["exmMonth"];
    $exmClass = $_POST["exmClass"];
    $exmGroup = $_POST["exmGroup"];
    $exmSection = $_POST["exmSection"];
    $exmVersion = $_POST["exmVersion"];

    $exmDate = $exmContr->getExamDateContr($exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion);
    
    //Giving response to ajax
    echo "<option>Select One</option>";
    foreach($exmDate as $dateData){
    echo '<option value="'.$dateData["exmDate"].'">'.$dateData["exmDate"].'</option>';
    }
}

//Changing Subjects by ajax
if (isset($_POST["exmSubjectAjax"])) {

    //Grabbing data
    $exmMonth = $_POST["exmMonth"];
    $exmClass = $_POST["exmClass"];
    $exmGroup = $_POST["exmGroup"];
    $exmSection = $_POST["exmSection"];
    $exmVersion = $_POST["exmVersion"];
    $exmDate = $_POST["exmDate"];

    $exmSubject = $exmContr->getExamSubjectContr($exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate);
    
    //Giving response to ajax
    echo "<option>Select One</option>";
    foreach($exmSubject as $subjectData){
    echo '<option value="'.$subjectData["exmSubject"].'">'.$subjectData["exmSubject"].'</option>';
    }
}

//Inserting student marks include file
if (isset($_POST["inputMarks"])) {

    //Grabbing data
    $exmSubject = $_POST["exmSubject"];
    $totalMarks = $_POST["totalMarks"];
    $exmDate = $_POST["exmDate"];
    $exmMonth = $_POST["exmMonth"];

    $exmClass = $_POST["exmClass"];
    $exmGroup = $_POST["exmGroup"];
    $exmSection = $_POST["exmSection"];
    $exmVersion = $_POST["exmVersion"];

    $idCount = $_POST["idCount"];
    $x = 1;
    while($x <= $idCount) {

        $stdId = $_POST["stdId".$x];
        $obtainedMarks = $_POST["obtainedMarks".$x];
        
        $exmContr->insertStdMarksContr($stdId, $exmSubject, $totalMarks, $obtainedMarks, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate, $exmMonth);
        $x++;
    }
    header("location: ../index.php?request=profile&profileMain&requestProfileMain=inputMarks&error=none");
}