<?php

include 'class-autoload.inc.php';

if (isset($_POST["submit"])) {

    //Grabbing data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $pwd = $_POST["pwd"];
    $pwdConfirm = $_POST["pwdConfirm"];

    //Instantiate Signupcontr class
    $signup= new SignupContr($firstName, $lastName, $email,$mobile, $pwd, $pwdConfirm);

    //Running error handlers and user signup
    $signup->signupUser();

    //Going back to front page
    header("location: ../index.php?request=usrLogin&signup=success");
}