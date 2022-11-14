<link rel="stylesheet" type="text/css" href="assets/css/adminInput.css">
 
<?php

if(isset($_POST["searchExm"])){
	$exmInfoThisMonth = $exmContr->getExamContr(date($_POST["exmMonth"]));
	$exmMonthValue = $_POST["exmMonth"];
}else{
	$exmInfoThisMonth = $exmContr->getExamContr(date("Y-m"));
	$exmMonthValue = date("Y-m");
}
?>

<div class="adminInput">
    <div class="adminInputContainer">
		
		<?php
		
			if (isset($_REQUEST['error']) && $_REQUEST['error']=="exmDateMonthNotSame") {
				echo '<p style=" text-align: center;  color: red; padding-bottom: 20px;">You can not change your own privilage.</p>';
			}
		
		?>

		<h2 style="text-align: center; padding: 8px 0px 10px;">Set Exam Date</h2>
		
		<form action="includes/exam.inc.php" method="post">

			<div style="display: flex;">
				<div style="width: 45%;">
					
					<label for="">Subject</label>
					<input type="text" maxlength="30" name="exmSubject" placeholder="E.g.: Bangla 1st" required>

					<label for="">Exam Date</label>
					<input type="date" name="exmDate" required>

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
				</div>

				<div style="width: 45%; margin-left:auto;">
					<label for="">Group</label>
					<select name="exmGroup">
						<option value="None">None</option>
						<option value="Science">Science</option>
						<option value="Business Studies">Business Studies</option>
						<option value="Humanities">Humanities</option>
					</select>

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

			<button type="submit" name="setExam">Set Exam</button>
		</form>

    </div>
</div>

<div class="adminInput">
	<form action="" method="post">
		<div class="adminInputContainer" style="display: flex; padding: 10px 0px 12px">	
				<input type="month" style="width: 65%" name="exmMonth" value="<?php echo $exmMonthValue; ?>" required>
				<button type="submit" style="height: 35px; margin-top: auto;" name="searchExm">Search Month</button>	
		</div>
	</form>
</div>

<div>

	<?php 

		if (!empty($exmInfoThisMonth)) {
			$examClassArray = array("One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve");
			foreach ($examClassArray as $exmClass){
				foreach ($exmInfoThisMonth as $exmData) {
					if( $exmClass == $exmData["exmClass"]){

						echo'<div class="adminTable">
							<h2>Class:'.$exmClass.'</h2>
							<div class="adminTableContainer">
							<table border="">
									<tr>
										<th>Date</th>
										<th>Subject</th>
										<th>Group</th>
										<th>Section</th>
										<th>Version</th>
										<th>Action</th>
									</tr>';
					
						
						foreach ($exmInfoThisMonth as $exmData) {
							if( $exmClass == $exmData["exmClass"]){
											echo'<tr>
												<td style="text-align: left;">'.$exmData["exmDate"].'</td>
												<td style="text-align: left;">'.$exmData["exmSubject"].'</td>
												<td style="text-align: left;">'.$exmData["exmGroup"].'</td>
												<td style="text-align: left;">'.$exmData["exmSection"].'</td>
												<td style="text-align: left;">'.$exmData["exmVersion"].'</td>
												<td><button type="submit" class= "deleteBtn" data-id="'.$exmData["ID"].'">Delete</button></td>
											</tr>';
							}
						}
						echo '</table></div></div>';
						break;
					}	
				}		
			}				
		} 
	?>

</div>

<script>
    $(document).ready(function(){

		//Set exam exam month search Jquerry
		$(document).on("click",".deleteBtn", function(){
			if(confirm("Do you realy want to delete this exam?")){
				var exmId = $(this).data("id");
				var element = this;
				$.ajax({
					url: 'includes/exam.inc.php',
					type: 'POST',
					data: {exmDelete:"exmDelete", exmId: exmId},
					success: function(response){
						if(response == "true"){
							$(element).closest("tr").fadeOut();
						}
					}
				});
			}
		});


    });
</script>