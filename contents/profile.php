<link rel="stylesheet" type="text/css" href="assets/css/profile.css">

<div class="userProfile">

    <?php

        //Logic for showing the profile main div
        if(isset($_REQUEST["profileMain"])){
            echo '<div class="profileMain">';

            //Controlling admin view
            if ($user[0]["usrPrivilage"] == "Admin") {
                if (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "usrPrivilage") {
                    require_once 'contents/profile-contents/profile-admin/user-privilageForm.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "stdInfoView") {
                    require_once 'contents/profile-contents/profile-admin/std-infoView.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "viewStdDetails") {
                    require_once 'contents/profile-contents/profile-admin/std-infoViewDetails.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "editDetailsInfo") {
                    require_once 'contents/profile-contents/profile-admin/std-editDetailsInfo.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "setExam") {
                    require_once 'contents/profile-contents/profile-admin/exam-setExam.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "inputMarks") {
                    require_once 'contents/profile-contents/profile-admin/exam-inputMarks.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "adminExamResult") {
                    require_once 'contents/profile-contents/profile-admin/std-adminExamResult.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "adminExamResultDetails") {
                    require_once 'contents/profile-contents/profile-admin/std-adminExamResultDetails.php';
                }                        
            }
            //Controlling students view
            if($user[0]["usrPrivilage"] == "Student"){
                if ($checkResult == true) {
                    if (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain']=="stdAdmissionForm") {
                        require_once 'contents/profile-contents/profile-admin/std-admissionForm.php';
                    }
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "exmResult") {
                    require_once 'contents/profile-contents/exam-result.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "academicInfoView") {
                    require_once 'contents/profile-contents/profile-student/std-academicInfoView.php'; 
                }
            }
            //Controlling teachers view          
            if($user[0]["usrPrivilage"] == "Teacher"){
                if (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain']=="inputMarks") {
                    require_once 'contents/profile-contents/profile-admin/exam-inputMarks.php'; 
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "adminExamResult") {
                    require_once 'contents/profile-contents/profile-admin/std-adminExamResult.php';
                }elseif (isset($_REQUEST['requestProfileMain']) && $_REQUEST['requestProfileMain'] == "adminExamResultDetails") {
                    require_once 'contents/profile-contents/profile-admin/std-adminExamResultDetails.php';
                } 
            }

            echo '</div>';
        }else{

            //Showing profile left div
            echo '<div class="profileLeft">';
            if (isset($_REQUEST['requestProfile']) && $_REQUEST['requestProfile']=="usrEdit") {
                require_once 'contents/profile-contents/profile-usr-editform.php';
            }elseif (isset($_REQUEST['requestProfile']) && $_REQUEST['requestProfile']=="pwdChange") {
                require_once 'contents/profile-contents/profile-pwdchange-form.php';
            }elseif (isset($_REQUEST['requestProfile']) && $_REQUEST['requestProfile']=="uploadDp") {
                require_once 'contents/profile-contents/profile-usrDp-form.php';
            }elseif ($user[0]["usrPrivilage"] == "Student"){
                require_once 'contents/profile-contents/profile-student/std-mainView.php';
            }elseif($user[0]["usrPrivilage"] == "None"){
                require_once 'contents/profile-contents/profile-unauthorized.php';
            }


            echo '</div>';

            //Showing profile right div
            echo '<div class="profileRight">';
            require_once 'contents/profile-contents/profile-right.php';
            echo '</div>';
        }


    ?>

   
</div>