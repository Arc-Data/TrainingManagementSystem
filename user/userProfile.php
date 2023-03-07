<?php

ob_start();
require dirname(__DIR__). "../templates/connection.php";
    if(isset($_POST['btnLogout']))
{
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/Button-Style.css">
        <link rel="stylesheet" href="../assets/css/Navigation-Style.css"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

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

    </head>
    <body>
        <br><br><br><a href = "../user/index.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Go Back</a>
        <header>
            <br><br>
            <?php
               session_start();
               include '../templates/navigation.php';
            ?>
        </header>

        <div style ="align-items:center; text-align:center;">
                <h2 class="update-user-info">UPDATE USER INFORMATION</h2></div>

            <div class="row">
                <div class="col-md-6 offset-3">
                <?php
                    //session_start();
                    include '../templates/connection.php';
                    $sql = "SELECT * FROM account_details";
                    $records = mysqli_query($conn, "SELECT * from account_details WHERE username = '$_SESSION[username]'");

                    if($row = mysqli_fetch_assoc($records)) {
                        $username = $row['username'];
                        $password = $row['password'];
                        $lname = $row['lastname'];
                        $fname = $row['firstname'];
                        $mname = $row['middlename'];
                        $suffix = $row['suffix'];

                        echo "<form method=POST enctype=multipart/form-data>
                                <div class='form-group row'>
                                    <label for=updateUsername class=text-field-name>Username</label>
                                    <input type=text name=updateUsername class=form-control value='$username' disabled>
                                </div>
                                <br>
                                <div class='form-group row'>
                                    <label for=updatePassword class=text-field-name>Password</label>
                                    <input type=password name=updatePassword class=form-control value='$password'>
                                </div>
                                <br>
                                <div class='form-group row'>
                                    <label for=updateLname class=text-field-name>Last Name</label>
                                    <input type=text name=updateLname class=form-control value='$lname'>
                                </div>
                                <br>
                                <div class='form-group row'>
                                    <label for=updateFname class=text-field-name>First Name</label>
                                    <input type=text name=updateFname class=form-control value='$fname'>
                                </div>
                                <br>
                                <div class='form-group row'>
                                    <label for=updateMname class=text-field-name>Middle Name</label>
                                    <input type=text name=updateMname class=form-control value='$mname'>
                                </div>
                                <br>
                                <div class='form-group row'>
                                    <label for=updateSuffix class=text-field-name>Suffix</label>
                                    <input type=text name=updateSuffix class=form-control value='$suffix'>
                                </div>
                                <br>
                                <div class='form-group row d-flex align-items-center justify-content-center'>
                                    <button type=button class=btn btn-primary data-toggle=modal data-target=#exampleModalCenter style='background-color: #681A1A; width: 25%; color:white;'>Update</button>
                                </div>

                                <div class=modal fade id=exampleModalCenter tabindex=-1 role=dialog aria-labelledby=exampleModalCenterTitle aria-hidden=true>
                                    <div class=modal-dialog-centered role=document style='display: flex; flex-direction: column; justify-content: center;'>
                                        <div class=modal-content style='width:33rem;'>
                                            <div class=modal-header>
                                                <h5 class=modal-title id=exampleModalLongTitle>Update Record</h5>
                                                <button type=button class=close data-dismiss=modal aria-label=Close style='border-radius: 30%; border:none; background-color: white; color: black; font-size: 1.5rem;'>
                                                    <span aria-hidden=true>&times;</span>
                                                </button>
                                            </div>
                                            <div class=modal-body style='display: flex; justify-content: center;'>
                                            Do you want to save the changes for this record?
                                            </div>
                                            <div class=modal-footer>
                                                <button type=button class=btn btn-secondary data-dismiss=modal style='background-color: #6c757d; color: white;'>Close</button>
                                                <input type=submit name=update class=btn btn-primary value='Save Changes' data-toggle=modal data-target=#exampleModalCenter style='background-color: #681A1A; color:white;'>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>";


                            if(isset($_POST['update'])){

                            // update the user profile
                            $_POST['updateUsername'] = $username;

                            $sql = "update `account_details` set `password` ='$_POST[updatePassword]', `lastname`='$_POST[updateLname]', `firstname`='$_POST[updateFname]',
                            `middlename` = '$_POST[updateMname]', `suffix` = '$_POST[updateSuffix]' WHERE `username` = '$_POST[updateUsername]'";
                            mysqli_query($conn, $sql);

                                echo '<p class="update_message"><span class="material-symbols-outlined" style="font-size: 22px; padding-right: 5px">
                                       task_alt</span><i>Record Updated!</i>';
                                header("refresh: 1");
                            }
                    }
                ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>