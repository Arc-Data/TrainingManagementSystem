<?php 
  session_start();
	require '../templates/connection.php';
  require '../templates/header.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  else{
     header("Location: index.php");
  }

  $query = "SELECT * FROM `course` WHERE course_id='$id' ";
  $query_run = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($query_run);
?>

<link rel="stylesheet" type="text/css" href="../assets/css/update_course_style.css">
</head>
<body style="font-family: Montserrat; overflow-x:hidden; background-color:#fffcfa">
<?php include '../templates/navigation.php' ?>
<?php include('../assets/popup/message.php'); ?>

<div class="box m-5 p-5">
  <div class="row p-5" style="background-color:#681a1a; color: white; border-radius:10px;">
      <p><?= $id . " - " . $result['course_title'] ?></p>
      <h1 style = 'font-size:48px'>
        Update Course
      </h1>
      <a href="viewrecord.php?id=<?= $id;?>" style = "color:white !important; text-decoration:none" >
        &#8592; Back to View Course
      </a>
  </div>
  <div class="container mt-4 pe-5 ps-5" style="background-color:#fffcfa;">
      <div class="row mt-1">
        <div class="col me-5 fs-5">
          <form action="code.php" method ="POST">
            <input type="hidden" value="<?php echo $id?>" name="id">
            <div class="row-box mb-3">
              <label class = "fw-bold fs-5 mb-2" for='course-title'>Course Title <span class="asterisk"> *</span></label>
              <input class = "fs-5 p-2" value="<?php echo $result['course_title']?>" type="text" name="course_title" id='course-title' required>
            </div>

            <div class="row-box mb-3">
              <label class = "fw-bold fs-5 mb-2" for='number-of-days'>Number of Days to Complete <span class="asterisk"> *</span></label>
              <input class = "fs-5 p-2" value="<?php echo $result['number_of_days']?>" type="number" name="number_of_days" id='number-of-days' required>
            </div>

            <div class="row-box mb-3">
              <label class = "fw-bold fs-5 mb-2" for='course-title'>Year Certified <span class="asterisk"> *</span></label>
              <input class = "fs-5 p-2" value="<?php echo $result['year_certified']?>" type="number" name="year_certified" id='year_certified' required>
            </div>

            <div class="row-box mb-3">
              <label class = "fw-bold fs-5 mb-2" for='implementation'>Implementation</label>
              <input class = "fs-5 p-2" value="<?php echo $result['implementation']?>" type ="text" name="implementation" id='implementation'></input>
            </div>

            <div class="row-box mb-3">
              <label class = "fw-bold fs-5 mb-2" for='course-title'>Year Certified <span class="asterisk"> *</span></label>
              <input class = "fs-5 p-2" value="<?php echo $result['implementation_year']?>" type="number" name="implementation_year" id='implementation_year' min = "<?= date('Y') ?>" required>
            </div>

            <div class="d-flex align-items-center mb-3 form-check fs-5">
              <input class = "form-check-input" value="<?php echo $result['mtap_course']?>" type="checkbox" name="mtap_course" id='mtap-course' style = "width:30px; height:30px"></input>
              <label class = "fw-bold form-check-label m-2"  for='mtap-course'>MTAP Course</label>
            </div>
            <button type="submit" name="update_course" class="save-changes-btn mt-4 fs-5">
              Save Changes
            </button>
          </form>
        </div>
        <div class="col">
          <?php if(!$result['pre_requisite_course']) { ?>
          <form method ="POST" action ="updateCourse.php?id=<?= $id ?>">
            <div class="row-box">
              <label class = "fs-5 fw-bold mb-2">Course Prerequisites <label class="asterisk"> *</label></label>
              <div class="row">
                <div class="input-group">
                  <span class="input-group-append">
                    <span class="btn" id="search-icon">
                          <i class="fa fa-search"></i>
                    </span>
                  </span>
                  <input class="fs-5" type="search" id="search-input" placeholder="Enter course name or id" name = 'course'>
                </div>
              </div>
            </div>
          </form>
          <div class = "list-group overflow-auto fs-5 me-2" style ='max-height:300px;'>
          <?php 
            if(isset($_POST['course'])) {
              $course = $_POST['course'];
              $sql = "
                SELECT * 
                FROM course
                WHERE (course_title LIKE '%$course%' 
                OR course_id = '$course')
                AND course_id <> '$id'; 
                ";
              $query = mysqli_query($conn, $sql);
              
              
              while($course = mysqli_fetch_assoc($query)) { ?>
                <form method ="POST" action ="setPrerequisite.php?id=<?= $id  ?>">
                  <input type="hidden" name="prerequisite_id" value ="<?= $course['course_id'] ?>">
                  <button type = "submit" class="list-group-item list-group-item-action fs-5" style="padding: 8px; padding-left: 15px;text-align:left; border: 1px solid lightgray;">
                    <h6><?= $course['course_id'] . " - " . $course['course_title'] ?></h6>
                  </button>
                </form>
              <?php } ?>
            <?php } ?>
          </div>
        <?php } else {?>
          <div>
            <div class="overflow-auto mb-2 fs-5" style='max-height: 300px;'><strong>Prerequisite</strong></div>
            <div>
              <?php 
                $pre_req = $result["pre_requisite_course"];
                while($pre_req) {
                  $sql = "SELECT * FROM course WHERE course_id = '$pre_req'";
                  $query = mysqli_query($conn, $sql);
                  $course = mysqli_fetch_assoc($query);
                ?>
                  <div class="row-box mb-2 fs-5 p-2 ps-3" style="background: #f0dcdc; border-radius: 7px; padding: 10px; padding-left:20px;";><?= $course['course_title'] ?></div>
                <?php 
                  $pre_req = $course['pre_requisite_course'];
                }
                ?>
                <form method="POST" action ="clear.php">
                  <input type="hidden" name="id" value ="<?= $result['course_id'] ?>">
                  <button class="mt-4 fs-5" id="clear-btn" >Clear Pre-requisite</button>
                </form>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>    
    </div>
  </div>
</body>
</html>