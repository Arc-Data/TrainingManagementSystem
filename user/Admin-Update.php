<?php


require dirname(__DIR__). "../templates/connection.php";


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
  

    echo '<p class="update_message"><span class="material-symbols-outlined" style="font-size: 22px; padding-right: 5px">
                                       task_alt</span><i>Record Updated!</i>';
    header("refresh: 1");
                              
    //header('location: Admin-Module.php');


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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Update User</title>
</head>

<style>
        body {
          font-family: 'Montserrat', sans-serif;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .update_message{
            position: absolute;
            top: 100px;
            right: 16px;
            text-align: right;
            width: fit-content;
            height: 7%;
            padding: 10px;
            font-size: 17px;
            color: white;
            background-color: #00c04b;
            border-color: #00c04b;
            border-radius: 5px;
            font-family: 'Montserrat';
            animation: fadeIn  0.5s ease-in-out;
            opacity: 70%;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 70%; }
        }

        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 48
        }

        </style>
<header> 
  <br><a href = "../user/Admin-Module.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Go Back</a>
</header>
<body>
  
  <div style ="align-items:center; text-align:center;">
                <h2 class="update-user-info">UPDATE ACCOUNT INFORMATION</h2></div>

            <div class="row">
                <div class="col-md-6 offset-3">
    <form method="post" style='display: flex; flex-direction: column; justify-content: center;'>
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
       <div class='form-group row d-flex align-items-center justify-content-center'>
                                    <button type=button class=btn btn-primary data-toggle=modal data-target=#exampleModalCenter style='background-color: #681A1A; width: 25%; color:white;'>Update</button>
                                </div>

      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Record</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style='text-align: center;'>
              Do you want to save changes for this record?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #6c757d !important; color: white;">Close</button>
              <button type="submit" class="btn btn" name="save">Save Changes</button>
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>

</body>

</html>