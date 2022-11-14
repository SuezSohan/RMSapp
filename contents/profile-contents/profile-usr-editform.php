<link rel="stylesheet" type="text/css" href="assets/css/logupform.css">
<link rel="stylesheet" type="text/css" href="assets/css/profile-css/profile-usr-editform.css">

<div class="usrEditForm">

    <h1 style="text-align: center; padding-top: 28px; color: #252436;">Edit User Info</h1>

    <div class="logupBox">
        <form action="includes/edit-usrinfo.inc.php" method="post">

            <div style="margin: 22px 0px 0px;">
            <?php
                if (isset($_REQUEST['error']) && $_REQUEST['error']=="mobileTaken") {
                    echo '<p style="color: red; padding-bottom: 20px;">Mobile number is already resistered.</p>';
                }
            ?>
            
            </div>
            
            <label for="">First Name</label>
            <input type="text" maxlength="20" name="firstName" value="<?php echo $user[0]["firstName"]; ?>" required>

            <label for="">Last Name</label>
            <input type="" maxlength="20" name="lastName" value="<?php echo $user[0]["lastName"]; ?>" required>

            <label for="">Mobile</label>
            <input type="tel" pattern="01[0-9]{9}" maxlength="11" name="mobile" value="<?php echo $user[0]["usrMobile"]; ?>" required>
            
            <button type="submit" name="editUsr" style="margin:20px 0px 20px;">Save Changes</button>

        </form>

    </div>

</div>