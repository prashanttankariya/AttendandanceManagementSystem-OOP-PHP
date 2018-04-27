<?php  

	require 'config.php';

	$link 		= "btn btn-lg btn-info";
	$activelink = "btn btn-lg btn-default active";



	$index 				=     $link;
	$student 			=     $link;
	$attendance			=     $link;
	$department			=     $link;
	$semester 			=     $link;
	$batch 				=     $link;
	$program 			=     $link;
	$subject 			=     $link;




	$currentpage = basename($_SERVER['PHP_SELF'],".php");

	if ($currentpage	== "index") {
		 $index 	=  	$activelink;
	}

	if ($currentpage	== "student") {
		 $student 	=  	$activelink;
	}
	
	if ($currentpage	== "attendance") {
		 $attendance 	=  	$activelink;
	}
	
	if ($currentpage	== "department") {
		 $department 	=  	$activelink;
	}
	
	if ($currentpage	== "semester") {
		 $semester 	=  	$activelink;
	}
	if ($currentpage	== "batch") {
		 $batch 	=  	$activelink;
	}
	if ($currentpage	== "program") {
		 $program 	=  	$activelink;
	}	
	if ($currentpage	== "subject") {
		 $subject 	=  	$activelink;
	}





?>


	<div class="container-fluid" style="background-color:#123b47;font-family:calibri;">

			<nav class="nav nav-justified" style="margin-top:10px; margin-bottom:10px;">
			<a  style="width:120px;" class="<?php echo $index; ?>" href="index.php">Home</a>   
			<a  style="width:120px;" class="<?php echo $student; ?>" href="student.php">Student</a>   
			<a  style="width:120px;" class="<?php echo $attendance; ?>" href="attendance.php">Attendance</a>   
			<a  style="width:120px;" class="<?php echo $department; ?>" href="department.php">Department</a>   
			<a  style="width:120px;" class="<?php echo $batch; ?>" href="batch.php">Batch</a>   
			<a  style="width:120px;" class="<?php echo $program; ?>" href="program.php">Program</a>   
			<a  style="width:120px;" class="<?php echo $subject; ?>" href="subject.php">Subject</a>   
			<a  style="width:120px;" class="<?php echo $semester; ?>" href="semester.php">Semester</a>   
			</nav>
			
			






	 </div>