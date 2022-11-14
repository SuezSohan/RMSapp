<?php

include 'class-autoload.inc.php';

if (isset($_POST["submit"])) {

    //Grabbing data

    $email = $_POST["usrEmail"];
    $pwd = $_POST["pwd"];

    //Instantiate Signupcontr class
    $login= new LoginContr($email,$pwd);

    //Running error handlers and user signup
    $login->loginUser();

    //Going back to front page
    header("location: ../index.php?request=profile&login=success");
}