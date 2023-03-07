<?php 
	session_start();
	require '../templates/connection.php';
	require '../templates/header.php';

	// alter query based on whether search value is present 

	if(isset($_GET['search']) && !empty($_GET['search'])) {
		$_SESSION['search'] = $_GET['search'];	
		$searchQuery = "SELECT * FROM `course` WHERE course_title LIKE '%{$_GET['search']}%' ";
	}  else {
		unset($_SESSION['search']);
		$searchQuery = "SELECT * FROM `course` ";
	}

	// querying displayed data per page

	// edit this to change number of items per page
	$itemsPerPage = 5;
	$allItems = mysqli_query($conn, $searchQuery);
	$total = mysqli_num_rows($allItems);
	$totalPages = ceil($total/$itemsPerPage);

	if(isset($_GET['page']) && !empty($_GET['page'])) {
	$page = (int) $_GET['page'];
	} else {
	$page = 1;
	}

	$offset = ($page - 1) * $itemsPerPage;

	$query = $searchQuery . " LIMIT $itemsPerPage OFFSET $offset";

	$result = mysqli_query($conn, $query);

	function retainSearch() {
		if(isset($_SESSION['search'])) {
			return '&search=' . $_SESSION['search'];
		}
	}

?>

<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
	<?php include '../assets/popup/message.php';?>
	<?php include '../templates/navigation.php';?>
	<dialog id ='training-form'>
		<form method = "POST" action = "code.php">
			<div class="form-container">
				<h2> ADD TRAINING FORM </h2>
				<div class = "form-row mt-3">
					<label for = 'course-title' class = "fw-bold" style="color: #5B5B5B">Course Title <span class="asterisk">*</span></label>
					<input style='font-size: 17px;' type="text" name="course_title" id ='course-title' placeholder = "Enter Course Title"required>
				</div>
				<div class = "form-row mt-2">
					<label for = 'number-of-days' class = "fw-bold" style="color: #5B5B5B" >Number of Days <span class="asterisk">*</span></label>
					<input style='font-size: 17px;' type="number" name="number_of_days" id ='number-of-days' required>
				</div>
				<div class = "form-row mt-2">
					<label for = 'mtap-course' class = "fw-bold" style="color: #5B5B5B"> Implementation</label>
					<select class = "fs-5 p-2" name = "implementation" id = "implementation" required>
						<option value = "" disabled>Select Implementation Period</option>
						<option value = "1">1st Quarter</option>
						<option value = "2">2nd Quarter</option>
						<option value = "3">3rd Quarter</option>
						<option value = "4">4th Quarter</option>
					</select>
				</div>
				<div class="form-row">
					<label for = 'implementation_year' class = 'fw-bold' style = "color:#5b5b5b">Implementation Year</label>
					<input type="number" name="implementation_year" id = "implementation_year" class = "fs-5 p-2" placeholder = "<?= date('Y') ?>" min = "<?= (int)date('Y') ?>" >
				</div>
				<div class = "mt-5 form-check">
					<input type="checkbox" name="mtap_course" id = "mtap_course" class = "form-check-input" style = "height:20px; width:20px; margin-right:10px">
					<label class = "form-check-label fs-5 fw-bold" style  ="color:#5b5b5b;" for = "mtap-course" required> MTAP Course</label>
				</div>
				<br>
				<center>
				  <button name="save_course" type = "submit" class="btn btn-primary mt-3" id="submit-btn" >Submit</button> 
        </center>
			</div>
		</form>
	</dialog>

	<div class="container mt-5 pt-5">
		<div class="row">
				<div class="col-2">
    			<button id = 'create-training-button' class= 'button1'> ADD COURSE</button>
				</div>
				<div class="col-3 p-0">
				<button onclick="window.location.href='index.php';" class="button2"> <i class="fa fa-refresh"></i></button>
				</div>
				<div class="form col-10">
					<form method = "GET" action = 'index.php'>
							<input 
									type="search" 
									id="myInput"  
									class="form-control form-input" 
									placeholder="Search for training..." 
									name = "search"

									<?php if(isset($_SESSION['search'])) { ?>
										value = "<?= 	$_SESSION['search'] ?>"
									<?php }	?>
							>
					</form>
				</div>
		</div>
	</div>
  <div class="container my-3">
    <div class="row">
      <div class="col-lg-10 mx-auto">
				<div class="table-responsive">
					<table class='table'>
						<thead>
							<tr>
								<th style='width: 30%'>COURSE TITLE</th>
								<th>DURATION</th>
								<th>YEAR CERTIFIED</th>
								<th>PREREQUISITE</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php 
							if($total > 0) {
								foreach($result as $student) {
						?>
							<tr>
								<td class = "fs-5" ><?= $student['course_title']; ?></td>
								<td class = "fs-5"><?php echo $student['number_of_days'] . " days"; ?></td>
								
								<td class = "fs-5">
									<?php 
										$timestamp = strtotime($student['year_certified']); 
										echo date("Y", $timestamp);
									?>
								</td>
								<td class = "fs-5"> 
								<?php 	 ?>
									<?php 
									if($student["pre_requisite_course"]) { ?>	
										<?php
											$ctr = 0; 	
											$pre_req = $student["pre_requisite_course"];
										while($ctr < 3 && $pre_req) {
											$sql = "SELECT * FROM `course` WHERE course_id = '$pre_req'";
											$query = mysqli_query($conn, $sql);
											$course = mysqli_fetch_assoc($query); ?>
											<?php if($ctr == 2) {
												echo '<br>';
											} ?>
											<span class="badge bg-secondary">
												<?php	echo $course["course_title"];?>
											</span>
											<?php $ctr++;?>
											<?php $pre_req = $course['pre_requisite_course']; ?>
										<?php } ?>
									<?php } ?>
								</td>
								<td class = "fs-5">	
								<a href="viewrecord.php?id=<?= $student['course_id']; ?>" class="btn btn-primary">VIEW</a>
								</td>
							</tr>
							<?php }
								}
							?>
						</tbody>
					</table>
				</div>
				
				<?php
					// Display no course message if no course returned
					if($total == 0) {
						echo 
						'<div class="container h-100 d-flex">
    						<div class="jumbotron my-auto mx-auto">
								<h1 id="noCourseFoundHeading" class="text-center mb-0"> Course not found </h1>
								<p id="noCourseFoundSub" class="text-center mt-0"> No records found in database </p>
    						</div>
						</div>';
					}
				?>
				<nav class = "my-3">
					<ul class="pagination justify-content-center pagination-md">
					<?php if($page > 1) { ?>
						<li class="page-item">
							<a class="page-link" href = "index.php?page=<?= $page - 1 . retainSearch() ?>">
								<i class="fa-solid fa-angle-left"></i>
							</a>
						</li>
					<?php } ?>
					<?php if($page - 2 > 0) { ?>
						<li class="page-item">
							<a class="page-link" href = "index.php?page=<?= $page - 2 . retainSearch() ?>">
								<?= $page - 2 ?>
							</a>
						</li>
					<?php } ?>
					<?php if($page - 1 > 0) { ?>
						<li class="page-item">
							<a class="page-link" href = "index.php?page=<?= $page - 1 . retainSearch() ?>">
								<?= $page - 1 ?>
							</a>
						</li>
					<?php } ?>
						<li class="page-item  active">
							<a class="page-link" href = "index.php?page=<?= $page . retainSearch() ?>">
								<?=	$page ?>
							</a>
						</li>
					<?php if($page + 1 <= $totalPages) { ?>
						<li class="page-item">
							<a class="page-link" href = "index.php?page=<?= $page + 1 . retainSearch() ?>">
								<?= $page + 1 ?>
							</a>
						</li>
					<?php } ?>
					<?php if($page + 2 <= $totalPages) { ?>
						<li class="page-item">
							<a class="page-link" href = "index.php?page=<?= $page + 2 . retainSearch() ?>">
								<?= $page + 2 ?>
							</a>
						</li>
					<?php } ?>
					<?php if($page < $totalPages) { ?>
						<li class="page-item">
							<a class="page-link" href = "index.php?page=<?= $page + 1 . retainSearch() ?>">
								<i class="fa-solid fa-angle-right"></i>
							</a>
						</li>
					<?php } ?>
					</ul>
				</nav>				
			</div>
		</div>
	</div>
	<script type="text/javascript" src = "../assets/js/message.js"></script>
	<script type="text/javascript" src = "../assets/js/training-form.js" defer></script>
</body>
<footer>
      <div class="custom-shape-divider-bottom-1676706408">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
          <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
          <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
          </svg>
      </div>
    </footer>
</html>