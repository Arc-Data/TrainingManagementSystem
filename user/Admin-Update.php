<?php

ob_start();
require dirname(__DIR__). "../templates/connection.php";
    if(isset($_POST['btnLogout']))
{
    session_destroy();
}

$account_id=$_GET['updateid'];
$sql = "Select * from `account_details` where account_id=$account_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$username = $row['username'];
$password = $row['password'];
$user_type = $row['user_type'];
$lastname = $row['lastname'];
$firstname = $row['firstname'];
$middlename = $row['middlename'];
$suffix = $row['suffix'];

if (isset($_POST['save'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $user_type= $_POST['user_type'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $suffix = $_POST['suffix'];

  $sql = "update `account_details` set account_id=$account_id, username='$username', password='$password', user_type = '$user_type', lastname='$lastname', firstname='$firstname', middlename ='$middlename', suffix='$suffix' where account_id=$account_id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    // echo "Data added successfully.";
    echo "User Updated Successfully";

    header('location: Admin-Module.php');

  } else {
    die(mysqli_error($conn));
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/Button_Style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/Navigation_Style.css"/>

  <title>Update User</title>
</head>

<style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
</style>

<body>
  <br><br><br><a href = "../user/Admin-Module.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Go Back</a>
  <div class="container my-5">
    <form method="post">
      <div class="form-group">
        <label class=text-field-name>Username</label>
        <input type="text" class="form-control" placeholder="Enter new userename" name="username" autocomplete="off"
        value="<?php echo $username;?>">
      </div>

      <div class="form-group">
        <label class=text-field-name>Password</label>
        <input type="password" class="form-control" placeholder="Enter new password" name="password" autocomplete="off"
        value="<?php echo $password;?>">
      </div>

      <div class="form-group">
      <label class=text-field-name>User Type</label>
      <select name="user_type" id="user_type" class="form-control">
        <option value="0" disabled="disabled">Select an option</option>
        <option value="student"<?php if($user_type=="student") echo 'selected="selected"'; ?> >student</option>
        <option value="instructor"<?php if($user_type=="instructor") echo 'selected="selected"'; ?> >instructor</option>
        <option value="admin"<?php if($user_type=="admin") echo 'selected="selected"'; ?> >admin</option>
      </select>
      </div>



      <div class="form-group">
        <label class=text-field-name>Last Name</label>
        <input type="text" class="form-control" placeholder="Enter new last name" name="lastname" autocomplete="off"
        value="<?php echo $lastname;?>">
      </div>

      <div class="form-group">
        <label class=text-field-name>First Name</label>
        <input type="text" class="form-control" placeholder="Enter new first name" name="firstname" autocomplete="off"
        value="<?php echo $firstname;?>">
      </div>

      <div class="form-group">
        <label class=text-field-name>Middle Name</label>
        <input type="text" class="form-control" placeholder="Enter new middle name" name="middlename" autocomplete="off"
        value="<?php echo $middlename;?>">
      </div>

      <div class="form-group">
        <label class=text-field-name>Suffix</label>
        <input type="text" class="form-control" placeholder="Enter new suffix" name="suffix" autocomplete="off"
        value="<?php echo $suffix;?>">
      </div>

      <button type="submit" class="btn
      btn" name="save">Save Changes</button>
    </form>
  </div>

</body>

</html>