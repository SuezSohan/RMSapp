<link rel="stylesheet" type="text/css" href="assets/css/profile-css/profile-right.css">

<div class="picBox">
    <div class="rightPic">
        <?php
             if($user[0]["usrDp"] !== ""){
                echo '<img src="assets/medias/uploads/'. $user[0]["usrDp"].'">';
             }else{
                echo '<img src="assets/medias/dpDemo.png">';
             }
        ?>
        <div id="picUrl">
            <a href="index.php?request=profile&requestProfile=uploadDp">Upload</a>
        </div>
    </div>
</div>

<div class="rightBox">
    <div class="boxheader">
        <h1>User Info</h1>
       <div style="text-align: right;"> <a href="index.php?request=profile&requestProfile=usrEdit">Edit</a> </div>
    </div>
    <div class="boxContent">
        <ul>
            <li>
                <span><b>First Name:</b></span>
                <span style="word-break: break-word; margin-left: 5px;"><?php echo $user[0]["firstName"]; ?></span>
            </li>
            <li>
                <span><b>Last Name:</b></span>
                <span style="word-break: break-word; margin-left: 5px;"><?php echo $user[0]["lastName"]; ?></span>
            </li>
            <li>
                <span><b>Mobile:</b></span>
                <span style="word-break: break-word; margin-left: 5px;"><?php echo $user[0]["usrMobile"]; ?></span>
            </li>
            
            <li>
                <span><b>Email: </b></span>
                <span style="word-break: break-word; margin-left: 5px;"><?php echo $user[0]["usrEmail"]; ?></span>
            </li>

            <li>
                <span><b>Password: </b></span>
                <span id="pwdChange" style="margin-left: 5px;"><a href="index.php?request=profile&requestProfile=pwdChange">Change password</a></span>
            </li>
        </ul>
    </div>
</div>

<!-- This feature could be added in future -->

<!-- <div class="rightBox">
    <div class="boxheader">
        <h1>Options</h1>
    </div>
    <div class="boxContent" id="optionContent">
        <ul>
            <?php

                /* if($user[0]["usrPrivilage"] == "Admin"){
                    echo '<li><i class="fa fa-chevron-circle-right"></i><a href="index.php?request=profile&profileMain&requestProfileMain=usrPrivilage">Set user type</a></li>';
                    echo '<li><i class="fa fa-chevron-circle-right"></i><a href="index.php?request=profile&profileMain&requestProfileMain=stdInfoView">View students Information</a></li>';
                    echo '<li><i class="fa fa-chevron-circle-right"></i><a href="index.php?request=profile&profileMain&requestProfileMain=setExam">Set exam date</a></li>';
                    echo '<li><i class="fa fa-chevron-circle-right"></i><a href="index.php?request=profile&profileMain&requestProfileMain=inputMarks">Input exam marks</a></li>';
                    echo '<li><i class="fa fa-chevron-circle-right"></i><a href="index.php?request=profile&profileMain&requestProfileMain=adminExamResult">Exam Result</a></li>';
                }
                if($user[0]["usrPrivilage"] == "Student"){

                    if ($checkResult == true) {
                        echo '<li><i class="fa fa-chevron-circle-right"></i><a href="index.php?request=profile&profileMain&requestProfileMain=stdAdmissionForm">Admission Form</a></li>';
                    }    
                    echo '<li><i class="fa fa-chevron-circle-right"></i><a href="index.php?request=profile&profileMain&requestProfileMain=exmResult">Exam Result</a></li>';
                }
                if($user[0]["usrPrivilage"] == "Teacher"){
                    
                }
             */
            ?>
        </ul>
    </div>
</div> -->