<div class="headTitle" style="display: flex;">
    <div class="logo">
        <a href="index.php"><img class="logo" src="assets/medias/logo3.jpg"></a>
    </div>
    <div class="titleText">
        <h2>Biggan Cafe</h2>
        <p>Welcome to our result management system.</p>
    </div>
</div>

<div class="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
   <!--      <li><a href="#">Apply</a></li>
        <li><a href="#">Classes</a></li>
        <li><a href="#">Teachers Info</a></li>
        <li><a href="#">Students Info</a></li>
        <li><a href="#">About Us</a></li> -->
        <?php
            if(isset($_SESSION["usrEmail"]) && isset($_SESSION["usrId"])){

                if($user[0]["usrPrivilage"] == "Admin"){
                    echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=usrPrivilage">Set User</a></li>';
                    echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=stdInfoView">Student Info</a></li>';
                    echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=setExam">Set Exam</a></li>';
                    echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=inputMarks">Input Marks</a></li>';
                    echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=adminExamResult">Exam Result</a></li>';
                }
                if($user[0]["usrPrivilage"] == "Teacher"){
                    echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=inputMarks">Input Marks</a></li>';
                    echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=adminExamResult">Exam Result</a></li>';
                }
                if($user[0]["usrPrivilage"] == "Student"){
                    if ($checkResult == true) {
                        echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=stdAdmissionForm">Admission Form</a></li>';
                    }else{
                        echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=exmResult">Exam Result</a></li>';
                        echo '<li><a href="index.php?request=profile&profileMain&requestProfileMain=academicInfoView">Detail Information</a></li>';
                    }  
                }
            }
        
        
        ?>
    </ul>
</div>