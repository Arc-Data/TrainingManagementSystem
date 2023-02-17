<?php 

	require 'templates/connection.php'

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Training Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src = "assets/js/training-form.js" defer></script>
</head>
<body>

	<dialog id = 'training-form'>
		<form method = "POST" action = "code.php">

			<div class="form-container">
				<h2> ADD TRAINING FORM </h2>
				<br>
				<div class = "form-row">
					<label style='font-size: 17px;' for = 'course-title'>Course Title*</label>
					<input style='font-size: 17px;' type="text" name="course_title" id ='course-title' required>
				</div>
				<div class = "form-row">
					<label style='font-size: 17px;' for = 'number-of-days'>Number of Days*</label>
					<input style='font-size: 17px;' type="number" name="number_of_days" id ='number-of-days' required>
				</div>
				<div class = "form-row">
					<label style='font-size: 17px;' for = 'mtap-course'>MTAP Course*</label>
					<input style='font-size: 17px;' type="text" name="mtap_course" id ='mtap-course' required>
				</div>
				<div class = "form-row">
					<label style='font-size: 17px;' for = 'mtap-course'>Implementation*</label>
					<input style='font-size: 17px;' type="text" name="implementation" id ='Implementation' required>
				</div>
	
				<br><br>
				<center>
				  <button style='
            font-size: 15px; 
            background-color: #0055b3;  
            height: 35px; 
            border: 1px; 
            border-radius: 5px; 
            width: 25%;
            ' 
            name="save_student" type = "submit" class="btn btn-primary" >Submit</button> 
        </center>
	
		</form>
	</dialog>

	<div class="container py-5">
   <div class="row py-5">
    <div class="col-lg-10 mx-auto">
	     <h1> Course Management </h1><br>
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="myTable" style="width:100%" class='table borderless'>
			         <button id = 'create-training-button' class= 'button1'> <i class="fa fa-plus"></i> ADD COURSE</button>
                <div class="form-group has-search">
                  <span class="fa fa-search form-control-feedback"></span>
			            <input type="text" id="myInput"  class="fa fa-search icon" onkeyup="myFunction()"  placeholder="Search for training.. " >
                </div>
		
              <thead>
                <tr>
				          <th>COURSE ID</th>
				          <th>COURSE TITLE</th>
                  <th>DURATION</th>
                  <th>MTAP COURSE</th>
                  <th>PREREQUISITE</th>
                  <th>IMPLEMENTATION</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM course";
                  $query_run = mysqli_query($conn, $query);

                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $student)
                    {
                        ?>
                        <tr>
											    <td><?= $student['course_id']; ?></td>
                          <td><?= $student['course_title']; ?></td>
                          <td><?= $student['number_of_days']; ?></td>
                          <td><?= $student['mtap_course']; ?></td>
                          <td><?= $student['pre_requisite_course']; ?></td>
												  <td><?= $student['implementation']; ?></td>
												</tr>
                      <?php
                    }
                      }
                        else
                          {
                            echo "<h5> No Record Found </h5>";
                          }
                      ?>
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>