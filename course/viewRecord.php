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

<?php include('../assets/popup/message.php'); ?>

<dialog id ='deleteForm' style="font-family: Montserrat;">
  <div class="del-form-box pt-5 ps-5 pe-5">
    <div class="row">
      <h3 class="del-course-desc-vr">Delete this course?</h3>
    </div>
    <div class="row">
      <hr>
      <h4 class="del-course-title-vr">
          <?php echo $result['course_title']; ?> will be remove from the list.
      </h4>
    </div>
    <form action="code.php" method="POST">
      <div class="row mt-5" id="button-box">
        <input type="hidden" value="<?=$result['course_id'];?>" name="c_id">
        <div class="col text-end">
          <a id="cancel-btn-vr" type="button";>Cancel</a>
        </div>
        <div class="col text-start">
          <button type="submit" name="delete_course" id="del-course-btn">Delete</button>
        </div>
      </div>
    </form>
  </div>
</dialog>

<body style = "font-family: Montserrat; overflow-x:hidden; background-color:#fefcfb;">
  <?php include '../templates/navigation.php' ?>
  <?php include('../assets/popup/message.php'); ?>

  <div class = "box m-5 p-5">
    <div class="row p-5 rounded" style="background-color: #681a1a; color: white">
        <h1 style = "font-size: 48px;">
         <?php echo $result['course_title']; ?>
        </h1>
        <h5>
          <i class="fa-regular fa-calendar-days"></i>
        <?php echo $result ['number_of_days'] . " Days"; ?>
        </h5>
        <a href = "index.php" class = "text-decoration-none" style = "color:white">&#8592; View Course List</a>
    </div>      
    <div class="container mt-2 p-5" style="background-color:#fefcfb;;">
      <div class="row">
        <div class="col-7 me-4" style="background-color:#fefcfb;">
          <div class="row mb-4 p-3" style="background-color: white; border: 1px solid #dbdbdb; border-radius: 10px;">
            <h4>
              <strong>IMPLEMENTATION</strong>
            </h4>
            <p class ="ps-4 p-1">
              <?php if ($result['implementation']) {?>
                <?php echo $result['implementation'];?>
              <?php }else { 
                  echo "Placeholder text";?>
              <?php } ?>
            </p>
          </div>
          
          <div class="row mb-4 p-3" style="background-color: white; border: 1px solid #dbdbdb; border-radius: 10px;">
            <h4>
              <strong>MTAP COURSE</strong>
            </h4>
            <p class ="ps-4 p-1">
              <?php if ($result['mtap_course']) {?>
                <?php echo $result['mtap_course'];?>
              <?php } else { 
                  echo "Placeholder text";?>
              <?php } ?>
            </p>
          </div>

        <div class="row mb-4 p-3" style="background-color: white; border: 1px solid #dbdbdb; border-radius: 10px;">
          <h4>
            <strong>PREREQUISITES</strong>
          </h4>
          <ul style="padding-left:30px;">
            <?php 
                $pre_req = $result["pre_requisite_course"];
                if ($pre_req){
                  while($pre_req) {
                    $sql = "SELECT * FROM course WHERE course_id = '$pre_req'";
                    $query = mysqli_query($conn, $sql);
                    $course = mysqli_fetch_assoc($query);
                    ?>
                      <li class ="ps-2 pt-1">
                        <a class="fw-bold" href style="color:#9D2426;"><?= $course['course_title'] ?></a>
                      </li>
                    <?php 
                      $pre_req = $course['pre_requisite_course'];
                  }
                } else {
                  echo "<li>Placeholder text</li>";
                }
                ?>
            <?php ?>
          </ul>
        </div>

          <div class="row mt-5">
            <div class="col-2 me-4 p-0">
              <a href="updateCourse.php?id=<?php echo $id ?>" type="button" class="update-btn-vr">UPDATE</a>
            </div>
            <?php 

              $sql = "
                SELECT * 
                FROM `registration_course`
                WHERE course_id = $id";

              $query = mysqli_query($conn, $sql);
              if(!mysqli_query($conn, $sql)) : 
            ?>
            <div class="col-2 p-0">
              <button type="button" class="del-btn-vr" id ="deleteBtn">DELETE</button>
            </div>
            <?php endif ?>
          </div>
        </div>
        <div class="col" style="background-color:#fefcfb;">
          <div class="row p-3" style="background-color: white; border: 1px solid #dbdbdb; border-radius: 10px;" >
            <h4>
              <strong>INSTRUCTORS</strong>
            </h4>
            <p>
              Content here.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src = "../assets/js/message.js"></script>
  <script src = "../assets/js/delete.js"></script>
</body>
</html>
