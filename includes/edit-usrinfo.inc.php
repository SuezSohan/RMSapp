<?php

include 'class-autoload.inc.php';

session_start();

$usrId = $_SESSION["usrId"];
$usrEmail = $_SESSION["usrEmail"];

if (isset($_POST["editUsr"])) {

    //Grabbing data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $mobile = $_POST["mobile"];
    $usrId = $_SESSION["usrId"];
    $usrEmail = $_SESSION["usrEmail"];

    //Instantiate Signupcontr class
    $editUsr= new UserInfoContr($usrId, $usrEmail);

    //Running error handlers and user signup
    $editUsr->editUsrInfoContr($firstName, $lastName, $mobile);

    //Going back to front page
    header("location: ../index.php?request=profile&edit=success");
}

if (isset($_POST["pwdChange"])) {

    //Grabbing data
    $pwdOld = $_POST["pwdOld"];
    $pwdNew = $_POST["pwdNew"];
    $pwdConfirm = $_POST["pwdConfirm"];
    $usrId = $_SESSION["usrId"];
    $usrEmail = $_SESSION["usrEmail"];

    //Instantiate Signupcontr class
    $changePwd= new UserInfoContr($usrId, $usrEmail);

    //Running error handlers and user signup
    $changePwd->pwdChangeContr($pwdOld, $pwdNew, $pwdConfirm);

    //Going back to front page
    header("location: ../index.php?request=profile&requestProfile=pwdChange&error=none");
}

if (isset($_POST["usrDpBtn"])) {

    //Grabbing data
    $file = $_FILES['usrDp'];

    $fileName = $_FILES['usrDp']['name'];
    $fileTmpName = $_FILES['usrDp']['tmp_name'];
    $fileSize = $_FILES['usrDp']['size'];
    $fileError = $_FILES['usrDp']['error'];

    $usrId = $_SESSION["usrId"];
    $usrEmail = $_SESSION["usrEmail"];


    //Instantiate Signupcontr class
    $usrDp= new UserInfoContr($usrId, $usrEmail);

    //Running error handlers and user signup
    $usrDp->usrDpContr($fileName, $fileTmpName, $fileSize, $fileError);

    //Going back to front page
    header("location: ../index.php?request=profile&error=none");
}

if (isset($_POST["setPrivilage"])) {

 //Grabbing data
 $targetUsrId = $_POST["targetUsrID"];
 $privilageType = $_POST["privilageType"];
 $usrId = $_SESSION["usrId"];
 $usrEmail = $_SESSION["usrEmail"];

 //Instantiate Signupcontr class
 $setPrivilage= new UserInfoContr($usrId, $usrEmail);

 //Running error handlers and user signup
 $setPrivilage->setPrivilageContr($targetUsrId, $privilageType);

 //Going back to front page
 header("location: ../index.php?request=profile&profileMain&requestProfileMain=usrPrivilage&error=none");

}

if (isset($_POST["requestDelete"])) {

    //Grabbing data
    $targetId = $_POST["requestDelete"];

    //Instantiate Signupcontr class
    $deleteRequest= new UserInfoContr($usrId, $usrEmail);
   
    //Running error handlers and user signup
    $deleteRequest->requestDeleteContr($targetId);
   
    //Going back to front page
    header("location: ../index.php?request=profile&profileMain&requestProfileMain=usrPrivilage&error=none");
   
   }