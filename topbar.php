<div class="contentClass">
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php 
            if(isset($_SESSION["usrId"]) && isset($_SESSION["usrEmail"])){
                echo '<li><a href="index.php?request=profile">Profile</a></li>';
                echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                echo '<li><a href="index.php?request=profile"><span style="border-left: 2px solid #9f9f9f; padding-left: 6px;">'.$user[0]["lastName"].'</span></a></li>';
            }else{
                echo '<li><a href="index.php?request=usrLogin">Login</a></li>';
                echo '<li><a href="index.php?request=signup">Signup</a></li>';
            }
        ?>
        
    </ul>
</div>
<div class="contentClass" id="contentSocial">
    <ul>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
    </ul>
</div>