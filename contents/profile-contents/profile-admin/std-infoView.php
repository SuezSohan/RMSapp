<link rel="stylesheet" type="text/css" href="assets/css/adminInput.css">

<?php
	if (isset($_POST["searchStd"])) {
		$stdShortInfo = $stdInfoContr->getShortStdInfoContr("Active", $_POST["stdClass"], $_POST["stdSection"], $_POST["stdVersion"], $_POST["stdGroup"],);
	}
?>

<div class="adminInput">
    <div class="adminInputContainer">
		
		

		<h2 style="text-align: center; padding: 8px 0px 10px;">Search Students</h2>
		
		<form action="" method="post">

		<?php

			if (isset($_REQUEST["settingNew"]) && $_REQUEST["settingNew"] == "success" ) {
				echo '<p style=" text-align: center;  color: green; padding-bottom: 20px;">New admission done. Search to find.</p>';
			}
			if (empty($stdShortInfo) && isset($_POST["searchStd"])) {
				echo '<p style=" text-align: center;  color: red; padding-bottom: 20px;">No Student found under this conditions.</p>';
			}
		?>

			<label for="">Class</label>
			<select name="stdClass">
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

			<label for="">Section</label>
			<select name="stdSection">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
			</select>

			<label for="">Version</label>
			<select name="stdVersion">
				<option value="Bangla">Bangla</option>
				<option value="English">English</option>
			</select>

			<label for="">Group</label>
			<select class="group" name="stdGroup">
				<option value="None">None</option>
				<option value="Science">Science</option>
				<option value="Business Studies">Business Studies</option>
				<option value="Humanities">Humanities</option>
			</select>

			<button type="submit" name="searchStd">Find Now</button>
		</form>

    </div>
</div>

<div style="margin-top: 57px;">

	<?phP if (!empty($stdShortInfo) && isset($_POST["searchStd"])) {?>
			<div class="adminTable">
				<div style="display: flex;padding-bottom: 17px;">
				<h1 style="padding-left: 2px;">Class: <?phP echo $_POST["stdClass"]; ?></h1>
				<h1>Section: <?phP echo $_POST["stdSection"]; ?></h1>
				<h1>Version: <?phP echo $_POST["stdVersion"]; ?></h1>
				<h1>Group: <?phP echo $_POST["stdGroup"]; ?></h1>
			</div>

			<div class="adminTableContainer">
				<table border="">
					<tr>
						<th>Student ID</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Sdudent's phone</th>
						<th>Action</th>
					</tr>

					<?php
						foreach ($stdShortInfo as $stdData) {
							 echo '<tr>
									<td>'.$stdData["ID"].'</td>
									<td style="text-align: left;">'.$stdData["stdName"].'</td>
									<td style="text-align: left;">'.$stdData["stdGender"].'</td>
									<td style="text-align: left;">'.$stdData["stdPhone"].'</td>
									<td><a href="index.php?request=profile&profileMain&requestProfileMain=viewStdDetails&stdId='.$stdData["ID"].'&stdUsrId='.$stdData["usrID"].'">Details</a></td>
								</tr>'; 
						}	
					?>
					
				</table>

			</div>
		</div>
	<?phP } ?>
</div>