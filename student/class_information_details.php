<?php 
  require '../templates/connection.php';
  require '../templates/header.php'; 

  if(!isset($_GET['regId']) && !isset($_GET['classId'])) {
    header("location: courses.php");
  }

  $registrationCourseId = $_GET['regId'];
  $classId = $_GET['classId'];

  if(isset($_POST['search']) ) {
    $firstname = $_POST['search'];
    $sql = "
      SELECT s.*, a.* 
      FROM student s
      JOIN account_details a 
      ON s.account_id = a.account_id
      WHERE a.firstname LIKE '{$_POST['search']}%'
    ";

    $searchStudents = mysqli_query($conn, $sql);
  }

  $sql = "
    SELECT DISTINCT a.firstname, a.lastname, s.student_id, rpc.student_reg_id
    FROM account_details a
    JOIN student s
    ON s.account_id = a.account_id
    JOIN registration_participants_class rpc
    ON rpc.student_id = s.student_id
    JOIN registration_course rc
    ON rc.course_reg_id = rpc.course_reg_id
    JOIN class_information_details c
    ON c.class_info_id = rpc.class_info_id
    WHERE c.class_info_id = $classId && rc.course_reg_id = $registrationCourseId
    ";

  $registeredStudents = mysqli_query($conn, $sql);


  $sql = "
    SELECT *
    FROM class_information_details
    WHERE class_info_id = $classId
  ";

  $query = mysqli_query($conn, $sql);
  $classInfo = mysqli_fetch_assoc($query);

?>

<style>
  td {
    border: 2px solid #DBDBDB;
    border-left: none; 
    border-right: none;
    border-bottom: none;
  }
  #delete_btn{
    background-color: #681A1A;
    font-weight: 500;
  }
  #delete_btn:hover{
    background-color: white;
    color: #681A1A;
    border-color: #681A1A;
    font-weight: 500;
  }
</style>
</head>
<body style ="font-family: Montserrat;">
  <?php include "../templates/navigation.php"; ?>
  <div class="container p-5 mt-5">
<<<<<<< HEAD
    <a href="course-registration-details.php?id=<?= $classId ?>" class="mt-5 pt-5" style="color: #681A1A; text-decoration:none" >
=======
    <a href="course-registration-details.php?id=<?= $registrationCourseId ?>" class="mt-5 pt-5" style="color: #681A1A; text-decoration:none" >
>>>>>>> c32738bd24dbf024f88372fd8c4c6089777bdb8a
      &#8592; Back to View Course
    </a>

    <h1 class="mt-5 mb-4" style = 'font-size:50px; color: #681A1A; font-weight:700'>
      Class Information Details
    </h1>
    <div class="row w-75 fs-6" style="font-weight:500;">
      <div class="col">
          CLASS ID
      </div>
      <div class="col fw-bold">
          <?= $classInfo['class_info_id'] ?>
      </div>
    </div>
    <div class="row w-75 fs-6" style="font-weight:500;">
      <div class="col">
          LETTER ORDER NUMBER
      </div>
      <div class="col fw-bold">
          <?= $classInfo['letter_order_number'] ?>
      </div>
    </div>
    <div class="row w-75 fs-6" style="font-weight:500;">
      <div class="col">
          GENERAL ORDER
      </div>
      <div class="col fw-bold">
          <?= $classInfo['general_order'] ?>
      </div>
    </div>
    <div class="row w-75 fs-6 mb-5" style="font-weight:500;">
      <div class="col">
          CERTIFICATION CONTROL NUMBER
      </div>
      <div class="col fw-bold">
          <?= $classInfo['cert_ctrl_no'] ?>
      </div>
    </div>

    <!-- <div class="row row-cols-2 w-50 my-4">
        <div class="col-md-auto">
          <button class="btn pe-4 ps-4" style="font-weight: 600; border: 2px solid #681A1A; border-radius: 10px; color:#681A1A; height: 50px;">UPDATE</button>
        </div>
        <div class="col-md-auto">
          <button class="btn pe-4 ps-4" style="font-weight: 600; background-color:#681A1A; border-radius: 10px; color:white; height: 50px;">DELETE</button>
        </div>
    </div> -->
    <div class="row w-75 mb-2">
      <h2 class="" style = 'font-size:30px; font-weight: 700'>
        Registered Students
      </h2>
    </div>
    
    <div class="row w-75 fs-6 mt-4">
      <div class="">
        <table class='table' style="border-radius: 10px; outline: 2px solid #DBDBDB;">
            <thead>
                <tr>
                    <th class="ps-3" style="height:50px;">ID</th>
                    <th class="ps-3" style="height:50px;">NAME</th>
                </tr>
            </thead> 
                  
            <tbody>
              <?php $affected = mysqli_num_rows($registeredStudents);
                    if ($affected) {
                      while ($students = mysqli_fetch_assoc($registeredStudents)) { ?>
                    <tr>
                      <td class="ps-3"><?= $students['student_id'] ?></td>
                      <td class="ps-3"><?= $students['firstname'] . " " . $students['lastname']  . " " . $students['student_reg_id'] ?></td>
                      <td>
                        <form action="register-student.php" method="POST">
                          <input type="hidden" name = "student_reg_id" value="<?= $students['student_reg_id'] ?>">
                          <input type="hidden" name="classId" value = "<?= $classId ?>">
                          <input type="hidden" name = "regId" value="<?= $registrationCourseId ?>">
                          <button style="border:2px solid #681A1A;" class = "btn btn-primary" id = "delete_btn" type = "submit" name = "delete-student">Delete Registration</button>
                        </form>
                      </td>
                    </tr>  
              <?php  } ?>
              <?php } else { ?>
                  <tr>
                    <td class="ps-3">N/A</td>
                    <td class="ps-3">N/A</td>
                  </tr>
              <?php } ?>
            </tbody>
        </table>  
      </div>

    <div class="row w-75 fs-6 mt-4">
      <h2 class="" style = 'font-size:30px; font-weight: 700'>
        Add Students
      </h2>
      <form method = "POST" action = "class_information_details.php?regId=<?= $registrationCourseId ?>&classId=<?= $classId ?>">
        <div class="col pt-2 pb-2">
          <div class="input-group">
            <span class="input-group-append">
              <span class="btn" id="search-icon" style="opacity: 50%; padding:12px; margin-left: 5px; position:absolute;">
                <i class="fa fa-search"></i>
              </span>
            </span>
            <input class="fs-6 w-100" type="search" id="search-bar" placeholder="Search for student" name='search' style="padding: 5px 45px; height:50px; border-radius:10px; border: 2px solid #DBDBDB;">
          </div>
        </div>
      </form>
    </div>
    <?php if(isset($_POST['search'])): ?>
    <div class="row w-75 fs-6 mt-3">
      <a class="mb-3" href="class_information_details.php?regId=<?= $registrationCourseId ?>&classId=<?= $classId ?>">Clear results</a>
      <div class="">
        <table class='table' style="border-radius: 10px; outline: 2px solid #DBDBDB;">
            <thead>
                <tr>
                    <th class="ps-3" style="height:50px;">ID</th>
                    <th class="ps-3" style="height:50px;">NAME</th>
                    <th></th>
                </tr>
            </thead> 
                  
            <tbody>
              <?php while ($student = mysqli_fetch_assoc($searchStudents)) { ?>
              <tr>
                <td class="ps-3"><?= $student['student_id'] ?></td>
                <td class="ps-3"><?= $student['firstname'] . " " . $student['lastname']?></td>
                <td>
                  
                  <form method = "POST" action = "register-student.php">
                    <input type="hidden" name="regId" value = "<?= $registrationCourseId ?>">
                    <input type="hidden" name="classId" value = "<?= $classId ?>">
                    <input type="hidden" name = "studentId" value="<?= $student['student_id'] ?>">
                    <button class="p-1 pe-3 ps-3"type = "submit" name = "add-student" style="background-color:#681A1A; color:white; border-radius: 10px; border: 2px solid #681A1A;">Add Student</button>
                  </form>
                  
                </td>
              </tr>  
              <?php } ?>
            </tbody>
        </table>  
      </div>
    <?php endif ?>
  </div>
</body>