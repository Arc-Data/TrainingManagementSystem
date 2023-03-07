<?php

ob_start();
require dirname(__DIR__).('../templates/connection.php');
    if(isset($_POST['btnLogout']))
{
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/Button_Style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">

    <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
    </style>


</head>

<body>
<br><br><br><a href = "../user/homepage.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Back to View</a>
<header>
        <?php
            session_start();
            require dirname(__DIR__).('../templates/navigation.php');
        ?>
</header>
    <div class="container pt-5">

        </button>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Account ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Suffix</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "Select * from `account_details`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $account_id = $row['account_id'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $user_type = $row['user_type'];
                        $lastname = $row['lastname'];
                        $firstname = $row['firstname'];
                        $middlename = $row['middlename'];
                        $suffix = $row['suffix'];
                        echo ' <tr>
                    <th scope="row">' . $account_id . '</th>
                    <td>' . $username . '</td>
                    <td>' . $password . '</td>
                    <td>' . $user_type . '</td>
                    <td>' . $lastname . '</td>
                    <td>' . $firstname . '</td>
                    <td>' . $middlename . '</td>
                    <td>' . $suffix . '</td>
                    <td>
                    <button type="submit" class="btn btn"><a href="Admin-Update.php?
                    updateid='.$account_id.'" class="text-light" style="text-decoration:none">Update</a></button>
                    </td>
                    </tr>';
                    }

                }

                ?>

            </tbody>
        </table>

    </div>

</body>

</html>