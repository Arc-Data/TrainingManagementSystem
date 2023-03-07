<?php
session_start();
include "../templates/connection.php";

$cookie_name = "showInstructions";
$cookie_value = "true";
setcookie($cookie_name, $cookie_value, 0);

//reset cookie
//setcookie($cookie_name, $cookie_value, time() - 3600);


function noRecordAlert()
{
	echo "
	<div class='alert alert-warning alert-dismissible fade show d-flex align-items-center' role='alert'>
  		<strong>Sorry!&nbsp</strong> No Records found.
  		<button	type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	</div>
	";
}

function displayRow($result)
{
	$x = 0;
	global $val;
	global $rowInfo;

	$temp = strtoupper($val);
	if (mysqli_num_rows($result) > 0) { //counts resultsets; array(key,value)
		foreach ($result as $row) { //$row = mysqli_fetch_assoc; loop through each key/value pair
			++$x;
			$name = $row["fullname"];
			$course = $row["course_title"];
			$year = $row["year_certified"];
			/* $classnum = $row["class_number"]; */
			$student_id = $row['student_id'];
			$account_id = $row['account_id'];
			$rank = $row['rank'];
			$office = $row['office_name'];


			echo "
			<tr>
				<td>$x</td>
				<td>$name</td>
				<td>$course</td>
				<td>$year</td>
				<td>$student_id</td>
				<td>$account_id</td>
				<td>$rank</td>
				<td>$office</td>
				<td>
					<button type='button' class='mx-1 btn btn-warning' data-bs-toggle='modal' data-bs-target='#updateModal' data-stud='$student_id' data-acc='$account_id' data-rank='$rank' data-office='$office'>Update</button>
					<button type='button' class='mx-1 btn btn-danger' data-bs-toggle='modal'
					
					data-bs-target='#deleteModal' data-stud='$student_id' >Delete</button>
				</td>
			</tr>
			";

			$rowInfo[] = [$x => $student_id];
		}
		//print_r($rowInfo);

		echo "
			<div class='alert alert-info alert-dismissible fade show' role='alert'>
				Filtered by <strong>$temp</strong>
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			</div>
		";
	} else {
		noRecordAlert();
	}
}

if (isset($_GET['updateBtn'])) {

	//$con = mysqli_connect("localhost", "root", "", "project");
	include "../templates/connection.php";
	$query = "UPDATE student SET rank = '$_GET[rankname]', office_name= '$_GET[officename]' WHERE student_id = '$_GET[studname]'";

	$query_run = mysqli_query($conn, $query);
}


if(isset($_GET['deleteBtn'])){
	//$conn = mysqli_connect("localhost", "root", "", "project");
	include "../templates/connection.php";
    $id = $_GET['studid'];
    //$class_number = $_GET['classn'];

    // disable foreign key checks
    mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=0;');

    // delete the record from the registration_participants_class table
    //$query = "DELETE FROM registration_participants_class WHERE student_id = $id AND course_reg_id = $class_number";
	$query = "DELETE FROM registration_participants_class WHERE student_id = $id ";

    if(mysqli_query($conn,$query)){
		mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=1;');

		echo '<script>';
		echo 'document.addEventListener("DOMContentLoaded", function() {';
		echo '  document.getElementById("myModalBtn").click();';
		echo '});';
		echo '</script>';

	}else{
		mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=1;');

		echo '<script>';
		echo 'document.addEventListener("DOMContentLoaded", function() {';
		echo '  document.getElementById("myModalBtn2").click();';
		echo '});';
		echo '</script>';
	}
    
    // enable foreign key checks



	// header("Location: search_database.php");
	// exit;
    }

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SEARCH DATABASE</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<style>
		body {
			height: 100%;
            
            font-family: 'Montserrat', sans-serif;
		}
		.btnA, .btnB{
          background: #681A1A;
          color: white;
          display: block;
          font-size: 18px;
          border-radius: 5px;
          border: 1px solid #808080;
          padding: 10px 13px;
          width: 50%;
          margin: 0 auto;
		  margin-bottom: 20px;
        }
	
	</style>

</head>

<body>
<br><br><br><a href = "index.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Back to View</a>
	<?php include "../templates/navigation.php"; ?>
	<!--NAVBAR-->
	<!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #681A1A;">
		<a class="navbar-brand" href=#>Web Development</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#portfolio-nav" aria-controls="portfolio-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="portfolio-nav">
			<ul class="nav navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">HOME</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">STUDENT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">COURSE</a>
				</li>
				<li class=" nav-item">
					<a class="nav-link" href="#">INSTRUCTORS</a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						GENERATE REPORT
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">By Number of Participants per Course</a>
						<a class="dropdown-item" href="#">By Course conducted by Date Range</a>
						<a class="dropdown-item" href="#">By Participants of the Course</a>
						<a class="dropdown-item" href="#">By Pool Instructors per Course</a>
					</div>
				</li>
			</ul>

			<ul class="nav navbar-nav">
				<li>
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						PROFILE
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item">User Name</a>
						<a class="dropdown-item">User Type</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Log Out</a>
					</div>
				</li>
		</div>
	</nav> -->



	<!--SEARCH-->
	<div class="container-md d-flex flex-column my-5">
		<!--TITLE-->
		<div class="row-md my-5">
			<h1 class="display-3" style=" font-family: Montserrat;">Search for Enrolled Students</h1>
		</div>

		<!--SEARCH & FILTER-->
		<div class="row-md mb-3">
			<form method="get">
				<div class="input-group">
					<div class="col-3">
						<label for="search" class="form-label">Search:</label>
						<input type="text" required class="form-control" id="search" placeholder="example" name="inputs" value="<?php if (isset($_GET['inputs'])) {
																																	echo $_GET['inputs'];
																																} ?>">
					</div>
					<div class="col-0 align-self-end mx-2">
						<button type="submit" name="searchBtn" class="mx-1 btn btn-primary" style="background-color:#681a1a; border:none;">Enter</button>
					</div>
					<div class="col-2 align-self-end mx-0">
						<div class="dropdown">
							<label for="dropdown" class="form-label">Filter by:</label>
							<select name="dropdown" class="form-select" required>
								<option value="" hidden>- Select options -</option>
								<option value="name">Name</option>
								<option value="course">Course</option>
								<option value="year">Year</option>
								<!-- <option value="number">Class Number</option> -->
							</select>
						</div>
					</div>
				</div>
			</form>
		</div>

		<!--dismissing info alert-->
		<?php
		if (!isset($_COOKIE['showInstructions'])) {
			echo "
				<div class='alert alert-info alert-dismissible fade show' role='alert'>
					<strong>Instructions: </strong> Fill in both forms before entering.
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				</div>
			";
		}
		?>

		<!--TABLE-->
		<div class="row-md justify-content-center">
			<div class="table-responsive-md p-3 rounded bg-white shadow-lg">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Course</th>
							<th scope="col">Year</th>
							<!-- <th scope="col">Class Number</th> -->
							<th scope="col">Student ID</th>
							<th scope="col">Account ID</th>
							<th scope="col">Rank</th>
							<th scope="col">Office Name</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//$con = mysqli_connect("localhost", "root", "", "project");
						include '../templates/connection.php';
						$x = 0; //row number
						$rowInfo = array();

						//SUBMIT sends the form values to form handler
						//$_GET['inputs'] is set every after submit																								
						if (isset($_GET['inputs'])) {
							$inputs = $_GET['inputs'];
							$val = $_GET['dropdown'];

							//FILTER BY NAME
							if (strcmp($val, "name") == 0) { //if strings are equal
								//$query = "SELECT concat(A.firstname, ' ' , A.lastname) AS fullname, O.course_title, O.year_certified, I.class_number, S.student_id, A.account_id, S.rank, S.office_name
								$query = "SELECT concat(A.firstname, ' ' , A.lastname, ' ', A.suffix) AS fullname, O.course_title, O.year_certified,  S.student_id, A.account_id, S.rank, S.office_name
								FROM student AS S
								INNER JOIN account_details AS A
								ON S.account_id = A.account_id
								INNER JOIN registration_participants_class AS R
								ON S.student_id = R.student_id
								/* INNER JOIN class_information_details AS I
								ON R.student_reg_id = I.student_reg_id */
								INNER JOIN registration_course as C
								ON R.course_reg_id = C.course_reg_id
								INNER JOIN course AS O
								ON C.course_id = O.course_id
								WHERE concat(A.firstname, ' ' , A.lastname) LIKE '$inputs%';             
								"; //like - searches any value that starts with the input

								//resultset
								$query_run = mysqli_query($conn, $query);
								displayRow($query_run);
							} elseif (strcmp($val, "course") == 0) {
								$query = "SELECT concat(A.firstname, ' ' , A.lastname, ' ', A.suffix) AS fullname, O.course_title, O.year_certified, S.student_id, A.account_id, S.rank, S.office_name
								FROM student AS S
								INNER JOIN account_details AS A
								ON S.account_id = A.account_id
								INNER JOIN registration_participants_class AS R
								ON S.student_id = R.student_id
								INNER JOIN registration_course as C
								ON R.course_reg_id = C.course_reg_id
								INNER JOIN course AS O
								ON C.course_id = O.course_id
									WHERE O.course_title LIKE '$inputs%';             
								";
								$query_run = mysqli_query($conn, $query);
								displayRow($query_run);
							} elseif (strcmp($val, "year") == 0) {
								$query = "SELECT DISTINCT concat(A.firstname, ' ' , A.lastname, ' ', A.suffix) AS fullname, O.course_title, O.year_certified, S.student_id, A.account_id, S.rank, S.office_name
								FROM student AS S
								INNER JOIN account_details AS A
								ON S.account_id = A.account_id
								INNER JOIN registration_participants_class AS R
								ON S.student_id = R.student_id
								INNER JOIN registration_course as C
								ON R.course_reg_id = C.course_reg_id
								INNER JOIN course AS O
								ON C.course_id = O.course_id
									WHERE O.year_certified = '$inputs';           
								";
								$query_run = mysqli_query($conn, $query);
								displayRow($query_run);
							} elseif (strcmp($val, "number") == 0) {
								$query = "SELECT concat(A.firstname, ' ' , A.lastname, ' ', A.suffix) AS fullname, O.course_title, O.year_certified, S.student_id, A.account_id, S.rank, S.office_name
								FROM student AS S
								INNER JOIN account_details AS A
								ON S.account_id = A.account_id
								INNER JOIN registration_participants_class AS R
								ON S.student_id = R.student_id
								INNER JOIN registration_course as C
								ON R.course_reg_id = C.course_reg_id
								INNER JOIN course AS O
								ON C.course_id = O.course_id
									WHERE I.class_number = '$inputs';         
								";
								$query_run = mysqli_query($conn, $query);
								displayRow($query_run);
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- table navigation -->
		<div class="row-md my-2">
			<nav aria-label="Table navigation">
				<ul class="pagination justify-content-end">
					<li class="page-item disabled">
						<a class="page-link">Previous</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>
		</div>
		
	</div>

	<!--UPDATE-->
	<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="modalLabel"><strong>Update Student Information</strong></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method='get'>
						<div class="mb-3">
							<label for="student-id" class="col-form-label">Student ID:</label>
							<input type="text" class="form-control" id="student-id" name="studname" value="" readonly>
						</div>
						<div class="mb-3">
							<label for="account-id" class="col-form-label">Account ID:</label>
							<input type="text" class="form-control" id="account-id" name="accname" value="" readonly>
						</div>
						<div class="mb-3">
							<label for="rank-text" class="col-form-label">Rank:</label>
							<input type="text" class="form-control" id="rank-text" name="rankname" value="<?php $rank_input ?>">
						</div>
						<div class="mb-3">
							<label for="office-name" class="col-form-label">Office Name:</label>
							<input type="text" class="form-control" id="office-name" name="officename" value="<?php $office_input ?>">
						</div>
						<div class="justify-content-end">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="updateBtn" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		const updateModal = document.getElementById('updateModal')
		updateModal.addEventListener('show.bs.modal', event => {
			// Button that triggered the modal
			const button = event.relatedTarget
			// Extract info from data-bs-* attributes
			const stud = button.getAttribute('data-stud')
			const acc = button.getAttribute('data-acc')
			const rank = button.getAttribute('data-rank')
			const office = button.getAttribute('data-office')
			//
			// Update the modal's content.
			const studInput = updateModal.querySelector('.modal-body #student-id')
			const accInput = updateModal.querySelector('.modal-body #account-id')
			const rankInput = updateModal.querySelector('.modal-body #rank-text')
			const officeInput = updateModal.querySelector('.modal-body #office-name')
			studInput.value = stud
			accInput.value = acc
			rankInput.value = rank
			officeInput.value = office
		})
	</script>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method='get'>
						<h1 class="text-center">ARE YOU SURE YOU WANT TO DELETE THIS RECORD?</h1>
						<div class="mb-3">
							<input type="hidden" class="form-control" id="student-id" name="studid" value="" readonly>
						</div>
						<div class="mb-3">
							<input type="hidden" class="form-control" id="course-id" name="classn" value="" readonly>
						</div>
						<div class="justify-content-end">
						<button type="submit" name="deleteBtn" class="btn btn-primary btnA">YES</button>
							<button type="button" class="btn btn-secondary btnB" data-bs-dismiss="modal">NO</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<script>
		const deleteModal = document.getElementById('deleteModal')
		deleteModal.addEventListener('show.bs.modal', event => {
			// Button that triggered the modal
			const button = event.relatedTarget
			// Extract info from data-bs-* attributes
			const studs = button.getAttribute('data-stud')
			const cnum = button.getAttribute('data-classnum')
deleteModal
			//
			// Update the modal's content.
			const studInput = deleteModal.querySelector('.modal-body #student-id')
			const courseInput = deleteModal.querySelector('.modal-body #course-id')
			studInput.value = studs
			courseInput.value = cnum
		})
	</script>



	
	<script>
		const updateModal = document.getElementById('updateModal')
		updateModal.addEventListener('show.bs.modal', event => {
			// Button that triggered the modal
			const button = event.relatedTarget
			// Extract info from data-bs-* attributes
			var stud = button.data('stud')
			var acc = button.data('acc')
			var rank = button.data('rank')
			var office = button.data('office')
			// Update the modal's content.
  			const modalBodyInput = updateModal.querySelector('.modal-body input')

			modalBodyInput.value = id
		})
	</script>

    
<!-- Button to trigger the modal -->
<button id="myModalBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="display:none;">
  Open Modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Success</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>The student has been deleted successfully.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="redirect()">Okay</button>
      </div>
    </div>
  </div>
</div>

<!-- Button to trigger the modal -->
<button id="myModalBtn2" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2" style="display:none;">
  Open Modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Failed</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>The attempt to delete the student was unsuccessful.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="redirect()">Okay</button>
      </div>
    </div>
  </div>
</div>

<script>
function redirect() {
  window.location.href = 'search_database.php';
}
</script>
	

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>