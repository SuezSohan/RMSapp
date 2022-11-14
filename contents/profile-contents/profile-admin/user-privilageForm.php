<link rel="stylesheet" type="text/css" href="assets/css/adminInput.css">
 
<?php

$usrRequested = $usrInfo->getUsersByPrivilageContr("None");
$usrAdmin = $usrInfo->getUsersByPrivilageContr("Admin");
$usrTeacher =  $usrInfo->getUsersByPrivilageContr("Teacher");

?>


<div class="adminInput">
    <div class="adminInputContainer">
		
		<?php
		
			if (isset($_REQUEST['error']) && $_REQUEST['error']=="sameUsrId") {
				echo '<p style=" text-align: center;  color: red; padding-bottom: 20px;">You can not change your own privilage.</p>';
			}
		
		?>

			<h2 style="text-align: center; padding: 8px 0px 10px;">Set User Privilage</h2>
		<form action="includes/edit-usrinfo.inc.php" method="post">
			<label for="">User ID</label>
			<input type="text" maxlength="10" name="targetUsrID" required>

			<label for="">Privilage type</label>
			<select name="privilageType">
				<option value="Student">Student</option>
				<option value="Teacher">Teacher</option>
				<option value="Admin">Admin</option>
			</select>

			<button type="submit" name="setPrivilage">Set Privilage</button>
		</form>

    </div>
</div>

<div style="margin-top: 57px;">

	<?phP if (!empty($usrRequested)) {?>
		<div class="adminTable">
			<h2>Sign in Requests</h2>
			<div class="adminTableContainer">
				<table border="">
					<tr>
						<th>User ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Action</th>
					</tr>

					<?php
						foreach ($usrRequested as $usrData) {
							echo '<tr>
									<td>'.$usrData["ID"].'</td>
									<td style="text-align: left;">'.$usrData["firstName"].'&nbsp'.$usrData["lastName"].'</td>
									<td style="text-align: left;">'.$usrData["usrEmail"].'</td>
									<td style="text-align: left;">'.$usrData["usrMobile"].'</td>
									<td><form id="btnForm" action="includes/edit-usrinfo.inc.php" method="post"><button type="submit" name="requestDelete" value="'.$usrData["ID"].'">Delete</button></form></td>
								</tr>';
						}			
					?>
					
				</table>

			</div>
		</div>
	<?phP } ?>

	
	<?phP if (!empty($usrAdmin) || !empty($usrTeacher)){?>
		<div class="adminTable">
			<h2>Admins and Teachers</h2>
			<div class="adminTableContainer">
				<table>
					<tr>
						<th>User ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Privilage</th>
					</tr>
					<?php
						foreach ($usrAdmin as $usrData) {
							echo '<tr>
									<td>'.$usrData["ID"].'</td>
									<td style="text-align: left;">'.$usrData["firstName"].'&nbsp'.$usrData["lastName"].'</td>
									<td style="text-align: left;">'.$usrData["usrEmail"].'</td>
									<td style="text-align: left;">'.$usrData["usrMobile"].'</td>
									<td>'.$usrData["usrPrivilage"].'</td>
								</tr>';
						}
						foreach ($usrTeacher as $usrData) {
							echo '<tr>
									<td>'.$usrData["ID"].'</td>
									<td style="text-align: left;">'.$usrData["firstName"].'&nbsp'.$usrData["lastName"].'</td>
									<td style="text-align: left;">'.$usrData["usrEmail"].'</td>
									<td style="text-align: left;">'.$usrData["usrMobile"].'</td>
									<td>'.$usrData["usrPrivilage"].'</td>
								</tr>';
						}						
					?>
				</table>

			</div>
		</div>
	<?phP } ?>
</div>