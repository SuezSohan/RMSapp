<link rel="stylesheet" type="text/css" href="assets/css/inputform.css">
<link rel="stylesheet" type="text/css" href="assets/css/profile-css/profile-admin/profile-admin-stdAdmissionForm.css">


<div class="inputFormWrapper">
    <div class="inputFormContainer">
	
	<form class="inputForm" action="includes/stdinfo.inc.php" method="post">
    <table class="infoTable">
			<h2>Student Admission Form</h2>
			<tr>
				<td>Admission to Class</td>
				<td>
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
				</td>
				<td class="right">Group</td>
				<td>
					<select class="group" name="stdGroup">
						<option value="None">None</option>
						<option value="Science">Science</option>
						<option value="Business Studies">Business Studies</option>
						<option value="Humanities">Humanities</option>
					</select>
				</td>
				<td class="right">Version</td>
				<td>
					<select name="stdVersion">
						<option value="Bangla">Bangla</option>
						<option value="English">English</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Section</td>
				<td>
					<select name="stdSection">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					</select>
				</td>
				<td class="right">Session</td>
				<td><input type="text" maxlength="10" name="stdSession" placeholder="E.g.: 2021-22" required></td>

				<td class="right">Date of Birth</td>
				<td>
					<input type="date" maxlength="20" name="stdDob" required>
				</td>
			</tr>
			<tr>
				<td>Name of Institute</td>
				<td colspan="5"><input type="text" name="stdInstitute" placeholder="Enter current educational institute name" required></td>

			</tr>
			<tr>
				<td>Name of Student</td>
				<td colspan="3"><input type="text" maxlength="25" name="stdName" placeholder="Enter student's full name" required></td>
				<td class="right">Gender</td>
				<td >
					<input id="genderM" type="radio" name="stdGender" value="Male" required>
					<label for="genderM">Male</label>
					<input id="genderF" type="radio" name="stdGender" value="Female" required>
					<label for="genderF">Female</label>
				</td>
			</tr>
			<tr>
				<td>Father's Name</td>
				<td colspan="3"><input type="text" maxlength="25" name="fathersName" placeholder="Enter father's full name" required></td>
				<td class="right">Occupation</td>
				<td><input type="text" maxlength="20" name="fathersOccupation" placeholder="E.g.: Service holder" required></td>
			</tr>
			<tr>
				<td>Mother's Name</td>
				<td colspan="3"><input type="text" maxlength="25" name="mothersName" placeholder="Enter mother's full name" required></td>
				<td class="right">Occupation</td>
				<td><input type="text" maxlength="20" name="mothersOccupation" placeholder="E.g.: House wife" required></td>
			</tr>
			<tr>
				<td>Present Address</td>
				<td colspan="5"><input type="text" maxlength="164" name="presentAddress" placeholder="Enter present address here following proper format" required></td>
			</tr>
			<tr>
				<td>Permanent Address</td>
				<td colspan="5"><input type="text" maxlength="164" name="permanentAddress" placeholder="Enter permanent address here following proper format" required></td>
			</tr>
			<tr>
				<td>Religion</td>
				<td><input type="text" maxlength="10" name="stdReligion" placeholder="E.g.: Islam" required></td>
				<td class="right">Local G.</td>
				<td colspan="3"><input type="text" maxlength="25" name="localGuardian" placeholder="Enter local guardian's name here" required></td>
			</tr>
			<tr>
				<td>Local G. Phone</td>
				<td colspan="2"><input type="tel" pattern="01[0-9]{9}" maxlength="11" name="localGuardiansPhone" placeholder="01xxxxxxxxx" required></td>
				<td class="right">Father's Phone</td>
				<td colspan="2"><input type="tel" pattern="01[0-9]{9}" maxlength="11" name="fathersPhone" placeholder="01xxxxxxxxx" required></td>
			</tr>
			<tr>
				<td>Mother's Phone</td>
				<td colspan="2"><input type="tel" pattern="01[0-9]{9}" maxlength="11" name="mothersPhone" placeholder="01xxxxxxxxx" required></td>
				<td class="right">Student's Phone</td>
				<td colspan="2"><input type="tel" pattern="01[0-9]{9}" maxlength="11" name="stdPhone" placeholder="01xxxxxxxxx" required></td>
			</tr>
		</table>
			<button type="submit" name="stdAdmission">Confirm Admission</button>
		</form>

    </div>
</div>