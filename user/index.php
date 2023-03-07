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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/Navigation-Style.css"/>
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/index.css">


</head>

<body>
    <header>
        <?php
            session_start();
            require '../templates/navigation.php';
        ?>
    </header>
        <section>
            <div class="panel">
            <div class="course-type">
                    <img src="../assets/images/icon1.png" alt="" class="course-img">
                    <p class="course-heading">Upcoming</p>
                    <table class="tbl">
                        <thead>
                            <tr>
                                <td class="headers">Course Title</td>
                                <td class="headers">Opening Date</td>
                                <td class="headers">Closing Date</td>
                            </tr>
                    <?php

                    $sql = "SELECT * 
                            FROM `course` AS C, `registration_course` AS R 
                            WHERE C.course_id = R.course_id AND (CURDATE() < opening_date)";
                    $result = mysqli_query($conn, $sql);
                    if ($result):
                        while ($row = mysqli_fetch_assoc($result)) { 
                            $course_reg_id = $row['course_reg_id'];
                            $course_title = $row['course_title'];
                            $opening_date = $row['opening_date'];
                            $closing_date = $row['closing_date'];
                        
                    ?>

                    <tr>
                        <td><button id='<?php echo $row["course_reg_id"] ?>' class= btn btn-primary data-toggle=modal data-target=#exampleModalCenter style=background-color: #681A1A; width: 25%; color: white;><?php echo $row["course_title"] ?></button></form></td>
                        <td><?php echo $row["opening_date"] ?></td>
                        <td><?php echo $row["closing_date"] ?></td>
                    </tr>
                    <?php } endif; ?>

                    </table> <!-- close tag for table in index --> 
                </div>
                

                <div class="course-type">
                    <img src="../assets/images/icon2.png" alt="" class="course-img">
                    <p class="course-heading">Ongoing</p>
                    <table class="tbl">
                        <thead>
                            <tr>
                                <td class="headers">Course Title</td>
                                <td class="headers">Opening Date</td>
                                <td class="headers">Closing Date</td>
                            </tr>
                    <?php

                    $sql = "SELECT * 
                            FROM `course` AS C, `registration_course` AS R 
                            WHERE C.course_id = R.course_id AND (CURDATE() BETWEEN opening_date AND closing_date)";
                    $result = mysqli_query($conn, $sql);
                    if ($result):
                        while ($row = mysqli_fetch_assoc($result)) { 
                            $course_reg_id = $row['course_reg_id'];
                            $course_title = $row['course_title'];
                            $opening_date = $row['opening_date'];
                            $closing_date = $row['closing_date'];
                        
                    ?>

                    <tr>
                        <td><button id='<?php echo $row["course_reg_id"] ?>' class= btn btn-primary data-toggle=modal data-target=#exampleModalCenter style=background-color: #681A1A; width: 25%; color: white;><?php echo $row["course_title"] ?></button></form></td>
                        <td><?php echo $row["opening_date"] ?></td>
                        <td><?php echo $row["closing_date"] ?></td>
                    </tr>
                    <?php } endif; ?>

                    </table> <!-- close tag for table in index --> 
                </div>

               <div class="course-type">
                    <img src="../assets/images/icon3.png" alt="" class="course-img">
                    <p class="course-heading">Ended</p>
                    <table class="tbl">
                        <thead>
                            <tr>
                                <td class="headers">Course Title</td>
                                <td class="headers">Opening Date</td>
                                <td class="headers">Closing Date</td>
                            </tr>
                    <?php

                    $sql = "SELECT * 
                            FROM `course` AS C, `registration_course` AS R 
                            WHERE C.course_id = R.course_id AND (CURDATE() > closing_date)";
                    $result = mysqli_query($conn, $sql);
                    if ($result):
                        while ($row = mysqli_fetch_assoc($result)) { 
                            $course_reg_id = $row['course_reg_id'];
                            $course_title = $row['course_title'];
                            $opening_date = $row['opening_date'];
                            $closing_date = $row['closing_date'];
                        
                    ?>

                    <tr>
                        <td><button id='<?php echo $row["course_reg_id"] ?>' class= btn btn-primary data-toggle=modal data-target=#exampleModalCenter style=background-color: #681A1A; width: 25%; color: white;><?php echo $row["course_title"] ?></button></form></td>
                        <td><?php echo $row["opening_date"] ?></td>
                        <td><?php echo $row["closing_date"] ?></td>
                    </tr>
                    <?php } endif; ?>

                    </table> <!-- close tag for table in index --> 
                </div> <!-- close tag for course type finished --> 
            </div>  <!-- close tag for panel -->
        </section>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Course Information</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal <body>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal" style="color: white; background-color: #681A1A;">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('button').click(function() {
                    id_course = $(this).attr('id')
                        $.ajax({url: "select.php",
                        method: 'post',
                        data: {course_reg_id:id_course},
                        success: function(result) {
                    $(".modal-body").html(result);
                    }});
                    $('#myModal').modal("show");
                })
            })
        </script>
</body>

</html>