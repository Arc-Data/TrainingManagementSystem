<?php 
session_start();
include '../templates/connection.php';

  if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $username = $_POST['username'];
    $rank= $_POST['rank'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $qualification_degree = $_POST['qualification_degree'];
    $course_specialization = $_POST['course_specialization'];
    $other_qualification = $_POST['other_qualification'];
   /*  $office_name = $_POST['office_name']; */
    $user_type = 'instructor';
    $sql = "INSERT INTO account_details (username,password,user_type,lastname,firstname,middlename,suffix) VALUES ('$username','$password','$user_type','$lastname','$firstname','$middlename','$suffix')";
    $result = mysqli_query($conn,$sql);

    $sql="SELECT max(account_id) AS acc_id FROM account_details";
    $result = mysqli_query($conn,$sql);
    $account_id = mysqli_fetch_assoc($result);
    $acc_id = $account_id['acc_id'];
    
    //$sql = "INSERT INTO student(rank, office_name,account_id) VALUES ('$rank','$office_name','$acc_id')";
    $sql = "INSERT INTO pool_instructor_details(account_id, rank, qualification_degree,course_specialization,other_qualification) VALUES ('$acc_id','$rank','$qualification_degree ','$course_specialization','$other_qualification')";
    $result = mysqli_query($conn,$sql);
    
    if($query_run)
    {
        $_SESSION['message'] = "Create Successfully!";
        header("Location: create_instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong!";  
        header("Location: create_instructor.php");
        exit(0);
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Training Management System</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    input,select {
      border: 2px solid #DBDBDB;
      border-radius: 10px;
      width: 200px;
    }
  </style>
</head>
<?php include '../assets/popup/message.php';?>
<body style="text-align:center; font-family: Montserrat;">
<br><br><br><a href = "index.php" class = "text-decoration-none" style = "padding-left:5px; float:left; font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Back to View</a>
<?php
    require '../templates/navigation.php';
  ?>
<div class="container mt-5">
  <h2 class="pt-4">Add Instructor</h2>
  <form action="" method="POST">
    <fieldset>
      <label for="email">Email</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="username" id="email">
      <br>
      <label for="password">Password</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="password" id="password">    
      <br>      
      <label for="first-name">First Name</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="firstname" id="first-name">
      <br>
      <label for="middle-name">Middle Name</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="middlename" id="middle-name">
      <br>
      <label for="last-name">Last Name</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="lastname" id="last-name">
      <br>
      <label for="suffix">Suffix</label>
      <br>
      <select class="p-1 fs-6 mb-2" type="text" name="suffix" id="suffix">
        <option value=""></option>
        <option value="Jr.">Jr.</option>
      </select>
      <br>
      <label for="rank">Rank</label>
      <br>
      <select class="p-1 fs-6 mb-2" type="text" name="rank" id="rank">
        <option value="PCO">PCO</option>
        <option value="PNCO">PCNO</option>
        <option value="NUP">NUP</option>
      </select>
      <!-- <label for="office-name">Office Name</label>
      <br>
      <select class="p-1 fs-6 mb-4" type="text" name="office_name" id="office-name">
        <option value="InfoTech">InfoTech</option>
        <option value="AVG">AVG</option>
        <option value="TechnoOrg">TechnoOrg</option>
      </select> -->
      <br>      
      <label for="first-name">Qualification Degree</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="qualification_degree" id="qualification_degree">
      <br>
      <label for="middle-name">Course Specialization</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="course_specialization" id="course_specialization">
      <br>
      <label for="last-name">Other Qualification</label>
      <br>
      <input class="p-1 fs-6 mb-2" type="text" name="other_qualification" id="other_qualification">
      <br>
      <button class="btn btn-primary pe-4 ps-4 pt-2 pb-2" type="Submit" name="submit" value="submit" style="background-color: #681A1A; border:2px solid #681A1A">ADD</button>
    </fieldset>
  </form>

</div>  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
