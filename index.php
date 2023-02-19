<?php 

	require 'templates/connection.php';
	require 'templates/header.php';

	session_start();

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
	$itemsPerPage = 4;
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

<body class = "py-5">
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
            background-color: #681a1a;  
            height: 35px; 
            border: 1px; 
            border-radius: 5px; 
            width: 25%;
            ' 
            name="save_student" type = "submit" class="btn btn-primary" >Submit</button> 
        </center>
		</form>
	</dialog>

	<div class="container mt-5 pt-5">
		<div class="row">
				<div class="col-2">
    			<button id = 'create-training-button' class= 'button1'> ADD COURSE</button>
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
					<table id="myTable" style="width:100%" class='table borderless'>
						<colgroup>
							<col/>
							<col span = '4' style = 'color:#5b5b5b' />
						</colgroup>
						<thead>
							<tr>
								<th scope = 'col' class = "fw-semibold">COURSE TITLE</th>
								<th scope = 'col' class = "fw-semibold">DURATION</th>
								<th scope = 'col' class = "fw-semibold">MTAP COURSE</th>
								<th scope = 'col' class = "fw-semibold">YEAR CERTIFIED</th>
								<th scope = 'col' class = 'fw-semibold'>PREREQUISITE</th>
								<th scope = 'col' class = 'fw-semibold'>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							if($total > 0) {
								foreach($result as $student) {
						?>
							<tr>
								<td class = "fs-5 fw-bold"><?= $student['course_title']; ?></td>
								<td class = "fs-5"><?= $student['number_of_days'] . " days"; ?></td>
								<td class = "fs-5"><?= $student['mtap_course']; ?></td>
								<td class = "fs-5"></td>
								<td class = "fs-5"><?= $student['pre_requisite_course']; ?></td>
								<td class = "fs-5">	
								<a href="viewrecord.php?id=<?= $student['course_id']; ?>" class="btn btn-primary">VIEW</a>
								</td>
							</tr>
							<?php }
								} else {
										echo "<h5> No Record Found </h5>";
									}
							?>
						</tbody>
					</table>
				</div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>