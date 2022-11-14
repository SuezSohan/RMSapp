<link rel="stylesheet" type="text/css" href="assets/css/adminInput.css">
<link rel="stylesheet" type="text/css" href="assets/css/exam-result.css">

<?php
	if (isset($_POST["searchAdminExmResult"])) {
		$stdShortInfo = $stdInfoContr->getShortStdInfoContr("Active", $_POST["exmClass"], $_POST["exmSection"], $_POST["exmVersion"], $_POST["exmGroup"],);

		foreach ($stdShortInfo as $stdData) {
			$exmDates =  $exmResultContr->getExamDateContr($stdData["ID"], $_POST["exmMonth"]);
		}
	}
?>

<div class="adminInput">
    <div class="adminInputContainer">

		<h2 style="text-align: center; padding: 8px 0px 10px;">Search Exam Result</h2>
		
		<form action="" method="post">

			<?php

				if (empty($stdShortInfo) && isset($_POST["searchAdminExmResult"])) {
					echo '<p style=" text-align: center;  color: red; padding-bottom: 20px;">No Student found under this conditions.</p>';
				}
			?>

				<label for="">Class</label>
				<select name="exmClass">
					<option value="One">One</option>
					<option value="Two">Two</option>
					<option value="Three">Three</option>
					<option value="Four">Four</option>
					<option value="Five">Five</option>
					<option value="Six">Six</option>
					<option value="Seven">Seven</option>
					<option value="Eight">Eight</option>
					<option value="Nine">Nine</option>
					<option value="Ten">Ten</option>
					<option value="Eleven">Eleven</option>
					<option value="Twelve">Twelve</option>
				</select>

			<div style="display: flex;">
				<div style="width: 45%;">

					<label for="">Exam Date</label>
					<input type="month" name="exmMonth" required>

					<label for="">Group</label>
					<select name="exmGroup">
						<option value="None">None</option>
						<option value="Science">Science</option>
						<option value="Business Studies">Business Studies</option>
						<option value="Humanities">Humanities</option>
					</select>

				</div>

				<div style="width: 45%; margin-left:auto;">
					
					<label for="">Section</label>
					<select name="exmSection">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					</select>

					<label for="">Version</label>
					<select name="exmVersion">
						<option value="Bangla">Bangla</option>
						<option value="English">English</option>
					</select>
				</div>
			</div>

			<button type="submit" name="searchAdminExmResult">Find Now</button>
		</form>

    </div>
</div>

<div style="margin-top: 57px;">

	<?phP if (!empty($stdShortInfo) && isset($_POST["searchAdminExmResult"])) { if(!empty($exmDates)){?>
			<div class="adminTable">
				<div style="display: flex;padding-bottom: 50px;">
				<h1 style="padding-left: 2px;">Class: <?phP echo $_POST["exmClass"]; ?></h1>
				<h1>Section: <?phP echo $_POST["exmSection"]; ?></h1>
				<h1>Version: <?phP echo $_POST["exmVersion"]; ?></h1>
				<h1>Group: <?phP echo $_POST["exmGroup"]; ?></h1>
				<h1>Month: <?phP echo $_POST["exmMonth"]; ?></h1>
			</div>

			<div class="adminTableContainer">
				<table border="">
					<tr>
						<th>Student ID</th>
						<th>Name</th>
						<th>Merit Position</th>
						<th>GPA</th>
						<th>Total Obtained</th>
						<th>Total Marks</th>
						<th>Action</th>
					</tr>

					<?php
						foreach ($stdShortInfo as $stdData) {

							$stdMeritPosition =  $exmResultContr->stdMeritPosition($stdData["ID"], $_POST["exmClass"], $_POST["exmGroup"], $_POST["exmSection"], $_POST["exmVersion"], $_POST["exmMonth"],);
							$monthlyObtained = $exmResultContr->monthlyObtainedContr($stdData["ID"], $_POST["exmMonth"]);
							$monthlyTotalMarks = $exmResultContr->getMonthlyTotalMarksContr($stdData["ID"], $_POST["exmMonth"]);
							$monthlyGpa =  $exmResultContr->monthlyGpa($stdData["ID"], $_POST["exmMonth"]);

							echo '<tr>
									<td>'.$stdData["ID"].'</td>
									<td style="text-align: left;">'.$stdData["stdName"].'</td>
									<td>'.$stdMeritPosition.'</td>
									<td>'.round($monthlyGpa, 2).'</td>
									<td>'.$monthlyObtained[0]["monthlyObtained"].'</td>
									<td>'.$monthlyTotalMarks[0]["monthlyTotalMarks"].'</td>
									<td><a href="index.php?request=profile&profileMain&requestProfileMain=adminExamResultDetails&exmMonth='.$_POST["exmMonth"].'&stdUsrId='.$stdData["usrID"].'">Details</a></td>
								</tr>'; 
						}
					?>
					
				</table>

			</div>
		</div>
	<?phP }else{ echo'<div class="notFound"><h2>Result Not Found</h2></div>';} } ?>
</div>