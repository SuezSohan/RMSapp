<link rel="stylesheet" type="text/css" href="assets/css/inputform.css">
<link rel="stylesheet" type="text/css" href="assets/css/profile-css/profile-admin/profile-admin-stdAdmissionForm.css">

<?php
	if (isset($_REQUEST["stdId"])) {

		$stdDetailInfo = $stdInfoContr->getStdDetailInfoContr($_REQUEST["stdId"]);
	}
?>

<div class="inputFormWrapper">
    <div class="inputFormContainer">
	
	<form class="inputForm" action="includes/stdinfo.inc.php" method="post">
    <table class="infoTable">
			<h2>Edit Student's informations</h2>
			<tr>
				<td>Admission to Class</td>
				<td>
					<select name="stdClass">
						<option <?php if($stdDetailInfo[0]["stdClass"]=="One"){echo "selected";}?> value="One">One</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Two"){echo "selected";}?> value="Two">Two</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Three"){echo "selected";}?> value="Three" selected>Three</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Four"){echo "selected";}?> value="Four">Four</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Five"){echo "selected";}?> value="Five">Five</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Six"){echo "selected";}?> value="Six">Six</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Seven"){echo "selected";}?> value="Seven">Seven</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Eight"){echo "selected";}?> value="Eight">Eight</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Nine"){echo "selected";}?> value="Nine">Nine</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Ten"){echo "selected";}?> value="Ten">Ten</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Eleven"){echo "selected";}?> value="Eleven">Eleven</option>
						<option <?php if($stdDetailInfo[0]["stdClass"]=="Twelve"){echo "selected";}?> value="Twelve">Twelve</option>
					</select>
				</td>
				<td class="right">Group</td>
				<td>
					<select class="group" name="stdGroup">
						<option <?php if($stdDetailInfo[0]["stdGroup"]=="None"){echo "selected";}?> value="None">None</option>
						<option <?php if($stdDetailInfo[0]["stdGroup"]=="Science"){echo "selected";}?> value="Science">Science</option>
						<option <?php if($stdDetailInfo[0]["stdGroup"]=="Business Studies"){echo "selected";}?> value="Business Studies">Business Studies</option>
						<option <?php if($stdDetailInfo[0]["stdGroup"]=="Humanities"){echo "selected";}?> value="Humanities">Humanities</option>
					</select>
				</td>
				<td class="right">Version</td>
				<td>
					<select name="stdVersion">
						<option <?php if($stdDetailInfo[0]["stdVersion"]=="Bangla"){echo "selected";}?> value="Bangla">Bangla</option>
						<option <?php if($stdDetailInfo[0]["stdVersion"]=="English"){echo "selected";}?> value="English">English</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Section</td>
				<td>
					<select name="stdSection">
						<option <?php if($stdDetailInfo[0]["stdSection"]=="A"){echo "selected";}?> value="A" >A</option>
						<option <?php if($stdDetailInfo[0]["stdSection"]=="B"){echo "selected";}?> value="B">B</option>
						<option <?php if($stdDetailInfo[0]["stdSection"]=="C"){echo "selected";}?> value="C">C</option>
					</select>
				</td>
				<td class="right">Session</td>
				<td><input value="<?php echo $stdDetailInfo[0]["stdSession"];?>"  type="text" maxlength="10" name="stdSession" placeholder="E.g.: 2021-22" required></td>

				<td class="right">Date of Birth</td>
				<td>
					<input value="<?php echo $stdDetailInfo[0]["stdDob"];?>" type="date" maxlength="20" name="stdDob" required>
				</td>
			</tr>
			<tr>
				<td>Name of Institute</td>
				<td colspan="5"><input value="<?php echo $stdDetailInfo[0]["stdInstitute"];?>" type="text" name="stdInstitute" placeholder="Enter current educational institute name" required></td>

			</tr>
			<tr>
				<td>Name of Student</td>
				<td colspan="3"><input value="<?php echo $stdDetailInfo[0]["stdName"];?>" type="text" maxlength="25" name="stdName" placeholder="Enter student's full name" required></td>
				<td class="right">Gender</td>
				<td >
					<input <?php if($stdDetailInfo[0]["stdGender"]=="Male"){echo "checked";}?> id="genderM" type="radio" name="stdGender" value="Male" required>
					<label for="genderM">Male</label>
					<input <?php if($stdDetailInfo[0]["stdGender"]=="Female"){echo "checked";}?> id="genderF" type="radio" name="stdGender" value="Female" required>
					<label for="genderF">Female</label>
				</td>
			</tr>
			<tr>
				<td>Father's Name</td>
				<td colspan="3"><input value="<?php echo $stdDetailInfo[0]["fathersName"];?>" type="text" maxlength="25" name="fathersName" placeholder="Enter father's full name" required></td>
				<td class="right">Occupation</td>
				<td><input value="<?php echo $stdDetailInfo[0]["fathersOccupation"];?>" type="text" maxlength="20" name="fathersOccupation" placeholder="E.g.: Service holder" required></td>
			</tr>
			<tr>
				<td>Mother's Name</td>
				<td colspan="3"><input value="<?php echo $stdDetailInfo[0]["mothersName"];?>" type="text" maxlength="25" name="mothersName" placeholder="Enter mother's full name" required></td>
				<td class="right">Occupation</td>
				<td><input value="<?php echo $stdDetailInfo[0]["mothersOccupation"];?>" type="text" maxlength="20" name="mothersOccupation" placeholder="E.g.: House wife" required></td>
			</tr>
			<tr>
				<td>Present Address</td>
				<td colspan="5"><input value="<?php echo $stdDetailInfo[0]["presentAddress"];?>" type="text" maxlength="164" name="presentAddress" placeholder="Enter present address here following proper format" required></td>
			</tr>
			<tr>
				<td>Permanent Address</td>
				<td colspan="5"><input value="<?php echo $stdDetailInfo[0]["permanentAddress"];?>" type="text" maxlength="164" name="permanentAddress" placeholder="Enter permanent address here following proper format" required></td>
			</tr>
			<tr>
				<td>Religion</td>
				<td><input value="<?php echo $stdDetailInfo[0]["stdReligion"];?>" type="text" maxlength="10" name="stdReligion" placeholder="E.g.: Islam" required></td>
				<td class="right">Local G.</td>
				<td colspan="3"><input value="<?php echo $stdDetailInfo[0]["localGuardian"];?>" type="text" maxlength="25" name="localGuardian" placeholder="Enter local guardian's name here" required></td>
			</tr>
			<tr>
				<td>Local G. Phone</td>
				<td colspan="2"><input value="<?php echo $stdDetailInfo[0]["localGuardiansPhone"];?>" type="tel" pattern="01[0-9]{9}" maxlength="11" name="localGuardiansPhone" placeholder="01xxxxxxxxx" required></td>
				<td class="right">Father's Phone</td>
				<td colspan="2"><input value="<?php echo $stdDetailInfo[0]["fathersPhone"];?>" type="tel" pattern="01[0-9]{9}" maxlength="11" name="fathersPhone" placeholder="01xxxxxxxxx" required></td>
			</tr>
			<tr>
				<td>Mother's Phone</td>
				<td colspan="2"><input value="<?php echo $stdDetailInfo[0]["mothersPhone"];?>" type="tel" pattern="01[0-9]{9}" maxlength="11" name="mothersPhone" placeholder="01xxxxxxxxx" required></td>
				<td class="right">Student's Phone</td>
				<td colspan="2"><input value="<?php echo $stdDetailInfo[0]["stdPhone"];?>" type="tel" pattern="01[0-9]{9}" maxlength="11" name="stdPhone" placeholder="01xxxxxxxxx" required></td>
			</tr>
		</table>
			<button type="submit" name="editStdInfo" value="<?php echo $_REQUEST["stdId"];?>">Save Informations</button>
			<button type="submit" name="setStdAsNew" onclick="alert('Are you sure! All the informations will be set to a new student ID and the present student ID will be deactivated.');" value="<?php echo $_REQUEST["stdUsrId"];?>">Set as New</button>
		</form>

    </div>
</div>