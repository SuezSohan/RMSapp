<link rel="stylesheet" type="text/css" href="assets/css/viewTable.css">

<?php
	if (isset($_REQUEST["stdId"])) {

		$stdDetailInfo = $stdInfoContr->getStdDetailInfoContr($_REQUEST["stdId"]);
	}
?>

<div class="viewTableContainer">
	
	<h2 style="text-align: center; padding: 24px 0px 30px;">Student's Information</h2>
	
	<table class="infoViewTable" border="">
		<tr>
			<td>Student's ID</td>
			<td><?php echo $stdDetailInfo[0]["ID"]; ?></td>
			<td>Class</td>
			<td><?php echo $stdDetailInfo[0]["stdClass"]; ?></td>
			<td>Group</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["stdGroup"]; ?></td>
		</tr>
		<tr>
			<td>Section</td>
			<td><?php echo $stdDetailInfo[0]["stdSection"]; ?></td>
			<td>Version</td>
			<td><?php echo $stdDetailInfo[0]["stdVersion"]; ?></td>
			<td>Date of Birth</td>
			<td ><?php echo $stdDetailInfo[0]["stdDob"]; ?></td>
		</tr>
		<tr>
			<td>Institute</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["stdInstitute"]; ?></td>
			<td>Session</td>
			<td><?php echo $stdDetailInfo[0]["stdSession"]; ?></td>
		</tr>
		<tr>
			<td>Name of Student</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["stdName"]; ?></td>
			<td>Gender</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["stdGender"]; ?></td>
		</tr>
		<tr>
			<td>Father's Name</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["fathersName"]; ?></td>
			<td>Occupation</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["fathersOccupation"]; ?></td>
		</tr>
		<tr>
			<td>Mother's Name</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["mothersName"]; ?></td>
			<td>Occupation</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["mothersOccupation"]; ?></td>
		</tr>
		<tr>
			<td>Present Address</td>
			<td colspan="5"><?php echo $stdDetailInfo[0]["presentAddress"]; ?></td>
		</tr>
		<tr>
			<td>Permanent Address</td>
			<td colspan="5"><?php echo $stdDetailInfo[0]["permanentAddress"]; ?></td>
		</tr>
		<tr>
			<td>Religion</td>
			<td><?php echo $stdDetailInfo[0]["stdReligion"]; ?></td>
			<td>Local G.</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["localGuardian"]; ?></td>
		</tr>
		<tr>
			<td>Student's Phone</td>
			<td><?php echo $stdDetailInfo[0]["stdPhone"]; ?></td>
			<td>Mother's Phone</td>
			<td><?php echo $stdDetailInfo[0]["mothersPhone"]; ?></td>
			<td>Father's Phone</td>
			<td><?php echo $stdDetailInfo[0]["fathersPhone"]; ?></td>
		</tr>
		<tr>
			<td>Local G. Phone</td>
			<td><?php echo $stdDetailInfo[0]["localGuardiansPhone"]; ?></td>
			<td>Time of Admission</td>
			<td colspan="3"><?php echo $stdDetailInfo[0]["admissionTime"]; ?></td>
		</tr>
	</table>
	<div style="margin: 26px 48px 0px;"><a href="index.php?request=profile&profileMain&requestProfileMain=editDetailsInfo&stdId=<?php echo $stdDetailInfo[0]["ID"]; ?>&stdUsrId=<?php echo $stdDetailInfo[0]["usrID"];?>">Edit info </a></div>

</div>