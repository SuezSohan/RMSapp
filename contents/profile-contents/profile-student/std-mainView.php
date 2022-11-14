<link rel="stylesheet" type="text/css" href="assets/css/profile-css/profile-stdMainView.css">
<?php
	if (isset($_SESSION["usrId"])) {
        
		$stdDetailInfo = $stdInfoContr->stdDetailByUsrIdContr();
	}
?>

<div class="stdMainView">


<div class="stdAction">
    <fieldset>
        <?php
            if ($checkResult == true) {
                echo "<legend>Please Submit The Form</legend>";
            }else
            {
                echo "<legend>Student ID: ".$stdDetailInfo[0]["ID"]."</legend>";
            }
        ?>
        <div style="margin: 15px 0px 27px 0px;">
            <div style="width: 320px; margin: auto; text-align: center;">
                <ul>
                    <?php
                        if ($checkResult == true) {
                            echo '<a href="index.php?request=profile&profileMain&requestProfileMain=stdAdmissionForm"><li>Submit Admission Form</li></a>';
                        }else{
                            echo '<a href="index.php?request=profile&profileMain&requestProfileMain=exmResult"><li>Exam Result</li></a>';
                            echo '<a href="index.php?request=profile&profileMain&requestProfileMain=academicInfoView"><li>Academic Informations</li></a>';  
                        }                 
                    ?>                        
                </ul>
            </div>
        </div>
    </fieldset>

</div>


<div class="resultPolicy">
    <fieldset>
    <legend>Please Read</legend>
    <h2 style="margin: 19px 0px 0px 18px;">How we prepare our results:</h2>
    <div style="margin: 15px 9px 27px 68px;">
        <ul style="list-style-type:square;">
            <li>Focus on the Objective as the Burning Issue.</li>
            <li>State your recommendation as a solution. </li>
            <li>That might be true for academia and basic research.</li>
            <li>Focus on the Objective as the Burning Issue.</li>
            <li>State your recommendation as a solution. </li>
            <li>That might be true for academia and basic research.</li>
            <li>Focus on the Objective as the Burning Issue.</li>
            <li>State your recommendation as a solution. </li>
            <li>That might be true for academia and basic research.</li>
            <li>Focus on the Objective as the Burning Issue.</li>
            <li>State your recommendation as a solution. </li>
            <li>That might be true for academia and basic research.</li>
        </ul>
    </div>
    </fieldset>

</div>






</div>