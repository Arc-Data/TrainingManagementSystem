<?php 
	session_start();
	require '../templates/connection.php';

	if(!isset($_POST['prerequisite_id'])) {
		header("location: index.php");
	}

	$id = $_GET['id'];
	$prereq = $_POST['prerequisite_id'];


	# code to check for prerequisite loop
	$prereq_id = $prereq;
	while($prereq_id) {
		$sql = "
			SELECT * FROM course 
			WHERE course_id = $prereq_id";
		$query = mysqli_query($conn, $sql);
		$course = mysqli_fetch_assoc($query);

		if($id == $course['pre_requisite_course']) {
			header("location: updateCourse.php?id=$id");
			$_SESSION['message'] = "Circular dependency detected. Unable to save pre requisite course.";
			exit();
		}
		$prereq_id = $course['pre_requisite_course'];
	}


 
	$sql = "
		UPDATE `course` 
		SET pre_requisite_course = $prereq 
		WHERE course_id = '$id'";  
	echo $sql;

	if(mysqli_query($conn, $sql)) {
		echo "We are here somehow";
	}

 ?>