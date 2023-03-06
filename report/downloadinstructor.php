<?php
//$connection = mysqli_connect("localhost:3308","root","","databasey");
include '../templates/connection.php'
?>
    <table class="table table-stripped table-hover">
		    	<thead>
					<tr>
						<th>Course</th>
						<th>Rank</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<!-- <th>Designation</th> -->
					</tr>
				</thead>
<?php
	$sql = "SELECT * FROM pool_instructor_details Inner Join account_details On pool_instructor_details.account_id = account_details.account_id Inner Join registration_course On registration_course.instructor_id = pool_instructor_details.instructor_id  
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
                
            </tr>";
        
        }
        header ('Content-Type:application/xls');
        header ('Content-Disposition:attachment;filename=Course_Instructors.xls');
?>