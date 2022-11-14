<link rel="stylesheet" type="text/css" href="assets/css/adminInput.css">
<link rel="stylesheet" type="text/css" href="assets/css/viewTable.css">
 
<?php

if(isset($_POST["findStd"])){

	$stdInfo = $exmContr->getStdForInputMarksContr($_POST["exmClass"], $_POST["exmGroup"], $_POST["exmSection"], $_POST["exmVersion"]);
}

?>


<div class="adminInput">
    <div class="adminInputContainer">
		
		<?php
		
			if (isset($_REQUEST['error']) && $_REQUEST['error']=="sameUsrId") {
				echo '<p style=" text-align: center;  color: red; padding-bottom: 20px;">You can not change your own privilage.</p>';
			}
		
		?>

			<h2 style="text-align: center; padding: 8px 0px 10px;">Find Students</h2>
		<form action="" method="post">
			<div style="display: flex;">
				<div style="width: 45%;">

					<label for="">Class</label>
					<select id="exmClass" name="exmClass">
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

					<label for="">Group</label>
					<select id="exmGroup" name="exmGroup">
						<option value="None">None</option>
						<option value="Science">Science</option>
						<option value="Business Studies">Business Studies</option>
						<option value="Humanities">Humanities</option>
					</select>

					<label for="">Section</label>
					<select id="exmSection" name="exmSection">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					</select>

				</div>

				<div style="width: 45%; margin-left:auto;">

					<label for="">Version</label>
					<select id="exmVersion" name="exmVersion">
						<option value="Bangla">Bangla</option>
						<option value="English">English</option>
					</select>

					
					<label for="">Exam Month</label>
					<input id="exmMonth" type="month" name="exmMonth" required>

					<label for="">Exam Date</label>
					<select id="exmDate" name="exmDate">
						<option>Select One</option>
					</select>
				</div>
			</div>
			<label for="">Subject</label>
			<select id="exmSubject" name="exmSubject">
						<option>Select One</option>
			</select>
			<button type="submit" name="findStd">Find</button>
		</form>

    </div>
</div>

<div style="margin-top: 57px;">

	<?phP if (isset($_POST["findStd"]) && !empty($stdInfo)) {?>
		<form action="includes/inputmarks.inc.php" method="POST">

			<div style="margin-bottom: 0px;" class="viewTableContainer">
				<h2 style="text-align: center; padding: 24px 0px 30px;">Input Student Marks</h2>
				<table style="width: 900px;" class="infoViewTable" border="">
					<tr>
						<td>Class</td>
						<td><?php echo $_POST["exmClass"];?></td>
						<td>Group</td>
						<td><?php echo $_POST["exmGroup"];?></td>
						<td>Section</td>
						<td colspan="3"><?php echo $_POST["exmSection"];?></td>
					</tr>
					<tr>
						<td>Exam Date</td>
						<td><?php echo $_POST["exmDate"];?></td>
						<td>Exam Month</td>
						<td><?php echo $_POST["exmMonth"];?></td>
						<td>Version</td>
						<td colspan="3"><?php echo $_POST["exmVersion"];?></td>
					</tr>
					<tr>
						<td>Total Marks</td>
						<td colspan="2"><input style="width:100%; font-size: 15px; text-align:center; background:none; border: none; outline:none" type="text" maxlength="10" name="totalMarks" required></td>
						<td>Subject</td>
						<td colspan="2"><?php echo $_POST["exmSubject"];?></td>
					</tr>
				</table>
			</div>	

			<div class="adminTable">
				<div class="adminTableContainer">	
					<table border="">
						<tr>
							<th>Student ID</th>
							<th style="width: 410px;">Name</th>
							<th>Total</th>
							<th>Obtained</th>
						</tr>
							<?php
								$idCount =0;
								foreach ($stdInfo as $stdData) {
									$idCount = $idCount + 1;

									$stdMarks = $exmContr->getStdMarksContr($stdData["ID"], $_POST["exmSubject"], $_POST["exmDate"], $_POST["exmMonth"]);

									echo '<tr>
											<td>'.$stdData["ID"].'</td>
											<td style="text-align: left;">'.$stdData["stdName"].'</td>
											<td>'.$stdMarks[0]["totalMarks"].'</td>
											<td style="text-align: left;"><input value="'.$stdMarks[0]["obtainedMarks"].'" style="width:100%; font-size: 15px; text-align:center; background:none; border: none; outline:none" type="text" maxlength="10" name="obtainedMarks'.$idCount.'" required></td>
										</tr>';
									echo '<input type="hidden" name="stdId'.$idCount.'" required value="'.$stdData["ID"].'">';
								}
								echo '<input type="hidden" name="exmSubject" required value="'.$_POST["exmSubject"].'">';
								echo '<input type="hidden" name="exmDate" required value="'.$_POST["exmDate"].'">';
								echo '<input type="hidden" name="exmMonth" required value="'.$_POST["exmMonth"].'">';
								echo '<input type="hidden" name="exmClass" required value="'.$_POST["exmClass"].'">';
								echo '<input type="hidden" name="exmGroup" required value="'.$_POST["exmGroup"].'">';
								echo '<input type="hidden" name="exmSection" required value="'.$_POST["exmSection"].'">';
								echo '<input type="hidden" name="exmVersion" required value="'.$_POST["exmVersion"].'">';
								echo '<input type="hidden" name="idCount" required value="'.$idCount.'">';			
							?>				
					</table>
				</div>
				<button id= "inputMarksBtn" type="submit" name="inputMarks">Save</button>				
			</div>
		</form>
	<?phP } ?>

</div>

<script>
    $(document).ready(function(){

		//Get exam Date ajax
		$("#exmMonth, #exmClass, #exmGroup, #exmSection, #exmVersion").on("change", function() {
			var exmMonth = $("#exmMonth").val();
			var exmClass = $("#exmClass").val();
			var exmGroup = $("#exmGroup").val();
			var exmSection = $("#exmSection").val();
			var exmVersion = $("#exmVersion").val();
			$.ajax({
				url: 'includes/inputmarks.inc.php',
				type: 'POST',
				data: {
					exmDateAjax:"exmDateAjax",
					exmMonth: exmMonth,
					exmClass: exmClass,
					exmGroup: exmGroup,
					exmSection: exmSection,
					exmVersion: exmVersion				
				},
				success: function(response){
					document.getElementById("exmDate").innerHTML = response;
				}
			});
		});

		//Get exam sujects
		$("#exmMonth, #exmClass, #exmGroup, #exmSection, #exmVersion, #exmDate").on("change", function() {
			var exmMonth = $("#exmMonth").val();
			var exmClass = $("#exmClass").val();
			var exmGroup = $("#exmGroup").val();
			var exmSection = $("#exmSection").val();
			var exmVersion = $("#exmVersion").val();
			var exmDate = $("#exmDate").val();

			$.ajax({
				url: 'includes/inputmarks.inc.php',
				type: 'POST',
				data: {
					exmSubjectAjax:"exmSubjectAjax",
					exmMonth: exmMonth,
					exmClass: exmClass,
					exmGroup: exmGroup,
					exmSection: exmSection,
					exmVersion: exmVersion,
					exmDate: exmDate			
				},
				success: function(response){
					document.getElementById("exmSubject").innerHTML = response;
				}
			});
		});


    });
</script>
