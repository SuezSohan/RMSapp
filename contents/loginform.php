<link rel="stylesheet" type="text/css" href="assets/css/logupform.css">

<div class="inputLogup">

    <h1 style="text-align: center; padding-top: 28px; color: #252436;">User Login</h1>

    <div class="logupBox">
        <form action="includes/login.inc.php" method="post">
            <div style="margin: 22px 0px 0px;">
                <?php
                    if (isset($_REQUEST['signup']) && $_REQUEST['signup']=="success") {
                        echo '<p style="color: #0a8901; text-align: center;">Signup successful. Please login.</p>';
                    }
                    if (isset($_REQUEST['error']) && $_REQUEST['error']=="wrongPwd") {
                        echo '<p style="color: red;">Incorrect password! Try again.</p>';
                    }
                    if (isset($_REQUEST['error']) && $_REQUEST['error']=="userNotFound") {
                        echo '<p style="color: red;">The email you entered is not found.</p>';
                    }
                ?>
            </div>
            <input type="email" maxlength="64" name="usrEmail" placeholder="User Email" required>
            <input type="password" maxlength="16" minlength="6" name="pwd" placeholder="User Password" required>
            <button type="submit" name="submit">Login</button>
        </form>

            <span><p style="text-align: center; margin:30px 0px 0px;"><a href="#">Forget password?</a></p></span>

    </div>

</div>