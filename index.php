<?php

    session_start();

    include 'includes/class-autoload.inc.php';


    //Instantiating classes for grabbing data after user login.
    if (isset($_SESSION["usrEmail"]) && isset($_SESSION["usrEmail"])){

        //Instantiate User info grabbing class.
        $usrInfo = new UserInfoContr($_SESSION["usrId"], $_SESSION["usrEmail"]);
        $user = $usrInfo->viewGetUsrInfo();

        //Instantiate Student admission checking class
        $stdInfoContr = new stdInfoContr($_SESSION["usrId"], $_SESSION["usrEmail"]);
        $checkResult = $stdInfoContr->stdAdmissionCheckContr();
        
        //Exam controller class
        $exmContr = new ExamContr();

        //Exam result controller class
        $exmResultContr = new ExamResultContr();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    
    <title>WebAplication</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="wrapper">
        <div class="container1">

            <div class="topBar"> <?php require_once 'topbar.php'; ?> </div>

            <div class="container2">

                <div class="headSection"> <?php require_once 'header.php'; ?> </div>

                <div class="bodySection">

                    <?php 

                        if (!isset($_SESSION["usrEmail"]) && !isset($_SESSION["usrEmail"])) {
                            if(isset($_REQUEST['request']) && $_REQUEST['request']=="signup"){
                                require_once 'contents/signupform.php'; 
                            }
                            elseif(isset($_REQUEST['request']) && $_REQUEST['request']=="usrLogin"){
                                require_once 'contents/loginform.php'; 
                            }else{
                                require_once 'contents/loginform.php';
                            }
                        }
                        elseif (isset($_SESSION["usrEmail"]) && isset($_SESSION["usrEmail"])){
                       
                            if (isset($_REQUEST['request']) && $_REQUEST['request']=="profile") {
                                require_once 'contents/profile.php';
                            }else{
                                require_once 'contents/profile.php';
                            }
                        }

                    ?>

                </div>
                
                <div class="footSection"> <?php require_once 'footer.php'; ?> </div>

            </div>
        </div>
    </div>
</body>
</html>