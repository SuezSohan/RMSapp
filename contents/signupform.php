<link rel="stylesheet" type="text/css" href="assets/css/logupform.css">

<div class="inputLogup">

    <h1 style="text-align: center; padding-top: 28px; color: #252436;">Sign Up</h1>

    <div class="logupBox">
        <form action="includes/signup.inc.php" method="post">

            <div style="margin: 22px 0px 0px;">
            <?php
                if (isset($_REQUEST['error']) && $_REQUEST['error']=="pwdnotmatched") {
                    echo '<p style="color: red;">Passwords are not matched.</p>';
                }
                if (isset($_REQUEST['error']) && $_REQUEST['error']=="emailormobiletaken") {
                    echo '<p style="color: red;">Email or mobile is already resistered.</p>';
                }
            ?>
            
            </div>

            <input type="text" maxlength="20" name="firstName" placeholder="First Name" required>
            <input type="" maxlength="20" name="lastName" placeholder="Last Name" required>
            <input type="email" maxlength="64" name="email" placeholder="Email Address" required>
            <input type="tel" pattern="01[0-9]{9}" maxlength="11" name="mobile" placeholder="Mobile(01xxxxxxxxx)" required>
            <input type="password" maxlength="16" minlength="6" name="pwd" placeholder="Password" required>
            <input type="password" maxlength="16" minlength="6" name="pwdConfirm" placeholder="Confirm Password" required>
            <button type="submit" name="submit">Signup Now</button>
        </form>

            <span><p style="text-align: center; margin:30px 0px 0px;">Already signed up? <a href="index.php?request=usrLogin">Login here.</a></p></span>

    </div>

</div>