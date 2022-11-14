<?php

include 'class-autoload.inc.php';

session_start();

$usrId = $_SESSION["usrId"];
$usrEmail = $_SESSION["usrEmail"];

//Instantiate StdInfoContr class
$stdInfoContr= new StdInfoContr($usrId, $usrEmail);

//Student new admission
if (isset($_POST["stdAdmission"])) {

    //Grabbing data
    $stdName = $_POST["stdName"];
    $stdClass = $_POST["stdClass"];
    $stdSection = $_POST["stdSection"];
    $stdGroup = $_POST["stdGroup"];
    $stdVersion = $_POST["stdVersion"];
    $stdGender = $_POST["stdGender"];
    $stdSession = $_POST["stdSession"];
    $stdDob = $_POST["stdDob"];
    $stdReligion = $_POST["stdReligion"];
    $stdInstitute = $_POST["stdInstitute"];
    $fathersName = $_POST["fathersName"];
    $mothersName = $_POST["mothersName"];
    $fathersOccupation = $_POST["fathersOccupation"];
    $mothersOccupation = $_POST["mothersOccupation"];
    $presentAddress = $_POST["presentAddress"];
    $permanentAddress = $_POST["permanentAddress"];
    $localGuardian = $_POST["localGuardian"];
    $localGuardiansPhone = $_POST["localGuardiansPhone"];
    $fathersPhone = $_POST["fathersPhone"];
    $mothersPhone = $_POST["mothersPhone"];
    $stdPhone = $_POST["stdPhone"];

    //Running error handlers and user signup
    $stdInfoContr->setStdInfoContr($stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone);

    //Going back to front page
    header("location: ../index.php?request=profile&admission=success");
}

//Edit students details
if (isset($_POST["editStdInfo"])) {

     //Grabbing data
     $stdId = $_POST["editStdInfo"];
     $stdName = $_POST["stdName"];
     $stdClass = $_POST["stdClass"];
     $stdSection = $_POST["stdSection"];
     $stdGroup = $_POST["stdGroup"];
     $stdVersion = $_POST["stdVersion"];
     $stdGender = $_POST["stdGender"];
     $stdSession = $_POST["stdSession"];
     $stdDob = $_POST["stdDob"];
     $stdReligion = $_POST["stdReligion"];
     $stdInstitute = $_POST["stdInstitute"];
     $fathersName = $_POST["fathersName"];
     $mothersName = $_POST["mothersName"];
     $fathersOccupation = $_POST["fathersOccupation"];
     $mothersOccupation = $_POST["mothersOccupation"];
     $presentAddress = $_POST["presentAddress"];
     $permanentAddress = $_POST["permanentAddress"];
     $localGuardian = $_POST["localGuardian"];
     $localGuardiansPhone = $_POST["localGuardiansPhone"];
     $fathersPhone = $_POST["fathersPhone"];
     $mothersPhone = $_POST["mothersPhone"];
     $stdPhone = $_POST["stdPhone"];

    //Running error handlers and user signup
    $stdInfoContr->editStdInfoContr($stdId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone);

    //Going back to front page
    header("location: ../index.php?request=profile&profileMain&requestProfileMain=viewStdDetails&stdId=$stdId");
}

//Set student as new admission
if (isset($_POST["setStdAsNew"])) {

     //Grabbing data
     $stdUsrId = $_POST["setStdAsNew"];
     $stdName = $_POST["stdName"];
     $stdClass = $_POST["stdClass"];
     $stdSection = $_POST["stdSection"];
     $stdGroup = $_POST["stdGroup"];
     $stdVersion = $_POST["stdVersion"];
     $stdGender = $_POST["stdGender"];
     $stdSession = $_POST["stdSession"];
     $stdDob = $_POST["stdDob"];
     $stdReligion = $_POST["stdReligion"];
     $stdInstitute = $_POST["stdInstitute"];
     $fathersName = $_POST["fathersName"];
     $mothersName = $_POST["mothersName"];
     $fathersOccupation = $_POST["fathersOccupation"];
     $mothersOccupation = $_POST["mothersOccupation"];
     $presentAddress = $_POST["presentAddress"];
     $permanentAddress = $_POST["permanentAddress"];
     $localGuardian = $_POST["localGuardian"];
     $localGuardiansPhone = $_POST["localGuardiansPhone"];
     $fathersPhone = $_POST["fathersPhone"];
     $mothersPhone = $_POST["mothersPhone"];
     $stdPhone = $_POST["stdPhone"];

    //Running error handlers and user signup
    $stdInfoContr->setStdAsNewContr($stdUsrId, $stdName, $stdClass, $stdSection, $stdGroup, $stdVersion, $stdGender, $stdSession, $stdDob, $stdReligion, $stdInstitute,$fathersName, $mothersName, $fathersOccupation, $mothersOccupation, $presentAddress, $permanentAddress, $localGuardian, $localGuardiansPhone, $fathersPhone, $mothersPhone, $stdPhone);

    //Going back to front page
    header("location: ../index.php?request=profile&profileMain&requestProfileMain=stdInfoView&settingNew=success");
}