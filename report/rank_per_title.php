<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Document</title>
    <style>

         *{
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            }

        header{
            background-color: #681a1a;
            background-size: cover;
            height: 60px;
            }

        header h1 {
            font-size: 20px;
            padding: 20px;
            color: #ffe000;

            }
        th, td {
            background-color: #681a1a;
            color: white ;
            border: 2px solid black;
            text-align: center;
            padding: 5px;
            height: 40px;
            width: 100px;
            font-weight: bold;
        }

        #search-input {
            background-color: #681a1a;
            color: #f0ece2; 
            font-size: 15px;
            border: 2px solid black;
            padding: 5px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 120px;
            height: 40px;
            /* weight: 90px; */
            transition: opacity 1s;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.8)  ;
        }
        .homebutton{
            float: right ;
             margin-top: -45px;
             margin-right: 30px;
        }

        .homebutton a {
             text-decoration: none;
         color: #ffe000;

        }

        #table {
            margin: 0 auto;
            border-collapse: collapse;
        }


        .tab {
            padding: 30px;
        }

        #form {
            float: center;
        }

        center {
            margin-top: 80px;
        }


    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <!-- <header>
      <strong><h1>REPORT MANAGEMENT</h1> </strong>
      <div class="homebutton">
        <a href="main.html"><span class="material-symbols-outlined">HOME</span></a>
      </div>
    </header> -->
    <br><br><br><a href = "index.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Back to View</a>
    <?php
    session_start();
    /* $conn = mysqli_connect('localhost', 'root', '', 'project') or die('Unable to connect'); 
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } */
    
    require '../templates/connection.php';
	require '../templates/header.php';
    require '../templates/navigation.php';

	#session_start();
    // Check if the user is logged in, if not then redirect him to login page
    /* if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    } */

    $sql = "SELECT DISTINCT course.course_title FROM course";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    echo "<center> <select id='search-input'></center>" ;
    echo "<option value='' disable> Select a course  </option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["course_title"] . "'>" . $row["course_title"] . "</option>";
    }
    echo "</select>";

    $sql = "SELECT course.course_title, 
            SUM(CASE WHEN student.rank='NUP' THEN 1 ELSE 0 END) AS NUP,
            SUM(CASE WHEN student.rank='PNCO' THEN 1 ELSE 0 END) AS PNCO,
            SUM(CASE WHEN student.rank='PCO' THEN 1 ELSE 0 END) AS PCO,
            SUM(CASE WHEN student.rank='CPU' THEN 1 ELSE 0 END) AS CPU,
            SUM(CASE WHEN student.rank='PCOS' THEN 1 ELSE 0 END) AS PCOS,
            COUNT(DISTINCT student.student_id) AS total_ranks
            FROM student
            LEFT JOIN registration_participants_class ON student.student_id = registration_participants_class.student_id
            LEFT JOIN registration_course ON registration_participants_class.course_reg_id = registration_course.course_reg_id
            LEFT JOIN course ON registration_course.course_id = course.course_id
            GROUP BY course.course_title";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

 
    echo "<div class='tab'>";
    echo "<table style='border: 1px solid black;' id='table'>";
    echo "<thead>
            <tr>
                <th rowspan = '2'>COURSE TITLE</th>
                <th colspan ='5'><center> RANK </center></th>
                <th rowspan = '2'>TOTAL RANK</th>
            </tr>
            <tr>
                <th>NUP</th>
                <th>PNCO</th>
                <th>PCO</th>
                <th>CPU</th>
                <th>PCOS</th>
            </tr>
        </thead>";
        echo "<tr>";
        echo "<td colspan = '7' style='color: white;'>Select Course To View Records</td>";
        echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr style='display: none;'>";
        echo "<td>" . ($row["course_title"] ? $row["course_title"] : "Unknown Course ID"). "</td>";
        echo "<td>" . ($row["NUP"] ? $row["NUP"] : "0") . "</td>";
        echo "<td>" . ($row["PNCO"] ? $row["PNCO"] : "0") . "</td>";
        echo "<td>" . ($row["PCO"] ? $row["PCO"] : "0") . "</td>";
        echo "<td>" . ($row["CPU"] ? $row["CPU"] : "0") . "</td>";
        echo "<td>" . ($row["PCOS"] ? $row["PCOS"] : "0") . "</td>";
        echo "<td>" . $row["total_ranks"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    //$conn->close();
    ?>
    
    <script>
    $(document).ready(function(){
        var rows = $("#table tbody tr");
        $("#search-input").on("change", function() {
            var value = $(this).val().toLowerCase();

            rows.filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</body>
</html>

