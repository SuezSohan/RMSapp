<link rel="stylesheet" type="text/css" href="assets/css/exam-result.css">
<link rel="stylesheet" type="text/css" href="assets/css/viewTable.css">
 
<?php

	if(isset($_POST["exmMonthSearch"])){
		$exmMonth = $_POST["exmMonth"];
	}else{
		$exmMonth = $_REQUEST["exmMonth"];
	}

	$usrId = $_REQUEST["stdUsrId"];
	$stdInfo = $exmResultContr->getStdInfoContr($usrId);

	$stdId = $stdInfo[0]["ID"];
	$exmDates =  $exmResultContr->getExamDateContr($stdId, $exmMonth);

	if(!empty($exmDates)){
		$stdMeritPosition =  $exmResultContr->stdMeritPosition($stdId, $stdInfo[0]["stdClass"], $stdInfo[0]["stdGroup"], $stdInfo[0]["stdSection"], $stdInfo[0]["stdVersion"], $exmMonth);
		$monthlyObtained = $exmResultContr->monthlyObtainedContr($stdId, $exmMonth);
		$monthlyTotalMarks = $exmResultContr->getMonthlyTotalMarksContr($stdId, $exmMonth);
		$monthlyGpa =  $exmResultContr->monthlyGpa($stdId, $exmMonth);
	}
?>

<?php if(!empty($exmDates)){ ?>
	<div>
		<div style="margin-bottom: 0px;" class="viewTableContainer">
			<h2 style="text-align: center; padding: 24px 0px 30px;">Monthly Exam Result</h2>
			<table style="width: 825px;" class="infoViewTable" border="1">
				<tr>
					<td>Student Id</td>
					<td><?php echo $stdInfo[0]["ID"]; ?></td>
					<td>Class</td>
					<td><?php echo $stdInfo[0]["stdClass"]; ?></td>
					<td>Group</td>
					<td><?php echo $stdInfo[0]["stdGroup"]; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td colspan="3"><?php echo $stdInfo[0]["stdName"]; ?></td>
					<td>Section</td>
					<td><?php echo $stdInfo[0]["stdSection"]; ?></td>
				</tr>
				<tr>
					<td>Total Marks</td>
					<td><?php echo $monthlyTotalMarks[0]["monthlyTotalMarks"];?></td>
					<td>Exam Month</td>
					<td><?php echo $exmMonth; ?></td>
					<td>Version</td>
					<td><?php echo $stdInfo[0]["stdVersion"]; ?></td>
				</tr>
				<tr>
					<td>Obtained Marks</td>
					<td><?php echo $monthlyObtained[0]["monthlyObtained"]; ?></td>
					<td>GPA</td>
					<td><?php echo round($monthlyGpa, 2); ?></td>
					<td>Session</td>
					<td><?php echo $stdInfo[0]["stdSession"]; ?></td>
				</tr>
				<tr>
					<td>Merit Position</td>
					<td><?php echo $stdMeritPosition; ?></td>
					<td>Institute</td>
					<td colspan="3"><?php echo $stdInfo[0]["stdInstitute"]; ?></td>
				</tr>
			</table>
		</div>
		
		<?php

			foreach($exmDates as $dateData){
				echo '<div class="resultTableContainer">';
					echo '<table class="resultTable" border="">
						<tr>
							<th style="width: 250px;" rowspan="2">Subjects</th>
							<th colspan="6">'.$dateData["exmDate"].'</th>
						</tr>
						<tr>
							<th>Total Marks</th>
							<th>Highest Obtained</th>
							<th>Obtained Marks</th>
							<th>Percentage</th>
							<th>Grade</th>
							<th style="width:91px">Grade Point</th>
						</tr>';
						
						$x = 0;
						$sumTotalMarks = 0; $sumObtainedMarks = 0; $sumGrades = 0; $multGrade = 1;

						$marksInfo =  $exmResultContr->getMarksInfoContr($stdId, $dateData["exmDate"]);
						foreach($marksInfo as $marksData){
							$x++;
							$pecentage = round(($marksData["obtainedMarks"]/$marksData["totalMarks"])*100, 2);

							$highestMark =  $exmResultContr->getHighestMarkContr($marksData["exmSubject"], $stdInfo[0]["stdClass"], $stdInfo[0]["stdGroup"], $stdInfo[0]["stdSection"], $stdInfo[0]["stdVersion"], $dateData["exmDate"]);
							$grade =  $exmResultContr->gradeCount($pecentage);
							$gradePoint =  $exmResultContr->gradePointCount($pecentage);

							$sumTotalMarks = $sumTotalMarks + $marksData["totalMarks"]; $sumObtainedMarks = $sumObtainedMarks  + $marksData["obtainedMarks"]; 
							$sumGrades = $sumGrades + $gradePoint;
							$multGrade = $multGrade * $gradePoint;
							
							echo '<tr>
								<td style="text-align: left; padding-left:10px">'.$marksData["exmSubject"].'</td>
								<td >'.$marksData["totalMarks"].'</td>
								<td>'.$highestMark[0]["highest"].'</td>
								<td>'.$marksData["obtainedMarks"].'</td>
								<td>'.$pecentage.'%</td>
								<td>'.$grade.'</td>
								<td>'.$gradePoint.'</td>
							</tr>';
						}
						$sumPecentage = round(($sumObtainedMarks/$sumTotalMarks)*100, 2);
						if($multGrade == 0){ $gpa = 0;}else{$gpa = $sumGrades/$x;}

						$totalGrade =  $exmResultContr->totalGrade($gpa);

						echo '<tr style="font-weight: bold;">
							<td style="text-align: left; padding-left:10px">Grand Total</td>
							<td>'.$sumTotalMarks.'</td>
							<td>-</td>
							<td>'.$sumObtainedMarks.'</td>
							<td>'.$sumPecentage.'%</td>
							<td>'.$totalGrade.'</td>
							<td>GPA: '.round($gpa, 2).'</td>
						</tr>
					</table>';
				echo '</div>';
			}
		?>
</div>
<?php }else{ echo'<div class="notFound"><h2>Result Not Found</h2></div>';} ?>

<div style="width: 420px;margin: auto;padding: 0px 0px 32px;">
	<form class="monthSearch" action="" method="post">
		<input type="month" name="exmMonth" required>
		<button type="submit" name="exmMonthSearch">Search Other Months</button>
	</form>
</div>
