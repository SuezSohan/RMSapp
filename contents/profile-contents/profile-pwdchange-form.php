<link rel="stylesheet" type="text/css" href="assets/css/logupform.css">
<link rel="stylesheet" type="text/css" href="assets/css/profile-css/profile-usr-editform.css">

<div class="usrEditForm">

    <h1 style="text-align: center; padding-top: 28px; color: #252436;">Change Password</h1>

    <div class="logupBox">
        <form action="includes/edit-usrinfo.inc.php" method="post">

            <div style="margin: 22px 0px 0px;">
            <?php
                if (isset($_REQUEST['error']) && $_REQUEST['error']=="wrongPwd") {
                    echo '<p style="color: red; padding-bottom: 20px;">Incorrect password! Try again.</p>';
                }elseif (isset($_REQUEST['error']) && $_REQUEST['error']=="pwdNotMatched") {
                    echo '<p style="color: red; padding-bottom: 20px;">Passwords are not matched.</p>';
                }
                elseif (isset($_REQUEST['error']) && $_REQUEST['error']=="none") {
                    echo '<p style="color: #0a8901; padding-bottom: 20px;">Your password has changed successfully.</p>';
                }
            ?>
            
            </div>
            
            <label for="">Old Password</label>
            <input type="password" maxlength="16" minlength="6" name="pwdOld" required>

            <label for="">New Password</label>
            <input type="password" maxlength="16" minlength="6" name="pwdNew" required>

            <label for="">Confirm Password</label>
            <input type="password" maxlength="16" minlength="6" name="pwdConfirm" required>
            
            <button type="submit" name="pwdChange" style="margin:20px 0px 20px;">Change Now</button>

        </form>

    </div>

</div>