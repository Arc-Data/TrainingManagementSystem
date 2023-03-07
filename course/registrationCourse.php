<?php 
  session_start();
	require '../templates/connection.php';
	require '../templates/header.php';

  
  if(!isset($_GET['id'])) {
    // insert session message here about having an invalid id
    header("location: index.php");
  }

  $course_id = $_GET['id'];
  $sql = "SELECT * FROM course WHERE course_id = $course_id";
  $query = mysqli_query($conn, $sql);
  $course = mysqli_fetch_assoc($query);

  if(!$course) {
    // insert session message here about having id not found
    header("location: index.php");
  }

  $sql_instructor = "
  SELECT 
  a.firstname, a.lastname, i.instructor_id
  FROM pool_instructor_details AS i, account_details as a 
  WHERE a.account_id = i.account_id;
  ";

$instructors = mysqli_query($conn, $sql_instructor);

?>  

<link rel="stylesheet" type="text/css" href="../assets/css/registration_course_style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css">
</head>
 
<body>
  <script>
     $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
    });
  </script>
  <?php include('../templates/navigation.php');?>
  <div class="container-fluid" id="container">
    <div class="row align-items-center" style="background-color: white">
      <div class="col pe-5 ps-5">
        <div class="row">
          <a class="fs-5 pe-5 ps-5" href="viewRecord.php?id=<?= $course_id ?>" style="text-decoration:none; color:#681A1A;">  
            &#8592; Back to View
          </a>
          <h1 class="page-title pt-4 pe-5 ps-5">Course Registration</h1>
        </div>
        <div class="row">
          <div class ="row">
            <div class="form">
              <form class="signUp" action="code.php" method="POST">
                <input type="hidden" name="course_id" value = "<?= $course_id ?>">
                <div class="form-container pe-5 ps-5">
                  <div class="form-row mt-4">
                    <label class="lbl-name fs-5 mb-1" for='select-state'>Instructor <label class="asterisk">*</label></label>
                    <select class="fs-5 rounded" name="instructor_id" id="select-state" placeholder="Select an instructor...">
                        <option value=""></option>
                        <?php while ($instructor = mysqli_fetch_assoc($instructors)) { ?>
                          <option value="<?php echo $instructor['instructor_id']?>">
                            <?= $instructor['firstname'] . " " . $instructor['lastname']?>
                          </option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-row-date mt-5">
                    <div class="col me-5">
                      <label class="lbl-name fs-5 mb-1" for='open-date'>Opening Date <label class="asterisk">*</label></label>
                      <input class="input-box p-2 fs-5" style='width: 100%;' type="date" name="opening_date" id ='open-date' required>
                    </div>
                    <div class="col">
                      <label class="lbl-name fs-5 mb-1" for='close-date'>Closing Date <label class="asterisk">*</label></label>
                      <input class="input-box p-2 fs-5" style='width: 100%;' type="date" name="closing_date" id ='close-date' required>
                    </div>
                  </div>
                  <!-- <div class="form-row mt-5 mb-3">
                    <label class="lbl-name fs-5 mb-1" for='implement-nr'>Implementation NR <label class="asterisk">*</label></label>
                    <input class="input-box p-2 fs-5" type="text" name="implementation" id ='implement-nr' required>
                  </div> -->
                  <div>
                  <button name="register" type="submit" class="btn btn-primary mt-5 fs-5 pe-4 ps-4" id="register-btn" >REGISTER</button> 
                  </div>
                </div>
              </form>
            </div>
          </div>    
        </div>
      </div>

    </div>
  </div>
</body>
</html>