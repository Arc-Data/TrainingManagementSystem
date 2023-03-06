<?php
//$connection = mysqli_connect("localhost:3308","root","","databasey");
include '../templates/connection.php';
?>

<table class="table table-stripped table-hover">
		    	<thead>
					<tr>
						<th>Course</th>
						<th>Rank</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Unit/Office</th>
					</tr>
				</thead>
<?php

	$sql = "SELECT * FROM student Inner Join account_details On student.account_id = account_details.account_id Inner Join registration_participants_class On registration_participants_class.student_id = student.student_id  
    Inner Join registration_course On registration_participants_class.course_reg_id = registration_course.course_reg_id
    Inner Join course On registration_course.course_id = course.course_id ";
    $result = $conn->query($sql);

    if (!$result) {
    die("Query failed: " . $conn->error);
    }
    

        while($row = $result->fetch_assoc()) {
            echo "<tr>

                <td>". $row["course_title"] ."</td>
                <td>". $row["rank"] ."</td>
                <td>". $row["lastname"] ."</td>
                <td>". $row["firstname"] ."</td>
                <td>". $row["middlename"] ."</td>
                <td>". $row["office_name"] ."</td>
            </tr>";
        }
    

header ('Content-Type:application/xls');
header ('Content-Disposition:attachment;filename=Course_Students.xls');
?>